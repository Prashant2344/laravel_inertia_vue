<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\FileStorageType;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        // $categories = ServiceCategory::get();
        // dd($categories);
        // $categories = DB::table('service_categories as child')
        //     ->leftJoin('service_categories as parent', 'child.category_id', '=', 'parent.id')
        //     ->select('child.id', 'child.name','child.description','child.status', 'parent.name as parent_category')
        //     ->get();

        $categories = ServiceCategory::with('parent:id,name')
            ->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'description' => $category->description,
                    'status' => $category->status,
                    'parent_category' => $category->parent ? $category->parent->name : 'No Parent',
                ];
            });

        return Inertia::render('services/categories/Index', compact('categories'));
    }

    public function create()
    {
        return Inertia::render('services/categories/Form');
    }

    public function getCategories()
    {
        $categories = ServiceCategory::get();
        return $categories;
    }

    public function store(Request $request,FileStorageType $fileStorageType)
    {
        $path = null;
        if($request->file('icon')) {
            $folderPath = 'servicecategories';
            $path = $fileStorageType->storeFile($request->file('icon'),$folderPath);
        }

        ServiceCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'icon' => $path,
        ]);

        return redirect()->route('services.categories.list');

    }
}

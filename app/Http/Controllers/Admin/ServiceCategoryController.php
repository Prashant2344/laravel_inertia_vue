<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::get();

        return Inertia::render('services/categories/Index', compact('categories'));
    }

    public function create()
    {
        return Inertia::render('services/categories/Form');
    }
}

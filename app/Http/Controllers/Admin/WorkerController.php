<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\FileStorageType;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = User::get();

        return Inertia::render('workers/Index', compact('workers'));
    }

    public function create()
    {
        return Inertia::render('workers/Form');
    }

    public function store(Request $request,FileStorageType $fileStorageType)
    {
        // $path = $request->file('profile')->store('images', 'public');
        // dd(env('CLOUDINARY_CLOUD_NAME'), env('CLOUDINARY_API_KEY'), env('CLOUDINARY_API_SECRET'));
        $path = null;
        if($request->file('profile')) {
            $folderPath = 'workers';
            $path = $fileStorageType->storeFile($request->file('profile'),$folderPath);
        }

        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => 'required|unique:users,email',
        ]);

        DB::transaction(function () use ($request,$path) {
            // Insert into users table and get the user ID
            $userId = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'type' => json_encode($request->type),
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert into workers table
            DB::table('workers')->insert([
                'user_id' => $userId,
                'address' => $request->address,
                'service_areas' => json_encode($request->work_address),
                'service_type' => json_encode($request->skills),
                'profile_picture' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'type' => json_encode(['worker' => 'worker']),
        //     'password' => Hash::make($request->password)
        // ]);

        return redirect()->route('workers.list');
        // return Inertia::location(route('workers.list'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email','max:255'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('workers.list');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        return Branch::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:branches,name',
        ]);

        return Branch::create($request->only('name'));
    }

    public function show($id)
    {
        return Branch::with(['employees' => function ($query) {
            $query->orderBy('name', 'asc');
        }])->findOrFail($id);
    }
}

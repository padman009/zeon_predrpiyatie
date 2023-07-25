<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request, $branchId)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|in:Engineer,Employee',
        ]);

        return Employee::create([
            'branch_id' => $branchId,
            'name' => $request->input('name'),
            'position' => $request->input('position'),
        ]);
    }
}

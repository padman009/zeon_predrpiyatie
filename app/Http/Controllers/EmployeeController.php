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
            'role_id' => 'required|in:Roles',
        ]);

        return Employee::create([
            'branch_id' => $branchId,
            'name' => $request->input('name'),
            'role_id' => $request->input('role_id'),
        ]);
    }
}

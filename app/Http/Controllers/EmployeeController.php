<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/branches/{id}/employees",
     *     operationId="storeEmployee",
     *     tags={"Employees"},
     *     summary="Add a new employee to a branch",
     *     @OA\Parameter(name="id", in="path", required=true, description="Branch ID", @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="role_id", type="string", example="Engineer")
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="Employee added successfully"),
     *     @OA\Response(response="404", description="Branch not found"),
     *     @OA\Response(response="422", description="Unprocessable Entity (validation errors)")
     * )
     */
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

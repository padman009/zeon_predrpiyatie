<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/branches",
     *     operationId="getAllBranches",
     *     tags={"Branches"},
     *     summary="Get a list of all branches",
     *     @OA\Response(response="200", description="List of all branches"),
     * )
     */
    public function index()
    {
        return Branch::all();
    }

    /**
     * @OA\Post(
     *     path="/api/branches",
     *     operationId="storeBranch",
     *     tags={"Branches"},
     *     summary="Create a new branch",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 @OA\Property(property="name", type="string", example="New Branch")
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="Branch created successfully"),
     *     @OA\Response(response="422", description="Unprocessable Entity (validation errors)")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:branches,name',
        ]);

        return Branch::create($request->only('name'));
    }

    /**
     * @OA\Get(
     *     path="/api/branches/{id}",
     *     operationId="getBranchById",
     *     tags={"Branches"},
     *     summary="Get a branch by ID",
     *     @OA\Parameter(name="id", in="path", required=true, description="Branch ID", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Branch details"),
     *     @OA\Response(response="404", description="Branch not found"),
     * )
     */
    public function show($id)
    {
        return Branch::with(['employees' => function ($query) {
            $query->orderBy('name', 'asc');
        }])->findOrFail($id);
    }
}

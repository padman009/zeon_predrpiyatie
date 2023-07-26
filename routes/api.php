<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/**
 * @OA\Get(
 *     path="/api/branches",
 *     operationId="getAllBranches",
 *     tags={"Branches"},
 *     summary="Get a list of all branches",
 *     @OA\Response(response="200", description="List of all branches"),
 * )
 */
Route::get('/branches', [BranchController::class, 'index']);

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
Route::post('/branches', [BranchController::class, 'store']);

/**
 * @OA\Get(
 *     path="/api/branches/{id}",
 *     operationId="getBranchById",
 *     tags={"Branches"},
 *     summary="Get a branch by ID",
 *     @OA\Parameter(name="id", in="path", required=true, description="Branch ID", @OA\Schema(type="integer")),
 *     @OA\Response(
 *         response="200",
 *         description="Branch details and list of employees",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example="1"),
 *             @OA\Property(property="name", type="string", example="Branch A"),
 *             @OA\Property(
 *                 property="employees",
 *                 type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example="1"),
 *                     @OA\Property(property="name", type="string", example="John"),
 *                     @OA\Property(property="surname", type="string", example="Doe"),
 *                     @OA\Property(property="role_name", type="string", example="Engineer"),
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(response="404", description="Branch not found"),
 * )
 */
Route::get('/branches/{id}', [BranchController::class, 'show']);

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
Route::post('/branches/{branchId}/employees', [EmployeeController::class, 'store']);

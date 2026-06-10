<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Services\AdminService;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $users = $this->adminService->getUsersList($request->role);

        return response()->json([
            'success' => true,
            'message' => 'Users list retrieved.',
            'data' => $users
        ]);
    }

    public function update(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $user = $this->adminService->updateUser($id, $request->all());

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully.',
            'data' => $user
        ]);
    }

    public function suspend(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $this->adminService->suspendUser($id);

        return response()->json([
            'success' => true,
            'message' => 'User suspended successfully.'
        ]);
    }

    public function activate(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $this->adminService->activateUser($id);

        return response()->json([
            'success' => true,
            'message' => 'User activated successfully.'
        ]);
    }

    public function destroy(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $this->adminService->deleteUser($id);

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully.'
        ]);
    }
}

<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Services\AdminService;
use Illuminate\Http\Request;

class VerificationController extends Controller
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

        $pending = $this->adminService->getPendingVerifications();

        return response()->json([
            'success' => true,
            'message' => 'Pending document verifications list.',
            'data' => $pending
        ]);
    }

    public function approve(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $this->adminService->verifyUserDocuments($id, true);

        return response()->json([
            'success' => true,
            'message' => 'Documents approved.'
        ]);
    }

    public function reject(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $this->adminService->verifyUserDocuments($id, false);

        return response()->json([
            'success' => true,
            'message' => 'Documents rejected.'
        ]);
    }
}

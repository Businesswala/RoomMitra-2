<?php

namespace App\Modules\Notifications\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Notifications\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index(Request $request)
    {
        $notifs = $this->notificationService->getNotifications($request->user()->id);

        return response()->json([
            'success' => true,
            'message' => 'Notifications retrieved.',
            'data' => $notifs
        ]);
    }

    public function markRead(Request $request, string $id)
    {
        $this->notificationService->markAsRead($request->user()->id, $id);

        return response()->json([
            'success' => true,
            'message' => 'Notification marked read.'
        ]);
    }

    public function markAllRead(Request $request)
    {
        $this->notificationService->markAllAsRead($request->user()->id);

        return response()->json([
            'success' => true,
            'message' => 'All notifications marked read.'
        ]);
    }
}

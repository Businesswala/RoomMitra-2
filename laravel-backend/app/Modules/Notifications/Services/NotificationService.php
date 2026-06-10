<?php

namespace App\Modules\Notifications\Services;

use App\Modules\Notifications\Models\Notification;

class NotificationService
{
    public function getNotifications(string $userId)
    {
        return Notification::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    public function markAsRead(string $userId, string $id): void
    {
        Notification::where('id', $id)->where('user_id', $userId)->update(['is_read' => true]);
    }

    public function markAllAsRead(string $userId): void
    {
        Notification::where('user_id', $userId)->where('is_read', false)->update(['is_read' => true]);
    }

    public function sendNotification(string $userId, string $title, string $message, string $type): Notification
    {
        $notif = Notification::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'is_read' => false
        ]);

        // Integrate FCM logic, email logs here...
        return $notif;
    }
}

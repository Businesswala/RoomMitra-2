<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{conversationId}', function ($user, $conversationId) {
    $conversation = \App\Modules\Chat\Models\Conversation::find($conversationId);
    if (!$conversation) {
        return false;
    }
    return (string) $conversation->user_id === (string) $user->id || 
           (string) $conversation->lister_id === (string) $user->id;
});

Broadcast::channel('notifications.{userId}', function ($user, $userId) {
    return (string) $user->id === (string) $userId;
});

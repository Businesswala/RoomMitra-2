<?php

namespace App\Modules\Chat\Services;

use App\Modules\Chat\Models\Conversation;
use App\Modules\Chat\Models\Message;
use App\Modules\Chat\Models\MessageAttachment;
use App\Events\MessageSent;
use App\Events\TypingIndicator;
use Illuminate\Support\Facades\DB;
use Exception;

class ChatService
{
    public function getConversations(string $userId)
    {
        return Conversation::where('user_id', $userId)
            ->orWhere('lister_id', $userId)
            ->with(['user', 'lister', 'listing'])
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function createConversation(string $userId, string $listerId, ?string $listingId): Conversation
    {
        if ($userId === $listerId) {
            throw new Exception("You cannot start a conversation with yourself.", 400);
        }

        return Conversation::firstOrCreate([
            'user_id' => $userId,
            'lister_id' => $listerId,
            'listing_id' => $listingId
        ]);
    }

    public function sendMessage(string $senderId, array $data): Message
    {
        $conversation = Conversation::findOrFail($data['conversation_id']);

        if ($conversation->user_id !== $senderId && $conversation->lister_id !== $senderId) {
            throw new Exception("Unauthorized to participate in this conversation.", 403);
        }

        return DB::transaction(function () use ($senderId, $data, $conversation) {
            $msg = Message::create([
                'conversation_id' => $data['conversation_id'],
                'sender_id' => $senderId,
                'message' => $data['message'] ?? null,
            ]);

            if (!empty($data['attachments'])) {
                foreach ($data['attachments'] as $url) {
                    MessageAttachment::create([
                        'message_id' => $msg->id,
                        'file_url' => $url,
                    ]);
                }
            }

            // Update conversation timestamp
            $conversation->touch();

            // Dispatch websocket broadcast
            broadcast(new MessageSent($msg->load('attachments')))->toOthers();

            return $msg;
        });
    }

    public function getMessages(string $userId, string $conversationId)
    {
        $conversation = Conversation::findOrFail($conversationId);

        if ($conversation->user_id !== $userId && $conversation->lister_id !== $userId) {
            throw new Exception("Unauthorized.", 403);
        }

        return Message::where('conversation_id', $conversationId)
            ->with('attachments')
            ->orderBy('created_at', 'asc')
            ->paginate(50);
    }

    public function markAsRead(string $userId, string $conversationId): void
    {
        Message::where('conversation_id', $conversationId)
            ->where('sender_id', '!=', $userId)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }

    public function deleteMessage(string $userId, string $messageId): void
    {
        $message = Message::findOrFail($messageId);
        if ($message->sender_id !== $userId) {
            throw new Exception("Unauthorized.", 403);
        }
        $message->delete();
    }

    public function sendTypingStatus(string $userId, string $conversationId, bool $isTyping): void
    {
        broadcast(new TypingIndicator($conversationId, $userId, $isTyping))->toOthers();
    }
}

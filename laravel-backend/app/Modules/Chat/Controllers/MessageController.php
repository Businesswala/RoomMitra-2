<?php

namespace App\Modules\Chat\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Chat\Requests\SendMessageRequest;
use App\Modules\Chat\Services\ChatService;
use Illuminate\Http\Request;
use Exception;

class MessageController extends Controller
{
    protected $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function index(Request $request, string $conversationId)
    {
        try {
            $messages = $this->chatService->getMessages($request->user()->id, $conversationId);
            $this->chatService->markAsRead($request->user()->id, $conversationId);

            return response()->json([
                'success' => true,
                'message' => 'Messages retrieved.',
                'data' => $messages
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 403);
        }
    }

    public function store(SendMessageRequest $request)
    {
        try {
            $msg = $this->chatService->sendMessage($request->user()->id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Message sent.',
                'data' => $msg
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 403);
        }
    }

    public function destroy(Request $request, string $id)
    {
        try {
            $this->chatService->deleteMessage($request->user()->id, $id);

            return response()->json([
                'success' => true,
                'message' => 'Message deleted.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 403);
        }
    }

    public function typing(Request $request)
    {
        $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'is_typing' => 'required|boolean'
        ]);

        $this->chatService->sendTypingStatus(
            $request->user()->id,
            $request->conversation_id,
            $request->is_typing
        );

        return response()->json([
            'success' => true
        ]);
    }
}

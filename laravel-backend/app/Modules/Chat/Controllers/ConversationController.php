<?php

namespace App\Modules\Chat\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Chat\Services\ChatService;
use Illuminate\Http\Request;
use Exception;

class ConversationController extends Controller
{
    protected $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function index(Request $request)
    {
        $conversations = $this->chatService->getConversations($request->user()->id);
        
        return response()->json([
            'success' => true,
            'message' => 'Conversations retrieved.',
            'data' => $conversations
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lister_id' => 'required|exists:users,id',
            'listing_id' => 'nullable|exists:listings,id'
        ]);

        try {
            $conv = $this->chatService->createConversation(
                $request->user()->id,
                $request->lister_id,
                $request->listing_id
            );

            return response()->json([
                'success' => true,
                'message' => 'Conversation started.',
                'data' => $conv
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}

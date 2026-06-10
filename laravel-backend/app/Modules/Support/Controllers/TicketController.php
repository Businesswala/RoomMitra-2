<?php

namespace App\Modules\Support\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Support\Requests\CreateTicketRequest;
use App\Modules\Support\Requests\ReplyTicketRequest;
use App\Modules\Support\Services\TicketService;
use Illuminate\Http\Request;
use Exception;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index(Request $request)
    {
        $tickets = $this->ticketService->getTickets($request->user()->id);

        return response()->json([
            'success' => true,
            'message' => 'Tickets retrieved.',
            'data' => $tickets
        ]);
    }

    public function store(CreateTicketRequest $request)
    {
        $ticket = $this->ticketService->createTicket($request->user()->id, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Support ticket created.',
            'data' => $ticket
        ], 201);
    }

    public function show(Request $request, string $id)
    {
        try {
            $ticket = $this->ticketService->getTicketDetails($request->user()->id, $id);

            return response()->json([
                'success' => true,
                'message' => 'Ticket details retrieved.',
                'data' => $ticket
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ticket not found.'
            ], 404);
        }
    }

    public function reply(ReplyTicketRequest $request, string $id)
    {
        try {
            // Verify ownership first
            $this->ticketService->getTicketDetails($request->user()->id, $id);
            $msg = $this->ticketService->replyToTicket($request->user()->id, $id, $request->message);

            return response()->json([
                'success' => true,
                'message' => 'Ticket reply posted.',
                'data' => $msg
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 403);
        }
    }

    public function close(Request $request, string $id)
    {
        try {
            $this->ticketService->closeTicket($request->user()->id, $id);

            return response()->json([
                'success' => true,
                'message' => 'Ticket closed successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 403);
        }
    }
}

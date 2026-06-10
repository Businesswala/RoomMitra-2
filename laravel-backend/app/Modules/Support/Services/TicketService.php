<?php

namespace App\Modules\Support\Services;

use App\Modules\Support\Models\Ticket;
use App\Modules\Support\Models\TicketMessage;
use Illuminate\Support\Facades\DB;

class TicketService
{
    public function createTicket(string $userId, array $data): Ticket
    {
        return DB::transaction(function () use ($userId, $data) {
            $ticket = Ticket::create([
                'user_id' => $userId,
                'subject' => $data['subject'],
                'priority' => $data['priority'],
                'status' => 'open'
            ]);

            TicketMessage::create([
                'ticket_id' => $ticket->id,
                'sender_id' => $userId,
                'message' => $data['message']
            ]);

            return $ticket->load('messages');
        });
    }

    public function replyToTicket(string $senderId, string $ticketId, string $messageText): TicketMessage
    {
        $ticket = Ticket::findOrFail($ticketId);
        
        // Reopen ticket if closed
        if ($ticket->status === 'closed') {
            $ticket->status = 'open';
            $ticket->save();
        }

        return TicketMessage::create([
            'ticket_id' => $ticketId,
            'sender_id' => $senderId,
            'message' => $messageText
        ]);
    }

    public function closeTicket(string $userId, string $id): void
    {
        $ticket = Ticket::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $ticket->status = 'closed';
        $ticket->save();
    }

    public function getTickets(string $userId)
    {
        return Ticket::where('user_id', $userId)->orderBy('updated_at', 'desc')->get();
    }

    public function getTicketDetails(string $userId, string $id): Ticket
    {
        return Ticket::where('id', $id)
            ->where('user_id', $userId)
            ->with(['messages.sender'])
            ->firstOrFail();
    }
}

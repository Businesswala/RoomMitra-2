<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Modules\Authentication\Models\User;
use App\Modules\Chat\Models\Conversation;
use App\Modules\Support\Models\Ticket;
use App\Modules\Notifications\Models\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommunicationTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $lister;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'role' => 'user',
            'name' => 'Ketan Shah',
            'email' => 'ketan@test.com',
            'mobile' => '9988776655',
            'password' => bcrypt('password')
        ]);

        $this->lister = User::create([
            'role' => 'lister',
            'name' => 'Alpesh Patel',
            'email' => 'alpesh@test.com',
            'mobile' => '8899889988',
            'password' => bcrypt('password')
        ]);
    }

    public function test_user_can_start_conversation_and_send_message()
    {
        $conv = Conversation::create([
            'user_id' => $this->user->id,
            'lister_id' => $this->lister->id,
        ]);

        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/v1/chat/messages', [
            'conversation_id' => $conv->id,
            'message' => 'Hello Alpesh, is the PG room still vacant?',
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('success', true);

        $this->assertDatabaseHas('messages', [
            'conversation_id' => $conv->id,
            'message' => 'Hello Alpesh, is the PG room still vacant?'
        ]);
    }

    public function test_user_can_create_ticket()
    {
        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/v1/tickets', [
            'subject' => 'Cannot upload profile selfie image',
            'priority' => 'high',
            'message' => 'The upload form returns a 500 error.'
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('success', true);

        $this->assertDatabaseHas('tickets', [
            'user_id' => $this->user->id,
            'subject' => 'Cannot upload profile selfie image'
        ]);
    }

    public function test_user_can_fetch_notifications()
    {
        Notification::create([
            'user_id' => $this->user->id,
            'title' => 'New Lead',
            'message' => 'Ketan Shah has sent you a message.',
            'type' => 'chat'
        ]);

        $response = $this->actingAs($this->user, 'sanctum')->getJson('/api/v1/notifications');

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'data' => [
                        '*' => ['id', 'title', 'message']
                    ]
                ]
            ]);
    }
}

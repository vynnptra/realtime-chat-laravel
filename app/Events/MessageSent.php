<?php

namespace App\Events;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class MessageSent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->message->send_to);
    }

    public function broadcastAs()
{
    return 'message.sent';
}
    
    public function broadcastWith()
    {
        return [
            'message' => $this->message->message,
            'from' => $this->message->sent_from,
            'to' => $this->message->send_to,
        ];
    }
    
}

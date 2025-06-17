<?php

namespace App\Models;

use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Message extends Model
{
    use BroadcastsEvents;

    public $timestamps = true;

    public $table = 'messages';

    public $fillable = ['message', 'conversation_id', 'created_at', 'updated_at'];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function broadcastOn(string $event)
    {
        Log::info($event);
        Log::info($this);

        return [$this->conversation];
    }
}

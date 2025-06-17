<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $conversation = Conversation::where('uuid', env('CONVERSATION_ID'))->first();

        $message = new Message();
        $message->message = $validated['message'];
        $message->created_at = now();
        $message->updated_at = now();
        $message->conversation_id = $conversation->id;
        $message->save();

        return response()->json([
            'status' => 'success',
            'data' => $message
        ], 201);
    }
}

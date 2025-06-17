<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RcsController extends Controller
{
    public function index()
    {
        return view('rcs');
    }

    public function webhook(Request $request)
    {
        $payload = $request->all();

//        Http::withHeaders(['Accept' => 'application/json'])
//            ->post(route('messages.store'), [
//                'message' => $payload['text'],
//                'source' => 'external'
//            ]);

        Log::info(print_r($payload));

        $newMessage = Message::create([
            'message' => $payload['text'],
            'source' => 'external',
            'conversation_id' => 1
        ]);

        return response()->json([
            'status' => 200
        ]);
    }
}

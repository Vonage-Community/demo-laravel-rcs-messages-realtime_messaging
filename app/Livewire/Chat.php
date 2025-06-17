<?php

namespace App\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Chat extends Component
{
    public $messages;
    public string $postMessage = '';

//    protected $listeners = ['echo:messages,MessageCreated' => 'loadMessages'];

    public function mount()
    {
        $this->loadMessages();
    }

    public function loadMessages(): void
    {
        $conversation = Conversation::where('uuid', env('CONVERSATION_ID'))->first();

        $this->messages = Message::where('conversation_id', $conversation->id)->orderBy('timestamp', 'desc')->get();
    }

    public function sendMessage()
    {
        Http::withHeaders(['Accept' => 'application/json'])
            ->post(route('messages.store'), [
            'message' => $this->postMessage
        ]);

        $this->postMessage = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat', $this->messages);
    }

    public function refresh()
    {
        $this->loadMessages();
    }

    public function getListeners(): array
    {
//        $conversation = Conversation::where('uuid', env('CONVERSATION_ID'))->first();

        return [
            "echo-private:App.Models.Conversation.1,.MessageCreated" => 'refresh',
        ];
    }
}

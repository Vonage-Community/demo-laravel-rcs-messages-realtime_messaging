<?php

namespace App\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Vonage\Client;
use Vonage\Messages\Channel\RCS\RcsText;

class Rcs extends Component
{
    public $messages;
    public string $postMessage = '';

    public function mount()
    {
        $this->loadMessages();
    }

    public function loadMessages(): void
    {
        $conversation = Conversation::where('uuid', env('CONVERSATION_ID'))->first();

        $this->messages = Message::where('conversation_id', $conversation->id)->orderBy('timestamp', 'desc')->get();
    }

    public function sendMessage(): void
    {
        $applicationId = config('vonage.applicationId');
        $privateKey = file_get_contents(base_path(config('vonage.privateKeyPath')));
        $credentials = new Client\Credentials\Keypair($privateKey, $applicationId);

        $client = new Client($credentials);
        $rcsMessage = new RcsText(config('vonage.to'), config('vonage.from'), $this->postMessage);

        $client->messages()->send($rcsMessage);

        Http::withHeaders(['Accept' => 'application/json'])
            ->post(route('messages.store'), [
            'message' => $this->postMessage,
            'source' => 'internal'
        ]);

        $this->postMessage = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.rcs', $this->messages);
    }

    public function refresh()
    {
        $this->loadMessages();
    }

    public function getListeners(): array
    {
        // Hard code for the lulz do not do this at home
        return [
            "echo-private:App.Models.Conversation.1,.MessageCreated" => 'refresh',
        ];
    }
}

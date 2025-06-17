<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Livewire Message Component</h2>

    @forelse ($messages as $message)
        <div class="border-b py-2">
            <p class="text-white">{{ $message->message }}</p>
            <p class="text-sm text-gray-500">{{ $message->created_at }}</p>
        </div>
    @empty
        <p class="text-gray-500">No messages found.</p>
    @endforelse

    <form wire:submit.prevent="sendMessage" class="flex space-x-2 mb-6">
        <input
            type="text"
            wire:model.defer="postMessage"
            placeholder="Type your message..."
            class="flex-1 border rounded p-2"
        >
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Send
        </button>
    </form>
</div>

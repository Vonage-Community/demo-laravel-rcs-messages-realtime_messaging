<div class="flex-1 flex flex-col justify-between px-4">
    <div class="overflow-y-auto space-y-2 mb-4 px-2" style="max-height: calc(100vh - 200px);">
        @forelse ($messages as $message)
            <div class="flex {{ $message->source === 'internal' ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-xs md:max-w-md px-4 py-2 rounded-lg
                    {{ $message->source === 'internal' ? 'bg-green-500 text-white rounded-br-none' : 'bg-white text-gray-800 rounded-bl-none shadow' }}">
                    <p>{{ $message->message }}</p>
                    <p class="text-xs text-gray-300 mt-1 text-right">
                        {{ $message->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-gray-100 text-center mt-4">No messages found.</p>
        @endforelse
    </div>

    <form wire:submit.prevent="sendMessage" class="flex items-center space-x-2 border-t pt-2 bg-white p-2 rounded shadow">
        <input
            type="text"
            wire:model.defer="postMessage"
            placeholder="Type a message"
            class="flex-1 border text-black rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-offset-purple-500"
        >
        <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded-full hover:bg-purple-400">
            Send
        </button>
    </form>
</div>

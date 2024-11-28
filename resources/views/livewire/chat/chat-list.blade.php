<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="header border-t-2 border-b-2 mr-4">
        {{ Auth::user()->name }}
    </div>
    <div class="chatlist">
        {{-- Chat List --}}
        @forelse ($conversations as $conversation)
            <div class="border-2 bg-gray-300 rounded-lg px-3 flex items-center m-1" wire:click="$dispatch('chatSelected', { conversation: {{ $conversation->id }}, receiver_id: {{ $this->getUserChatInstance($conversation, $name = 'id') }} })">
            {{-- <div class="border-2 bg-gray-300 rounded-lg px-3 flex items-center m-1" wire:click="$dispatch('chatSelected', {{ $conversation }}, {{ $this->getUserChatInstance($conversation, $name = 'id') }})"> --}}
                <div class="image rounded-full w-12">
                    <img src="https://i.pinimg.com/736x/e0/34/a1/e034a1aa5c1f786a5be9db40149ffe63.jpg" alt="" srcset="">
                </div>
                <div class="both-div px-4">
                    <div class="flex">
                        <div class="text-sm">
                            {{ Str::ucfirst($this->getUserChatInstance($conversation, $name='name')) }}
                        </div>
                        {{-- days count of last message --}}
                        <span class="text-red-500 font-bold pl-14">
                            {{ $conversation->message->last()->created_at }}
                        </span>
                    </div>
                    <div class="flex">
                        {{-- Message --}}
                        <p class="truncate w-36 text-gray-500">{{ $conversation->message->last()->body }}</p>
                        {{-- Count of message --}}
                        <span class="font-bold pl-6">{{ __("6") }}</span>
                    </div>
                </div>
            </div>
        @empty
        No Conversations Created
        @endforelse
    </div>
</div>

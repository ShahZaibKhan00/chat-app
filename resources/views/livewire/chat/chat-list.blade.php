<div class="h-screen">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="header w-full flex gap-4 border-t-2 py-2 text-gray-600 px-4 capitalize font-semibold border-b-2 h-12 mb-2">
        <img src="{{ Avatar::create(Auth::user()->name)->setDimension(100)->toBase64() }}" class="text-lg" alt="" srcset="">
        <p>{{ Auth::user()->name ?? "Joh" }}</p>
    </div>
    <div class="chatlist">
        {{-- Chat List --}}
        @forelse ($conversations as $conversation)
            <div class="border-2 bg-gray-300 rounded-lg px-3 flex items-center m-1" wire:key='{{ $conversation->id }}' wire:click="$dispatch('chatSelected', { conversation: {{ $conversation->id }}, receiver_id: {{ $this->getUserChatInstance($conversation, $name = 'id') }} })">
                <div class="image rounded-full w-12">
                    <img src="{{ Avatar::create($this->getUserChatInstance($conversation, $name='name')) }}" alt="" srcset="">
                </div>
                <div class="both-div px-4">
                    <div class="flex">
                        <div class="text-sm">
                            {{ Str::ucfirst($this->getUserChatInstance($conversation, $name='name')) }}
                        </div>
                        {{-- days count of last message --}}
                        <span class="text-red-500 font-bold pl-14">
                            {{ $conversation->message->last()->createdshort }}
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

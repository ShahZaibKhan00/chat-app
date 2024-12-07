<div class="w-full px-4">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if ($selected_conversation)
        <div class="flex w-full h-12 gap-2 px-4 py-2 mb-2 text-2xl font-semibold text-gray-600 capitalize border-t-2 border-b-2 header">
            <img src="{{ Avatar::create($receiver_instance->name)->toBase64() }}" alt="" srcset="">
            <p>{{ $receiver_instance->name ?? "Joh" }}</p>
        </div>
        <div class="h-full overflow-y-auto chatbox">
            @foreach ($messages as $message)
                <div
                    class="flex flex-col space-y-4 mb-2 w-full max-w-full leading-1.5 p-4 rounded-e-xl rounded-es-xl
                    @if ($message->sender_id == Auth::id())
                        bg-blue-200 justify-end
                    @else
                        border-gray-200 bg-gray-200
                    @endif">
                    <p class="text-sm font-normal text-black @if ($message->sender_id == Auth::id())
                        flex justify-end
                    @endif" wire:key='{{ $message->id }}'>
                        {{ $message->body }}
                    </p>
                    <div class="flex justify-end">
                        <span class="pt-1 text-sm text-right">{{ $message->createdformat }}</span>
                        <svg class="w-8 h-8 text-gray-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex items-center justify-center w-full h-screen text-4xl font-bold text-black">
            <h1>No Conversation Selected</h1>
        </div>
    @endif

    <script>
            window.addEventListener('rowChattoBottom', event => {
                const chatbox = document.querySelector(".chatbox");

                if (chatbox) {
                    setTimeout(() => {
                        chatbox.scrollTop = chatbox.scrollHeight; // Scroll to bottom
                    }, 100);
                }
            });

            </script>
            {{-- <script>

                    document.querySelector('.chatbox').on('scroll', function () {
                        var top = $(".chatbox").scrollTop; // Use parentheses for the scrollTop method
                        console.log("Top position:", top);

                        if (top === 0) {
                            Livewire.dispatch('loadMoreMessages'); // Dispatch event to Livewire
                        }
                        });
                    </script> --}}
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                    const chatbox = document.querySelector(".chatbox");
                    console.log("chatbox loaded", chatbox);


                    if (chatbox) {
                    // Scroll to bottom on page load or when messages update
                    setTimeout(() => {
                    chatbox.scrollTop = chatbox.scrollHeight;
                    }, 100);

                    // Detect scroll to top to load older messages
                    chatbox.addEventListener('scroll', () => {
                    if (chatbox.scrollTop === 0) {
                    console.log("Reached the top! Emitting Livewire loadmore event.");
                    window.livewire.emit('loadmore'); // Emit Livewire event to load older messages
                    }
                    });
                    } else {
                    console.error("Chatbox element not found.");
                    }
                    });
                </script>


</div>

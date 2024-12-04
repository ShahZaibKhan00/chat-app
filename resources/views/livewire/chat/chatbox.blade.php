<div class="px-4 w-full">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if ($selected_conversation)
        <div class="header w-full flex gap-2 border-t-2 py-2 text-gray-600 px-4 capitalize font-semibold text-2xl border-b-2 h-12 mb-2">
            <img src="{{ Avatar::create($receiver_instance->name)->toBase64() }}" alt="" srcset="">
            <p>{{ $receiver_instance->name ?? "Joh" }}</p>
        </div>
        <div class="chatbox" style="overflow-y: auto; max-height: calc(100vh - 150px);">
            @foreach ($messages as $message)
                <div
                    class="flex flex-col space-y-4 mb-2 w-full max-w-full leading-1.5 p-4 rounded-e-xl rounded-es-xl dark:bg-gray-700
                    @if ($message->sender_id == Auth::id())
                        bg-blue-200 justify-end
                    @else
                        border-gray-200 bg-gray-200
                    @endif">
                    <p class="text-sm font-normal text-gray-900 dark:text-white @if ($message->sender_id == Auth::id())
                        flex justify-end
                    @endif" wire:key='{{ $message->id }}'>
                        {{ $message->body }}
                    </p>
                    <div class="flex justify-end">
                        <span class="text-sm text-right pt-1">{{ $message->createdformat }}</span>
                        <svg class="h-8 w-8 text-gray-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="w-full text-4xl text-green-800 font-bold items-center justify-center flex bg-gray-400 h-screen">
            <h1>No Conversation Selected</h1>
        </div>
    @endif

    <script>
        // window.addEventListener('rowChattoBottom', event => {
        //     console.log("Scroll Event Triggered");
        //     const chatbox = document.querySelector(".chatbox");
        //     if (chatbox) {
        //         setTimeout(() => {
        //             chatbox.scrollTop = chatbox.scrollHeight;
        //         }, 100); // Delay
        //     }
        // });

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
        window.addEventListener('rowChattoBottom', event => {
            console.log("Scroll Event Triggered");

            const chatbox = document.querySelector(".chatbox");
            const lastMessage = chatbox.lastElementChild;

            if (lastMessage) {
                // Use IntersectionObserver for better performance
                const observer = new IntersectionObserver((entries, observer) => {
                    console.log("conditions: ")

                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            chatbox.scrollTop = chatbox.scrollHeight;  // Scroll to the bottom
                            observer.disconnect();  // Disconnect observer once scrolling is done
                        }
                    });
                }, { threshold: 1.0 });  // Trigger when the element is fully visible

                observer.observe(lastMessage);
            }
        });
    </script> --}}
</div>

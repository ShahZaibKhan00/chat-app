<div class="w-full px-4">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if ($selected_conversation)
    <script>
        alert("You ")
    </script>
    <div class="flex flex-col h-screen">

        <div class="flex w-full h-12 gap-2 px-4 py-2 mb-2 text-2xl font-semibold text-gray-600 capitalize border-t-2 border-b-2 header">
            <img src="{{ Avatar::create($receiver_instance->name)->toBase64() }}" alt="" srcset="">
            <p>{{ $receiver_instance->name ?? "Joh" }}</p>
        </div>
        <div class="flex-1 overflow-y-auto chatbox px-4" id="chatbox" x-data
                x-init="$nextTick(() => {
                    $el.scrollTop = $el.scrollHeight;
                    window.scrollTo(0, document.body.scrollHeight);
                });

                $wire.on('rowChattoBottom', () => {
                    $nextTick(() => {
                        $el.scrollTop = $el.scrollHeight;
                        window.scrollTo(0, document.body.scrollHeight);
                    });
                });
                ">
            {{-- <div class="py-4 space-y-4"> --}}
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
            {{-- </div> --}}
        </div>

    </div>

    @else
        <div class="flex items-center justify-center w-full h-screen text-4xl font-bold text-black">
            <h1>No Conversation Selected</h1>
        </div>
        {{-- <script>
            alert("Please")
        </script> --}}
    @endif
    {{-- <script>
        // window.addEventListener('rowChattoBottom', event => {
            // Scroll chatbox to bottom
            // const chatbox = document.querySelector(".chatbox");
            // lo
            // if (chatbox) {
                // console.log("tru");

            //     setTimeout(() => {
                    // chatbox.scrollTop = chatbox.scrollHeight;
                // }, 100);
            // }


            // Scroll main window to bottom
            // window.scrollTo({
            //     top: document.documentElement.scrollHeight,
            //     behavior: 'smooth'
            // });
        // });


        // window.addEventListener('rowChattoBottom', event => {
        //     const messageContainer = document.querySelector(".chatbox");
        // if (messageContainer) {
        //     setTimeout(() => {
        //         messageContainer.scrollTop = messageContainer.scrollHeight;
        //     }, 100);
            // }
            // const chatbox = document.querySelector("#chatbox");
            // if (chatbox) {
            //     console.log("hi");
            //     setTimeout(() => {
            //         chatbox.scrollTop = chatbox.scrollHeight; // Scroll to bottom
            //     }, 100);
            // }
        // });
        // Livewire.on('rowChattoBottom', () => {
        //     const chatbox = document.querySelector(".chatbox");
        //     if (chatbox) {
        //         requestAnimationFrame(() => {
        //             chatbox.scrollTo({
        //                 top: chatbox.scrollHeight,
        //                 behavior: 'smooth'
        //             });
        //         });
        //     }
        // });
    // </scrip> --}}
</div>

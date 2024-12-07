<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex p-6 text-gray-900">
                    <div class="w-1/4 border-r-2">
                        @livewire('Chat.ChatList')
                    </div>
                    <div class="w-4/5 h-screen space-y-5 overflow-y-auto chat_box_container">
                        @livewire('chat.chatbox')
                        <div class="">
                            @livewire('chat.send-message')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('selectedChat', event => {
            const chatBoxContainer = document.querySelector(".chat_box_container");
            if (chatBoxContainer) {
            chatBoxContainer.scrollTop = chatBoxContainer.scrollHeight;
            } else {
            console.error("Element with class '.chat_box_container' not found.");
            }
        });
    </script>

</div>

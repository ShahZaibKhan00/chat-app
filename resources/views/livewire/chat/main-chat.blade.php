<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex">
                    <div class="w-1/4 border-r-2">
                        @livewire('Chat.ChatList')
                    </div>
                    <div class="chat_box_container overflow-y-auto h-screen space-y-5 w-4/5">
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
            document.querySelector(".chat_box_container").scrollTop(document.querySelector(".chat_box_container")[0].scrollHeight);
        })
        // window.addEventListener('selectedChat', event => {
        //     console.log("SelctedCHat Running")

        //     Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
        //         // Before sending a request to the server
        //         console.log('Livewire request initiated for component:', component);

        //         respond(() => {
        //             // After a response is received but before it's processed
        //             console.log('Response received for component:', component);
        //             // Example: Show a loading indicator if needed
        //             const chatboxContainer = document.querySelector(".chat_box_container");
        //             if (chatboxContainer) {
        //                 chatboxContainer.classList.add('loading');
        //             }
        //         });

        //         succeed(({ snapshot, effect }) => {
        //             // After a successful response is processed
        //             console.log('Request succeeded for component:', component);
        //             // Example: Scroll to the bottom of the chatbox
        //             const chatboxContainer = document.querySelector(".chat_box_container");
        //             if (chatboxContainer) {
        //                 setTimeout(() => {
        //                     chatboxContainer.scrollTop = chatboxContainer.scrollHeight;
        //                 }, 100);
        //             }
        //             // Example: Remove the loading class
        //             if (chatboxContainer) {
        //                 chatboxContainer.classList.remove('loading');
        //             }
        //         });

        //         fail(() => {
        //             // If the request failed
        //             console.error('Livewire request failed for component:', component);
        //             // Example: Show an error message
        //             alert('Something went wrong. Please try again.');
        //         });
        //     });

        // });
    </script>

</div>

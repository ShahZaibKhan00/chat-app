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
                <div class="p-6 text-gray-900 flex h-screen">
                    <div class="w-1/4 border-r-2">
                        @livewire('Chat.ChatList')
                    </div>
                    {{-- {{ __("You're logged in!") }} --}}

                    <div class="chat_box_container w-4/5">
                        @livewire('chat.chatbox')

                        @livewire('chat.send-message')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

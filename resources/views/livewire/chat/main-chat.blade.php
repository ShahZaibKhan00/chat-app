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
                <div class="p-6 text-gray-900">
                    @livewire('Chat.ChatList')
                    {{-- {{ __("You're logged in!") }} --}}

                    <div class="chat_box_container">
                        @livewire('chat.chatbox')

                        @livewire('chat.send-message')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    {{-- In work, do what you enjoy. --}}
    {{-- <div class="flex justify-between items-baseline"> --}}
        @if (!empty($selected_conversation))
        <form wire:submit.prevent='sendMessage' action="">
            @csrf
            <div class="flex px-4 mb-auto inset-x-0 bottom-0">
                <x-text-input wire:model='body' class="mt-1 w-full" id="sendMessage" type="text" name="body" placeholder="Write Message" autofocus />
                <x-primary-button class="ms-3">Send</x-primary-button>
            </div>
            <div class="px-4 mb-auto">
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>
        </form>
        @endif
    {{-- </div> --}}
</div>

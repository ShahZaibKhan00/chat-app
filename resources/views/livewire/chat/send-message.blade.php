<div>
    <div class="flex px-4 mb-auto">
        <x-text-input id="body" class=" mt-1 w-full" type="text" name="body" :value="old('body')" required autofocus />
        <x-input-error :messages="$errors->get('body')" class="mt-2" />
        <x-primary-button class="ms-3">
            Send
        </x-primary-button>
    </div>
    Send Message
    {{-- In work, do what you enjoy. --}}
</div>

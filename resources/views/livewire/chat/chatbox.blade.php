<div class="px-4 w-full">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if ($selected_conversation)
        <div class="header w-full border-t-2 py-2 text-gray-600 px-4 capitalize font-semibold text-2xl border-b-2 h-12 mb-2">
            {{ $receiver_instance->name ?? "Joh" }}
        </div>
        <div class="chat">

            <div
                class="flex flex-col w-full max-w-full leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                </div>
                <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">That's awesome. I think our users will really
                    appreciate the improvements.</p>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
            </div>
            {{-- <div class="p-2 text-md bg-blue-500 rounded-e-2xl rounded-tl-2xl">
                <div>
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Voluptatem temporibus eligendi laborum odio veniam atque voluptas iure, praesentium,
                        ipsa repudiandae at sequi est animi officiis dolor. Ipsum sapiente magni laborum?
                    </p> --}}
                    {{-- timestamp and seen--}}
                    {{-- <div class="flex justify-end">
                        <span class="text-sm text-right px-1">5 hours ago</span>
                        <svg class="h-8 w-8 text-gray-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg> --}}
                            {{-- Double Tick --}}
                        {{-- <svg class="h-8 w-8 text-blue-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M7 12l5 5l10 -10" />
                            <path d="M2 12l5 5m5 -5l5 -5" />
                        </svg> --}}
                    {{-- </div>
                </div> --}}
            </div>
        </div>

    @else
        No Conversation Selected
    @endif
</div>

<div>
    <div class="header border-t-2 border-b-2 mr-4">
        {{ Auth::user()->name }}
    </div>
    <div class="chatlist">
        Chat List
        @forelse ($conversations as $conversation)
            <div class="border-2 bg-gray-300 rounded-lg px-3 flex items-center">
                <div class="image rounded-full w-12">
                    <img src="https://i.pinimg.com/736x/e0/34/a1/e034a1aa5c1f786a5be9db40149ffe63.jpg" alt="" srcset="">
                </div>
                <div class="both-div flex px-4">
                    <div class="sub-div block">
                        <div>
                            {{ $conversation->users->email ?? "John" }}
                        </div>
                        <div>
                            {{ __("Message") }}
                        </div>
                    </div>
                    <div class="left-full start-0 right-0">
                        <div class="">
                            nub
                        </div>
                    </div>
                </div>
            </div>
        @empty
            No Conversations Created
        @endforelse
        {{-- @if (count($conversations) > 0)

        @else
            No Conversations Created
        @endif --}}
    </div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>

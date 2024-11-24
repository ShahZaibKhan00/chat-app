<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    Create CHat

    {{-- Stop trying to control. --}}

    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div class="mb-4 flex justify-between items-center">
            <div class="flex-1 pr-4 flex relative">
                <div class="relative md:w-1/3">
                    <input type="search" wire:model.live="search" id="searchInput" class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                    placeholder="Search...">
                        <div class="absolute top-0 left-0 inline-flex items-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                            <circle cx="10" cy="10" r="7" />
                            <line x1="21" y1="21" x2="15" y2="15" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
        <div class="overflow-x-auto bg-white text-black rounded-lg shadow overflow-y-auto">
            <table
                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped">
                <thead>
                    <tr class="">
                        <th class="py-2 sticky top-0 border-b border-indigo-200 bg-indigo-100">
                            Name
                        </th>
                        <th class="py-2 sticky top-0 border-b border-indigo-200 bg-indigo-100">
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody id="table-data" class="item-center text-center">
                    @forelse ($users as $user)
                    <tr>
                        <td class="border-dashed border-t font-semibold border-gray-300" wire:click="checkConversation({{ $user->id }})">
                            {{-- <button type="button" > --}}
                                {{ Str::ucfirst($user->name) }}
                            {{-- </button> --}}
                        </td>
                        <td class="border-dashed border-t font-semibold border-gray-300">
                            {{ $user->email }}
                        </td>

                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
</div>

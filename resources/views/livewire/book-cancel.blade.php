<div class="">
    <h1>Content Table</h1>

    <!-- Filter Controls -->
    <div class="mb-4 flex flex-wrap gap-4">
        <!-- Date Filter -->
        <div>
            <label for="dateFilter" class="block text-sm font-medium text-gray-700">Filter by Date</label>
            <input type="date" id="dateFilter" wire:model.live="dateFilter" autocomplete="off"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <!-- Who Delete Filter -->
        <div>
            <label for="whoDeleteFilter" class="block text-sm font-medium text-gray-700">Filter by Who Deleted</label>
            <select id="whoDeleteFilter" wire:model.live="whoDeleteFilter"
                class=" mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">All</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <!-- Add other options as needed -->
            </select>
        </div>

        <!-- Email Filter -->
        <div>
            <label for="emailFilter" class="block text-sm font-medium text-gray-700">Filter by Email</label>
            <input type="text" id="emailFilter" wire:model.live="emailFilter" placeholder="Search email..."
                autocomplete="off"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <!-- Reset Button -->
        <div class="self-end">
            <button wire:click="resetFilters" wire:loading.attr="disabled"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                <span wire:loading.remove>Reset Filters</span>
                <span wire:loading>
                    Resetting...
                    <svg class="animate-spin -ml-1 mr-1 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </span>
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">First
                        Name</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Last Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Service
                        Name</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Who
                        Delete</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Code</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Phone
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Date</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Time</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($booking_cancel as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->first_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->last_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->service_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->who_delete }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->code }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->time }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $booking_cancel->links() }}
    </div>
</div>

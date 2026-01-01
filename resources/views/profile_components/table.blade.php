<div class="overflow-x-auto bg-white shadow rounded">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                @foreach($fields as $field)
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $field['label'] ?? ucfirst($field['attribute'] ?? '') }}</th>
                @endforeach
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($items as $item)
                <tr>
                    @foreach($fields as $field)
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            @php $attr = $field['attribute'] ?? null; @endphp
                            {{ $attr ? data_get($item, $attr) : '' }}
                        </td>
                    @endforeach
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click.prevent="$emit('showProfileRecord', { id: {{ $item->id }}, modelClass: '{{ $modelClass ?? '' }}' })" class="text-indigo-600">Details</button>
                        <button wire:click.prevent="$emit('requestOpenProfileModal', { instanceKey: '{{ $modelClass ?? '' }}', itemId: {{ $item->id }}, userId: {{ $item->user_id ?? 'null' }} })" class="ml-2 text-green-600">Edit</button>
                        <button wire:click.prevent="$emit('openProfileDelete', { ids: [{{ $item->id }}], modelClass: '{{ $modelClass ?? '' }}' })" class="ml-2 text-red-600">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($fields) + 1 }}" class="px-6 py-4 text-center text-sm text-gray-500">No records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $items->links() }}</div>
</div>

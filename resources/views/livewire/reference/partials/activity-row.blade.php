<div class="p-2 bg-gray-50 dark:bg-zinc-800 rounded">
    <div class="text-xs text-gray-500 mb-2">
        {{ $a['created_at_human'] ?? ($a['created_at'] ?? '') }} @if(!empty($a['created_at_human'])) — @endif {{ $a['causer_name'] ?? 'system' }}
    </div>

    @php $rows = $a['rows'] ?? []; @endphp
    @if(!empty($rows))
        <div class="overflow-auto">
            <table class="min-w-full text-sm table-auto">
                <thead class="text-left text-xs text-gray-500 dark:text-gray-300">
                    <tr>
                        <th class="px-2 py-1">Field</th>
                        <th class="px-2 py-1">Previous</th>
                        <th class="px-2 py-1">New</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($rows as $r)
                        <tr class="border-t">
                            <td class="px-2 py-1 align-top text-gray-700 dark:text-gray-200">{{ $r['field'] ?? '—' }}</td>
                            <td class="px-2 py-1 text-gray-600 dark:text-gray-300">{{ strlen((string)($r['old'] ?? '')) ? $r['old'] : '—' }}</td>
                            <td class="px-2 py-1 text-gray-700 dark:text-gray-200">{{ strlen((string)($r['new'] ?? '')) ? $r['new'] : '—' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="mt-1 text-sm">{{ $a['description'] ?? '' }}</div>
    @endif
</div>

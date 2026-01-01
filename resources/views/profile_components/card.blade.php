<div class="bg-white shadow rounded p-4">
    <h4 class="font-semibold mb-2">{{ $title ?? 'Record' }}</h4>
    <dl class="grid grid-cols-2 gap-2 text-sm text-gray-700">
        @foreach($fields as $field)
            <div>
                <dt class="font-medium text-gray-500">{{ $field['label'] ?? ucfirst($field['attribute'] ?? '') }}</dt>
                <dd>{{ data_get($item, $field['attribute'] ?? '') }}</dd>
            </div>
        @endforeach
    </dl>
</div>

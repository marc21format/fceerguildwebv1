@foreach($fields as $field)
    @php
        $key = $field['key'];
    @endphp
    <div class="mb-3">
        @if(in_array($field['type'] ?? 'text', ['text','string']))
            <flux:input wire:model.defer="state.{{ $key }}" :label="__($field['label'] ?? ucfirst($key))" type="text" class="dark:text-white" />
        @elseif(($field['type'] ?? '') === 'textarea')
            <label class="block text-sm font-medium text-gray-700">{{ $field['label'] ?? ucfirst($key) }}</label>
            <textarea wire:model.defer="state.{{ $key }}" class="form-textarea mt-1 block w-full dark:bg-zinc-800 dark:text-gray-100"></textarea>
        @elseif(($field['type'] ?? '') === 'select')
            @php
                $selectedLabel = collect($field['options'] ?? [])->get($state[$key] ?? '', 'Select ' . ($field['label'] ?? ucfirst($key)));
            @endphp
            @if($field['label'])
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-100">{{ __($field['label'] ?? ucfirst($key)) }}</label>
            @endif
            <flux:dropdown class="w-full">
                <flux:button icon:trailing="chevron-down" class="mt-1 w-full justify-start dark:text-gray-400">{{ $selectedLabel }}</flux:button>
                <flux:menu>
                    @foreach($field['options'] ?? [] as $val => $label)
                        <flux:menu.item wire:click="setFieldValue('{{ $key }}', '{{ $val }}')">{{ $label }}</flux:menu.item>
                    @endforeach
                </flux:menu>
            </flux:dropdown>
        @elseif(($field['type'] ?? '') === 'boolean')
            <label class="inline-flex items-center">
                <input type="checkbox" wire:model.defer="state.{{ $key }}" class="form-checkbox" />
                <span class="ml-2">{{ $field['label'] ?? ucfirst($key) }}</span>
            </label>
        @elseif(($field['type'] ?? '') === 'number')
            <flux:input wire:model.defer="state.{{ $key }}" :label="__($field['label'] ?? ucfirst($key))" type="number" class="dark:text-white" />
        @else
            <flux:input wire:model.defer="state.{{ $key }}" :label="__($field['label'] ?? ucfirst($key))" type="text" />
        @endif

        @error('state.'.$key) <span class="text-sm text-red-600">{{ $message }}</span> @enderror
    </div>
@endforeach

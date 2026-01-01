<div>
    @if($isOpen)
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <flux:modal name="highschool-records-form" flyout class="w-11/12 max-w-2xl" wire:model="isOpen" @close="$set('isOpen', false)">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">{{ $itemId ? 'Edit' : 'Create' }} Highschool Record</flux:heading>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        @foreach($fields as $f)
                            <div>
                                <label class="block text-sm font-medium dark:text-gray-200">{{ $f['label'] ?? ucwords(str_replace('_',' ',$f['key'])) }}</label>
                                @if(($f['type'] ?? '') === 'select')
                                    @php $opts = $options[$f['key']] ?? []; $sel = $state[$f['key']] ?? null; @endphp
                                    <flux:dropdown class="w-full">
                                        @php
                                            $displaySel = $opts[$sel] ?? 'Select';
                                            if (($f['key'] ?? '') === 'level' && $displaySel !== 'Select' && $displaySel) {
                                                $displaySel = str_contains(strtolower($displaySel), 'highschool') ? $displaySel : $displaySel . ' Highschool';
                                            }
                                        @endphp
                                        <flux:button icon:trailing="chevron-down" class="mt-1 w-full justify-start dark:text-gray-400">{{ $displaySel }}</flux:button>
                                        <flux:menu>
                                                    @foreach($opts as $val => $label)
                                                        @php
                                                            $labelOut = $label;
                                                            if (($f['key'] ?? '') === 'level' && $label) {
                                                                $labelLower = strtolower($label);
                                                                $labelOut = str_contains($labelLower, 'highschool') ? $label : $label . ' Highschool';
                                                            }
                                                        @endphp
                                                        <flux:menu.item wire:click.prevent="setField('{{ $f['key'] }}','{{ $val }}')">{{ $labelOut }}</flux:menu.item>
                                                    @endforeach
                                        </flux:menu>
                                    </flux:dropdown>
                                @elseif(($f['type'] ?? '') === 'textarea')
                                    <textarea wire:model.defer="state.{{ $f['key'] }}" rows="3" class="mt-1 block w-full rounded-md border-gray-600 bg-transparent text-white"></textarea>
                                @elseif(($f['type'] ?? '') === 'checkbox')
                                    <div class="mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" wire:model.defer="state.{{ $f['key'] }}" class="form-checkbox" />
                                            <span class="ml-2">{{ $f['label'] ?? '' }}</span>
                                        </label>
                                    </div>
                                @else
                                    <flux:input wire:model.defer="state.{{ $f['key'] }}" type="{{ $f['type'] ?? 'text' }}" class="mt-1 dark:text-white" />
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-end space-x-2">
                        <flux:button wire:click="save" variant="primary">Save</flux:button>
                        <flux:button wire:click="$set('isOpen', false)">Cancel</flux:button>
                    </div>
                </div>
            </flux:modal>
        </div>
    @endif
</div>

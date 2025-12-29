<div>
    @if($open)
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <flux:modal name="reference-form-modal" flyout class="w-11/12 max-w-2xl" wire:model="open" @close="$set('open', false)">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">{{ $selectedId ? 'Edit' : 'Create' }}</flux:heading>
                </div>

                @include('livewire.reference.modal._form-fields', ['fields' => $fields])

                <div class="flex justify-end space-x-2">
                    <flux:button wire:click="save" variant="primary">Save</flux:button>
                    <flux:button wire:click="$set('open', false)">Cancel</flux:button>
                </div>
            </div>
            </flux:modal>
        </div>
    @endif
</div>

<div x-data="{open: @entangle('show')}">
    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="bg-white rounded shadow-lg w-2/3 p-6">
            <h3 class="text-lg font-medium mb-4">Confirm Changes</h3>
            <div class="space-y-2">
                @foreach($changes as $key => $value)
                    <div class="flex justify-between text-sm">
                        <div class="text-gray-600">{{ $key }}</div>
                        <div class="font-medium">{{ $value }}</div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4 text-right">
                <button wire:click.prevent="$emit('closeConfirm')" class="btn">Cancel</button>
                <button class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

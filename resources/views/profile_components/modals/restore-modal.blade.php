<div x-data="{open: @entangle('show')}">
    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="bg-white rounded shadow-lg w-96 p-4">
            <h3 class="font-semibold">Restore Record</h3>
            <p class="text-sm text-gray-600 mt-2">Restore this record from archive?</p>
            <div class="mt-4 text-right">
                <button wire:click.prevent="$emit('closeRestore')" class="btn">Cancel</button>
                <button class="btn btn-primary">Restore</button>
            </div>
        </div>
    </div>
</div>

{{-- Bulk Actions Flyout --}}
<div>
    {{-- Flyout Modal --}}
    @if($showModal)
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <flux:modal name="bulk-actions" flyout class="w-11/12 max-w-md" wire:model="showModal" @close="$wire.closeModal()">
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Bulk Actions</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ count($selectedIds) }} {{ $type }} selected</p>
                        <div class="mt-3 mb-4 border-b border-gray-200 dark:border-zinc-700"></div>
                    </div>

                    @if(!$showConfirmation)
                        <div class="space-y-6">
                            {{-- Status Buttons (Students Only) --}}
                            @if($type === 'students')
                                {{-- Session Selector --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Session</label>
                                    <div class="grid grid-cols-3 gap-2 p-1 bg-gray-100 dark:bg-zinc-800 rounded-lg">
                                        <button 
                                            type="button"
                                            wire:click="$set('session', 'am')"
                                            class="px-3 py-2 rounded-md text-sm font-medium transition {{ $session === 'am' ? 'bg-white dark:bg-zinc-700 text-gray-900 dark:text-white shadow' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }}"
                                        >
                                            AM
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="$set('session', 'pm')"
                                            class="px-3 py-2 rounded-md text-sm font-medium transition {{ $session === 'pm' ? 'bg-white dark:bg-zinc-700 text-gray-900 dark:text-white shadow' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }}"
                                        >
                                            PM
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="$set('session', 'both')"
                                            class="px-3 py-2 rounded-md text-sm font-medium transition {{ $session === 'both' ? 'bg-white dark:bg-zinc-700 text-gray-900 dark:text-white shadow' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }}"
                                        >
                                            Both
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-3">Set Status</label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <button 
                                            type="button"
                                            wire:click="prepareSetStatus('On Time')"
                                            class="px-4 py-3 rounded-lg border border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300 font-medium text-sm hover:bg-green-100 dark:hover:bg-green-900/50 transition flex items-center justify-center gap-2"
                                        >
                                            <i class="fa fa-check-circle"></i> On Time
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="prepareSetStatus('Late')"
                                            class="px-4 py-3 rounded-lg border border-yellow-200 dark:border-yellow-800 bg-yellow-50 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 font-medium text-sm hover:bg-yellow-100 dark:hover:bg-yellow-900/50 transition flex items-center justify-center gap-2"
                                        >
                                            <i class="fa fa-clock-o"></i> Late
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="prepareSetStatus('Excused')"
                                            class="px-4 py-3 rounded-lg border border-blue-200 dark:border-blue-800 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 font-medium text-sm hover:bg-blue-100 dark:hover:bg-blue-900/50 transition flex items-center justify-center gap-2"
                                        >
                                            <i class="fa fa-envelope"></i> Excused
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="prepareSetStatus('Absent')"
                                            class="px-4 py-3 rounded-lg border border-red-200 dark:border-red-800 bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300 font-medium text-sm hover:bg-red-100 dark:hover:bg-red-900/50 transition flex items-center justify-center gap-2"
                                        >
                                            <i class="fa fa-times-circle"></i> Absent
                                        </button>
                                    </div>
                                </div>

                                {{-- Time In for Students --}}
                                <div class="border-t border-gray-200 dark:border-zinc-700 pt-4 space-y-4">
                                    <div x-data="{ timeIn: @entangle('bulkTimeIn').live }">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Set Time In</label>
                                        <div class="flex gap-2">
                                            <input 
                                                type="time" 
                                                x-model="timeIn"
                                                class="flex-1 rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 px-3 py-2.5 text-sm focus:border-gray-400 focus:ring-gray-400"
                                            >
                                            <flux:button wire:click="prepareSetTimeIn" x-bind:disabled="!timeIn">Apply</flux:button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                {{-- Volunteer Actions: Time In/Out --}}
                                <div class="space-y-4" x-data="{ timeIn: @entangle('bulkTimeIn').live, timeOut: @entangle('bulkTimeOut').live }">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Set Time In</label>
                                        <div class="flex gap-2">
                                            <input 
                                                type="time" 
                                                x-model="timeIn"
                                                class="flex-1 rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 px-3 py-2.5 text-sm focus:border-gray-400 focus:ring-gray-400"
                                            >
                                            <flux:button wire:click="prepareSetTimeIn" x-bind:disabled="!timeIn">Apply</flux:button>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Set Time Out</label>
                                        <div class="flex gap-2">
                                            <input 
                                                type="time" 
                                                x-model="timeOut"
                                                class="flex-1 rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 px-3 py-2.5 text-sm focus:border-gray-400 focus:ring-gray-400"
                                            >
                                            <flux:button wire:click="prepareSetTimeOut" x-bind:disabled="!timeOut">Apply</flux:button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-gray-200 dark:border-zinc-700 pt-4">
                                    <button 
                                        type="button"
                                        wire:click="prepareMarkAllAbsent"
                                        class="w-full px-4 py-3 rounded-lg border border-red-200 dark:border-red-800 bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300 font-medium text-sm hover:bg-red-100 dark:hover:bg-red-900/50 transition flex items-center justify-center gap-2"
                                    >
                                        <i class="fa fa-times-circle"></i> Mark All as Absent
                                    </button>
                                </div>
                            @endif
                        </div>

                        <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200 dark:border-zinc-700">
                            <flux:button wire:click="clearSelection">Clear Selection</flux:button>
                            <flux:button wire:click="closeModal">Cancel</flux:button>
                        </div>
                    @else
                        {{-- Confirmation View --}}
                        <div class="py-4">
                            <div class="text-center">
                                <div class="mx-auto w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center mb-4">
                                    <i class="fa fa-exclamation-triangle text-amber-600 dark:text-amber-400 text-xl"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Confirm Action</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $confirmationMessage }}
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200 dark:border-zinc-700">
                            <flux:button wire:click="cancelConfirmation">Back</flux:button>
                            <flux:button wire:click="confirmAction" variant="primary">Confirm</flux:button>
                        </div>
                    @endif
                </div>
            </flux:modal>
        </div>
    @endif
</div>

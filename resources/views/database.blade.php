<x-layouts.app :title="__('Database')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="container mx-auto p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold mb-7">FCEER Guild Database</h1>
            </div>

            <div class="mb-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">For Address</h2>
                <div class="border-b border-gray-200 dark:border-gray-700"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <div class="bg-white/5 dark:bg-zinc-800 rounded p-4 border border-neutral-200 dark:border-neutral-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium">Provinces</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Reference table</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('database.provinces') }}" wire:navigate class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white" title="Open">
                                <flux:icon name="eye" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 dark:bg-zinc-800 rounded p-4 border border-neutral-200 dark:border-neutral-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium">Cities</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Reference table</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('database.cities') }}" wire:navigate class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white" title="Open">
                                <flux:icon name="eye" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 dark:bg-zinc-800 rounded p-4 border border-neutral-200 dark:border-neutral-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium">Barangays</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Reference table</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('database.barangays') }}" wire:navigate class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white" title="Open">
                                <flux:icon name="eye" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 mb-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">For Educational Records</h2>
                <div class="border-b border-gray-200 dark:border-gray-700"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                
                <div class="bg-white/5 dark:bg-zinc-800 rounded p-4 border border-neutral-200 dark:border-neutral-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium">Degree Levels</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Reference table</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('database.degree_levels') }}" wire:navigate class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white" title="Open">
                                <flux:icon name="eye" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 dark:bg-zinc-800 rounded p-4 border border-neutral-200 dark:border-neutral-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium">Degree Types</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Reference table</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('database.degree_types') }}" wire:navigate class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white" title="Open">
                                <flux:icon name="eye" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 dark:bg-zinc-800 rounded p-4 border border-neutral-200 dark:border-neutral-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium">Degree Fields</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Reference table</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('database.degree_fields') }}" wire:navigate class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white" title="Open">
                                <flux:icon name="eye" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 dark:bg-zinc-800 rounded p-4 border border-neutral-200 dark:border-neutral-700 md:col-span-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium">Universities</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Reference table</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('database.universities') }}" wire:navigate class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white" title="Open">
                                <flux:icon name="eye" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 dark:bg-zinc-800 rounded p-4 border border-neutral-200 dark:border-neutral-700 md:col-span-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium">Degree Programs</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Reference table</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('database.degree_programs') }}" wire:navigate class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white" title="Open">
                                <flux:icon name="eye" />
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-6 mb-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">For Professional Credentials</h2>
                <div class="border-b border-gray-200 dark:border-gray-700"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            </div>

            <div class="mt-6 mb-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">For Highschool Records</h2>
                <div class="border-b border-gray-200 dark:border-gray-700"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            </div>

            <div class="mt-6 mb-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">For FCEER Records</h2>
                <div class="border-b border-gray-200 dark:border-gray-700"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            </div>


        </div>
    </div>
</x-layouts.app>

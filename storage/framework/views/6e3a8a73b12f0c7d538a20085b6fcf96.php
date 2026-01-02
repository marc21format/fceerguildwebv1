<div class="roster-container">
    <!-- Toolbar -->
    <div class="flex flex-col gap-4 mb-4">
        <!-- Search Row -->
        <div class="flex items-center gap-4">
            <div class="relative flex-1">
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'magnifying-glass','class' => 'absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'magnifying-glass','class' => 'absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="search" 
                    placeholder="Search..."
                    class="w-full pl-10 pr-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-gray-200 placeholder-gray-500 focus:outline-none focus:border-blue-500"
                />
            </div>
            
            <!-- Per Page -->
            <select wire:model.live="perPage" class="px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-gray-200 focus:outline-none focus:border-blue-500">
                <option value="15">15</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

        <!-- Actions Row -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <!-- Archive Toggle -->
                <button 
                    wire:click="toggleArchived"
                    class="flex items-center gap-2 px-3 py-1.5 text-sm border rounded-md transition <?php echo e($showArchived ? 'bg-amber-600 border-amber-600 text-white' : 'border-zinc-600 text-gray-300 hover:border-zinc-500'); ?>"
                >
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'archive-box','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'archive-box','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
                    Archive
                </button>

                <!-- Filter (placeholder) -->
                <button class="flex items-center gap-2 px-3 py-1.5 text-sm border border-zinc-600 text-gray-300 rounded-md hover:border-zinc-500 transition">
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'funnel','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'funnel','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
                    Filter
                </button>

                <!-- Columns Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button 
                        @click="open = !open"
                        class="flex items-center gap-2 px-3 py-1.5 text-sm border border-zinc-600 text-gray-300 rounded-md hover:border-zinc-500 transition"
                    >
                        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'view-columns','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'view-columns','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
                        Columns
                    </button>
                    
                    <div 
                        x-show="open" 
                        @click.away="open = false"
                        x-transition
                        class="absolute left-0 mt-2 w-64 max-h-96 overflow-y-auto bg-zinc-800 border border-zinc-700 rounded-lg shadow-xl z-50"
                    >
                        <div class="p-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $availableColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section => $sectionColumns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3">
                                    <div class="px-2 py-1 text-xs font-semibold text-gray-400 uppercase"><?php echo e($section); ?></div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $sectionColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="flex items-center gap-2 px-2 py-1.5 text-sm text-gray-200 hover:bg-zinc-700 rounded cursor-pointer">
                                            <input 
                                                type="checkbox" 
                                                wire:click="toggleColumn('<?php echo e($key); ?>')"
                                                <?php echo e(in_array($key, $visibleColumns) ? 'checked' : ''); ?>

                                                class="rounded border-zinc-600 text-blue-500 focus:ring-blue-500 bg-zinc-700"
                                            />
                                            <?php echo e($col['label']); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            
                            <div class="border-t border-zinc-700 mt-2 pt-2">
                                <button 
                                    wire:click="resetColumns"
                                    @click="open = false"
                                    class="w-full text-left px-2 py-1.5 text-sm text-gray-400 hover:text-gray-200 hover:bg-zinc-700 rounded"
                                >
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Export -->
                <button class="flex items-center gap-2 px-3 py-1.5 text-sm border border-zinc-600 text-gray-300 rounded-md hover:border-zinc-500 transition">
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'arrow-down-tray','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'arrow-down-tray','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
                    Export
                </button>
            </div>

            <!-- View Toggle -->
            <div class="inline-flex items-center rounded border border-zinc-700 overflow-hidden">
                <button 
                    wire:click="setView('table')"
                    class="px-3 py-1.5 text-sm focus:outline-none transition <?php echo e($view === 'table' ? 'bg-zinc-700 text-white font-semibold' : 'text-gray-400 hover:bg-zinc-700/40'); ?>"
                >
                    Table
                </button>
                <button 
                    wire:click="setView('gallery')"
                    class="px-3 py-1.5 text-sm focus:outline-none transition <?php echo e($view === 'gallery' ? 'bg-zinc-700 text-white font-semibold' : 'text-gray-400 hover:bg-zinc-700/40'); ?>"
                >
                    Gallery
                </button>
            </div>
        </div>
    </div>

    <!-- Table View -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($view === 'table'): ?>
        <div class="overflow-x-auto rounded-lg border border-zinc-700">
            <table class="w-full text-sm text-left">
                <thead class="bg-zinc-800 text-gray-300 uppercase text-xs">
                    <tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $visibleColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $col = $columns[$colKey] ?? null; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($col): ?>
                                <th class="px-4 py-3 whitespace-nowrap <?php echo e($col['sortable'] ?? false ? 'cursor-pointer hover:bg-zinc-700' : ''); ?>"
                                    <?php if($col['sortable'] ?? false): ?> wire:click="sortBy('<?php echo e($colKey); ?>')" <?php endif; ?>
                                >
                                    <div class="flex items-center gap-1">
                                        <?php echo e($col['label']); ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($col['sortable'] ?? false): ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sort === $colKey): ?>
                                                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => ''.e($direction === 'asc' ? 'chevron-up' : 'chevron-down').'','class' => 'w-3 h-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($direction === 'asc' ? 'chevron-up' : 'chevron-down').'','class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </th>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-700">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-zinc-800/50 transition">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $visibleColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $col = $columns[$colKey] ?? null;
                                    $value = $this->getColumnValue($user, $colKey);
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($col): ?>
                                    <td class="px-4 py-3 whitespace-nowrap text-gray-200">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($colKey === 'row_number'): ?>
                                            <?php echo e(($users->currentPage() - 1) * $users->perPage() + $index + 1); ?>

                                        <?php elseif(($col['format'] ?? null) === 'boolean'): ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($value): ?>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-900 text-green-300">Yes</span>
                                            <?php else: ?>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-zinc-700 text-gray-400">No</span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php else: ?>
                                            <?php echo e($value ?? '—'); ?>

                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <td class="px-4 py-3 text-right">
                                <a 
                                    href="<?php echo e(route('profile.show.other', $user)); ?>"
                                    class="text-blue-400 hover:text-blue-300 text-sm"
                                    wire:navigate
                                >
                                    View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="<?php echo e(count($visibleColumns) + 1); ?>" class="px-4 py-8 text-center text-gray-500">
                                No <?php echo e($type); ?> found.
                            </td>
                        </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <!-- Gallery View -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-zinc-800 rounded-lg border border-zinc-700 p-4 hover:border-zinc-600 transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-12 h-12 rounded-full bg-zinc-700 flex items-center justify-center text-lg font-semibold text-gray-200">
                            <?php echo e($user->initials()); ?>

                        </div>
                        <div>
                            <div class="font-medium text-gray-200"><?php echo e($this->getColumnValue($user, 'full_name')); ?></div>
                            <div class="text-sm text-gray-400"><?php echo e($user->role?->name); ?></div>
                        </div>
                    </div>
                    <div class="space-y-1 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Email:</span>
                            <span class="text-gray-300 truncate max-w-[180px]"><?php echo e($user->email); ?></span>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type === 'volunteers'): ?>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Volunteer #:</span>
                                <span class="text-gray-300"><?php echo e($user->fceerProfile?->volunteer_number ?? '—'); ?></span>
                            </div>
                        <?php else: ?>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Student #:</span>
                                <span class="text-gray-300"><?php echo e($user->fceerProfile?->student_number ?? '—'); ?></span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="mt-3 pt-3 border-t border-zinc-700">
                        <a 
                            href="<?php echo e(route('profile.show.other', $user)); ?>"
                            class="text-blue-400 hover:text-blue-300 text-sm"
                            wire:navigate
                        >
                            View Profile →
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full py-8 text-center text-gray-500">
                    No <?php echo e($type); ?> found.
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Pagination -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($users->hasPages()): ?>
        <div class="mt-4">
            <?php echo e($users->links()); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views\livewire/roster/roster-table.blade.php ENDPATH**/ ?>
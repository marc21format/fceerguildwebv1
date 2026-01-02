<div class="roster-container">
    <?php if (! $__env->hasRenderedOnce('09c662c9-4306-46b3-b759-06a05cd4ce77')): $__env->markAsRenderedOnce('09c662c9-4306-46b3-b759-06a05cd4ce77'); ?>
        <link rel="stylesheet" href="/css/reference-table.css">
        <script src="/js/reference-table.js" defer></script>
    <?php endif; ?>

    
    <?php
        $selectedRowNumbers = [];
        if (!empty($selected)) {
            $currentPageUsers = $users ?? collect();
            foreach ($currentPageUsers as $idx => $u) {
                if (in_array((string) $u->id, $selected)) {
                    $selectedRowNumbers[] = '#'.(($currentPageUsers->firstItem() ?? 0) + $idx);
                }
            }
        }
    ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('roster.roster-toolbar', [
        'headerIcon' => $type === 'students' ? 'academic-cap' : 'users',
        'headerTitle' => $type === 'students' ? 'Students' : 'Volunteers',
        'type' => $type,
        'availableColumns' => $availableColumns,
        'visibleColumns' => $visibleColumns,
        'availableFilters' => $availableFilters,
        'activeFilters' => $activeFilters,
        'selected' => $selected,
        'selectedRowNumbers' => $selectedRowNumbers,
        'search' => $search,
        'perPage' => $perPage,
        'view' => $view,
    ]);

$key = 'roster-toolbar-' . $type;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2609344865-0', 'roster-toolbar-' . $type);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($view === 'table'): ?>
        <div class="reference-table-container relative overflow-x-auto bg-white dark:bg-zinc-800 rounded shadow" style="overflow-y: visible;"
            x-data="{ selectedLocal: <?php if ((object) ('selected') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selected'->value()); ?>')<?php echo e('selected'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selected'); ?>')<?php endif; ?> }"
            x-bind:class="{ 'has-selection': selectedLocal.length > 0 }"
            x-on:mouseenter="$store.rowHover.hovered = 'table'"
            x-on:mouseleave="$store.rowHover.hovered = null">
            <table class="min-w-full divide-y">
                <thead class="bg-gray-50 dark:bg-zinc-900"
                    x-on:mouseenter="$store.rowHover.hovered = 'table'"
                    x-on:mouseleave="$store.rowHover.hovered = null">
                    <tr>
                        <th class="px-2 py-2 text-center text-sm font-medium text-gray-500 dark:text-gray-300 w-12">
                            <span class="text-sm text-gray-400 header-number" x-cloak>#</span>
                            <input type="checkbox" @click.stop wire:model.live="selectAll" class="select-all form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" aria-label="Select all on page" x-cloak />
                        </th>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $visibleColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $col = $columns[$colKey] ?? null; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($col && $colKey !== 'row_number'): ?>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300 whitespace-nowrap <?php echo e(($col['sortable'] ?? false) && empty($selected) ? 'cursor-pointer hover:bg-zinc-800' : ''); ?>"
                                    <?php if(($col['sortable'] ?? false) && empty($selected)): ?> wire:click="sortBy('<?php echo e($colKey); ?>')" <?php endif; ?>
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
                        <th class="px-2 py-2 text-center text-sm font-medium text-gray-500 dark:text-gray-300 w-20"></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $rowKey = $user->getKey();
                            $rowKeyStr = (string) $rowKey;
                            $isSelected = in_array($rowKeyStr, $selected ?? []);
                        ?>
                        <tr
                            class="group <?php echo e($isSelected ? 'bg-gray-50 dark:bg-zinc-700 selected' : 'bg-white dark:bg-zinc-800'); ?>"
                            wire:key="roster-row-<?php echo e($rowKeyStr); ?>"
                            data-row-key="<?php echo e($rowKeyStr); ?>"
                            @click.prevent="if ($event.target.closest('button, input, a')) return; $wire.toggleRow('<?php echo e($rowKeyStr); ?>')"
                            x-data="{
                                id: 'roster-menu-<?php echo e($rowKeyStr); ?>',
                                top: 0,
                                left: 0,
                                init() { if (!Alpine.store('menu')) Alpine.store('menu', { openId: null }); },
                                get open() { return Alpine.store('menu').openId === this.id },
                                openMenu(ref) {
                                    const rect = ref.getBoundingClientRect();
                                    const menuWidth = 160;
                                    this.top = Math.round(rect.bottom);
                                    this.left = Math.max(8, Math.round(rect.right - menuWidth));
                                    const newId = (Alpine.store('menu').openId === this.id ? null : this.id);
                                    Alpine.store('menu').openId = newId;
                                },
                                close() {
                                    if (Alpine.store('menu').openId === this.id) {
                                        Alpine.store('menu').openId = null;
                                    }
                                }
                            }"
                            x-on:mouseenter="$store.rowHover.hovered = '<?php echo e($rowKeyStr); ?>'"
                            x-on:mouseleave="$store.rowHover.hovered = null"
                        >
                            <td class="px-2 py-2 text-sm text-gray-700 dark:text-gray-200">
                                <div class="flex items-center justify-center">
                                    <span class="w-6 text-sm text-gray-400 text-center row-number" x-cloak><?php echo e(($users->currentPage() - 1) * $users->perPage() + $index + 1); ?></span>
                                    <input type="checkbox" @click.stop wire:model.live="selected" value="<?php echo e($rowKeyStr); ?>" class="row-checkbox form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" x-cloak />
                                </div>
                            </td>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $visibleColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $col = $columns[$colKey] ?? null;
                                    $value = $this->getColumnValue($user, $colKey);
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($col && $colKey !== 'row_number'): ?>
                                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200 max-w-md">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($col['format'] ?? null) === 'boolean'): ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($value): ?>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-900 text-green-300">Yes</span>
                                            <?php else: ?>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-zinc-700 text-gray-400">No</span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php else: ?>
                                            <?php echo $value ?? '—'; ?>

                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            
                            <td class="w-20 px-2 py-2 text-sm text-gray-700 dark:text-gray-200">
                                <div class="flex items-center justify-center">
                                    <button x-cloak x-show="$store.rowHover.hovered === '<?php echo e($rowKeyStr); ?>' || selectedLocal.includes('<?php echo e($rowKeyStr); ?>')" x-ref="actionBtn" type="button" @click.stop="openMenu($refs.actionBtn)" class="transition bg-transparent border-0 hover:bg-gray-50 dark:hover:bg-zinc-700/50 rounded px-2 py-1 flex items-center text-gray-400 dark:text-gray-300" aria-label="Options">
                                        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'grip-vertical','class' => 'w-4 h-4 text-current']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'grip-vertical','class' => 'w-4 h-4 text-current']); ?>
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
                                    </button>

                                    <div x-show="open" x-cloak @keydown.escape.window="close()" @click.away="close()" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
                                        :style="`position: fixed; top: ${top}px; left: ${left}px;`"
                                        class="w-40 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded shadow-lg dark:shadow-black/60 z-50">
                                        <div class="flex flex-col divide-y divide-gray-100 dark:divide-zinc-700">
                                            <a href="<?php echo e(route('profile.show.other', $user)); ?>" @click="close()" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-700" wire:navigate>
                                                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'eye','class' => 'w-4 h-4 text-gray-400 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'eye','class' => 'w-4 h-4 text-gray-400 dark:text-gray-300']); ?>
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
                                                <span>View Profile</span>
                                            </a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deleteRosterUser')): ?>
                                            <button type="button" @click.stop="close(); $dispatch('openRosterDeleteModal', { userId: <?php echo e($user->id); ?> })" class="flex items-center gap-2 px-3 py-2 text-sm text-red-500 hover:bg-gray-50 dark:hover:bg-zinc-700 w-full text-left">
                                                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'trash','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'trash','class' => 'w-4 h-4']); ?>
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
                                                <span>Delete</span>
                                            </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
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
        <!-- Gallery/Cards View -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $rowKey = $user->getKey();
                    $rowKeyStr = (string) $rowKey;
                    $isSelected = in_array($rowKeyStr, $selected ?? []);
                    $rowNumber = ($users->currentPage() - 1) * $users->perPage() + $index + 1;
                ?>
                <div 
                    class="relative bg-white/5 dark:bg-zinc-800 rounded-lg border transition <?php echo e($isSelected ? 'border-blue-500 bg-blue-50/5' : 'border-neutral-200 dark:border-neutral-700 hover:border-zinc-500'); ?>"
                    wire:key="roster-card-<?php echo e($rowKeyStr); ?>"
                    x-data="{ 
                        hovered: false,
                        menuOpen: false,
                        openMenu() { this.menuOpen = !this.menuOpen; },
                        closeMenu() { this.menuOpen = false; }
                    }"
                    @mouseenter="hovered = true"
                    @mouseleave="hovered = false; closeMenu()"
                >
                    <div class="flex">
                        
                        <div class="flex flex-col items-center justify-between py-3 px-2 border-r border-zinc-700/30 bg-zinc-800/50 rounded-l-lg min-w-[40px]">
                            
                            <div class="flex flex-col items-center gap-2">
                                <span x-show="!hovered && !<?php echo e($isSelected ? 'true' : 'false'); ?>" class="text-xs text-gray-400 font-medium">#<?php echo e($rowNumber); ?></span>
                                <input 
                                    x-show="hovered || <?php echo e($isSelected ? 'true' : 'false'); ?>"
                                    type="checkbox" 
                                    @click.stop 
                                    wire:model.live="selected" 
                                    value="<?php echo e($rowKeyStr); ?>" 
                                    class="form-checkbox accent-blue-600 dark:accent-gray-300"
                                />
                            </div>
                            
                            
                            <div x-show="hovered || menuOpen" x-cloak class="relative">
                                <button @click.stop="openMenu()" type="button" class="p-1 rounded hover:bg-zinc-700 text-gray-400 hover:text-gray-200">
                                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'grip-vertical','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'grip-vertical','class' => 'w-4 h-4']); ?>
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
                                </button>
                                
                                <div x-show="menuOpen" @click.away="closeMenu()" x-transition
                                    class="absolute top-full left-0 mt-1 w-40 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded shadow-lg z-50">
                                    <div class="flex flex-col divide-y divide-gray-100 dark:divide-zinc-700">
                                        <a href="<?php echo e(route('profile.show.other', $user)); ?>" @click="closeMenu()" wire:navigate class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-700">
                                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'eye','class' => 'w-4 h-4 text-gray-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'eye','class' => 'w-4 h-4 text-gray-400']); ?>
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
                                            <span>View Profile</span>
                                        </a>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deleteRosterUser')): ?>
                                        <button type="button" @click.stop="closeMenu(); $dispatch('openRosterDeleteModal', { userId: <?php echo e($user->id); ?> })" class="flex items-center gap-2 px-3 py-2 text-sm text-red-500 hover:bg-gray-50 dark:hover:bg-zinc-700 w-full text-left">
                                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'trash','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'trash','class' => 'w-4 h-4']); ?>
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
                                            <span>Delete</span>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="flex-1 p-4">
                            
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-zinc-700 flex items-center justify-center text-lg font-semibold text-gray-200 flex-shrink-0">
                                    <?php echo e($user->initials()); ?>

                                </div>
                                <div class="min-w-0">
                                    <div class="font-medium text-gray-200 truncate"><?php echo e($this->getColumnValue($user, 'full_name')); ?></div>
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
                        </div>
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

    
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('roster.roster-archive-modal');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2609344865-1', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('roster.roster-archive-restore-modal');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2609344865-2', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('roster.roster-user-form-modal');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2609344865-3', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('roster.roster-delete-modal');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2609344865-4', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('roster.roster-restore-modal');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2609344865-5', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('roster.roster-force-delete-modal');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2609344865-6', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/roster/roster-table.blade.php ENDPATH**/ ?>
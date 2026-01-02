<div>
    <div class="flex items-center justify-between mb-3">
        <div class="flex-1">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('reference.reference-toolbar', [
                'modelClass' => $modelClass ?? null,
                'configKey' => $configKey ?? null,
                'fields' => $fields ?? [],
                'visibleFields' => $visibleFields ?? [],
                'filters' => $filters ?? [],
                'search' => $search ?? '',
                'perPage' => $perPage ?? 15,
                'view' => $view ?? 'rows',
                'selected' => $selected ?? [],
                'sort' => $sort ?? 'id',
                'direction' => $direction ?? 'desc',
                'readOnly' => $readOnly ?? false,
            ]);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1130246707-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($view === 'cards'): ?>
        <?php echo $__env->make('livewire.reference.partials.cards', ['items' => $items, 'fields' => $fields], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php else: ?>
        <?php if (! $__env->hasRenderedOnce('b5165d8a-d15c-4010-af4e-060d50209542')): $__env->markAsRenderedOnce('b5165d8a-d15c-4010-af4e-060d50209542'); ?>
            <link rel="stylesheet" href="/css/reference-table.css">
            <script src="/js/reference-table.js" defer></script>
        <?php endif; ?>

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
                              <input type="checkbox" @click.stop wire:model="selectAll" wire:change="$refresh" wire:key="selectAllHeader" class="select-all form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" aria-label="Select all on page" x-cloak />
                </th>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $key = $f['key']; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($key, $visibleFields ?? [])): ?>
                        <?php echo $__env->make('livewire.reference.partials.header-sort', ['key' => $key, 'f' => $f], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <th class="px-2 py-2 text-center text-sm font-medium text-gray-500 dark:text-gray-300 w-20"></th>
            </tr>
        </thead>
        <tbody class="divide-y">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $rowKey = $item->getKey();
                    $rowKeyStr = (string) $rowKey;
                    $isSelected = in_array($rowKeyStr, $selected ?? []);
                ?>
                <tr
                    class="group <?php echo e($isSelected ? 'bg-gray-50 dark:bg-zinc-700 selected' : 'bg-white dark:bg-zinc-800'); ?>"
                    wire:key="reference-row-<?php echo e($rowKeyStr); ?>"
                    data-row-key="<?php echo e($rowKeyStr); ?>"
                    @click.prevent="if ($event.target.closest('button, input, a')) return; $wire.toggleRow('<?php echo e($rowKeyStr); ?>')"
                    x-data="{
                        id: 'menu-<?php echo e($rowKeyStr); ?>',
                        top: 0,
                        left: 0,
                        init() { if (!Alpine.store('menu')) Alpine.store('menu', { openId: null }); },
                        get open() { return Alpine.store('menu').openId === this.id },
                        disableScroll() {
                            const container = document.querySelector('.reference-table-container');
                            if (container) container.style.overflow = 'hidden';
                            document.body.style.overflow = 'hidden';
                        },
                        restoreScroll() {
                            const container = document.querySelector('.reference-table-container');
                            if (container) container.style.overflow = '';
                            document.body.style.overflow = '';
                        },
                        openMenu(ref) {
                            const rect = ref.getBoundingClientRect();
                            const menuWidth = 220; // a bit wider to accommodate content

                            // Use fixed positioning anchored to the viewport so the menu
                            // stays aligned with the clicked row even when the table
                            // has its own scrollbar.
                            const minLeft = 8;
                            const desiredLeft = rect.right - menuWidth;
                            const maxLeft = Math.max(minLeft, window.innerWidth - menuWidth - 8);

                            // top/left in viewport coordinates
                            this.top = Math.round(rect.bottom);
                            this.left = Math.min(Math.max(minLeft, Math.round(desiredLeft)), maxLeft);

                            const newId = (Alpine.store('menu').openId === this.id ? null : this.id);
                            Alpine.store('menu').openId = newId;
                            if (newId === this.id) {
                                this.disableScroll();
                            } else {
                                // closed
                                this.restoreScroll();
                            }
                        },
                        close() {
                            if (Alpine.store('menu').openId === this.id) {
                                Alpine.store('menu').openId = null;
                                this.restoreScroll();
                            }
                        }
                    }"
                    x-on:mouseenter="$store.rowHover.hovered = '<?php echo e($rowKeyStr); ?>'"
                    x-on:mouseleave="$store.rowHover.hovered = null"
                >
                    <td class="px-2 py-2 text-sm text-gray-700 dark:text-gray-200">
                        <div class="flex items-center justify-center">
                            
                            <span class="w-6 text-sm text-gray-400 text-center row-number" x-cloak><?php echo e(($items->firstItem() ?? 0) + $loop->iteration - 1); ?></span>
                            
                            <input type="checkbox" @click.stop wire:model="selected" wire:change="$refresh" wire:key="selected.<?php echo e($rowKeyStr); ?>" value="<?php echo e($rowKeyStr); ?>" class="row-checkbox form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" x-cloak />
                        </div>
                    </td>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $key = $f['key']; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($key, $visibleFields ?? [])): ?>
                        <?php $isName = isset($f['key']) && $f['key'] === 'name'; ?>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isName): ?>
                                <div>
                                    <button x-ref="btnName" @click.stop="$wire.toggleRow('<?php echo e($rowKeyStr); ?>')" type="button" class="flex items-center gap-3 w-full text-left">
                                        <span class="truncate"><?php echo e($displayValues[$rowKeyStr][$key] ?? data_get($item, $key)); ?></span>
                                    </button>
                                </div>
                            <?php else: ?>
                                <?php echo e($displayValues[$rowKeyStr][$key] ?? data_get($item, $key)); ?>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <td class="w-20 px-2 py-2 text-sm text-gray-700 dark:text-gray-200">
                        <div class="flex items-center justify-center">
                            <button x-cloak x-show="$store.rowHover.hovered === '<?php echo e($rowKeyStr); ?>' || selectedLocal.includes('<?php echo e($rowKeyStr); ?>')" x-ref="actionBtn" type="button" @click.stop="$wire.selectEnsure('<?php echo e($rowKeyStr); ?>'); openMenu($refs.actionBtn)" class="transition bg-transparent border-0 hover:bg-gray-50 dark:hover:bg-zinc-700/50 rounded px-2 py-1 flex items-center text-gray-400 dark:text-gray-300" aria-label="Options">
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
                                 class="w-36 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded shadow-lg dark:shadow-black/60 z-50">
                                <div class="flex flex-col divide-y">
                                    <button type="button" @click.stop="close()" wire:click.prevent="relayShow(<?php echo e($item->getKey()); ?>)" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-700">
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
                                        <span>View</span>
                                    </button>

                                    <button type="button" @click.stop="close()" wire:click.prevent="relayEdit(<?php echo e($item->getKey()); ?>)" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-700">
                                        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'pencil','class' => 'w-4 h-4 text-gray-400 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'pencil','class' => 'w-4 h-4 text-gray-400 dark:text-gray-300']); ?>
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
                                        <span>Edit</span>
                                    </button>

                                    <button type="button" @click.stop="close()" wire:click.prevent="relayDelete(<?php echo e($item->getKey()); ?>)" class="flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-gray-50 dark:hover:bg-zinc-700">
                                        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'trash','class' => 'w-4 h-4 text-red-600 dark:text-red-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'trash','class' => 'w-4 h-4 text-red-600 dark:text-red-400']); ?>
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
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
        </table>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="pt-3" @click.stop>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(method_exists($items, 'links')): ?>
            <?php echo e($items->links()); ?>

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    
</div><?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/reference/reference-table.blade.php ENDPATH**/ ?>
<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($renderTrigger ?? false): ?>
        <div class="ml-3">
            <?php if (isset($component)) { $__componentOriginal1db8c57e729d67f7d4103875cf3230cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1db8c57e729d67f7d4103875cf3230cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::modal.trigger','data' => ['name' => 'committee-memberships-archive']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::modal.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'committee-memberships-archive']); ?>
                <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['size' => 'sm','icon:leading' => 'archive-restore','tone' => 'neutral','title' => 'Archive','wire:click' => 'open']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','icon:leading' => 'archive-restore','tone' => 'neutral','title' => 'Archive','wire:click' => 'open']); ?>Archive <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $attributes = $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $component = $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1db8c57e729d67f7d4103875cf3230cb)): ?>
<?php $attributes = $__attributesOriginal1db8c57e729d67f7d4103875cf3230cb; ?>
<?php unset($__attributesOriginal1db8c57e729d67f7d4103875cf3230cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1db8c57e729d67f7d4103875cf3230cb)): ?>
<?php $component = $__componentOriginal1db8c57e729d67f7d4103875cf3230cb; ?>
<?php unset($__componentOriginal1db8c57e729d67f7d4103875cf3230cb); ?>
<?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($open ?? false): ?>
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-end justify-center z-50">
            <?php if (isset($component)) { $__componentOriginal8cc9d3143946b992b324617832699c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cc9d3143946b992b324617832699c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::modal.index','data' => ['name' => 'committee-memberships-archive','flyout' => true,'position' => 'bottom','class' => 'md:w-lg','wire:model' => 'open','@close' => '$set(\'open\', false)','role' => 'dialog','ariaModal' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'committee-memberships-archive','flyout' => true,'position' => 'bottom','class' => 'md:w-lg','wire:model' => 'open','@close' => '$set(\'open\', false)','role' => 'dialog','aria-modal' => 'true']); ?>
                <div class="space-y-4">
                    <?php if (isset($component)) { $__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::heading','data' => ['size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'lg']); ?>Archive <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9)): ?>
<?php $attributes = $__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9; ?>
<?php unset($__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9)): ?>
<?php $component = $__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9; ?>
<?php unset($__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal43e8c568bbb8b06b9124aad3ccf4ec97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal43e8c568bbb8b06b9124aad3ccf4ec97 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::subheading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::subheading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Manage soft-deleted records. Restore or permanently delete items. <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal43e8c568bbb8b06b9124aad3ccf4ec97)): ?>
<?php $attributes = $__attributesOriginal43e8c568bbb8b06b9124aad3ccf4ec97; ?>
<?php unset($__attributesOriginal43e8c568bbb8b06b9124aad3ccf4ec97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal43e8c568bbb8b06b9124aad3ccf4ec97)): ?>
<?php $component = $__componentOriginal43e8c568bbb8b06b9124aad3ccf4ec97; ?>
<?php unset($__componentOriginal43e8c568bbb8b06b9124aad3ccf4ec97); ?>
<?php endif; ?>

                    <div class="space-y-3" x-data="{ selectedLocal: <?php if ((object) ('selected') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selected'->value()); ?>')<?php echo e('selected'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selected'); ?>')<?php endif; ?>, pendingAction: <?php if ((object) ('pendingAction') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('pendingAction'->value()); ?>')<?php echo e('pendingAction'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('pendingAction'); ?>')<?php endif; ?>, pendingIds: <?php if ((object) ('pendingIds') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('pendingIds'->value()); ?>')<?php echo e('pendingIds'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('pendingIds'); ?>')<?php endif; ?> }">
                            <?php
                                $selectedCount = isset($selected) ? (is_countable($selected) ? count($selected) : (empty($selected) ? 0 : 1)) : 0;
                            ?>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" wire:model="selectAll" wire:click="toggleSelectAll" class="form-checkbox h-4 w-4" x-cloak x-show="false" />
                                </div>
                                <div class="flex items-center gap-2">
                                        <?php
                                            $selectedRows = [];
                                            if (($selectedCount ?? 0) > 0 && isset($items) && (is_object($items) || is_array($items))) {
                                                foreach ($items as $idx => $it) {
                                                    if (in_array((string) $it->getKey(), (array) ($selected ?? []))) {
                                                        $selectedRows[] = '#'.(($items->firstItem() ?? 0) + $idx);
                                                    }
                                                }
                                            }
                                        ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($selectedCount ?? 0) > 0): ?>
                                            <div class="text-sm text-indigo-600 dark:text-gray-100"><?php echo e($selectedCount); ?> selected <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($selectedRows)): ?>(<?php echo e(implode(',', $selectedRows)); ?>)<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['size' => 'sm','wire:click.prevent' => 'prepareBulkAction(\'restoreSelected\')','xBind:disabled' => 'selectedLocal.length === 0','icon:leading' => 'archive-restore']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','wire:click.prevent' => 'prepareBulkAction(\'restoreSelected\')','x-bind:disabled' => 'selectedLocal.length === 0','icon:leading' => 'archive-restore']); ?>Restore <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $attributes = $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $component = $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['size' => 'sm','tone' => 'danger','wire:click.prevent' => 'prepareBulkAction(\'forceDeleteSelected\')','xBind:disabled' => 'selectedLocal.length === 0','icon:leading' => 'trash']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','tone' => 'danger','wire:click.prevent' => 'prepareBulkAction(\'forceDeleteSelected\')','x-bind:disabled' => 'selectedLocal.length === 0','icon:leading' => 'trash']); ?>Permanently Delete <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $attributes = $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $component = $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
                                    </div>
                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($items) && (is_object($items) || is_array($items))): ?>
                                <div class="overflow-x-auto" x-on:mouseenter="$store.rowHover.hovered = 'archive'" x-on:mouseleave="$store.rowHover.hovered = null">
                                    <table class="min-w-full divide-y">
                                    <thead class="bg-gray-50 dark:bg-zinc-900" x-on:mouseenter="$store.rowHover.hovered = 'archive'" x-on:mouseleave="$store.rowHover.hovered = null">
                                        <tr>
                                            <th class="px-2 py-2 text-center text-sm font-medium text-gray-500 dark:text-gray-300 w-12">
                                                <span class="text-sm text-gray-400" x-cloak x-show="$store.rowHover.hovered === null && (selectedLocal.length === 0)">#</span>
                                                <input type="checkbox" @click.stop wire:model="selectAll" wire:change="$refresh" wire:key="selectAllHeaderArchive" class="form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" aria-label="Select all on page" x-cloak x-show="$store.rowHover.hovered !== null || (selectedLocal.length > 0)" />
                                            </th>
                                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">ID</th>
                                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Committee</th>
                                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Position</th>
                                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Deleted By</th>
                                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Deleted At</th>
                                            <th class="px-2 py-2 text-center text-sm font-medium text-gray-500 dark:text-gray-300 w-20"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php
                                                $rowKey = $item->getKey();
                                                $rowKeyStr = (string) $rowKey;
                                            ?>
                                            <tr class="group bg-white dark:bg-zinc-800" wire:key="archive-row-<?php echo e($rowKeyStr); ?>" @click.prevent="if ($event.target.closest('button, input, a')) return; $wire.toggleRow('<?php echo e($rowKeyStr); ?>')" x-on:mouseenter="$store.rowHover.hovered = '<?php echo e($rowKeyStr); ?>'" x-on:mouseleave="$store.rowHover.hovered = null">
                                                <td class="px-2 py-2 text-sm text-gray-700 dark:text-gray-200">
                                                    <div class="flex items-center justify-center">
                                                            <span class="w-6 text-sm text-gray-400 text-center" x-cloak x-show="$store.rowHover.hovered !== '<?php echo e($rowKeyStr); ?>' && !selectedLocal.includes('<?php echo e($rowKeyStr); ?>')"><?php echo e(($items->firstItem() ?? 0) + $loop->iteration - 1); ?></span>
                                                        <input type="checkbox" @click.stop wire:model="selected" wire:change="$refresh" wire:key="selected.<?php echo e($rowKeyStr); ?>" value="<?php echo e($rowKeyStr); ?>" class="form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" x-cloak x-show="$store.rowHover.hovered === '<?php echo e($rowKeyStr); ?>' || selectedLocal.includes('<?php echo e($rowKeyStr); ?>')" />
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e($item->getKey()); ?></td>
                                                <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->committee)->name ?? '—'); ?></td>
                                                <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->committeePosition)->name ?? '—'); ?></td>
                                                <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e($item->deleted_by_name ?? '-'); ?></td>
                                                <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e($item->deleted_at->diffForHumans()); ?></td>
                                                <td class="w-20 px-2 py-2 text-sm text-gray-700 dark:text-gray-200 text-right">
                                                    <div x-data="{ id: 'archive-menu-<?php echo e($rowKeyStr); ?>', top: 0, left: 0, init() { if (!Alpine.store('menu')) Alpine.store('menu', { openId: null }); }, get open() { return Alpine.store('menu').openId === this.id }, disableScroll() { const container = document.querySelector('.reference-archive-modal-content'); if (container) container.style.overflow = 'hidden'; document.body.style.overflow = 'hidden'; }, restoreScroll() { const container = document.querySelector('.reference-archive-modal-content'); if (container) container.style.overflow = ''; document.body.style.overflow = ''; }, openMenu(ref) { const rect = ref.getBoundingClientRect(); const menuWidth = 220; const minLeft = 8; const desiredLeft = rect.right - menuWidth; const maxLeft = Math.max(minLeft, window.innerWidth - menuWidth - 8); this.top = Math.round(rect.bottom); this.left = Math.min(Math.max(minLeft, Math.round(desiredLeft)), maxLeft); const newId = (Alpine.store('menu').openId === this.id ? null : this.id); Alpine.store('menu').openId = newId; if (newId === this.id) this.disableScroll(); else this.restoreScroll(); }, close() { if (Alpine.store('menu').openId === this.id) { Alpine.store('menu').openId = null; this.restoreScroll(); } } }">
                                                        <button x-cloak x-show="$store.rowHover.hovered === '<?php echo e($rowKeyStr); ?>' || selectedLocal.includes('<?php echo e($rowKeyStr); ?>' )" type="button" @click.stop="openMenu($el)" class="btn-ghost" aria-label="Options">
                                                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'ellipsis-vertical','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'ellipsis-vertical','class' => 'w-4 h-4']); ?>
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
                                                            class="w-48 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded shadow-lg dark:shadow-black/60 z-50">
                                                            <div class="flex flex-col divide-y">
                                                                <button type="button" @click.stop="close(); $wire.restore(<?php echo e($item->id); ?>)" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-700">
                                                                    Restore
                                                                </button>
                                                                <button type="button" @click.stop="close(); $wire.forceDelete(<?php echo e($item->id); ?>)" class="flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-gray-50 dark:hover:bg-zinc-700">
                                                                    Delete permanently
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="6" class="px-4 py-6 text-sm text-muted">No archived items found.</td>
                                            </tr>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </tbody>
                                    </table>
                                </div>

                                <div class="pt-3">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(method_exists($items, 'links')): ?>
                                        <?php echo e($items->links()); ?>

                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php else: ?>
                                <div class="px-4 py-6 text-sm text-muted">No archived items available.</div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8cc9d3143946b992b324617832699c5f)): ?>
<?php $attributes = $__attributesOriginal8cc9d3143946b992b324617832699c5f; ?>
<?php unset($__attributesOriginal8cc9d3143946b992b324617832699c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8cc9d3143946b992b324617832699c5f)): ?>
<?php $component = $__componentOriginal8cc9d3143946b992b324617832699c5f; ?>
<?php unset($__componentOriginal8cc9d3143946b992b324617832699c5f); ?>
<?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/profile/fceer/subsections/committee_memberships/archive-modal.blade.php ENDPATH**/ ?>
<div class="profile-section">
    <div class="profile-section-header">
        <div class="flex items-center gap-3">
            <div class="inline-flex items-center gap-2">
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'notebook-pen','class' => 'w-5 h-5 text-gray-700 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'notebook-pen','class' => 'w-5 h-5 text-gray-700 dark:text-gray-300']); ?>
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
                <div class="profile-card-title">Highschool Subject Records</div>
            </div>

            <div class="ml-4 inline-flex items-center rounded-md overflow-hidden border">
                <button type="button" wire:click.prevent="setView('table')"
                    class="px-2 py-1 text-sm transition inline-flex items-center justify-center rounded-l-md focus:outline-none <?php echo e($view === 'table' ? 'bg-gray-100 text-gray-900 shadow ring-1 ring-gray-200 dark:bg-zinc-700 dark:text-white' : 'bg-white dark:bg-zinc-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
                    aria-label="Table view">
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'list','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'list','class' => 'w-4 h-4']); ?>
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
                <button type="button" wire:click.prevent="setView('cards')"
                    class="px-2 py-1 text-sm transition inline-flex items-center justify-center rounded-r-md focus:outline-none <?php echo e($view === 'cards' ? 'bg-gray-100 text-gray-900 shadow ring-1 ring-gray-200 dark:bg-zinc-700 dark:text-white' : 'bg-white dark:bg-zinc-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
                    aria-label="Card view">
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'gallery-vertical-end','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'gallery-vertical-end','class' => 'w-4 h-4']); ?>
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
            </div>
        </div>

        <div class="inline-flex items-center space-x-2">
            <?php
                $selectedRowNumbers = [];
                foreach(($items ?? []) as $loopIndex => $rec) {
                    $rk = (string) $rec->getKey();
                    if(in_array($rk, $selected ?? [])) {
                        $rowNum = (($items->firstItem() ?? 0) + ($loopIndex + 1) - 1);
                        $selectedRowNumbers[] = '#'.$rowNum;
                    }
                }
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($selected) && count($selected)): ?>
                <div class="text-sm text-indigo-600 mr-2"><?php echo e(count($selected)); ?> selected <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($selectedRowNumbers)): ?>— <span class="font-mono text-sm">(<?php echo e(implode(',', $selectedRowNumbers)); ?>)</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
                <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['size' => 'xs','tone' => 'danger','class' => 'ml-2 w-7 h-7 flex items-center justify-center text-sm','wire:click' => 'deleteSelected','type' => 'button','title' => 'Delete selected']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','tone' => 'danger','class' => 'ml-2 w-7 h-7 flex items-center justify-center text-sm','wire:click' => 'deleteSelected','type' => 'button','title' => 'Delete selected']); ?>
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'trash']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'trash']); ?>
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
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $attributes = $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $component = $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['size' => 'xs','tone' => 'neutral','class' => 'w-7 h-7 flex items-center justify-center text-sm','wire:click.prevent' => 'create','type' => 'button','title' => 'Create']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','tone' => 'neutral','class' => 'w-7 h-7 flex items-center justify-center text-sm','wire:click.prevent' => 'create','type' => 'button','title' => 'Create']); ?>
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'plus']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'plus']); ?>
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
             <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['size' => 'xs','tone' => 'neutral','class' => 'w-7 h-7 flex items-center justify-center text-sm','type' => 'button','title' => 'Archive','wire:click.prevent' => 'openArchive']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','tone' => 'neutral','class' => 'w-7 h-7 flex items-center justify-center text-sm','type' => 'button','title' => 'Archive','wire:click.prevent' => 'openArchive']); ?>
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'archive-restore']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'archive-restore']); ?>
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
             <?php echo $__env->renderComponent(); ?>
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

    <?php if (! $__env->hasRenderedOnce('04820dad-669a-49f4-b822-6c7beee5aa2f')): $__env->markAsRenderedOnce('04820dad-669a-49f4-b822-6c7beee5aa2f'); ?>
        <link rel="stylesheet" href="/css/reference-table.css">
        <script src="/js/reference-table.js" defer></script>
    <?php endif; ?>

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
                            <input type="checkbox" @click.stop wire:model="selectAll" wire:change="$refresh" wire:key="selectAllHeaderSubject" x-bind:checked="selectedLocal.length === <?php echo e($items->count()); ?>" class="select-all form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" aria-label="Select all on page" x-cloak />
                        </th>

                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Subject</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Grade</th>
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
                            wire:key="profile-row-subject-<?php echo e($rowKeyStr); ?>"
                            data-row-key="<?php echo e($rowKeyStr); ?>"
                            @click.prevent="if ($event.target.closest('button, input, a')) return; $wire.toggleRow('<?php echo e($rowKeyStr); ?>')"
                            x-data="{
                                id: 'menu-subject-<?php echo e($rowKeyStr); ?>',
                                top: 0,
                                left: 0,
                                init() { if (!Alpine.store('menu')) Alpine.store('menu', { openId: null }); },
                                get open() { return Alpine.store('menu').openId === this.id },
                                disableScroll() { const container = document.querySelector('.reference-table-container'); if (container) container.style.overflow = 'hidden'; document.body.style.overflow = 'hidden'; },
                                restoreScroll() { const container = document.querySelector('.reference-table-container'); if (container) container.style.overflow = ''; document.body.style.overflow = ''; },
                                openMenu(ref) {
                                    const rect = ref.getBoundingClientRect();
                                    const menuWidth = 220;
                                    const minLeft = 8;
                                    const desiredLeft = rect.right - menuWidth;
                                    const maxLeft = Math.max(minLeft, window.innerWidth - menuWidth - 8);
                                    this.top = Math.round(rect.bottom);
                                    this.left = Math.min(Math.max(minLeft, Math.round(desiredLeft)), maxLeft);
                                    const newId = (Alpine.store('menu').openId === this.id ? null : this.id);
                                    Alpine.store('menu').openId = newId;
                                    if (newId === this.id) this.disableScroll(); else this.restoreScroll();
                                },
                                close() { if (Alpine.store('menu').openId === this.id) { Alpine.store('menu').openId = null; this.restoreScroll(); } }
                            }"
                            x-on:mouseenter="$store.rowHover.hovered = '<?php echo e($rowKeyStr); ?>'"
                            x-on:mouseleave="$store.rowHover.hovered = null">
                            <td class="px-2 py-2 text-sm text-gray-700 dark:text-gray-200">
                                <div class="flex items-center justify-center">
                                    <span class="w-6 text-sm text-gray-400 text-center row-number" x-cloak><?php echo e(($items->firstItem() ?? 0) + $loop->iteration - 1); ?></span>
                                    <input type="checkbox" @click.stop wire:model="selected" wire:change="$refresh" wire:key="selected-subject.<?php echo e($rowKeyStr); ?>" value="<?php echo e($rowKeyStr); ?>" class="row-checkbox form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" x-cloak />
                                </div>
                            </td>

                            <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->subject)->name ?? $item->highschool_subject_id); ?></td>
                            <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e(ucfirst($item->grade)); ?></td>

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
    <?php else: ?>
        <div class="grid grid-cols-1 <?php echo e($items->count() > 1 ? 'md:grid-cols-2' : 'md:grid-cols-1'); ?> gap-4" x-data="{ selectedLocal: <?php if ((object) ('selected') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selected'->value()); ?>')<?php echo e('selected'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selected'); ?>')<?php endif; ?> }">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $rowKey = $item->getKey();
                    $rowKeyStr = (string) $rowKey;
                ?>
                <div wire:key="card-row-subject-<?php echo e($rowKeyStr); ?>" class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4 relative"
                        x-data="{
                        id: 'card-menu-subject-<?php echo e($rowKeyStr); ?>',
                        top: 0,
                        left: 0,
                        init() { if (!Alpine.store('menu')) Alpine.store('menu', { openId: null }); },
                        get open() { return Alpine.store('menu').openId === this.id },
                        disableScroll() { const container = document.querySelector('.reference-table-container'); if (container) container.style.overflow = 'hidden'; document.body.style.overflow = 'hidden'; },
                        restoreScroll() { const container = document.querySelector('.reference-table-container'); if (container) container.style.overflow = ''; document.body.style.overflow = ''; },
                        openMenu(ref) {
                            const rect = ref.getBoundingClientRect();
                            const menuWidth = 160;
                            const minLeft = 8;
                            const desiredLeft = rect.right - menuWidth;
                            const maxLeft = Math.max(minLeft, window.innerWidth - menuWidth - 8);
                            this.top = Math.round(rect.bottom);
                            this.left = Math.min(Math.max(minLeft, Math.round(desiredLeft)), maxLeft);
                            const newId = (Alpine.store('menu').openId === this.id ? null : this.id);
                            Alpine.store('menu').openId = newId;
                            if (newId === this.id) this.disableScroll(); else this.restoreScroll();
                        },
                        close() { if (Alpine.store('menu').openId === this.id) { Alpine.store('menu').openId = null; this.restoreScroll(); } }
                     }"
                     @mouseenter="$store.rowHover.hovered = '<?php echo e($rowKeyStr); ?>'"
                     @mouseleave="$store.rowHover.hovered = null">
                    <div class="absolute inset-y-2 right-2 flex flex-col justify-between items-center">
                        <div class="w-6 h-6 relative">
                            <button x-cloak type="button" x-ref="actionBtnCard" @click.stop="$wire.selectEnsure('<?php echo e($rowKeyStr); ?>'); openMenu($refs.actionBtnCard)"
                                :class="($store.rowHover.hovered === '<?php echo e($rowKeyStr); ?>' || selectedLocal.includes('<?php echo e($rowKeyStr); ?>')) ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'"
                                class="btn-ghost transition-opacity duration-150 absolute inset-0 flex items-center justify-center">
                                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'grip-vertical','class' => 'w-4 h-4 text-gray-400 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'grip-vertical','class' => 'w-4 h-4 text-gray-400 dark:text-gray-300']); ?>
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

                            <span x-cloak class="text-xs text-gray-400 dark:text-gray-500 absolute inset-0 flex items-center justify-center"
                                  :class="($store.rowHover.hovered === '<?php echo e($rowKeyStr); ?>' || selectedLocal.includes('<?php echo e($rowKeyStr); ?>')) ? 'opacity-0 pointer-events-none' : 'opacity-100'">
                                <?php $rowNumberDisplay = ($items->firstItem() ?? 0) + $loop->iteration - 1; ?>
                                #<?php echo e($rowNumberDisplay); ?>

                            </span>
                        </div>

                        <input x-cloak type="checkbox" @click.stop wire:model="selected" wire:change="$refresh" wire:key="selected-subject.<?php echo e($rowKeyStr); ?>" value="<?php echo e($rowKeyStr); ?>" aria-label="Select record"
                            class="row-checkbox form-checkbox mx-auto accent-blue-600 dark:accent-gray-300 h-4 w-4 transition-opacity duration-150"
                            :class="($store.rowHover.hovered === '<?php echo e($rowKeyStr); ?>' || selectedLocal.includes('<?php echo e($rowKeyStr); ?>')) ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'" />
                    </div>

                    <div class="space-y-1">
                        <div class="text-sm font-semibold text-gray-800 dark:text-gray-100"><?php echo e(optional($item->subject)->name ?? '—'); ?></div>
                        <div class="text-sm text-gray-600 dark:text-gray-300"><?php echo e(ucfirst($item->grade)); ?></div>
                    </div>

                    <div x-show="open" x-cloak @keydown.escape.window="close()" @click.away="close()" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
                        :style="`position: fixed; top: ${top}px; left: ${left}px;`"
                        class="w-40 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded shadow-lg dark:shadow-black/60 z-50">
                        <div class="flex flex-col divide-y">
                            <button type="button" @click.stop="Alpine.store('menu').openId = null; $wire.relayShow(<?php echo e($item->getKey()); ?>)" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50">
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
                            <button type="button" @click.stop="Alpine.store('menu').openId = null; $wire.relayEdit(<?php echo e($item->getKey()); ?>)" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50">
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
                            <button type="button" @click.stop="Alpine.store('menu').openId = null; $wire.relayDelete(<?php echo e($item->getKey()); ?>)" class="flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-gray-50">
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($items ?? collect())->isEmpty()): ?>
        <p class="text-center py-4 text-gray-500 dark:text-gray-400">No entries yet.</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.credentials.subsections.highschool-subject-records.highschool-subject-records-form-modal', ['instanceKey' => 'App\\Models\\HighschoolSubjectRecord']);

$key = 'highschool-subject-records-form-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1743716975-0', 'highschool-subject-records-form-'.$user->id);

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
[$__name, $__params] = $__split('profile.credentials.subsections.highschool-subject-records.highschool-subject-records-details-modal', []);

$key = 'highschool-subject-records-details-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1743716975-1', 'highschool-subject-records-details-'.$user->id);

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
[$__name, $__params] = $__split('profile.credentials.subsections.highschool-subject-records.highschool-subject-records-archive', []);

$key = 'highschool-subject-records-archive-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1743716975-2', 'highschool-subject-records-archive-'.$user->id);

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
[$__name, $__params] = $__split('profile.credentials.subsections.highschool-subject-records.highschool-subject-delete-modal', []);

$key = 'highschool-subjects-delete-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1743716975-3', 'highschool-subjects-delete-'.$user->id);

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
[$__name, $__params] = $__split('profile.credentials.subsections.highschool-subject-records.highschool-subject-restore-modal', []);

$key = 'highschool-subjects-restore-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1743716975-4', 'highschool-subjects-restore-'.$user->id);

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
[$__name, $__params] = $__split('profile.credentials.subsections.highschool-subject-records.highschool-subject-force-delete-modal', []);

$key = 'highschool-subjects-force-delete-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1743716975-5', 'highschool-subjects-force-delete-'.$user->id);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/profile/credentials/subsections/highschool_subject_records/index.blade.php ENDPATH**/ ?>
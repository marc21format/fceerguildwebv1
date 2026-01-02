<th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">
    <div class="flex items-center space-x-2">
        <span><?php echo e($f['label'] ?? ucfirst($key)); ?></span>
        <div class="flex items-center">
            <?php
                // Use the Livewire component's properties `sort` and `direction`
                $currentKey = $sort ?? null;
                $currentDir = $direction ?? null;
                $active = $currentKey === $key;

                if ($active) {
                    $icon = $currentDir === 'desc' ? 'chevron-down' : 'chevron-up';
                    $next = $currentDir === 'asc' ? 'desc' : 'asc';
                    $title = $currentDir === 'asc' ? 'Sorted ascending — click to sort descending' : 'Sorted descending — click to sort ascending';
                } else {
                    $icon = 'chevron-up';
                    $next = 'asc';
                    $title = 'Sort';
                }
            ?>

            <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['variant' => 'subtle','size' => 'xs','icon' => ''.e($icon).'','title' => ''.e($title).'','wire:click' => 'sortBy(\''.e($key).'\', \''.e($next).'\')','class' => 'p-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'subtle','size' => 'xs','icon' => ''.e($icon).'','title' => ''.e($title).'','wire:click' => 'sortBy(\''.e($key).'\', \''.e($next).'\')','class' => 'p-1']); ?>
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
</th>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/reference/partials/header-sort.blade.php ENDPATH**/ ?>
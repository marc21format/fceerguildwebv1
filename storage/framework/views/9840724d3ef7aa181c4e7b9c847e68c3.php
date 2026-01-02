<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white/5 dark:bg-zinc-800 rounded p-4 flex items-center justify-between border border-neutral-200 dark:border-neutral-700" wire:key="reference-card-<?php echo e($item->getKey()); ?>">
            <div class="text-sm font-medium">
                <?php $firstField = $fields[0] ?? ['key' => 'id', 'type' => 'text']; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($firstField['type'] ?? '') === 'select'): ?>
                    <?php echo e(collect($firstField['options'] ?? [])->get(data_get($item, $firstField['key'])) ?? data_get($item, $firstField['key'])); ?>

                <?php else: ?>
                    <?php echo e(data_get($item, $firstField['key'] ?? 'id')); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="flex items-center gap-2">
                <?php echo $__env->make('livewire.reference.partials.actions-card', ['id' => $item->getKey()], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/reference/partials/cards.blade.php ENDPATH**/ ?>
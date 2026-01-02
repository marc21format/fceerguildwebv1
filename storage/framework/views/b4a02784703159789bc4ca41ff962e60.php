<div class="p-2 bg-gray-50 dark:bg-zinc-800 rounded">
    <div class="text-xs text-gray-500 mb-2">
        <?php echo e($a['created_at_human'] ?? ($a['created_at'] ?? '')); ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($a['created_at_human'])): ?> — <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> <?php echo e($a['causer_name'] ?? 'system'); ?>

    </div>

    <?php $rows = $a['rows'] ?? []; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($rows)): ?>
        <div class="overflow-auto">
            <table class="min-w-full text-sm table-auto">
                <thead class="text-left text-xs text-gray-500 dark:text-gray-300">
                    <tr>
                        <th class="px-2 py-1">Field</th>
                        <th class="px-2 py-1">Previous</th>
                        <th class="px-2 py-1">New</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-t">
                            <td class="px-2 py-1 align-top text-gray-700 dark:text-gray-200"><?php echo e($r['field'] ?? '—'); ?></td>
                            <td class="px-2 py-1 text-gray-600 dark:text-gray-300"><?php echo e(strlen((string)($r['old'] ?? '')) ? $r['old'] : '—'); ?></td>
                            <td class="px-2 py-1 text-gray-700 dark:text-gray-200"><?php echo e(strlen((string)($r['new'] ?? '')) ? $r['new'] : '—'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="mt-1 text-sm"><?php echo e($a['description'] ?? ''); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/reference/partials/activity-row.blade.php ENDPATH**/ ?>
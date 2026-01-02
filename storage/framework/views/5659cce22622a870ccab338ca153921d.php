<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isOpen): ?>
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <?php if (isset($component)) { $__componentOriginal8cc9d3143946b992b324617832699c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cc9d3143946b992b324617832699c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::modal.index','data' => ['name' => 'subject-teachers-archive','flyout' => true,'class' => 'w-11/12 max-w-2xl','wire:model' => 'isOpen','@close' => '$set(\'isOpen\', false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'subject-teachers-archive','flyout' => true,'class' => 'w-11/12 max-w-2xl','wire:model' => 'isOpen','@close' => '$set(\'isOpen\', false)']); ?>
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">Archive</h2>
                        <p class="text-sm text-gray-500">Manage soft-deleted records. Restore or permanently delete items.</p>
                    </div>

                    <div class="reference-table-container relative overflow-x-auto bg-white dark:bg-zinc-800 rounded shadow" style="overflow-y: visible;">
                        <table class="min-w-full divide-y">
                            <thead class="bg-gray-50 dark:bg-zinc-900">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">#</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">ID</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Volunteer Subject</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Deleted By</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Deleted At</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $records ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="bg-white dark:bg-zinc-800">
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e($loop->iteration); ?></td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e($item->id); ?></td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e(data_get($item, 'volunteer_subject.name') ?? '—'); ?></td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e(data_get($item, 'deleted_by.name') ?? '—'); ?></td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200"><?php echo e(data_get($item, 'deleted_at') ? \Illuminate\Support\Carbon::parse(data_get($item, 'deleted_at'))->diffForHumans() : '—'); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => '$set(\'isOpen\', false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'isOpen\', false)']); ?>Close <?php echo $__env->renderComponent(); ?>
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
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/profile/fceer/subsections/subject_teachers/modals/archive.blade.php ENDPATH**/ ?>
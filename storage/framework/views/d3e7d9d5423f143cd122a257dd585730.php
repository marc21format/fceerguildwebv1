<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isOpen): ?>
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <?php if (isset($component)) { $__componentOriginal8cc9d3143946b992b324617832699c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cc9d3143946b992b324617832699c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::modal.index','data' => ['name' => 'fceer-profiles-details','flyout' => true,'class' => 'w-11/12 max-w-2xl','wire:model' => 'isOpen','@close' => '$set(\'isOpen\', false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'fceer-profiles-details','flyout' => true,'class' => 'w-11/12 max-w-2xl','wire:model' => 'isOpen','@close' => '$set(\'isOpen\', false)']); ?>
                <div class="space-y-4">
                    <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">Details</h2>
                    <div class="mt-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item): ?>
                            <dl class="grid grid-cols-1 gap-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Id</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e($item->id); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">User</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->user)->name ?? $item->user_id ?? '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Volunteer Number</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e($item->volunteer_number ?? '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Student Number</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e($item->student_number ?? '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Batch</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->batch)->batch_no ? optional($item->batch)->batch_no . ' — ' . optional($item->batch)->year : '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Student Group</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->studentGroup)->name ?? '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Created At</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->created_at)->toDateTimeString() ?? '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Updated At</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->updated_at)->toDateTimeString() ?? '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Deleted At</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->deleted_at)->toDateTimeString() ?? '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Created By</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->createdBy)->name ?? $item->created_by_id ?? '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Updated By</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->updatedBy)->name ?? $item->updated_by_id ?? '—'); ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Deleted By</dt>
                                    <dd class="text-sm text-gray-700 dark:text-gray-200"><?php echo e(optional($item->deletedBy)->name ?? $item->deleted_by_id ?? '—'); ?></dd>
                                </div>
                            </dl>
                        <?php else: ?>
                            <p class="text-sm text-gray-500">No details available.</p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="flex justify-end">
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
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/profile/fceer/subsections/fceer_profiles/modals/details.blade.php ENDPATH**/ ?>
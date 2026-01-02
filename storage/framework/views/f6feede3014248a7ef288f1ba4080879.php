<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($open): ?>
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <?php if (isset($component)) { $__componentOriginal8cc9d3143946b992b324617832699c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cc9d3143946b992b324617832699c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::modal.index','data' => ['name' => 'reference-details-modal','flyout' => true,'class' => 'w-11/12 max-w-2xl','wire:model' => 'open','@close' => '$set(\'open\', false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'reference-details-modal','flyout' => true,'class' => 'w-11/12 max-w-2xl','wire:model' => 'open','@close' => '$set(\'open\', false)']); ?>
            <div class="space-y-6 text-gray-100">
                <div>
                    <h2 class="text-3xl font-semibold text-white">Record Details</h2>
                    <div class="mt-3 mb-4 border-b border-gray-700"></div>
                </div>

                <div class="space-y-6">
                    <section class="space-y-4">
                        <h4 class="text-base font-semibold text-gray-300">Information</h4>

                        <div class="space-y-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $key = $f['key'];
                                    if (in_array($key, ['created_at','updated_at'])) {
                                        continue;
                                    }
                                    $val = $details[$key] ?? null;
                                    $isEmpty = is_null($val) || trim((string)$val) === '' || (string)$val === '—';
                                ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! $isEmpty): ?>
                                    <div class="grid grid-cols-[140px_minmax(0,1fr)] gap-4">
                                        <div class="text-sm font-medium text-gray-500"><?php echo e($f['label'] ?? ucfirst($key)); ?></div>
                                        <div class="text-sm text-gray-100"><?php echo e($val); ?></div>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </section>

                    <section class="space-y-3">
                        <h4 class="text-base font-semibold text-gray-300">Metadata</h4>
                        <div class="space-y-2 border-t border-b border-gray-700 py-3">
                            <div class="grid grid-cols-[140px_minmax(0,1fr)] gap-4">
                                <div class="text-sm font-medium text-gray-500">Created</div>
                                <div class="text-sm text-gray-100">
                                    <?php echo e($details['_meta']['created_at_human'] ?? ($details['_meta']['created_at'] ?? '—')); ?> by <?php echo e($details['_meta']['created_by'] ?? '—'); ?>

                                </div>
                            </div>
                            <div class="grid grid-cols-[140px_minmax(0,1fr)] gap-4">
                                <div class="text-sm font-medium text-gray-500">Updated</div>
                                <div class="text-sm text-gray-100">
                                    <?php echo e($details['_meta']['updated_at_human'] ?? ($details['_meta']['updated_at'] ?? '—')); ?> by <?php echo e($details['_meta']['updated_by'] ?? '—'); ?>

                                </div>
                            </div>
                        </div>
                    </section>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($details['_meta']['activity'])): ?>
                        <section class="space-y-3">
                            <h4 class="text-base font-semibold text-gray-300">Recent changes</h4>
                            <div class="space-y-3 max-h-64 overflow-y-auto pr-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $details['_meta']['activity']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('livewire.reference.partials.activity-row', ['a' => $a], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </section>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="flex justify-end">
                    <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => '$set(\'open\', false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'open\', false)']); ?>Close <?php echo $__env->renderComponent(); ?>
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
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/reference/modal/details-modal.blade.php ENDPATH**/ ?>
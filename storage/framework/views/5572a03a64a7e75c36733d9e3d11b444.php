
<div>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showModal): ?>
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <?php if (isset($component)) { $__componentOriginal8cc9d3143946b992b324617832699c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cc9d3143946b992b324617832699c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::modal.index','data' => ['name' => 'bulk-actions','flyout' => true,'class' => 'w-11/12 max-w-md','wire:model' => 'showModal','@close' => '$wire.closeModal()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'bulk-actions','flyout' => true,'class' => 'w-11/12 max-w-md','wire:model' => 'showModal','@close' => '$wire.closeModal()']); ?>
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Bulk Actions</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1"><?php echo e(count($selectedIds)); ?> <?php echo e($type); ?> selected</p>
                        <div class="mt-3 mb-4 border-b border-gray-200 dark:border-zinc-700"></div>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$showConfirmation): ?>
                        <div class="space-y-6">
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type === 'students'): ?>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Session</label>
                                    <div class="grid grid-cols-3 gap-2 p-1 bg-gray-100 dark:bg-zinc-800 rounded-lg">
                                        <button 
                                            type="button"
                                            wire:click="$set('session', 'am')"
                                            class="px-3 py-2 rounded-md text-sm font-medium transition <?php echo e($session === 'am' ? 'bg-white dark:bg-zinc-700 text-gray-900 dark:text-white shadow' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'); ?>"
                                        >
                                            AM
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="$set('session', 'pm')"
                                            class="px-3 py-2 rounded-md text-sm font-medium transition <?php echo e($session === 'pm' ? 'bg-white dark:bg-zinc-700 text-gray-900 dark:text-white shadow' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'); ?>"
                                        >
                                            PM
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="$set('session', 'both')"
                                            class="px-3 py-2 rounded-md text-sm font-medium transition <?php echo e($session === 'both' ? 'bg-white dark:bg-zinc-700 text-gray-900 dark:text-white shadow' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'); ?>"
                                        >
                                            Both
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-3">Set Status</label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <button 
                                            type="button"
                                            wire:click="prepareSetStatus('On Time')"
                                            class="px-4 py-3 rounded-lg border border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300 font-medium text-sm hover:bg-green-100 dark:hover:bg-green-900/50 transition flex items-center justify-center gap-2"
                                        >
                                            <i class="fa fa-check-circle"></i> On Time
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="prepareSetStatus('Late')"
                                            class="px-4 py-3 rounded-lg border border-yellow-200 dark:border-yellow-800 bg-yellow-50 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 font-medium text-sm hover:bg-yellow-100 dark:hover:bg-yellow-900/50 transition flex items-center justify-center gap-2"
                                        >
                                            <i class="fa fa-clock-o"></i> Late
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="prepareSetStatus('Excused')"
                                            class="px-4 py-3 rounded-lg border border-blue-200 dark:border-blue-800 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 font-medium text-sm hover:bg-blue-100 dark:hover:bg-blue-900/50 transition flex items-center justify-center gap-2"
                                        >
                                            <i class="fa fa-envelope"></i> Excused
                                        </button>
                                        <button 
                                            type="button"
                                            wire:click="prepareSetStatus('Absent')"
                                            class="px-4 py-3 rounded-lg border border-red-200 dark:border-red-800 bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300 font-medium text-sm hover:bg-red-100 dark:hover:bg-red-900/50 transition flex items-center justify-center gap-2"
                                        >
                                            <i class="fa fa-times-circle"></i> Absent
                                        </button>
                                    </div>
                                </div>

                                
                                <div class="border-t border-gray-200 dark:border-zinc-700 pt-4 space-y-4">
                                    <div x-data="{ timeIn: <?php if ((object) ('bulkTimeIn') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('bulkTimeIn'->value()); ?>')<?php echo e('bulkTimeIn'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('bulkTimeIn'); ?>')<?php endif; ?>.live }">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Set Time In</label>
                                        <div class="flex gap-2">
                                            <input 
                                                type="time" 
                                                x-model="timeIn"
                                                class="flex-1 rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 px-3 py-2.5 text-sm focus:border-gray-400 focus:ring-gray-400"
                                            >
                                            <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => 'prepareSetTimeIn','xBind:disabled' => '!timeIn']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'prepareSetTimeIn','x-bind:disabled' => '!timeIn']); ?>Apply <?php echo $__env->renderComponent(); ?>
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
                                </div>
                            <?php else: ?>
                                
                                <div class="space-y-4" x-data="{ timeIn: <?php if ((object) ('bulkTimeIn') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('bulkTimeIn'->value()); ?>')<?php echo e('bulkTimeIn'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('bulkTimeIn'); ?>')<?php endif; ?>.live, timeOut: <?php if ((object) ('bulkTimeOut') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('bulkTimeOut'->value()); ?>')<?php echo e('bulkTimeOut'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('bulkTimeOut'); ?>')<?php endif; ?>.live }">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Set Time In</label>
                                        <div class="flex gap-2">
                                            <input 
                                                type="time" 
                                                x-model="timeIn"
                                                class="flex-1 rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 px-3 py-2.5 text-sm focus:border-gray-400 focus:ring-gray-400"
                                            >
                                            <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => 'prepareSetTimeIn','xBind:disabled' => '!timeIn']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'prepareSetTimeIn','x-bind:disabled' => '!timeIn']); ?>Apply <?php echo $__env->renderComponent(); ?>
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

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Set Time Out</label>
                                        <div class="flex gap-2">
                                            <input 
                                                type="time" 
                                                x-model="timeOut"
                                                class="flex-1 rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 px-3 py-2.5 text-sm focus:border-gray-400 focus:ring-gray-400"
                                            >
                                            <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => 'prepareSetTimeOut','xBind:disabled' => '!timeOut']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'prepareSetTimeOut','x-bind:disabled' => '!timeOut']); ?>Apply <?php echo $__env->renderComponent(); ?>
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
                                </div>

                                <div class="border-t border-gray-200 dark:border-zinc-700 pt-4">
                                    <button 
                                        type="button"
                                        wire:click="prepareMarkAllAbsent"
                                        class="w-full px-4 py-3 rounded-lg border border-red-200 dark:border-red-800 bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300 font-medium text-sm hover:bg-red-100 dark:hover:bg-red-900/50 transition flex items-center justify-center gap-2"
                                    >
                                        <i class="fa fa-times-circle"></i> Mark All as Absent
                                    </button>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200 dark:border-zinc-700">
                            <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => 'clearSelection']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'clearSelection']); ?>Clear Selection <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => 'closeModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'closeModal']); ?>Cancel <?php echo $__env->renderComponent(); ?>
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
                    <?php else: ?>
                        
                        <div class="py-4">
                            <div class="text-center">
                                <div class="mx-auto w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center mb-4">
                                    <i class="fa fa-exclamation-triangle text-amber-600 dark:text-amber-400 text-xl"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Confirm Action</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <?php echo e($confirmationMessage); ?>

                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200 dark:border-zinc-700">
                            <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => 'cancelConfirmation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'cancelConfirmation']); ?>Back <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => 'confirmAction','variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'confirmAction','variant' => 'primary']); ?>Confirm <?php echo $__env->renderComponent(); ?>
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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/attendance/bulk-actions.blade.php ENDPATH**/ ?>
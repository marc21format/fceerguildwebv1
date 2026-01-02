<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isOpen): ?>
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <?php if (isset($component)) { $__componentOriginal8cc9d3143946b992b324617832699c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cc9d3143946b992b324617832699c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::modal.index','data' => ['name' => 'professional-credentials-form','flyout' => true,'class' => 'w-11/12 max-w-2xl','wire:model' => 'isOpen','@close' => '$set(\'isOpen\', false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'professional-credentials-form','flyout' => true,'class' => 'w-11/12 max-w-2xl','wire:model' => 'isOpen','@close' => '$set(\'isOpen\', false)']); ?>
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white"><?php echo e($itemId ? 'Edit' : 'Create'); ?> Professional Credential</h2>
                        <div class="mt-3 mb-4 border-b border-gray-200 dark:border-zinc-700"></div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $key = $f['key'] ?? '';
                                // Use explicit headings for prefix/suffix and custom notes label
                                if ($key === 'prefix_id') {
                                    $labelText = 'Prefix';
                                } elseif ($key === 'suffix_id') {
                                    $labelText = 'Suffix';
                                } elseif ($key === 'notes') {
                                    $labelText = 'Notes on Title';
                                } else {
                                    $labelText = $f['label'] ?? ucwords(str_replace('_',' ',$key));
                                }

                                $showConditional = true;
                                // Only show issued_on and notes when a prefix or suffix is selected
                                if (in_array($key, ['issued_on', 'notes'])) {
                                    $showConditional = ! empty($state['prefix_id'] ?? null) || ! empty($state['suffix_id'] ?? null);
                                }
                            ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showConditional): ?>
                                <div>
                                    <label class="block text-base font-bold text-gray-700 dark:text-gray-100"><?php echo e($labelText); ?></label>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($f['type'] ?? '') === 'select'): ?>
                                        <?php $opts = $options[$f['key']] ?? []; $sel = $state[$f['key']] ?? null; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($f['key'], ['prefix_id','suffix_id'])): ?>
                                            <?php echo $__env->make('livewire.components.searchable-select', ['name' => $f['key'], 'options' => $options[$f['key']] ?? [], 'selected' => $state[$f['key']] ?? '', 'placeholder' => 'Select'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        <?php else: ?>
                                            <?php $selLabel = $opts[$sel] ?? 'Select'; ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($f['key'] === 'field_of_work_id'): ?>
                                                <?php echo $__env->make('livewire.components.searchable-select', ['name' => $f['key'], 'options' => $options[$f['key']] ?? [], 'selected' => $state[$f['key']] ?? '', 'placeholder' => 'Select'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            <?php else: ?>
                                                <div x-data="{ open: false }" class="relative">
                                                    <button type="button" @click="open = !open" class="mt-1 w-full text-left rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-700 dark:text-gray-100 px-3 py-3 text-sm flex items-center justify-between">
                                                        <span><?php echo e($selLabel); ?></span>
                                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                                    </button>

                                                        <div x-show="open" x-cloak @click.outside="open = false" class="absolute z-50 mt-1 w-full bg-white dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 rounded shadow-lg">
                                                            <ul class="max-h-56 overflow-auto">
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $opts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li wire:click.prevent="setField('<?php echo e($f['key']); ?>','<?php echo e($val); ?>')" @click="open = false" class="px-3 py-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-600 text-sm text-gray-900 dark:text-gray-100"><?php echo e($label); ?></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                            </ul>
                                                        </div>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php elseif(($f['type'] ?? '') === 'textarea'): ?>
                                        <textarea wire:model.defer="state.<?php echo e($f['key']); ?>" rows="3" class="mt-1 block w-full rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 px-3 py-3 text-sm"></textarea>
                                    <?php elseif(($f['type'] ?? '') === 'checkbox'): ?>
                                        <div class="mt-2">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" wire:model.defer="state.<?php echo e($f['key']); ?>" class="form-checkbox" />
                                                <span class="ml-2"><?php echo e($labelText); ?></span>
                                            </label>
                                        </div>
                                        <?php else: ?>
                                        <input wire:model.defer="state.<?php echo e($f['key']); ?>" type="<?php echo e($f['type'] ?? 'text'); ?>" class="mt-1 block w-full rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 px-3 py-3 text-sm" />
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => 'save','variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'save','variant' => 'primary']); ?>Save <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => '$set(\'isOpen\', false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'isOpen\', false)']); ?>Cancel <?php echo $__env->renderComponent(); ?>
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
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/profile/credentials/modals/professional_credentials.blade.php ENDPATH**/ ?>
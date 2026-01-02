<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $key = $field['key'];
    ?>
    <div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($field['type'] ?? 'text', ['text','string'])): ?>
            <label class="block text-base font-medium text-gray-700 dark:text-gray-100"><?php echo e(__($field['label'] ?? ucfirst($key))); ?></label>
            <input wire:model.defer="state.<?php echo e($key); ?>" type="text" class="mt-1 block w-full rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-zinc-500 px-3 py-3 text-sm" />
        <?php elseif(($field['type'] ?? '') === 'textarea'): ?>
            <label class="block text-base font-medium text-gray-700 dark:text-gray-100"><?php echo e($field['label'] ?? ucfirst($key)); ?></label>
            <textarea wire:model.defer="state.<?php echo e($key); ?>" rows="3" class="mt-1 block w-full rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-zinc-500 px-3 py-3 text-sm"></textarea>
        <?php elseif(in_array($field['type'] ?? '', ['select', 'searchable-select'])): ?>
                <?php
                    // Prefer resolved options passed in via $options (set by the modal component).
                    // Fallback to $field['options'] only when it's an array.
                    $selectOptions = [];
                    if (isset($options) && is_array($options) && isset($options[$key]) && (is_array($options[$key]) || $options[$key] instanceof \Illuminate\Support\Collection)) {
                        $selectOptions = (array) $options[$key];
                    } elseif (isset($field['options']) && is_array($field['options'])) {
                        $selectOptions = $field['options'];
                    }
                ?>
            <label class="block text-base font-medium text-gray-700 dark:text-gray-100"><?php echo e(__($field['label'] ?? ucfirst($key))); ?></label>
            <?php echo $__env->make('livewire.components.searchable-select', [
                'name' => $key,
                'options' => $selectOptions,
                'selected' => $state[$key] ?? '',
                'placeholder' => 'Select',
            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php elseif(($field['type'] ?? '') === 'boolean'): ?>
            <label class="inline-flex items-center">
                <input type="checkbox" wire:model.defer="state.<?php echo e($key); ?>" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                <span class="ml-2 text-base font-medium text-gray-700 dark:text-gray-100"><?php echo e($field['label'] ?? ucfirst($key)); ?></span>
            </label>
        <?php elseif(($field['type'] ?? '') === 'number'): ?>
            <label class="block text-base font-medium text-gray-700 dark:text-gray-100"><?php echo e(__($field['label'] ?? ucfirst($key))); ?></label>
            <input wire:model.defer="state.<?php echo e($key); ?>" type="number" class="mt-1 block w-full rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-zinc-500 px-3 py-3 text-sm" />
        <?php else: ?>
            <label class="block text-base font-medium text-gray-700 dark:text-gray-100"><?php echo e(__($field['label'] ?? ucfirst($key))); ?></label>
            <input wire:model.defer="state.<?php echo e($key); ?>" type="text" class="mt-1 block w-full rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-zinc-500 px-3 py-3 text-sm" />
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['state.'.$key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-sm text-red-600"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/reference/modal/_form-fields.blade.php ENDPATH**/ ?>
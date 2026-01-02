<div class="flex flex-col gap-3 mb-3">
    <div class="w-full">
        <?php echo $__env->make('livewire.reference.partials.toolbar-search', [
            'search' => $search ?? '',
            'perPage' => $perPage ?? 15,
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <div class="w-full">
        <?php echo $__env->make('livewire.reference.partials.toolbar-actions', [
            'modelClass' => $modelClass ?? null,
            'configKey' => $configKey ?? null,
            'fields' => $fields ?? [],
            'visibleFields' => $visibleFields ?? [],
            'filters' => $filters ?? [],
            'search' => $search ?? '',
            'perPage' => $perPage ?? 15,
            'view' => $view ?? 'rows',
            'selected' => $selected ?? [],
            'sort' => $sort ?? 'id',
            'direction' => $direction ?? 'desc',
            'readOnly' => $readOnly ?? false,
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div><?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/reference/reference-toolbar.blade.php ENDPATH**/ ?>
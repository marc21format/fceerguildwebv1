<div>
<div class="profile-section">
    <div class="profile-section-header">
        <div class="flex items-center gap-3">
            <div class="inline-flex items-center gap-2">
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'user','class' => 'w-5 h-5 text-gray-700 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'user','class' => 'w-5 h-5 text-gray-700 dark:text-gray-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
                <div class="profile-card-title">Personal Information</div>
            </div>

            <div class="ml-4 inline-flex items-center rounded-md overflow-hidden border">
                <button type="button" wire:click.prevent="toggleView('table')"
                    class="px-2 py-1 text-sm transition inline-flex items-center justify-center rounded-l-md focus:outline-none <?php echo e($viewMode === 'table' ? 'bg-gray-100 text-gray-900 shadow ring-1 ring-gray-200 dark:bg-zinc-700 dark:text-white' : 'bg-white dark:bg-zinc-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
                    aria-label="Table view">
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'list','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'list','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
                </button>
                <button type="button" wire:click.prevent="toggleView('cards')"
                    class="px-2 py-1 text-sm transition inline-flex items-center justify-center rounded-r-md focus:outline-none <?php echo e($viewMode === 'cards' ? 'bg-gray-100 text-gray-900 shadow ring-1 ring-gray-200 dark:bg-zinc-700 dark:text-white' : 'bg-white dark:bg-zinc-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
                    aria-label="Card view">
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'gallery-vertical-end','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'gallery-vertical-end','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
                </button>
            </div>
        </div>

        <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['size' => 'xs','tone' => 'neutral','class' => 'w-7 h-7 flex items-center justify-center text-sm','wire:click.prevent' => 'openEdit','type' => 'button','title' => 'Edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','tone' => 'neutral','class' => 'w-7 h-7 flex items-center justify-center text-sm','wire:click.prevent' => 'openEdit','type' => 'button','title' => 'Edit']); ?>
            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'pencil']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'pencil']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
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

    <?php if (! $__env->hasRenderedOnce('fe85a6b5-b565-43f7-b436-5ea65d89ce93')): $__env->markAsRenderedOnce('fe85a6b5-b565-43f7-b436-5ea65d89ce93'); ?>
        <link rel="stylesheet" href="/css/reference-table.css">
        <script src="/js/reference-table.js" defer></script>
    <?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($viewMode === 'table'): ?>
        <div class="reference-table-container relative overflow-x-auto bg-white dark:bg-zinc-800 rounded shadow" style="overflow-y: visible;">
            <table class="min-w-full divide-y">
                <thead class="bg-gray-50 dark:bg-zinc-900">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Field</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Value</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <tr class="bg-white dark:bg-zinc-800">
                        <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">First Name</td>
                        <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($first_name ?? '—'); ?></td>
                    </tr>
                    <tr class="bg-white dark:bg-zinc-800">
                        <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Middle Name</td>
                        <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($middle_name ?? '—'); ?></td>
                    </tr>
                    <tr class="bg-white dark:bg-zinc-800">
                        <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Suffix Name</td>
                        <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($suffix_name ?? '—'); ?></td>
                    </tr>
                    <tr class="bg-white dark:bg-zinc-800">
                        <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Lived Name</td>
                        <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($lived_name ?? '—'); ?></td>
                    </tr>
                    <tr class="bg-white dark:bg-zinc-800">
                        <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Generational Suffix</td>
                        <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($generational_suffix ?? '—'); ?></td>
                    </tr>
                    <tr class="bg-white dark:bg-zinc-800">
                        <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</td>
                        <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($phone_number ?? '—'); ?></td>
                    </tr>
                    <tr class="bg-white dark:bg-zinc-800">
                        <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Birthday</td>
                        <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($birthday ?? '—'); ?></td>
                    </tr>
                    <tr class="bg-white dark:bg-zinc-800">
                        <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Sex</td>
                        <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($sex)): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sex === 'M'): ?> Male
                                <?php elseif($sex === 'F'): ?> Female
                                <?php else: ?> Other
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php else: ?>
                                —
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-zinc-800">
                        <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Address ID</td>
                        <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($address_id ?? '—'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                <dt class="profile-details-label">First Name</dt>
                <dd class="profile-details-value mt-1"><?php echo e($first_name ?? '—'); ?></dd>
            </div>

            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                <dt class="profile-details-label">Middle Name</dt>
                <dd class="profile-details-value mt-1"><?php echo e($middle_name ?? '—'); ?></dd>
            </div>

            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                <dt class="profile-details-label">Suffix Name</dt>
                <dd class="profile-details-value mt-1"><?php echo e($suffix_name ?? '—'); ?></dd>
            </div>

            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                <dt class="profile-details-label">Lived Name</dt>
                <dd class="profile-details-value mt-1"><?php echo e($lived_name ?? '—'); ?></dd>
            </div>

            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                <dt class="profile-details-label">Generational Suffix</dt>
                <dd class="profile-details-value mt-1"><?php echo e($generational_suffix ?? '—'); ?></dd>
            </div>

            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                <dt class="profile-details-label">Phone Number</dt>
                <dd class="profile-details-value mt-1"><?php echo e($phone_number ?? '—'); ?></dd>
            </div>

            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                <dt class="profile-details-label">Birthday</dt>
                <dd class="profile-details-value mt-1"><?php echo e($birthday ?? '—'); ?></dd>
            </div>

            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                <dt class="profile-details-label">Sex</dt>
                <dd class="profile-details-value mt-1">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($sex)): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sex === 'M'): ?> Male
                        <?php elseif($sex === 'F'): ?> Female
                        <?php else: ?> Other
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                        —
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </dd>
            </div>

            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                <dt class="profile-details-label">Address ID</dt>
                <dd class="profile-details-value mt-1"><?php echo e($address_id ?? '—'); ?></dd>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.personal-form-modal', []);

$key = 'personal-form-modal-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2724024057-0', 'personal-form-modal-'.$user->id);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/profile/personal/personal-records.blade.php ENDPATH**/ ?>
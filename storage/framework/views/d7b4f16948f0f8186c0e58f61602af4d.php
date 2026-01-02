<div class="profile-section">
    <div class="profile-section-header">
        <div class="flex items-center gap-3">
            <div class="inline-flex items-center gap-2">
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'phone','class' => 'w-5 h-5 text-gray-700 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'phone','class' => 'w-5 h-5 text-gray-700 dark:text-gray-300']); ?>
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
                <div class="profile-card-title">Contact Details</div>
            </div>

            <div class="ml-4 inline-flex items-center rounded-md overflow-hidden border">
                <button type="button" wire:click.prevent="setView('table')"
                    class="px-2 py-1 text-sm transition inline-flex items-center justify-center rounded-l-md focus:outline-none <?php echo e($view === 'table' ? 'bg-gray-100 text-gray-900 shadow ring-1 ring-gray-200 dark:bg-zinc-700 dark:text-white' : 'bg-white dark:bg-zinc-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
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
                <button type="button" wire:click.prevent="setView('cards')"
                    class="px-2 py-1 text-sm transition inline-flex items-center justify-center rounded-r-md focus:outline-none <?php echo e($view === 'cards' ? 'bg-gray-100 text-gray-900 shadow ring-1 ring-gray-200 dark:bg-zinc-700 dark:text-white' : 'bg-white dark:bg-zinc-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
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

        <?php
            $canManage = Gate::allows('managePersonal', $user);
        ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canManage): ?>
            <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['size' => 'xs','tone' => 'neutral','class' => 'w-7 h-7 flex items-center justify-center text-sm','wire:click.prevent' => 'edit','type' => 'button','title' => 'Edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','tone' => 'neutral','class' => 'w-7 h-7 flex items-center justify-center text-sm','wire:click.prevent' => 'edit','type' => 'button','title' => 'Edit']); ?>
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
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <?php if (! $__env->hasRenderedOnce('24fd6f4f-0db9-4c84-bfa6-912ff5eb1368')): $__env->markAsRenderedOnce('24fd6f4f-0db9-4c84-bfa6-912ff5eb1368'); ?>
        <link rel="stylesheet" href="/css/reference-table.css">
        <script src="/js/reference-table.js" defer></script>
    <?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($view === 'table'): ?>
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
                            <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</td>
                            <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e(optional($profile)->phone_number ?? '—'); ?></td>
                        </tr>
                        <tr class="bg-white dark:bg-zinc-800">
                            <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</td>
                            <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($user->email ?? '—'); ?></td>
                        </tr>
                        <tr class="bg-white dark:bg-zinc-800">
                            <td class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Facebook Link</td>
                            <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(optional($profile)->facebook_link): ?>
                                    <a href="<?php echo e($profile->facebook_link); ?>" target="_blank" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300"><?php echo e($profile->facebook_link); ?></a>
                                <?php else: ?>
                                    —
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                    <dt class="profile-details-label">Phone Number</dt>
                    <dd class="profile-details-value mt-1"><?php echo e(optional($profile)->phone_number ?? '—'); ?></dd>
                </div>

                <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                    <dt class="profile-details-label">Email</dt>
                    <dd class="profile-details-value mt-1"><?php echo e($user->email ?? '—'); ?></dd>
                </div>

                <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4">
                    <dt class="profile-details-label">Facebook Link</dt>
                    <dd class="profile-details-value mt-1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(optional($profile)->facebook_link): ?>
                            <a href="<?php echo e($profile->facebook_link); ?>" target="_blank" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300"><?php echo e($profile->facebook_link); ?></a>
                        <?php else: ?>
                            —
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </dd>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.personal.subsections.contact-details.contact-details-form-modal', ['instanceKey' => 'App\\Models\\UserProfile']);

$key = 'contact-details-form-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3175981250-0', 'contact-details-form-'.$user->id);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.personal.subsections.contact-details.contact-details-confirm-modal', []);

$key = 'contact-details-confirm-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3175981250-1', 'contact-details-confirm-'.$user->id);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/profile/personal/subsections/contact_details/index.blade.php ENDPATH**/ ?>
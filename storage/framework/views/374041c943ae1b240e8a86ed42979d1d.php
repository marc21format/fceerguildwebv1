<?php
    $sections = [
        'account' => 'Account',
        'fceer' => 'FCEER Records',
        'personal' => 'Personal Records',
        'credentials' => 'Credentials',
    ];
?>

<div class="flex gap-8">
    <!-- Sidebar Navigation + Avatar -->
    <div class="w-64 sticky top-25 self-start">
        <div class="mb-6 flex flex-col items-center px-6 text-center">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentPicture && $currentPicture->attachment): ?>
                <div class="w-20 h-20 aspect-square flex-none rounded-full bg-white p-0 overflow-hidden flex items-center justify-center ring-2 ring-gray-200 shadow-sm">
                    <img src="<?php echo e(asset('storage/' . $currentPicture->attachment->path)); ?>" 
                         alt="<?php echo e($user->name); ?>" 
                         class="w-full h-full object-cover">
                </div>
            <?php else: ?>
                <div class="w-20 h-20 aspect-square flex-none rounded-full bg-white p-0 overflow-hidden flex items-center justify-center text-gray-900 text-2xl font-semibold ring-2 ring-gray-200 shadow-sm">
                    <?php echo e($user->initials()); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="mt-3 profile-value font-medium"><?php echo e($user->name ?? $user->email); ?></div>
            <?php
                $roleText = '';
                if (method_exists($user, 'getRoleNames')) {
                    $roles = $user->getRoleNames();
                    if (is_iterable($roles)) {
                        $names = [];
                        foreach ($roles as $r) {
                            if (is_string($r)) {
                                $names[] = $r;
                            } elseif (is_object($r) && isset($r->name)) {
                                $names[] = $r->name;
                            } elseif (is_array($r) && isset($r['name'])) {
                                $names[] = $r['name'];
                            } else {
                                $names[] = (string) $r;
                            }
                        }
                        $roleText = implode(', ', $names);
                    } else {
                        $roleText = (string) $roles;
                    }
                } elseif (isset($user->role)) {
                    if (is_string($user->role)) {
                        $roleText = $user->role;
                    } elseif (is_object($user->role) && isset($user->role->name)) {
                        $roleText = $user->role->name;
                    } elseif (is_array($user->role) && isset($user->role['name'])) {
                        $roleText = $user->role['name'];
                    } else {
                        $roleText = (string) $user->role;
                    }
                }
            ?>
            <div class="mt-1 text-sm profile-label"><?php echo e($roleText); ?></div>
        </div>

        <nav class="profile-sidebar-nav">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('profile.show.section', ['user' => $user->id, 'section' => $key])); ?>"
                   class="profile-sidebar-btn <?php echo e($active === $key ? 'profile-sidebar-btn--active' : 'profile-sidebar-btn--inactive'); ?>">
                    <?php echo e($label); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($active === 'personal'): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.personal-records', ['user' => $user]);

$key = 'personal-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1133016923-0', 'personal-'.$user->id);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php elseif($active === 'account'): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.account-records', ['user' => $user]);

$key = 'account-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1133016923-1', 'account-'.$user->id);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php elseif($active === 'credentials'): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.credentials', ['user' => $user]);

$key = 'credentials-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1133016923-2', 'credentials-'.$user->id);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php elseif($active === 'fceer'): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.fceer-records', ['user' => $user]);

$key = 'fceer-'.$user->id;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1133016923-3', 'fceer-'.$user->id);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div><?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/profile/show.blade.php ENDPATH**/ ?>
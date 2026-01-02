
<div class="overflow-x-auto">
    <table class="w-full text-left text-sm">
        <thead class="sticky top-0 bg-gray-50 dark:bg-zinc-700/50 border-b-2 border-gray-200 dark:border-zinc-600">
            <tr>
                <th colspan="<?php echo e(count($weekendDates) + 1); ?>" class="py-4 px-4">
                    <div class="flex items-center justify-between">
                        <button type="button" wire:click="prevMatrixMonth" class="p-1 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition">
                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'chevron-left','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'chevron-left','class' => 'w-5 h-5']); ?>
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
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">
                            <?php echo e(\Carbon\Carbon::create($matrixYear ?? now()->year, $matrixMonth ?? now()->month, 1)->format('F Y')); ?>

                        </span>
                        <button type="button" wire:click="nextMatrixMonth" class="p-1 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition">
                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'chevron-right','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'chevron-right','class' => 'w-5 h-5']); ?>
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
                </th>
            </tr>
            <tr>
                <th class="py-3 px-4 text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider whitespace-nowrap border-r border-gray-200 dark:border-zinc-600">
                    Student
                </th>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $weekendDates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateStr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $dateCarbon = \Carbon\Carbon::parse($dateStr);
                        $isWithinSeason = !$reviewSeason || $reviewSeason->isValidAttendanceDate($dateStr);
                    ?>
                    <th class="py-3 px-3 text-center <?php echo e(!$isWithinSeason ? 'opacity-40' : ''); ?>">
                        <div class="text-xs font-semibold text-gray-900 dark:text-white"><?php echo e($dateCarbon->format('M j')); ?></div>
                        <div class="text-xs text-gray-500 dark:text-gray-400"><?php echo e($dateCarbon->format('D')); ?></div>
                    </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-zinc-700">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $profilesByRoom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomId => $profiles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                
                <tr class="bg-indigo-50 dark:bg-indigo-900/20">
                    <td colspan="<?php echo e(count($weekendDates) + 1); ?>" class="py-2 px-4">
                        <div class="flex items-center gap-2">
                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'home','class' => 'w-4 h-4 text-indigo-600 dark:text-indigo-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'home','class' => 'w-4 h-4 text-indigo-600 dark:text-indigo-400']); ?>
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
                            <span class="text-sm font-semibold text-indigo-900 dark:text-indigo-300">
                                <?php echo e($rooms[$roomId]->name ?? 'Unknown Room'); ?>

                            </span>
                            <span class="text-xs text-indigo-600 dark:text-indigo-400">
                                (<?php echo e($profiles->count()); ?> <?php echo e(\Illuminate\Support\Str::plural('student', $profiles->count())); ?>)
                            </span>
                        </div>
                    </td>
                </tr>
                
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $user = $profile->user;
                        if (!$user) continue;
                    ?>
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700/30 transition">
                        <td class="py-3 px-4 border-r border-gray-200 dark:border-zinc-600 bg-white dark:bg-zinc-800">
                            <div>
                                <div class="font-medium text-gray-900 dark:text-white"><?php echo e($user->name ?? 'Unknown'); ?></div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    <?php echo e($profile->student_number ?? ''); ?>

                                </div>
                            </div>
                        </td>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $weekendDates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateStr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $isWithinSeason = !$reviewSeason || $reviewSeason->isValidAttendanceDate($dateStr);
                                $record = $user->attendanceRecords
                                    ->where('date', $dateStr)
                                    ->where('session', $session)
                                    ->first();
                                
                                $status = $record?->studentStatus?->name ?? 'Absent';
                                if (!$isWithinSeason) {
                                    $status = 'N/A';
                                }
                                
                                $cellBg = match(strtolower($status)) {
                                    'on time' => 'bg-green-50 dark:bg-green-900/20',
                                    'late' => 'bg-yellow-50 dark:bg-yellow-900/20',
                                    'excused' => 'bg-blue-50 dark:bg-blue-900/20',
                                    'n/a' => 'bg-gray-100 dark:bg-zinc-900',
                                    default => 'bg-red-50 dark:bg-red-900/20',
                                };
                                
                                $cellText = match(strtolower($status)) {
                                    'on time' => 'text-green-700 dark:text-green-400',
                                    'late' => 'text-yellow-700 dark:text-yellow-400',
                                    'excused' => 'text-blue-700 dark:text-blue-400',
                                    'n/a' => 'text-gray-400 dark:text-gray-600',
                                    default => 'text-red-700 dark:text-red-400',
                                };
                                
                                $cellSymbol = match(strtolower($status)) {
                                    'on time' => '✓',
                                    'late' => '⏰',
                                    'excused' => '📝',
                                    'n/a' => '—',
                                    default => '✗',
                                };
                            ?>
                            <td class="py-3 px-3 text-center <?php echo e($cellBg); ?> <?php echo e($cellText); ?>">
                                <span class="text-lg" title="<?php echo e($status); ?>"><?php echo e($cellSymbol); ?></span>
                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="<?php echo e(count($weekendDates) + 1); ?>" class="py-12 text-center text-gray-500 dark:text-gray-400">
                        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'academic-cap','class' => 'w-12 h-12 mx-auto mb-2 opacity-30']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'academic-cap','class' => 'w-12 h-12 mx-auto mb-2 opacity-30']); ?>
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
                        <p>No students found with the current filters.</p>
                    </td>
                </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/attendance/partials/students-monthly.blade.php ENDPATH**/ ?>

<div class="space-y-6"
    x-data="{ 
        init() {
            if (!Alpine.store('volunteerRowHover')) {
                Alpine.store('volunteerRowHover', { hovered: null });
            }
        }
    }">
    

    
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'hand-raised','class' => 'w-7 h-7 text-gray-500 dark:text-gray-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'hand-raised','class' => 'w-7 h-7 text-gray-500 dark:text-gray-400']); ?>
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
                Volunteer Attendance
            </h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($monthlyView): ?>
                    <?php echo e(\Carbon\Carbon::create($matrixYear, $matrixMonth, 1)->format('F Y')); ?>

                <?php else: ?>
                    <?php echo e(\Carbon\Carbon::parse($date)->format('F j, Y')); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>
        </div>
        <div class="flex items-center gap-2">
            
            <button type="button" wire:click="toggleMonthlyView"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($monthlyView): ?>
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'calendar','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'calendar','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?> Daily
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'calendar-days','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'calendar-days','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?> Monthly
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </button>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('export', App\Models\AttendanceRecord::class)): ?>
            <button type="button" wire:click="openExportModal"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition">
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'arrow-down-tray','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'arrow-down-tray','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?> Export
            </button>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageReviewSeason', App\Models\AttendanceRecord::class)): ?>
            <button type="button" wire:click="openReviewSeasonModal"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition">
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'cog-6-tooth','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'cog-6-tooth','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?> Review Season
            </button>
            <?php endif; ?>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($reviewSeason): ?>
    <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50 dark:bg-zinc-700/50 border border-gray-200 dark:border-zinc-600">
        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'calendar-date-range','class' => 'w-5 h-5 text-gray-500 dark:text-gray-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'calendar-date-range','class' => 'w-5 h-5 text-gray-500 dark:text-gray-400']); ?>
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
        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
            Review Season: <?php echo e($reviewSeason->range_label); ?>

        </span>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="p-4 bg-white dark:bg-zinc-800 rounded-xl border border-gray-200 dark:border-zinc-700">
        <form wire:submit.prevent="applyFilters" class="flex flex-wrap items-end gap-4">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Committee</label>
                <select wire:model.defer="committeeFilter"
                    class="w-full rounded-lg border border-gray-200 dark:border-zinc-600 bg-white dark:bg-zinc-700 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:focus:border-indigo-400">
                    <option value="">All Committees</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $allCommittees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $committee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($committee->id); ?>"><?php echo e($committee->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </div>
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Position</label>
                <select wire:model.defer="positionFilter"
                    class="w-full rounded-lg border border-gray-200 dark:border-zinc-600 bg-white dark:bg-zinc-700 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:focus:border-indigo-400">
                    <option value="">All Positions</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $allPositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($position->id); ?>"><?php echo e($position->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </div>
            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-gray-800 dark:bg-zinc-600 hover:bg-gray-700 dark:hover:bg-zinc-500 rounded-lg transition">
                Apply Filter
            </button>
        </form>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_320px] gap-6">
        
        <div class="bg-white dark:bg-zinc-800 rounded-xl border border-gray-200 dark:border-zinc-700 overflow-hidden">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$monthlyView): ?>
                
                <?php
                    $selectedDateCarbon = \Carbon\Carbon::parse($date ?? now()->toDateString());
                    $isWeekend = $selectedDateCarbon->isSaturday() || $selectedDateCarbon->isSunday();
                    $isWithinSeason = !$reviewSeason || $reviewSeason->isValidAttendanceDate($selectedDateCarbon);
                    $showAsNA = !$isWeekend || !$isWithinSeason;
                ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showAsNA): ?>
                <div class="p-4 bg-gray-50 dark:bg-zinc-700/50 border-b border-gray-200 dark:border-zinc-600">
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'information-circle','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'information-circle','class' => 'w-5 h-5']); ?>
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
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isWeekend): ?>
                            This date is a weekday. Review sessions are only on weekends.
                        <?php else: ?>
                            This date is outside the current review season.
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="overflow-x-auto attendance-table-container">
                    <table class="w-full text-left text-sm attendance-table">
                        <thead class="bg-gray-50 dark:bg-zinc-700/50 border-b border-gray-200 dark:border-zinc-600">
                            <tr class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                <th class="py-3 px-4 w-12 text-center">
                                    <span class="text-sm text-gray-400">#</span>
                                </th>
                                <th class="py-3 px-4">Name</th>
                                <th class="py-3 px-4">Committee</th>
                                <th class="py-3 px-4">Position</th>
                                <th class="py-3 px-4">Time In</th>
                                <th class="py-3 px-4">Time Out</th>
                                <th class="py-3 px-4">Duration</th>
                                <th class="py-3 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-zinc-700">
                            <?php $globalIndex = 0; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $membershipsByCommittee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $committeeId => $memberships): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $user = $membership->user;
                                        $userId = $user?->id;
                                        $attendance = $user?->attendanceRecords->first();
                                        $isEditing = isset($editingRow[$userId]);
                                        
                                        // Calculate duration
                                        $timeIn = $attendance?->time_in;
                                        $timeOut = $attendance?->time_out;
                                        $duration = null;
                                        if ($timeIn && $timeOut) {
                                            $in = \Carbon\Carbon::parse($timeIn);
                                            $out = \Carbon\Carbon::parse($timeOut);
                                            $mins = $in->diffInMinutes($out);
                                            $duration = floor($mins / 60) . 'h ' . ($mins % 60) . 'm';
                                        }
                                        
                                        $hasAttendance = $attendance && ($timeIn || $timeOut);
                                    ?>
                                    <tr class="group hover:bg-gray-50 dark:hover:bg-zinc-700/30 transition <?php echo e($isEditing ? 'bg-amber-50 dark:bg-amber-900/10' : ''); ?>" 
                                        wire:key="row-<?php echo e($userId); ?>">
                                        <td class="py-3 px-4 text-center">
                                            <?php $globalIndex++; ?>
                                            <span class="text-gray-400 text-sm"><?php echo e($globalIndex); ?></span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <a href="<?php echo e(route('attendance.user', $userId)); ?>" class="font-medium text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-300 transition">
                                                <?php echo e($user?->name ?? 'Unknown'); ?>

                                            </a>
                                        </td>
                                        <td class="py-3 px-4 text-gray-500 dark:text-gray-400">
                                            <?php echo e($committeeId && isset($committees[$committeeId]) ? $committees[$committeeId]->name : 'No Committee'); ?>

                                        </td>
                                        <td class="py-3 px-4 text-gray-500 dark:text-gray-400">
                                            <?php echo e($membership->committeePosition?->name ?? '—'); ?>

                                        </td>
                                        <td class="py-3 px-4">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isEditing && !$showAsNA): ?>
                                                <input type="time"
                                                    wire:change="updateAttendanceTime(<?php echo e($attendance?->id ?? 'null'); ?>, <?php echo e($userId); ?>, 'time_in', $event.target.value, '<?php echo e($user?->name); ?>', '<?php echo e($date); ?>')"
                                                    value="<?php echo e($timeIn ? \Carbon\Carbon::parse($timeIn)->format('H:i') : ''); ?>"
                                                    class="w-24 rounded border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-700 px-2 py-1 text-sm text-gray-700 dark:text-gray-200">
                                            <?php else: ?>
                                                <span class="text-gray-700 dark:text-gray-300">
                                                    <?php echo e($timeIn ? \Carbon\Carbon::parse($timeIn)->format('h:i A') : '—'); ?>

                                                </span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isEditing && !$showAsNA): ?>
                                                <input type="time"
                                                    wire:change="updateAttendanceTime(<?php echo e($attendance?->id ?? 'null'); ?>, <?php echo e($userId); ?>, 'time_out', $event.target.value, '<?php echo e($user?->name); ?>', '<?php echo e($date); ?>')"
                                                    value="<?php echo e($timeOut ? \Carbon\Carbon::parse($timeOut)->format('H:i') : ''); ?>"
                                                    class="w-24 rounded border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-700 px-2 py-1 text-sm text-gray-700 dark:text-gray-200">
                                            <?php else: ?>
                                                <span class="text-gray-700 dark:text-gray-300">
                                                    <?php echo e($timeOut ? \Carbon\Carbon::parse($timeOut)->format('h:i A') : '—'); ?>

                                                </span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($duration): ?>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-700 dark:bg-zinc-700 dark:text-slate-300">
                                                    <?php echo e($duration); ?>

                                                </span>
                                            <?php elseif($showAsNA): ?>
                                                <span class="text-gray-400 dark:text-gray-500">N/A</span>
                                            <?php else: ?>
                                                <span class="text-gray-400 dark:text-gray-500">—</span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$showAsNA): ?>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isEditing): ?>
                                                    <div class="flex items-center gap-1">
                                                        <button type="button" wire:click="prepareConfirmSave(<?php echo e($userId); ?>, '<?php echo e(addslashes($user?->name)); ?>')"
                                                            class="p-1.5 text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-zinc-700 rounded transition">
                                                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'check','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'w-4 h-4']); ?>
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
                                                        <button type="button" wire:click="cancelEditing(<?php echo e($userId); ?>)"
                                                            class="p-1.5 text-gray-500 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded transition">
                                                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'x-mark','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'x-mark','class' => 'w-4 h-4']); ?>
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
                                                <?php else: ?>
                                                    <button type="button" wire:click="startEditing(<?php echo e($userId); ?>)"
                                                        class="p-1.5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded transition"
                                                        title="Edit">
                                                        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'pencil-square','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'pencil-square','class' => 'w-4 h-4']); ?>
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
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="py-12 text-center text-gray-500 dark:text-gray-400">
                                        No volunteers found.
                                    </td>
                                </tr>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                
                <?php echo $__env->make('livewire.attendance.partials.volunteers-monthly', [
                    'membershipsByCommittee' => $membershipsByCommittee,
                    'committees' => $committees,
                    'weekendDates' => $weekendDates,
                    'reviewSeason' => $reviewSeason,
                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="space-y-6">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$monthlyView): ?>
            <div class="bg-white dark:bg-zinc-800 rounded-xl border border-gray-200 dark:border-zinc-700 p-4">
                <div class="flex items-center justify-between mb-4">
                    <button type="button" wire:click="prevCalendarMonth" class="p-1 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
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
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">
                        <?php echo e(\Carbon\Carbon::create($calendarYear, $calendarMonth, 1)->format('F Y')); ?>

                    </span>
                    <button type="button" wire:click="nextCalendarMonth" class="p-1 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
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
                <div class="grid grid-cols-7 gap-1 text-center text-xs">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['S', 'M', 'T', 'W', 'T', 'F', 'S']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="py-1 text-gray-400 dark:text-gray-500 font-medium"><?php echo e($day); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php
                        $firstDay = \Carbon\Carbon::create($calendarYear, $calendarMonth, 1);
                        $daysInMonth = $firstDay->daysInMonth;
                        $startDayOfWeek = $firstDay->dayOfWeek;
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < $startDayOfWeek; $i++): ?>
                        <div></div>
                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($d = 1; $d <= $daysInMonth; $d++): ?>
                        <?php
                            $thisDate = \Carbon\Carbon::create($calendarYear, $calendarMonth, $d);
                            $isWeekend = $thisDate->isSaturday() || $thisDate->isSunday();
                            $isSelected = $date === $thisDate->format('Y-m-d');
                            $isToday = $thisDate->isToday();
                        ?>
                        <button type="button" wire:click="setDate('<?php echo e($thisDate->format('Y-m-d')); ?>')"
                            class="py-1.5 rounded-md text-sm transition
                                <?php echo e($isSelected ? 'bg-gray-800 dark:bg-zinc-600 text-white' : ''); ?>

                                <?php echo e(!$isSelected && $isToday ? 'ring-1 ring-gray-400' : ''); ?>

                                <?php echo e(!$isSelected && $isWeekend ? 'bg-slate-100 dark:bg-zinc-700 text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-zinc-600' : ''); ?>

                                <?php echo e(!$isSelected && !$isWeekend ? 'text-gray-400 dark:text-gray-600' : ''); ?>

                            ">
                            <?php echo e($d); ?>

                        </button>
                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div class="bg-white dark:bg-zinc-800 rounded-xl border border-gray-200 dark:border-zinc-700 p-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Attendance</h3>
                    <div class="flex items-center gap-1">
                        <button type="button" wire:click="prevWeeklyAnalyticsMonth" class="p-1 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'chevron-left','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'chevron-left','class' => 'w-4 h-4']); ?>
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
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            <?php echo e(\Carbon\Carbon::create($weeklyAnalyticsYear, $weeklyAnalyticsMonth, 1)->format('M Y')); ?>

                        </span>
                        <button type="button" wire:click="nextWeeklyAnalyticsMonth" class="p-1 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'chevron-right','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'chevron-right','class' => 'w-4 h-4']); ?>
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
                <?php if (isset($component)) { $__componentOriginal3228861a9b18311f679be2ec2f158913 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3228861a9b18311f679be2ec2f158913 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.attendance-chart-bar','data' => ['chartId' => 'volunteer-bar-' . $weeklyAnalyticsYear . '-' . $weeklyAnalyticsMonth,'labels' => $chartData['bar']['labels'] ?? [],'datasets' => $chartData['bar']['datasets'] ?? [],'height' => '160px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('attendance-chart-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['chart-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('volunteer-bar-' . $weeklyAnalyticsYear . '-' . $weeklyAnalyticsMonth),'labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($chartData['bar']['labels'] ?? []),'datasets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($chartData['bar']['datasets'] ?? []),'height' => '160px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3228861a9b18311f679be2ec2f158913)): ?>
<?php $attributes = $__attributesOriginal3228861a9b18311f679be2ec2f158913; ?>
<?php unset($__attributesOriginal3228861a9b18311f679be2ec2f158913); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3228861a9b18311f679be2ec2f158913)): ?>
<?php $component = $__componentOriginal3228861a9b18311f679be2ec2f158913; ?>
<?php unset($__componentOriginal3228861a9b18311f679be2ec2f158913); ?>
<?php endif; ?>
                
                <div class="flex justify-end mt-3">
                    <button type="button" wire:click="$refresh" 
                        class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded transition">
                        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'arrow-path','class' => 'w-3.5 h-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'arrow-path','class' => 'w-3.5 h-3.5']); ?>
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
                        Refresh
                    </button>
                </div>
            </div>

            <div class="bg-white dark:bg-zinc-800 rounded-xl border border-gray-200 dark:border-zinc-700 p-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Avg Hours/Week</h3>
                    <div class="flex items-center gap-1">
                        <button type="button" wire:click="prevWeeklyAnalyticsMonth" class="p-1 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'chevron-left','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'chevron-left','class' => 'w-4 h-4']); ?>
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
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            <?php echo e(\Carbon\Carbon::create($weeklyAnalyticsYear, $weeklyAnalyticsMonth, 1)->format('M Y')); ?>

                        </span>
                        <button type="button" wire:click="nextWeeklyAnalyticsMonth" class="p-1 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'chevron-right','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'chevron-right','class' => 'w-4 h-4']); ?>
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
                <?php if (isset($component)) { $__componentOriginal5ae0f26dd722e2adb9b23c0f59bbd498 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5ae0f26dd722e2adb9b23c0f59bbd498 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.attendance-chart-line','data' => ['chartId' => 'volunteer-line-' . $weeklyAnalyticsYear . '-' . $weeklyAnalyticsMonth,'labels' => $chartData['line']['labels'] ?? [],'datasets' => $chartData['line']['datasets'] ?? [],'height' => '140px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('attendance-chart-line'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['chart-id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('volunteer-line-' . $weeklyAnalyticsYear . '-' . $weeklyAnalyticsMonth),'labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($chartData['line']['labels'] ?? []),'datasets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($chartData['line']['datasets'] ?? []),'height' => '140px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5ae0f26dd722e2adb9b23c0f59bbd498)): ?>
<?php $attributes = $__attributesOriginal5ae0f26dd722e2adb9b23c0f59bbd498; ?>
<?php unset($__attributesOriginal5ae0f26dd722e2adb9b23c0f59bbd498); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ae0f26dd722e2adb9b23c0f59bbd498)): ?>
<?php $component = $__componentOriginal5ae0f26dd722e2adb9b23c0f59bbd498; ?>
<?php unset($__componentOriginal5ae0f26dd722e2adb9b23c0f59bbd498); ?>
<?php endif; ?>
                
                <div class="flex justify-end mt-3">
                    <button type="button" wire:click="$refresh" 
                        class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded transition">
                        <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'arrow-path','class' => 'w-3.5 h-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'arrow-path','class' => 'w-3.5 h-3.5']); ?>
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
                        Refresh
                    </button>
                </div>
            </div>

            
            <div class="bg-white dark:bg-zinc-800 rounded-xl border border-gray-200 dark:border-zinc-700 p-4">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Legend</h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-green-500"></span>
                        <span class="text-gray-600 dark:text-gray-400">Present</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-red-500"></span>
                        <span class="text-gray-600 dark:text-gray-400">Absent</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('attendance.export-modal', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2373323609-0', null);

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
[$__name, $__params] = $__split('attendance.review-season-modal', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2373323609-1', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showConfirmModal): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true">
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="fixed inset-0 bg-black/50 transition-opacity" wire:click="cancelConfirmModal"></div>
            <div class="relative bg-white dark:bg-zinc-800 rounded-xl shadow-xl max-w-md w-full p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Confirm Changes</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    Save attendance changes for <strong><?php echo e($confirmModalData['full_name'] ?? ''); ?></strong>?
                </p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($confirmModalData['dates'])): ?>
                <div class="mb-4 p-3 bg-gray-50 dark:bg-zinc-700 rounded-lg">
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Dates affected:</p>
                    <p class="text-sm text-gray-700 dark:text-gray-300"><?php echo e(implode(', ', $confirmModalData['dates'])); ?></p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <div class="flex justify-end gap-3">
                    <button type="button" wire:click="cancelConfirmModal"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded-lg transition">
                        Cancel
                    </button>
                    <button type="button" wire:click="confirmSaveAttendance"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showSelfEditError): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true">
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="fixed inset-0 bg-black/50 transition-opacity" wire:click="closeSelfEditError"></div>
            <div class="relative bg-white dark:bg-zinc-800 rounded-xl shadow-xl max-w-sm w-full p-6 text-center">
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'exclamation-triangle','class' => 'w-12 h-12 text-amber-500 mx-auto mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'exclamation-triangle','class' => 'w-12 h-12 text-amber-500 mx-auto mb-4']); ?>
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
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Cannot Edit Own Attendance</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    You are not allowed to edit your own attendance records.
                </p>
                <button type="button" wire:click="closeSelfEditError"
                    class="px-4 py-2 text-sm font-medium text-white bg-gray-800 dark:bg-zinc-600 hover:bg-gray-700 dark:hover:bg-zinc-500 rounded-lg transition">
                    Got it
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showOutsideSeasonError): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true">
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="fixed inset-0 bg-black/50 transition-opacity" wire:click="closeOutsideSeasonError"></div>
            <div class="relative bg-white dark:bg-zinc-800 rounded-xl shadow-xl max-w-sm w-full p-6 text-center">
                <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'calendar-x-mark','class' => 'w-12 h-12 text-red-500 mx-auto mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'calendar-x-mark','class' => 'w-12 h-12 text-red-500 mx-auto mb-4']); ?>
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
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Date Outside Review Season</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                    <?php echo e($outsideSeasonErrorData['date'] ?? ''); ?> is outside the current review season.
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-500 mb-4">
                    Season: <?php echo e($outsideSeasonErrorData['range'] ?? ''); ?>

                </p>
                <button type="button" wire:click="closeOutsideSeasonError"
                    class="px-4 py-2 text-sm font-medium text-white bg-gray-800 dark:bg-zinc-600 hover:bg-gray-700 dark:hover:bg-zinc-500 rounded-lg transition">
                    Got it
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/attendance/volunteers.blade.php ENDPATH**/ ?>
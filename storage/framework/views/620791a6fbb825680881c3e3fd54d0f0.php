<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['breadcrumbs' => []]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['breadcrumbs' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="sticky top-0 z-50 w-full bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <div class="w-full flex items-center justify-between px-6 py-3">
        <!-- Breadcrumbs -->
        <div class="flex items-center space-x-2 text-sm">
            <?php if(count($breadcrumbs) > 0): ?>
                <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index > 0): ?>
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($crumb['url']) && $index < count($breadcrumbs) - 1): ?>
                        <a href="<?php echo e($crumb['url']); ?>" 
                           class="text-blue-600 dark:text-blue-400 hover:underline whitespace-nowrap"
                           wire:navigate>
                            <?php echo e($crumb['label']); ?>

                        </a>
                    <?php elseif(isset($crumb['href']) && !($crumb['current'] ?? false)): ?>
                        <a href="<?php echo e($crumb['href']); ?>" 
                           class="text-blue-600 dark:text-blue-400 hover:underline whitespace-nowrap"
                           wire:navigate>
                            <?php echo e($crumb['label']); ?>

                        </a>
                    <?php else: ?>
                        <span class="text-gray-900 dark:text-gray-100 font-medium whitespace-nowrap">
                            <?php echo e($crumb['label'] ?? $crumb); ?>

                        </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
                <span class="text-gray-900 dark:text-gray-100 font-medium">
                    <?php echo e($title ?? 'Dashboard'); ?>

                </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Search Bar -->
        <div class="w-1/2">
            <div x-data="{ 
                    open: false,
                    query: '',
                    openSearch() {
                        this.open = true;
                        document.body.style.overflow = 'hidden';
                        $nextTick(() => $refs.searchInput.focus());
                    },
                    closeSearch() {
                        this.open = false;
                        document.body.style.overflow = '';
                        this.query = '';
                    },
                    links: [
                        // Profile Section
                        { section: 'Profile', title: 'My Profile', href: '<?php echo e(route('profile.show')); ?>' },
                        { section: 'Profile', title: 'Personal Records', href: '<?php echo e(route('profile.show.section', ['user' => Auth::id(), 'section' => 'personal'])); ?>' },
                        { section: 'Profile', title: 'Account', href: '<?php echo e(route('profile.show.section', ['user' => Auth::id(), 'section' => 'account'])); ?>' },
                        { section: 'Profile', title: 'FCEER Records', href: '<?php echo e(route('profile.show.section', ['user' => Auth::id(), 'section' => 'fceer'])); ?>' },
                        { section: 'Profile', title: 'Credentials', href: '<?php echo e(route('profile.show.section', ['user' => Auth::id(), 'section' => 'credentials'])); ?>' },
                        
                        // Settings Section
                        { section: 'Settings', title: 'Profile Settings', href: '<?php echo e(route('profile.edit')); ?>' },
                        { section: 'Settings', title: 'Password', href: '<?php echo e(route('user-password.edit')); ?>' },
                        { section: 'Settings', title: 'Appearance', href: '<?php echo e(route('appearance.edit')); ?>' },
                        { section: 'Settings', title: 'Two Factor Authentication', href: '<?php echo e(route('two-factor.show')); ?>' },
                        
                        // User Attendance
                        { section: 'User', title: 'My Attendance', href: '<?php echo e(route('attendance.user')); ?>' },
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewRoster')): ?>
                        // Students Section
                        { section: 'Students', title: 'Student Roster', href: '<?php echo e(route('roster.students')); ?>' },
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAnyAttendance')): ?>
                        { section: 'Students', title: 'Student Attendance', href: '<?php echo e(route('attendance.students')); ?>' },
                        <?php endif; ?>
                        
                        // Volunteers Section
                        { section: 'Volunteers', title: 'Volunteer Roster', href: '<?php echo e(route('roster.volunteers')); ?>' },
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAnyAttendance')): ?>
                        { section: 'Volunteers', title: 'Volunteer Attendance', href: '<?php echo e(route('attendance.volunteers')); ?>' },
                        <?php endif; ?>
                        <?php endif; ?>
                        
                        // Database Section - Hidden from Students and Instructors
                        <?php if(auth()->user() && !in_array(auth()->user()->role_id, [4, 5])): ?>
                        { section: 'Database', title: 'Reference Tables', href: '<?php echo e(route('database')); ?>' },
                        { section: 'Database', title: 'Provinces', href: '<?php echo e(route('pages.reference_tables.provinces')); ?>' },
                        { section: 'Database', title: 'Cities', href: '<?php echo e(route('pages.reference_tables.cities')); ?>' },
                        { section: 'Database', title: 'Barangays', href: '<?php echo e(route('pages.reference_tables.barangays')); ?>' },
                        { section: 'Database', title: 'Degree Fields', href: '<?php echo e(route('pages.reference_tables.degree_fields')); ?>' },
                        { section: 'Database', title: 'Degree Levels', href: '<?php echo e(route('pages.reference_tables.degree_levels')); ?>' },
                        { section: 'Database', title: 'Degree Types', href: '<?php echo e(route('pages.reference_tables.degree_types')); ?>' },
                        { section: 'Database', title: 'Degree Programs', href: '<?php echo e(route('pages.reference_tables.degree_programs')); ?>' },
                        { section: 'Database', title: 'Universities', href: '<?php echo e(route('pages.reference_tables.universities')); ?>' },
                        { section: 'Database', title: 'High Schools', href: '<?php echo e(route('pages.reference_tables.highschools')); ?>' },
                        { section: 'Database', title: 'High School Subjects', href: '<?php echo e(route('pages.reference_tables.highschool_subjects')); ?>' },
                        { section: 'Database', title: 'Prefix Titles', href: '<?php echo e(route('pages.reference_tables.prefix_titles')); ?>' },
                        { section: 'Database', title: 'Suffix Titles', href: '<?php echo e(route('pages.reference_tables.suffix_titles')); ?>' },
                        { section: 'Database', title: 'Fields of Work', href: '<?php echo e(route('pages.reference_tables.fields_of_work')); ?>' },
                        { section: 'Database', title: 'Volunteer Subjects', href: '<?php echo e(route('pages.reference_tables.volunteer_subjects')); ?>' },
                        { section: 'Database', title: 'Committees', href: '<?php echo e(route('pages.reference_tables.committees')); ?>' },
                        { section: 'Database', title: 'Classroom Positions', href: '<?php echo e(route('pages.reference_tables.classroom_positions')); ?>' },
                        { section: 'Database', title: 'Committee Positions', href: '<?php echo e(route('pages.reference_tables.committee_positions')); ?>' },
                        { section: 'Database', title: 'Classrooms', href: '<?php echo e(route('pages.reference_tables.classrooms')); ?>' },
                        { section: 'Database', title: 'FCEER Batches', href: '<?php echo e(route('pages.reference_tables.fceer_batches')); ?>' },
                        { section: 'Database', title: 'User Attendance Statuses', href: '<?php echo e(route('pages.reference_tables.user_attendance_statuses')); ?>' },
                        { section: 'Database', title: 'User Roles', href: '<?php echo e(route('pages.reference_tables.user_roles')); ?>' },
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageReviewSeason')): ?>
                        { section: 'Database', title: 'Review Seasons', href: '<?php echo e(route('reviewseason')); ?>' },
                        <?php endif; ?>
                        <?php endif; ?>
                    ],
                    get filteredLinks() {
                        if (!this.query) return this.links;
                        const q = this.query.toLowerCase();
                        return this.links.filter(link => 
                            link.title.toLowerCase().includes(q) || 
                            link.section.toLowerCase().includes(q)
                        );
                    },
                    get groupedLinks() {
                        const grouped = {};
                        this.filteredLinks.forEach(link => {
                            if (!grouped[link.section]) {
                                grouped[link.section] = [];
                            }
                            grouped[link.section].push(link);
                        });
                        return grouped;
                    }
                 }"
                 @keydown.window.prevent.slash="openSearch()"
                 @keydown.window.escape="closeSearch()"
                 class="relative">
                
                <!-- Search Trigger Button -->
                <button @click="openSearch()" 
                        class="w-full flex items-center space-x-2 px-4 py-1.5 text-sm border border-zinc-300 dark:border-zinc-600 rounded-md hover:border-zinc-400 dark:hover:border-zinc-500 transition bg-white dark:bg-zinc-800">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="text-gray-500 dark:text-gray-400">Type</span>
                    <kbd class="px-2 py-0.5 text-xs font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-zinc-700 border border-gray-300 dark:border-zinc-600 rounded">
                        /
                    </kbd>
                    <span class="text-gray-500 dark:text-gray-400">to search</span>
                </button>

                <!-- Search Modal -->
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="closeSearch()"
                     class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm"
                     style="display: none;">
                    
                    <div @click.stop 
                         class="relative top-20 mx-auto max-w-2xl bg-white dark:bg-zinc-800 rounded-lg shadow-2xl border border-zinc-200 dark:border-zinc-700">
                        
                        <!-- Search Input -->
                        <div class="flex items-center border-b border-zinc-200 dark:border-zinc-700 px-4 py-3">
                            <svg class="w-5 h-5 text-gray-400 dark:text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input x-ref="searchInput"
                                   x-model="query"
                                   type="text"
                                   placeholder="Search pages..."
                                   class="flex-1 bg-transparent border-none outline-none text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500">
                            <button @click="closeSearch()" 
                                    class="ml-2 text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                                <kbd class="px-2 py-0.5 text-xs font-semibold bg-gray-100 dark:bg-zinc-700 border border-gray-300 dark:border-zinc-600 rounded">
                                    ESC
                                </kbd>
                            </button>
                        </div>

                        <!-- Search Results -->
                        <div class="p-2 max-h-96 overflow-y-auto">
                            <template x-if="query.length === 0">
                                <div class="py-1">
                                    <!-- Show all links when no query -->
                                </div>
                            </template>
                            
                            <template x-if="query.length > 0 && Object.keys(groupedLinks).length === 0">
                                <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                    <p class="text-sm">No results found for "<span x-text="query" class="font-semibold"></span>"</p>
                                </div>
                            </template>

                            <!-- Grouped Results -->
                            <template x-for="(sectionLinks, section) in groupedLinks" :key="section">
                                <div class="mb-3">
                                    <!-- Section Header -->
                                    <div class="px-3 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        <span x-text="section"></span>
                                    </div>
                                    
                                    <!-- Section Links -->
                                    <template x-for="link in sectionLinks" :key="link.href">
                                        <a :href="link.href"
                                           @click="closeSearch()"
                                           class="flex items-center px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-zinc-100 dark:hover:bg-zinc-700 rounded-md transition group">
                                            <svg class="w-4 h-4 mr-3 text-gray-400 group-hover:text-blue-500 dark:group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <span x-text="link.title"></span>
                                        </a>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/components/layouts/app/top-header.blade.php ENDPATH**/ ?>
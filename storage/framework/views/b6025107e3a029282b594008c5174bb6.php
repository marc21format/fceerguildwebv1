
<div>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showModal): ?>
    <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
        <?php if (isset($component)) { $__componentOriginal8cc9d3143946b992b324617832699c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cc9d3143946b992b324617832699c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::modal.index','data' => ['name' => 'export-attendance','flyout' => true,'class' => 'w-11/12 max-w-lg','wire:model' => 'showModal','@close' => '$wire.closeModal()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'export-attendance','flyout' => true,'class' => 'w-11/12 max-w-lg','wire:model' => 'showModal','@close' => '$wire.closeModal()']); ?>
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Export <?php echo e(ucfirst($exportType)); ?> Attendance</h2>
                    <div class="mt-3 mb-4 border-b border-gray-200 dark:border-zinc-700"></div>
                </div>

                <div class="space-y-5">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Export Type</label>
                        <div class="flex gap-2">
                            <button 
                                type="button"
                                wire:click="$set('exportType', 'students')"
                                class="flex-1 px-4 py-2 text-sm font-medium rounded-lg border transition <?php echo e($exportType === 'students' ? 'bg-slate-100 dark:bg-zinc-700 border-slate-400 dark:border-zinc-500 text-slate-700 dark:text-slate-200' : 'border-gray-200 dark:border-zinc-600 text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
                            >
                                <i class="fa fa-graduation-cap mr-2"></i> Students
                            </button>
                            <button 
                                type="button"
                                wire:click="$set('exportType', 'volunteers')"
                                class="flex-1 px-4 py-2 text-sm font-medium rounded-lg border transition <?php echo e($exportType === 'volunteers' ? 'bg-slate-100 dark:bg-zinc-700 border-slate-400 dark:border-zinc-500 text-slate-700 dark:text-slate-200' : 'border-gray-200 dark:border-zinc-600 text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
                            >
                                <i class="fa fa-handshake-o mr-2"></i> Volunteers
                            </button>
                        </div>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Date Range</label>
                        <div class="space-y-3">
                            
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 dark:border-zinc-600 cursor-pointer hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition <?php echo e($dateRangeMode === 'review_season' ? 'ring-2 ring-slate-400 bg-slate-100 dark:ring-zinc-500 dark:bg-zinc-700/50' : ''); ?>">
                                <input 
                                    type="radio" 
                                    wire:model.live="dateRangeMode" 
                                    value="review_season" 
                                    class="text-gray-600 focus:ring-gray-500"
                                >
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Review Season</span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dateRangeMode === 'review_season'): ?>
                                        <?php
                                            $reviewSeasonOptions = $reviewSeasons->mapWithKeys(fn($s) => [$s->id => $s->range_label . ($s->is_active ? ' (Active)' : '')])->toArray();
                                        ?>
                                        <div x-data='{
                                            open: false,
                                            search: "",
                                            options: <?php echo json_encode($reviewSeasonOptions, 15, 512) ?>,
                                            list: [],
                                            selected: "<?php echo e($reviewSeasonId ?? ""); ?>",
                                            init() { this.list = Object.keys(this.options).map(k => ({ id: k, label: this.options[k] })); },
                                            get display() { return this.options[this.selected] ?? "Select a review season..."; },
                                            get filtered() { if (! this.search) return this.list; return this.list.filter(i => i.label.toLowerCase().includes(this.search.toLowerCase())); },
                                            select(id) { this.selected = id; $wire.set("reviewSeasonId", id); this.open = false; this.search = ""; }
                                        }' x-init="init()" class="relative mt-2">
                                            <button type="button" @click="open = !open" class="w-full text-left rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-700 dark:text-gray-100 px-3 py-2.5 text-sm flex items-center justify-between">
                                                <span x-text="display" :class="selected === '' ? 'text-gray-400 dark:text-zinc-500' : 'text-gray-700 dark:text-gray-100'"></span>
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                            </button>
                                            <div x-show="open" x-cloak @click.outside="open = false" class="absolute z-50 mt-1 w-full bg-white dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 rounded shadow-lg">
                                                <div class="px-3 py-2 border-b border-gray-100 dark:border-zinc-600">
                                                    <div class="relative">
                                                        <span class="absolute left-3 top-2.5 text-zinc-400"><?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'magnifying-glass','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'magnifying-glass','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?></span>
                                                        <input type="search" x-model="search" placeholder="Search..." class="w-full pl-10 pr-3 py-2 rounded text-sm bg-gray-50 dark:bg-zinc-700 text-gray-700 dark:text-gray-100 placeholder-gray-400 dark:placeholder-zinc-500 border border-gray-200 dark:border-zinc-600 focus:outline-none" />
                                                    </div>
                                                </div>
                                                <ul class="max-h-48 overflow-auto">
                                                    <template x-for="item in filtered" :key="item.id">
                                                        <li @click.prevent="select(item.id)" class="px-3 py-2.5 cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-600 text-sm text-gray-700 dark:text-gray-200" x-text="item.label"></li>
                                                    </template>
                                                    <div x-show="filtered.length === 0" class="px-4 py-3 text-sm text-gray-500 dark:text-zinc-500">No results</div>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </label>

                            
                            <label class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 dark:border-zinc-600 cursor-pointer hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition <?php echo e($dateRangeMode === 'custom' ? 'ring-2 ring-slate-400 bg-slate-100 dark:ring-zinc-500 dark:bg-zinc-700/50' : ''); ?>">
                                <input 
                                    type="radio" 
                                    wire:model.live="dateRangeMode" 
                                    value="custom" 
                                    class="text-gray-600 focus:ring-gray-500 mt-1"
                                >
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Custom Range</span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dateRangeMode === 'custom'): ?>
                                        <div class="mt-2 grid grid-cols-2 gap-3">
                                            <div>
                                                <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Start Date</label>
                                                <input 
                                                    type="date" 
                                                    wire:model="customStartDate"
                                                    class="w-full rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 text-sm px-3 py-2 focus:border-gray-400 focus:ring-gray-400"
                                                >
                                            </div>
                                            <div>
                                                <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">End Date</label>
                                                <input 
                                                    type="date" 
                                                    wire:model="customEndDate"
                                                    class="w-full rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-900 dark:text-gray-100 text-sm px-3 py-2 focus:border-gray-400 focus:ring-gray-400"
                                                >
                                            </div>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </label>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['reviewSeasonId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['customStartDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['customEndDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($exportType === 'students'): ?>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Session</label>
                            <div class="flex gap-2">
                                <button 
                                    type="button"
                                    wire:click="$set('sessionFilter', null)"
                                    class="flex-1 px-3 py-2 text-sm font-medium rounded-lg border transition <?php echo e($sessionFilter === null ? 'bg-slate-100 dark:bg-zinc-700 border-slate-400 dark:border-zinc-500 text-slate-700 dark:text-slate-200' : 'border-gray-200 dark:border-zinc-600 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
                                >
                                    Both
                                </button>
                                <button 
                                    type="button"
                                    wire:click="$set('sessionFilter', 'am')"
                                    class="flex-1 px-3 py-2 text-sm font-medium rounded-lg border transition <?php echo e($sessionFilter === 'am' ? 'bg-slate-100 dark:bg-zinc-700 border-slate-400 dark:border-zinc-500 text-slate-700 dark:text-slate-200' : 'border-gray-200 dark:border-zinc-600 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
                                >
                                    <i class="fa fa-sun-o mr-1"></i> AM
                                </button>
                                <button 
                                    type="button"
                                    wire:click="$set('sessionFilter', 'pm')"
                                    class="flex-1 px-3 py-2 text-sm font-medium rounded-lg border transition <?php echo e($sessionFilter === 'pm' ? 'bg-slate-100 dark:bg-zinc-700 border-slate-400 dark:border-zinc-500 text-slate-700 dark:text-slate-200' : 'border-gray-200 dark:border-zinc-600 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>"
                                >
                                    <i class="fa fa-moon-o mr-1"></i> PM
                                </button>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <div class="border-t border-gray-200 dark:border-zinc-700 pt-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-3">
                            Filters (Optional)
                        </label>
                        <div class="grid grid-cols-2 gap-3">
                            
                            <div>
                                <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Batch</label>
                                <?php
                                    $batchOptions = collect($batches)->mapWithKeys(fn($b) => [$b->id => 'Batch ' . $b->batch_no . ' (' . $b->year . ')'])->toArray();
                                ?>
                                <div x-data='{
                                    open: false,
                                    search: "",
                                    options: <?php echo json_encode($batchOptions, 15, 512) ?>,
                                    list: [],
                                    selected: "<?php echo e($batchFilter ?? ""); ?>",
                                    init() { this.list = Object.keys(this.options).map(k => ({ id: k, label: this.options[k] })); },
                                    get display() { return this.options[this.selected] ?? "All batches"; },
                                    get filtered() { if (! this.search) return this.list; return this.list.filter(i => i.label.toLowerCase().includes(this.search.toLowerCase())); },
                                    select(id) { this.selected = id; $wire.set("batchFilter", id); this.open = false; this.search = ""; },
                                    clear() { this.selected = ""; $wire.set("batchFilter", ""); this.open = false; }
                                }' x-init="init()" class="relative">
                                    <button type="button" @click="open = !open" class="w-full text-left rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-700 dark:text-gray-100 px-3 py-2.5 text-sm flex items-center justify-between">
                                        <span x-text="display" :class="selected === '' ? 'text-gray-400 dark:text-zinc-500' : 'text-gray-700 dark:text-gray-100'"></span>
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </button>
                                    <div x-show="open" x-cloak @click.outside="open = false" class="absolute z-50 mt-1 w-full bg-white dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 rounded shadow-lg">
                                        <div class="px-3 py-2 border-b border-gray-100 dark:border-zinc-600">
                                            <div class="relative">
                                                <span class="absolute left-3 top-2.5 text-zinc-400"><?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'magnifying-glass','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'magnifying-glass','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?></span>
                                                <input type="search" x-model="search" placeholder="Search..." class="w-full pl-10 pr-3 py-2 rounded text-sm bg-gray-50 dark:bg-zinc-700 text-gray-700 dark:text-gray-100 placeholder-gray-400 dark:placeholder-zinc-500 border border-gray-200 dark:border-zinc-600 focus:outline-none" />
                                            </div>
                                        </div>
                                        <ul class="max-h-48 overflow-auto">
                                            <li @click.prevent="clear()" class="px-3 py-2.5 cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-600 text-sm text-gray-500 dark:text-gray-400 italic">All batches</li>
                                            <template x-for="item in filtered" :key="item.id">
                                                <li @click.prevent="select(item.id)" class="px-3 py-2.5 cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-600 text-sm text-gray-700 dark:text-gray-200" x-text="item.label"></li>
                                            </template>
                                            <div x-show="filtered.length === 0" class="px-4 py-3 text-sm text-gray-500 dark:text-zinc-500">No results</div>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            
                            <div>
                                <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">
                                    <?php echo e($exportType === 'students' ? 'Group' : 'Committee'); ?>

                                </label>
                                <?php
                                    if ($exportType === 'students') {
                                        $committeeOptions = collect($classrooms)->mapWithKeys(fn($c) => [$c->id => $c->group])->toArray();
                                        $committeePlaceholder = 'All groups';
                                    } else {
                                        $committeeOptions = collect($committees)->mapWithKeys(fn($c) => [$c->id => $c->name])->toArray();
                                        $committeePlaceholder = 'All committees';
                                    }
                                ?>
                                <div x-data='{
                                    open: false,
                                    search: "",
                                    options: <?php echo json_encode($committeeOptions, 15, 512) ?>,
                                    list: [],
                                    selected: "<?php echo e($committeeFilter ?? ""); ?>",
                                    placeholder: "<?php echo e($committeePlaceholder); ?>",
                                    init() { this.list = Object.keys(this.options).map(k => ({ id: k, label: this.options[k] })); },
                                    get display() { return this.options[this.selected] ?? this.placeholder; },
                                    get filtered() { if (! this.search) return this.list; return this.list.filter(i => i.label.toLowerCase().includes(this.search.toLowerCase())); },
                                    select(id) { this.selected = id; $wire.set("committeeFilter", id); this.open = false; this.search = ""; },
                                    clear() { this.selected = ""; $wire.set("committeeFilter", ""); this.open = false; }
                                }' x-init="init()" class="relative">
                                    <button type="button" @click="open = !open" class="w-full text-left rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-700 dark:text-gray-100 px-3 py-2.5 text-sm flex items-center justify-between">
                                        <span x-text="display" :class="selected === '' ? 'text-gray-400 dark:text-zinc-500' : 'text-gray-700 dark:text-gray-100'"></span>
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </button>
                                    <div x-show="open" x-cloak @click.outside="open = false" class="absolute z-50 mt-1 w-full bg-white dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 rounded shadow-lg">
                                        <div class="px-3 py-2 border-b border-gray-100 dark:border-zinc-600">
                                            <div class="relative">
                                                <span class="absolute left-3 top-2.5 text-zinc-400"><?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'magnifying-glass','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'magnifying-glass','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?></span>
                                                <input type="search" x-model="search" placeholder="Search..." class="w-full pl-10 pr-3 py-2 rounded text-sm bg-gray-50 dark:bg-zinc-700 text-gray-700 dark:text-gray-100 placeholder-gray-400 dark:placeholder-zinc-500 border border-gray-200 dark:border-zinc-600 focus:outline-none" />
                                            </div>
                                        </div>
                                        <ul class="max-h-48 overflow-auto">
                                            <li @click.prevent="clear()" class="px-3 py-2.5 cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-600 text-sm text-gray-500 dark:text-gray-400 italic" x-text="placeholder"></li>
                                            <template x-for="item in filtered" :key="item.id">
                                                <li @click.prevent="select(item.id)" class="px-3 py-2.5 cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-600 text-sm text-gray-700 dark:text-gray-200" x-text="item.label"></li>
                                            </template>
                                            <div x-show="filtered.length === 0" class="px-4 py-3 text-sm text-gray-500 dark:text-zinc-500">No results</div>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($exportType === 'volunteers'): ?>
                                <div class="col-span-2">
                                    <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Position</label>
                                    <?php
                                        $positionOptions = collect($positions)->mapWithKeys(fn($p) => [$p->id => $p->name])->toArray();
                                    ?>
                                    <div x-data='{
                                        open: false,
                                        search: "",
                                        options: <?php echo json_encode($positionOptions, 15, 512) ?>,
                                        list: [],
                                        selected: "<?php echo e($positionFilter ?? ""); ?>",
                                        init() { this.list = Object.keys(this.options).map(k => ({ id: k, label: this.options[k] })); },
                                        get display() { return this.options[this.selected] ?? "All positions"; },
                                        get filtered() { if (! this.search) return this.list; return this.list.filter(i => i.label.toLowerCase().includes(this.search.toLowerCase())); },
                                        select(id) { this.selected = id; $wire.set("positionFilter", id); this.open = false; this.search = ""; },
                                        clear() { this.selected = ""; $wire.set("positionFilter", ""); this.open = false; }
                                    }' x-init="init()" class="relative">
                                        <button type="button" @click="open = !open" class="w-full text-left rounded-md border border-gray-200 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 text-gray-700 dark:text-gray-100 px-3 py-2.5 text-sm flex items-center justify-between">
                                            <span x-text="display" :class="selected === '' ? 'text-gray-400 dark:text-zinc-500' : 'text-gray-700 dark:text-gray-100'"></span>
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                        </button>
                                        <div x-show="open" x-cloak @click.outside="open = false" class="absolute z-50 mt-1 w-full bg-white dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 rounded shadow-lg">
                                            <div class="px-3 py-2 border-b border-gray-100 dark:border-zinc-600">
                                                <div class="relative">
                                                    <span class="absolute left-3 top-2.5 text-zinc-400"><?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'magnifying-glass','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'magnifying-glass','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $attributes = $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2)): ?>
<?php $component = $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2; ?>
<?php unset($__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2); ?>
<?php endif; ?></span>
                                                    <input type="search" x-model="search" placeholder="Search..." class="w-full pl-10 pr-3 py-2 rounded text-sm bg-gray-50 dark:bg-zinc-700 text-gray-700 dark:text-gray-100 placeholder-gray-400 dark:placeholder-zinc-500 border border-gray-200 dark:border-zinc-600 focus:outline-none" />
                                                </div>
                                            </div>
                                            <ul class="max-h-48 overflow-auto">
                                                <li @click.prevent="clear()" class="px-3 py-2.5 cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-600 text-sm text-gray-500 dark:text-gray-400 italic">All positions</li>
                                                <template x-for="item in filtered" :key="item.id">
                                                    <li @click.prevent="select(item.id)" class="px-3 py-2.5 cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-600 text-sm text-gray-700 dark:text-gray-200" x-text="item.label"></li>
                                                </template>
                                                <div x-show="filtered.length === 0" class="px-4 py-3 text-sm text-gray-500 dark:text-zinc-500">No results</div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="border-t border-gray-200 dark:border-zinc-700 pt-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">Export Format</label>
                        <div class="flex gap-3">
                            <label class="flex items-center gap-2 px-4 py-2 rounded-lg border cursor-pointer transition <?php echo e($format === 'xlsx' ? 'bg-slate-100 dark:bg-zinc-700 border-slate-400 dark:border-zinc-500' : 'border-gray-200 dark:border-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>">
                                <input type="radio" wire:model="format" value="xlsx" class="text-gray-600 focus:ring-gray-500">
                                <i class="fa fa-file-excel-o text-gray-600"></i>
                                <span class="text-sm font-medium <?php echo e($format === 'xlsx' ? 'text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400'); ?>">Excel (.xlsx)</span>
                            </label>
                            <label class="flex items-center gap-2 px-4 py-2 rounded-lg border cursor-pointer transition <?php echo e($format === 'csv' ? 'bg-slate-100 dark:bg-zinc-700 border-slate-400 dark:border-zinc-500' : 'border-gray-200 dark:border-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-700'); ?>">
                                <input type="radio" wire:model="format" value="csv" class="text-gray-600 focus:ring-gray-500">
                                <i class="fa fa-file-text-o text-gray-600"></i>
                                <span class="text-sm font-medium <?php echo e($format === 'csv' ? 'text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400'); ?>">CSV (.csv)</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200 dark:border-zinc-700">
                    <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['wire:click' => 'export','variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'export','variant' => 'primary']); ?>
                        <i class="fa fa-download mr-2"></i> Export
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
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/attendance/export-modal.blade.php ENDPATH**/ ?>
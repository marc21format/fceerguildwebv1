<div class="profile-section">
    <div class="profile-section-header">
        <div class="flex items-center gap-3">
            <?php if (isset($component)) { $__componentOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7d5f44bf2a2d803ed0b55f72f1f82e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.index','data' => ['name' => 'user-circle','class' => 'w-5 h-5 text-gray-700 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'user-circle','class' => 'w-5 h-5 text-gray-700 dark:text-gray-300']); ?>
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
            <div class="profile-card-title">Profile Picture</div>
        </div>
    </div>

    <div class="reference-table-container relative overflow-x-auto bg-white dark:bg-zinc-800 rounded shadow p-6"
         x-data="{ 
            dragover: false,
            handleDrop(e) {
                this.dragover = false;
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').upload('profile_picture', files[0]);
                }
            }
         }"
         @drop.prevent="handleDrop($event)"
         @dragover.prevent="dragover = true"
         @dragleave.prevent="dragover = false">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentPicture && $currentPicture->attachment): ?>
            <!-- Current Profile Picture with Drop Overlay -->
            <div class="mb-6 flex flex-col items-center">
                <div class="relative">
                    
                    <img src="<?php echo e(asset('storage/' . $currentPicture->attachment->path)); ?>" 
                         alt="Profile Picture" 
                         class="w-32 h-32 rounded-full object-cover border-4 border-gray-200 dark:border-zinc-700">
                    
                    <!-- Drop Overlay on Circle -->
                    <div x-show="dragover"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         class="absolute inset-0 flex items-center justify-center bg-blue-600/90 rounded-full border-4 border-blue-500">
                        <div class="text-center text-white">
                            <svg class="mx-auto h-8 w-8 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <span class="text-xs font-semibold">Drop to replace</span>
                        </div>
                    </div>
                    
                    <!-- Hidden file input for click to replace -->
                    <input type="file" 
                           wire:model="profile_picture" 
                           id="profile_picture_replace"
                           accept="image/jpeg,image/png,image/gif"
                           <?php echo e(!$canUpload ? 'disabled' : ''); ?>

                           class="hidden">
                </div>
                
                <p class="mt-3 text-sm text-gray-600 dark:text-gray-400"><?php echo e($currentPicture->attachment->original_filename); ?></p>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-500">Uploaded <?php echo e($currentPicture->created_at->diffForHumans()); ?></p>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$canUpload): ?>
                    <div class="mt-3 px-3 py-2 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded text-sm text-yellow-800 dark:text-yellow-200">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span x-data="{ seconds: <?php echo e($remainingTime); ?> }" 
                                  x-init="setInterval(() => { if(seconds > 0) seconds--; if(seconds <= 0) $wire.checkUploadCooldown(); }, 1000)"
                                  x-text="'Wait ' + Math.floor(seconds / 60) + 'm ' + (seconds % 60) + 's to upload again'">
                            </span>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <div class="mt-3 flex gap-3">
                    <label for="profile_picture_replace" 
                           :class="!<?php echo e($canUpload ? 'true' : 'false'); ?> ? 'opacity-50 cursor-not-allowed pointer-events-none' : 'cursor-pointer'"
                           class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 underline">
                        Replace Picture
                    </label>
                    <button wire:click="removeProfilePicture" 
                            type="button"
                            class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 underline">
                        Remove Picture
                    </button>
                </div>
            </div>
        <?php else: ?>
        <div class="border-2 border-dashed border-gray-300 dark:border-zinc-600 rounded-lg p-8 text-center hover:border-gray-400 dark:hover:border-zinc-500 transition"
             :class="dragover ? 'border-blue-500 bg-blue-50 dark:bg-blue-900/10' : ''">
            <input type="file" 
                   wire:model="profile_picture" 
                   id="profile_picture_upload"
                   accept="image/jpeg,image/png,image/gif"
                   class="hidden">
            
            <div wire:loading.remove wire:target="profile_picture">
                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="mt-4">
                    <label for="profile_picture_upload" class="cursor-pointer">
                        <span class="text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300">
                            Click to browse
                        </span>
                        <span class="text-gray-600 dark:text-gray-400"> or drop files here</span>
                    </label>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    JPG, PNG, GIF up to 10MB
                </p>
            </div>

            <!-- Upload Progress -->
            <div wire:loading wire:target="profile_picture" class="space-y-3">
                <svg class="animate-spin mx-auto h-12 w-12 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Uploading...</p>
                
                <!-- Progress Bar -->
                <div class="w-full max-w-xs mx-auto bg-gray-200 dark:bg-zinc-700 rounded-full h-2 overflow-hidden">
                    <div class="bg-blue-600 dark:bg-blue-400 h-full rounded-full transition-all duration-300"
                         x-data="{ progress: 0 }"
                         x-init="let interval = setInterval(() => { 
                             progress += Math.random() * 15; 
                             if (progress >= 95) progress = 95; 
                             $el.style.width = progress + '%';
                         }, 200);"
                         style="width: 0%">
                    </div>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['profile_picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-2 text-sm text-red-600 dark:text-red-400"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/livewire/profile/account/subsections/profile_picture/index.blade.php ENDPATH**/ ?>
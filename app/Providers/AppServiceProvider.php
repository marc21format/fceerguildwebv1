<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Livewire\Livewire;
use App\Policies\ReferenceTablePolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register custom Livewire aliases for dynamic reference CRUD
        if (class_exists(Livewire::class)) {
            Livewire::component('reference-crud', \App\Http\Livewire\ReferenceCrud::class);

            // Explicitly register child reference components (aliases to ensure discovery)

            Livewire::component('app.http.livewire.reference.reference-table', \App\Http\Livewire\Reference\ReferenceTable::class);
            Livewire::component('reference.reference-table', \App\Http\Livewire\Reference\ReferenceTable::class);
            Livewire::component('reference-table', \App\Http\Livewire\Reference\ReferenceTable::class);

            Livewire::component('app.http.livewire.reference.reference-form-modal', \App\Http\Livewire\Reference\Modal\ReferenceFormModal::class);
            Livewire::component('reference-form-modal', \App\Http\Livewire\Reference\Modal\ReferenceFormModal::class);

            Livewire::component('app.http.livewire.reference.reference-confirm-changes-modal', \App\Http\Livewire\Reference\ReferenceConfirmChangesModal::class);
            Livewire::component('reference-confirm-changes-modal', \App\Http\Livewire\Reference\ReferenceConfirmChangesModal::class);

            Livewire::component('app.http.livewire.reference.reference-details-modal', \App\Http\Livewire\Reference\Modal\ReferenceDetailsModal::class);
            Livewire::component('reference-details-modal', \App\Http\Livewire\Reference\Modal\ReferenceDetailsModal::class);

            Livewire::component('app.http.livewire.reference.reference-delete-modal', \App\Http\Livewire\Reference\Modal\ReferenceDeleteModal::class);
            Livewire::component('reference-delete-modal', \App\Http\Livewire\Reference\Modal\ReferenceDeleteModal::class);
            Livewire::component('app.http.livewire.reference.reference-archive-modal', \App\Http\Livewire\Reference\Modal\ReferenceArchiveModal::class);
            Livewire::component('reference.reference-archive-modal', \App\Http\Livewire\Reference\Modal\ReferenceArchiveModal::class);
            Livewire::component('reference-archive-modal', \App\Http\Livewire\Reference\Modal\ReferenceArchiveModal::class);
            Livewire::component('app.http.livewire.reference.reference-restore-modal', \App\Http\Livewire\Reference\Modal\ReferenceRestoreModal::class);
            Livewire::component('reference-restore-modal', \App\Http\Livewire\Reference\Modal\ReferenceRestoreModal::class);
            Livewire::component('app.http.livewire.reference.reference-force-delete-modal', \App\Http\Livewire\Reference\Modal\ReferenceForceDeleteModal::class);
            Livewire::component('reference-force-delete-modal', \App\Http\Livewire\Reference\Modal\ReferenceForceDeleteModal::class);
            Livewire::component('reference.reference-toolbar', \App\Http\Livewire\Reference\ReferenceToolbar::class);
        }

        // Define gate for managing reference tables
        if (class_exists(Gate::class)) {
            Gate::define('manageReferenceTables', [ReferenceTablePolicy::class, 'manage']);
        }

        // Provide a server-side `emit()` helper that proxies to the project's `dispatch()`
        // method (HandlesEvents). This allows components to call `$this->emit(...)`
        // consistently with Livewire JS semantics while using the project's event
        // dispatch mechanism.
        if (class_exists(\Livewire\Component::class) && method_exists(\Livewire\Component::class, 'dispatch')) {
            \Livewire\Component::macro('emit', function ($event, ...$params) {
                return $this->dispatch($event, ...$params);
            });
        }
    }
}

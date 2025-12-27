<?php
namespace App\Http\Livewire\Reference\Modal;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Reference;
use Illuminate\Support\Facades\Gate;
use Spatie\Activitylog\Models\Activity;
use Masmerise\Toaster\Toastable;
use App\Http\Livewire\Traits\SelectRows;

class ReferenceArchiveModal extends Component
{
    use WithPagination;
    use SelectRows;
    use \Masmerise\Toaster\Toastable;

    public bool $open = false;
    public array $selected = [];
    public bool $selectAll = false;
    // When true, render a trigger button alongside the modal so callers
    // can include this component directly and avoid cross-component emits.
    public bool $renderTrigger = false;
    // model class to operate on; default to Reference so component can be reused
    public string $modelClass = Reference::class;
    public int $perPage = 15;
    // (previous) server-side pending state removed in favor of dedicated modals

    protected $listeners = [
        'openReferenceArchive' => 'open',
        'refreshReferenceArchive' => 'handleRefresh',
    ];

    public function open()
    {
        $this->open = true;
        $this->clearSelection();
        $this->resetPage();
    }

    public function close()
    {
        $this->open = false;
    }

    

    public function restore($id)
    {
        // Open the confirmation modal for a single item (follow the confirm pattern)
        $this->emit('confirmReferenceRestore', [
            'ids' => [$id],
            'modelClass' => $this->modelClass,
        ]);

        // Close archive so the confirmation modal appears alone
        $this->open = false;
    }

    public function restoreSelected()
    {
        $models = ($this->modelClass)::withTrashed()->whereIn('id', $this->selected)->get();
        foreach ($models as $m) {
            $policy = Gate::getPolicyFor($m);
            if ($policy && method_exists($policy, 'restore')) {
                Gate::authorize('restore', $m);
            } else {
                Gate::authorize('manageReferenceTables');
            }
            $m->restore();
            if (function_exists('activity')) activity()->performedOn($m)->causedBy(auth()->user())->log('restored');
        }
        $this->clearSelection();
        $labels = $models->map(function ($m) {
            return $m->name ?? $m->title ?? (string) ($m->id ?? '');
        })->values()->all();
        $count = count($labels);
        if ($count === 1) {
            $this->success('Restored: ' . $labels[0]);
        } else {
            $preview = implode(', ', array_slice($labels, 0, 3));
            $more = $count > 3 ? ' and ' . ($count - 3) . ' more' : '';
            $this->success('Restored ' . $count . ' items: ' . $preview . $more);
        }
        $this->dispatch('refreshReferenceTable');
        $this->dispatch('refreshReferenceArchive');
    }
    public function prepareBulkAction(string $action)
    {
        // Dispatch a confirmation payload to the dedicated modal (pattern used
        // by ReferenceFormModal::save()), then close this archive modal so the
        // confirmation modal can appear alone.
        if ($action === 'restoreSelected') {
            $this->emit('confirmReferenceRestore', [
                'ids' => $this->selected,
                'modelClass' => $this->modelClass,
            ]);
        } elseif ($action === 'forceDeleteSelected') {
            $this->emit('confirmReferenceForceDelete', [
                'ids' => $this->selected,
                'modelClass' => $this->modelClass,
            ]);
        }

        $this->open = false;
    }

    public function forceDelete($id)
    {
        // Open the confirmation modal for a single item
        $this->emit('confirmReferenceForceDelete', [
            'ids' => [$id],
            'modelClass' => $this->modelClass,
        ]);

        // Close archive so the confirmation modal appears alone
        $this->open = false;
    }

    public function forceDeleteSelected()
    {
        $models = ($this->modelClass)::withTrashed()->whereIn('id', $this->selected)->get();
        foreach ($models as $m) {
            $policy = Gate::getPolicyFor($m);
            if ($policy && method_exists($policy, 'forceDelete')) {
                Gate::authorize('forceDelete', $m);
            } else {
                Gate::authorize('manageReferenceTables');
            }
            $m->forceDelete();
            if (function_exists('activity')) activity()->performedOn($m)->causedBy(auth()->user())->log('force_deleted');
        }
        $this->clearSelection();
        $labels = $models->map(function ($m) {
            return $m->name ?? $m->title ?? (string) ($m->id ?? '');
        })->values()->all();
        $count = count($labels);
        if ($count === 1) {
            $this->success('Deleted permanently: ' . $labels[0]);
        } else {
            $preview = implode(', ', array_slice($labels, 0, 3));
            $more = $count > 3 ? ' and ' . ($count - 3) . ' more' : '';
            $this->success('Deleted permanently: ' . $preview . $more);
        }
        $this->dispatch('refreshReferenceTable');
        $this->dispatch('refreshReferenceArchive');
    }

    public function render()
    {
        $items = ($this->modelClass)::onlyTrashed()->paginate($this->perPage);
        // Attach a `deleted_by_name` attribute to each item by looking up
        // the most recent 'deleted' activity for the item (if any).
        $ids = $items->pluck('id')->all();
        if (!empty($ids)) {
            $activities = Activity::where('subject_type', $this->modelClass)
                ->whereIn('subject_id', $ids)
                ->where('description', 'deleted')
                ->latest()
                ->get()
                ->groupBy('subject_id');

            $items->getCollection()->transform(function ($item) use ($activities) {
                $group = $activities[(string) $item->getKey()] ?? $activities[$item->getKey()] ?? null;
                $actor = null;
                if ($group && $group->first()?->causer) {
                    $actor = $group->first()->causer->name ?? $group->first()->causer->email ?? null;
                }
                $item->deleted_by_name = $actor;
                return $item;
            });
        }
        return view('livewire.reference.modal.reference-archive-modal', compact('items'));
    }

    /**
     * Handle external requests to refresh the archive listing.
     * Clears any stale selection and resets pagination so restored rows
     * are no longer selected.
     */
    public function handleRefresh(): void
    {
        $this->clearSelection();
        $this->resetPage();
    }

    protected function getSelectablePageIds(): array
    {
        return ($this->modelClass)::onlyTrashed()->paginate($this->perPage, ['*'], 'page', $this->page ?? 1)
            ->pluck('id')
            ->map(fn($i) => (string) $i)
            ->toArray();
    }
}

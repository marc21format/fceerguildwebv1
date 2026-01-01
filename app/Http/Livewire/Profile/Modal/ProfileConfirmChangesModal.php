<?php

namespace App\Http\Livewire\Profile\Modal;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Services\ActivityLogger;
use Masmerise\Toaster\Toastable;
use App\Support\ChangeSetBuilder;

class ProfileConfirmChangesModal extends Component
{
    use Toastable;

    public ?string $modelClass = null;
    public array $changes = [];
    public array $state = [];
    public ?int $id = null;
    public bool $open = false;

    protected $listeners = ['confirmCredentialSave'];

    public function mount($modelClass = null)
    {
        $this->modelClass = $modelClass;
    }

    public function confirmCredentialSave($payload): void
    {
        $this->id = $payload['id'] ?? null;
        $this->state = $payload['state'] ?? [];
        $this->changes = $payload['changes'] ?? [];
        $this->modelClass = $payload['modelClass'] ?? $this->modelClass;
        $this->open = true;
    }

    public function confirm(): void
    {
        if (! auth()->check()) {
            abort(403);
        }

        $logger = app(ActivityLogger::class);
        $modelClass = $this->modelClass;

        \Log::debug('ProfileConfirmChangesModal::confirm called', [
            'modelClass' => $this->modelClass,
            'id' => $this->id,
            'changes_keys' => array_keys($this->changes),
            'state_keys' => array_keys($this->state),
        ]);

        try {
            DB::transaction(function () use ($modelClass, $logger, &$m) {
                if ($this->id) {
                    $m = ($modelClass)::findOrFail($this->id);
                    $m->fill($this->state);
                    if (auth()->check()) {
                        $m->updated_by_id = auth()->id();
                    }
                    $m->save();
                    try { $logger->logCreateOrUpdate($m, 'updated', $this->changes, auth()->user()); } catch (\Throwable $e) { \Log::debug('ActivityLogger::logCreateOrUpdate failed', ['e' => $e]); }
                } else {
                    $m = new ($modelClass)();
                    $m->fill($this->state);
                    if (auth()->check()) {
                        $m->created_by_id = auth()->id();
                        $m->updated_by_id = auth()->id();
                    }
                    $m->save();
                    try { $logger->logCreateOrUpdate($m, 'created', $this->changes, auth()->user()); } catch (\Throwable $e) { \Log::debug('ActivityLogger::logCreateOrUpdate failed', ['e' => $e]); }
                }
            });

            $this->emit('savedCredential');
            // Also emit a model-specific saved event to allow components to listen narrowly
            if (! empty($this->modelClass)) {
                $this->emit('savedCredential:'.$this->modelClass, ['id' => $m->getKey() ?? null]);
            }

            \Log::debug('ProfileConfirmChangesModal emitted savedCredential', [
                'model' => isset($m) ? (is_object($m) ? get_class($m) . ':' . ($m->getKey() ?? 'no-id') : (string) $m) : null,
            ]);

            // Emit a Livewire debug event (client can listen with `Livewire.on('profile-confirm-debug', ...)`)
            $this->emit('profile-confirm-debug', [
                'modelClass' => $this->modelClass,
                'id' => $this->id,
                'changes_count' => count($this->changes ?? []),
                'state_keys' => array_values(array_slice(array_keys($this->state ?? []), 0, 10)),
            ]);

            $label = $m->name ?? $m->title ?? $m->label ?? (method_exists($m, 'getKey') ? "ID {$m->getKey()}" : class_basename($m));

            // Special formatting for HighschoolRecord to match toasts elsewhere
            if ($m instanceof \App\Models\HighschoolRecord) {
                $hsName = optional($m->highschool)->name ?? $label;
                $level = trim((string) ($m->level ?? ''));
                if ($level !== '') {
                    $level = ucfirst($level);
                    if (! str_ends_with(strtolower($level), 'highschool')) {
                        $level = $level . ' Highschool';
                    }
                }
                $years = '';
                if ($m->year_started || $m->year_ended) {
                    $years = '(' . ($m->year_started ?? '') . '-' . ($m->year_ended ?? '') . ')';
                }

                $label = trim($hsName . ' - ' . trim($level . ': ' . $years), " -:");
            }

            // Special formatting for SubjectTeacher so toasts show subject name + proficiency
            if ($m instanceof \App\Models\SubjectTeacher) {
                $subjectName = optional($m->volunteerSubject)->name ?? ($m->volunteer_subject_id ? 'Volunteer Subject #' . $m->volunteer_subject_id : null);
                $prof = trim((string) ($m->subject_proficiency ?? ''));
                $label = trim($subjectName . ($prof !== '' ? ' - ' . $prof : ''));
            }

            $this->success("Saved: {$label}");

            $this->open = false;
        } catch (\Throwable $e) {
            $this->error('An error occurred while saving.');
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.profile.modal.confirm-changes-modal');
    }
}

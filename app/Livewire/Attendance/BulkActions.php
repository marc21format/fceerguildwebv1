<?php

namespace App\Livewire\Attendance;

use App\Models\AttendanceRecord;
use App\Models\ReviewSeason;
use App\Services\AttendanceService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class BulkActions extends Component
{
    public bool $showModal = false;
    
    // Type: 'students' or 'volunteers'
    public string $type = 'students';
    
    // Selected record IDs
    public array $selectedIds = [];
    
    // For students: bulk status change
    public ?string $bulkStatus = null;
    
    // For volunteers: bulk time setting
    public ?string $bulkTimeIn = null;
    public ?string $bulkTimeOut = null;
    
    // Context for the action
    public ?string $date = null;
    public ?string $session = null; // For students
    
    // Confirmation
    public bool $showConfirmation = false;
    public string $confirmationMessage = '';
    public string $pendingAction = '';

    protected AttendanceService $attendanceService;

    protected $listeners = [
        'openBulkActions' => 'openModal',
        'updateSelectedIds' => 'setSelectedIds',
        'clearBulkSelection' => 'clearSelection',
    ];

    public function boot(): void
    {
        $this->attendanceService = app(AttendanceService::class);
    }

    public function openModal(string $type, array $selectedIds, ?string $date = null, ?string $session = null): void
    {
        if (!Gate::allows('bulkUpdateAttendance')) {
            return;
        }

        $this->type = $type;
        $this->selectedIds = $selectedIds;
        $this->date = $date;
        $this->session = $session;
        $this->resetActions();
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->showConfirmation = false;
        $this->resetActions();
    }

    public function setSelectedIds(array $ids): void
    {
        $this->selectedIds = $ids;
    }

    public function clearSelection(): void
    {
        $this->selectedIds = [];
        $this->dispatch('bulkSelectionCleared');
    }

    public function resetActions(): void
    {
        $this->bulkStatus = null;
        $this->bulkTimeIn = null;
        $this->bulkTimeOut = null;
        $this->showConfirmation = false;
        $this->confirmationMessage = '';
        $this->pendingAction = '';
    }

    public function getSelectedCountProperty(): int
    {
        return count($this->selectedIds);
    }

    /* ─────────────────────────────────────────────────────────────
     |  Student Bulk Actions
     * ───────────────────────────────────────────────────────────── */

    public function prepareSetStatus(string $status): void
    {
        if (empty($this->selectedIds)) {
            return;
        }

        $this->bulkStatus = $status;
        $this->pendingAction = 'setStatus';
        
        $sessionText = $this->session === 'both' ? 'AM and PM' : strtoupper($this->session);
        $this->confirmationMessage = "Set {$this->selectedCount} student(s) to \"{$status}\" for {$sessionText} session?";
        $this->showConfirmation = true;
    }

    public function confirmSetStatus(): void
    {
        if (!Gate::allows('bulkUpdateAttendance') || !$this->bulkStatus || !$this->date || !$this->session) {
            return;
        }

        $reviewSeason = ReviewSeason::getActive();

        $updated = $this->attendanceService->bulkSetStudentStatus(
            $this->selectedIds,
            $this->date,
            $this->session,
            $this->bulkStatus,
            Auth::id(),
            $reviewSeason?->id
        );

        $sessionText = $this->session === 'both' ? 'AM and PM sessions' : strtoupper($this->session) . ' session';
        $this->dispatch('attendanceUpdated');
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => "Updated {$updated} attendance record(s) to \"{$this->bulkStatus}\" for {$sessionText}.",
        ]);

        $this->closeModal();
        $this->clearSelection();
    }

    /* ─────────────────────────────────────────────────────────────
     |  Volunteer Bulk Actions
     * ───────────────────────────────────────────────────────────── */

    public function prepareSetTimeIn(): void
    {
        if (empty($this->selectedIds) || !$this->bulkTimeIn) {
            return;
        }

        $this->pendingAction = 'setTimeIn';
        
        if ($this->type === 'students') {
            $sessionText = $this->session === 'both' ? 'AM and PM' : strtoupper($this->session);
            $this->confirmationMessage = "Set Time In to \"{$this->bulkTimeIn}\" for {$this->selectedCount} student(s) in {$sessionText} session?";
        } else {
            $this->confirmationMessage = "Set Time In to \"{$this->bulkTimeIn}\" for {$this->selectedCount} user(s)?";
        }
        
        $this->showConfirmation = true;
    }

    public function prepareSetTimeOut(): void
    {
        if (empty($this->selectedIds) || !$this->bulkTimeOut) {
            return;
        }

        $this->pendingAction = 'setTimeOut';
        
        if ($this->type === 'students') {
            $sessionText = $this->session === 'both' ? 'AM and PM' : strtoupper($this->session);
            $this->confirmationMessage = "Set Time Out to \"{$this->bulkTimeOut}\" for {$this->selectedCount} student(s) in {$sessionText} session?";
        } else {
            $this->confirmationMessage = "Set Time Out to \"{$this->bulkTimeOut}\" for {$this->selectedCount} user(s)?";
        }
        
        $this->showConfirmation = true;
    }

    public function confirmTime(): void
    {
        if (!Gate::allows('bulkUpdateAttendance') || !$this->date) {
            return;
        }

        $reviewSeason = ReviewSeason::getActive();

        if ($this->pendingAction === 'setTimeIn' && $this->bulkTimeIn) {
            if ($this->type === 'students') {
                $processed = $this->attendanceService->bulkSetStudentTime(
                    $this->selectedIds,
                    $this->date,
                    $this->session ?? 'am',
                    $this->bulkTimeIn,
                    false, // isTimeOut
                    Auth::id(),
                    $reviewSeason?->id
                );
                
                $sessionText = $this->session === 'both' ? 'AM and PM sessions' : strtoupper($this->session) . ' session';
                $message = "Set Time In for {$processed} student(s) in {$sessionText}.";
            } else {
                $processed = $this->attendanceService->bulkSetVolunteerTime(
                    $this->selectedIds,
                    $this->date,
                    $this->bulkTimeIn,
                    false, // isTimeOut
                    Auth::id(),
                    $reviewSeason?->id
                );
                
                $message = "Set Time In for {$processed} user(s).";
            }

            $this->dispatch('attendanceUpdated');
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => $message,
            ]);
        }

        if ($this->pendingAction === 'setTimeOut' && $this->bulkTimeOut) {
            if ($this->type === 'students') {
                $processed = $this->attendanceService->bulkSetStudentTime(
                    $this->selectedIds,
                    $this->date,
                    $this->session ?? 'am',
                    $this->bulkTimeOut,
                    true, // isTimeOut
                    Auth::id(),
                    $reviewSeason?->id
                );
                
                $sessionText = $this->session === 'both' ? 'AM and PM sessions' : strtoupper($this->session) . ' session';
                $message = "Set Time Out for {$processed} student(s) in {$sessionText}.";
            } else {
                $processed = $this->attendanceService->bulkSetVolunteerTime(
                    $this->selectedIds,
                    $this->date,
                    $this->bulkTimeOut,
                    true, // isTimeOut
                    Auth::id(),
                    $reviewSeason?->id
                );
                
                $message = "Set Time Out for {$processed} user(s).";
            }

            $this->dispatch('attendanceUpdated');
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => $message,
            ]);
        }

        $this->closeModal();
        $this->clearSelection();
    }

    /* ─────────────────────────────────────────────────────────────
     |  Shared Actions
     * ───────────────────────────────────────────────────────────── */

    public function prepareMarkAllAbsent(): void
    {
        if (empty($this->selectedIds) || !$this->date) {
            return;
        }

        $this->pendingAction = 'markAbsent';
        $this->confirmationMessage = "Mark {$this->selectedCount} user(s) as Absent for this date?";
        $this->showConfirmation = true;
    }

    public function confirmMarkAbsent(): void
    {
        if (!Gate::allows('bulkUpdateAttendance') || !$this->date) {
            return;
        }

        $reviewSeason = ReviewSeason::getActive();

        if ($this->type === 'students') {
            $created = $this->attendanceService->bulkMarkAbsent(
                $this->selectedIds,
                $this->date,
                $this->session ?? 'am',
                Auth::id(),
                $reviewSeason?->id
            );
        } else {
            // For volunteers, mark absent by not creating records (or updating status)
            $created = $this->attendanceService->bulkUpdateStatus(
                $this->selectedIds,
                AttendanceService::STATUS_ABSENT,
                Auth::id()
            );
        }

        $this->dispatch('attendanceUpdated');
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => "Marked {$created} user(s) as Absent.",
        ]);

        $this->closeModal();
        $this->clearSelection();
    }

    public function confirmAction(): void
    {
        match ($this->pendingAction) {
            'setStatus' => $this->confirmSetStatus(),
            'setTimeIn', 'setTimeOut' => $this->confirmTime(),
            'markAbsent' => $this->confirmMarkAbsent(),
            default => null,
        };
    }

    public function cancelConfirmation(): void
    {
        $this->showConfirmation = false;
        $this->pendingAction = '';
        $this->confirmationMessage = '';
    }

    public function render()
    {
        return view('livewire.attendance.bulk-actions');
    }
}

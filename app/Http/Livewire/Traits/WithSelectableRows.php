<?php

namespace App\Http\Livewire\Traits;

trait WithSelectableRows
{
    // Implementing component must provide this method returning current page IDs as strings
    abstract protected function getSelectablePageIds(): array;

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = $this->getSelectablePageIds();
        } else {
            $this->selected = [];
        }

        $this->updatedSelected();
    }

    public function updatedSelected()
    {
        $pageIds = $this->getSelectablePageIds();

        if (empty($pageIds)) {
            $this->selectAll = false;
            return;
        }

        $selected = array_map('strval', $this->selected ?? []);
        $intersection = array_intersect($pageIds, $selected);
        $this->selectAll = count($intersection) === count($pageIds);
    }

    public function toggleSelectAll(): void
    {
        $this->selectAll = ! $this->selectAll;

        if ($this->selectAll) {
            $this->selected = $this->getSelectablePageIds();
        } else {
            $this->selected = [];
        }

        $this->updatedSelected();
    }

    public function toggleRow(string $id): void
    {
        $id = (string) $id;

        if (in_array($id, $this->selected ?? [], true)) {
            $this->selected = array_values(array_diff($this->selected, [$id]));
        } else {
            $this->selected[] = $id;
        }

        $this->updatedSelected();
    }

    public function selectEnsure(string $id): void
    {
        $id = (string) $id;

        if (! in_array($id, $this->selected ?? [], true)) {
            $this->selected[] = $id;
            $this->updatedSelected();
        }
    }

    public function selectOnly(string $id): void
    {
        $this->selected = [(string) $id];
        $this->selectAll = false;

        $this->updatedSelected();
    }

    public function clearSelection(): void
    {
        $this->selected = [];
        $this->selectAll = false;
    }
}

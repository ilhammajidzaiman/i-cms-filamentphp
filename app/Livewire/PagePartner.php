<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Feature\Partner;

class PagePartner extends Component
{
    public $search = '';
    public $page = 1;
    public $perPage = 6;
    public $lastPage = 1;
    public $more = false;
    public $data;

    public function mount()
    {
        $this->data = collect();
        $this->fetchData();
    }

    public function updatedSearch()
    {
        $this->data = collect();
        $this->resetPage();
        $this->fetchData();
    }

    public function resetPage()
    {
        $this->page = 1;
    }

    public function fetchData()
    {
        $query = Partner::show()
            ->orderByDesc('created_at')
            ->latest()
            ->when($this->search, function ($q) {
                $q->where('title', 'ilike', '%' . $this->search . '%');
            });
        $paginator = $query->paginate($this->perPage, ['*'], 'page', $this->page);
        $this->lastPage = $paginator->lastPage();
        $this->more = $this->page < $this->lastPage;
        $this->data = $this->data->concat($paginator->items())->values();
    }

    public function loadMore()
    {
        if ($this->page < $this->lastPage) :
            $this->page++;
            $this->fetchData();
        endif;
    }

    public function render()
    {
        return view('livewire.page-partner');
    }
}

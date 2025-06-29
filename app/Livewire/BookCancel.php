<?php

namespace App\Livewire;

use App\Models\BookCancel as ModelsBookCancel;
use Livewire\Component;
use Livewire\WithPagination;

class BookCancel extends Component
{
    use WithPagination;

    public $dateFilter = '';
    public $whoDeleteFilter = '';
    public $emailFilter = '';

    protected $queryString = [
        'dateFilter' => ['except' => ''],
        'whoDeleteFilter' => ['except' => ''],
        'emailFilter' => ['except' => ''],
    ];

    public function render()
    {
        return view('livewire.book-cancel', [
            'booking_cancel' => ModelsBookCancel::query()
                ->when($this->dateFilter, function ($query) {
                    $query->where('date', $this->dateFilter);
                })
                ->when($this->whoDeleteFilter, function ($query) {
                    $query->where('who_delete', $this->whoDeleteFilter);
                })
                ->when($this->emailFilter, function ($query) {
                    $query->where('email', 'like', '%' . $this->emailFilter . '%');
                })
                ->paginate(10)
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['dateFilter', 'whoDeleteFilter', 'emailFilter']);
    }
}
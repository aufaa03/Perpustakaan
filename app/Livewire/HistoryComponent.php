<?php

namespace App\Livewire;

use App\Models\pengembalian;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class HistoryComponent extends Component
{
    use WithPagination,WithoutUrlPagination;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $data['pengembalian'] = pengembalian::paginate(5);
        $layout['title'] = "pengembalian Buku";
        return view('livewire.history-component', $data)->layoutData($layout);
    }
}

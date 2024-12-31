<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\pengembalian;
use App\Models\pinjam;
use App\Models\User;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $x['title'] = 'Home Perpustakaan';
        $data['member'] = User::where('role','member')->count();
        $data['pinjam'] = pinjam::where('status','pinjam')->count();
        $data['kembali'] = pengembalian::count();
        $data['buku'] = Buku::count();
        return view('livewire.home-component', $data)->layoutData($x);
    }
}

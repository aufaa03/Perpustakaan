<?php

namespace App\Livewire;

use App\Models\pengembalian;
use App\Models\pinjam;
use DateTime;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class KembaliComponent extends Component
{
    use WithPagination,WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $id, $member, $judul, $tglkembali, $tglpinjam, $denda, $status;
    public function render()
    {
        $layout['title'] = "Pengembalian Buku";
        $data['pinjam'] = pinjam::where('status', 'pinjam')->paginate(5);
        return view('livewire.kembali-component', $data)->layoutData($layout);
    }
    public function pilih($id)  {
        $pinjam = pinjam::find($id);
        $this->judul = $pinjam->buku->judul;
        $this->member = $pinjam->user->nama;
        $this->judul = $pinjam->buku->judul;
        $this->tglkembali = $pinjam->tgl_kembali;
        $this->tglpinjam = $pinjam->tgl_pinjam;
        $this->id = $pinjam->id;
        $kembali = new DateTime($this->tglkembali);
        $awalPinjam = new DateTime($this->tglpinjam);
        $today = new DateTime();
        if ($today > $kembali) {
            $selisih = $today->diff($kembali);
            $this->status = "Terlambat $selisih->days Hari";
        } else {
            $this->status = "Tidak Terlambat";
        }
        $selisih = $today->diff($kembali);
        if ($selisih->invert == 1) {
            $this->denda = $selisih->days * 1000;
        } else {
            $this->denda = 0;
        }
    }
    public function store() {
        $pinjam = pinjam::find($this->id);
        pengembalian::create([
            'pinjam_id' => $this->id,
            'denda' => $this->denda,
            'tgl_kembali' => date('Y-m-d')
        ]);
        $pinjam->update([
            'status' => 'kembali'
        ]);
        return redirect()->route('pengembalian')->with('success', 'Data Berhasil diProses!');
    }
}

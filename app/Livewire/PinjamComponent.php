<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\pinjam;
use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class PinjamComponent extends Component
{
    use WithPagination,WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $id, $user, $buku, $tgl_pinjam, $tgl_kembali,$sekarang,$lama;
    public function render()
    {
        $data['member'] = User::where("role", 'member')->get();
        $data['books']  = Buku::all();
        $data['pinjam'] = pinjam::paginate(5);
        $layout['title'] = "Peminjaman Buku";
        return view('livewire.pinjam-component', $data)->layoutData($layout);
    }
    public function store(){
        $this->validate([
            'buku' => 'required',
            'user' => 'required',
            'lama' => 'required|integer|min:1'
        ],[
            'buku.required' => 'Harus Memilih buku Buku',
            'user.required' => 'Harus Memilih member',
            'lama.required' => 'Harus Memilih Lama Peminjaman',
            'lama.integer' => 'Lama Peminjaman Harus Angka',
            'lama.min' => 'Lama Peminjaman Minimal 1 Hari'
        ]);
        $this->tgl_pinjam = date('Y-m-d');
        $this->tgl_kembali = date('Y-m-d', strtotime("+{$this->lama} days"));
        pinjam::create([
          'user_id' => $this->user,
          'buku_id' =>  $this->buku,
          'tgl_pinjam' => $this->tgl_pinjam,
          'tgl_kembali' => $this->tgl_kembali,
          'status' => 'pinjam',
          'lama_pinjam' => $this->lama,
        ]);
        return redirect()->route('pinjam')->with('success','Berhasil Menambah Data!');
    }
    public function edit($id) {
        $pinjam = pinjam::find($id);
        $this->id = $pinjam->id;
        $this->user = $pinjam->user_id;
        $this->buku = $pinjam->buku_id;
        $this->lama = $pinjam->lama_pinjam;
        $this->tgl_pinjam = $pinjam->tgl_pinjam;
        $this->tgl_kembali = $pinjam->tgl_kembali;
    }
    public function update() {
        $pinjam = pinjam::find($this->id);
        $kembali = date('Y-m-d', strtotime($this->tgl_pinjam. "+{$this->lama} days"));
        $pinjam->update([
            'user_id' => $this->user,
            'buku_id' => $this->buku,
            'lama_pinjam' => $this->lama,
            'tgl_kembali' => $kembali,
            'status' => 'pinjam',
        ]);
        return redirect()->route('pinjam')->with('success', 'Berhasil Memperbarui Data!');
    }
    public function confirmDelete($id) {
        $this->id = $id;
    }
    public function destroy() {
        $pinjam = pinjam::find($this->id);
        $pinjam->delete();
        return redirect()->route('pinjam')->with('success', 'Berhasil Menghapus Data!');
    }
}

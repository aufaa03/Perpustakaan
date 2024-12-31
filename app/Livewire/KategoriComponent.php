<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class KategoriComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $nama, $deskripsi, $search, $id;
    public function render()
    {
        if ($this->search != "") {
            $data['kategori'] = Kategori::where('nama', 'like', '%'.$this->search.'%')->paginate(5);
        }
        else {
            $data['kategori'] = Kategori::paginate(5);

        }
        $layout['title'] = 'Kategori';
        return view('livewire.kategori-component',$data)->layoutData($layout);
    }
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ],[
            'nama.required' => 'Kategori harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi'
        ]);
        Kategori::create([
            'nama' =>$this->nama,
            'deskripsi' => $this->deskripsi,
        ]);
        return redirect('admin/kategori')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id) {
        $kategori = Kategori::find($id);
        $this->nama = $kategori->nama;
        $this->deskripsi = $kategori->deskripsi;
        $this->id = $id;
    }
    public function update() {
        $kategori = Kategori::find($this->id);
        $kategori->update([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
        ]);
        return redirect('admin/kategori')->with('success', 'Data berhasil diupdate');
    }
    public function confirmDelete($id)
    {
        $this->id = $id;
    }
    public function
    destroy() {
        $kategori = Kategori::find($this->id);
        $kategori->delete();
        return redirect('admin/kategori')->with('success', 'Data berhasil dihapus');
    }
}

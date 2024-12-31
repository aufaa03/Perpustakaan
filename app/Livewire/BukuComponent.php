<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class BukuComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $kategori,$judul,$penulis,$penerbit,$tahun,$isbn,$jumlah,$search,$id;
    public function render()
    {
        if ($this->search != "") {
            $data['buku'] = Buku::where('judul', 'like', '%'.$this->search.'%')->paginate(5);
        }
        else {
            $data['buku'] = Buku::paginate(5);

        }
        $data['kateg'] = Kategori::all();
        $layout['title'] = 'Daftar Buku';
        return view('livewire.buku-component', $data)->layoutData($layout);
    }
    public function store() {
        $this->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'penulis' => 'required',
            'tahun' => 'required',
            'isbn' => 'required',
            'jumlah' => 'required',
            'kategori' => 'required',
        ],[
            'judul.required' => 'Judul Buku harus Diisi',
            'penerbit.required' => 'Penerbit harus Diisi',
            'penulis.required' => 'Penulis harus Diisi',
            'tahun.required' => 'Tahun harus Diisi',
            'isbn.required' => 'ISBN harus Diisi',
            'jumlah.required' => 'Jumlah harus Diisi',
            'kategori.required' => 'harus memilih kategori',
        ]);
        Buku::create([
            'judul' => $this->judul,
            'penerbit' => $this->penerbit,
            'penulis' => $this->penulis,
            'tahun' => $this->tahun,
            'isbn' => $this->isbn,
            'jumlah' => $this->jumlah,
            'kategori_id' => $this->kategori,
        ]);
        return redirect('admin/buku')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $buku = Buku::find($id);
        $this->judul = $buku->judul;
        $this->penerbit = $buku->penerbit;
        $this->penulis = $buku->penulis;
        $this->tahun = $buku->tahun;
        $this->isbn = $buku->isbn;
        $this->jumlah = $buku->jumlah;
        $this->kategori = $buku->kategori_id;
        $this->id = $id;
    }
    public function update()
    {
        $buku = Buku::find($this->id);
        $buku->update([
            'judul' => $this->judul,
            'penerbit' => $this->penerbit,
            'penulis' => $this->penulis,
            'tahun' => $this->tahun,
            'isbn' => $this->isbn,
            'jumlah ' => $this->jumlah,
            'kategori_id' => $this->kategori,
        ]);
        return redirect('admin/buku')->with('success', 'Data Berhasil Diubah');
    }
}

<div>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Perpustakaan /</span> Daftar Buku</h4>

    <!-- Basic Bootstrap Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Daftar Buku</h5>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- Tombol di kiri -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                            <span class="bx bx-plus"></span> Tambah
                        </button>

                        <!-- Input di kanan -->
                        <div style="width: 300px;">
                            <input type="text" wire:model.live='search' class="form-control" placeholder="Search..." />
                        </div>
                    </div>

                    <div class="table-responsive text-nowrap mt-4 text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($buku->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center pt-3 fs-5">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                                @foreach ($buku as $data)
                                    <tr>
                                        <td><i class="fab fa-react fa-lg text-info me-2"></i>
                                            <strong>{{ $loop->iteration }}</strong>
                                        </td>
                                        <td>{{ $data->judul }}</td>
                                        <td>
                                            {{ $data->kategori->nama }}
                                        </td>
                                        <td>
                                            {{ $data->penulis }}
                                        </td>
                                        <td>
                                            {{ $data->penerbit }}
                                        </td>
                                        <td>
                                            {{ $data->tahun }}
                                        </td>

                                        <td>
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal"  wire:click='edit({{ $data->id }})'>

                                                <span class="bx bx-pencil"></span>
                                            </button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" wire:click='confirmDelete({{ $data->id }})'>
                                                <span class="bx bx-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $buku->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Judul</label>
                            <input type="text" id="nameBasic" class="form-control" wire:model='judul'
                                value="{{ @old('judul') }}" placeholder="Masukan Judul" />
                            @error('judul')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Penulis</label>
                            <input type="text" id="nameBasic" class="form-control" wire:model='penulis'
                                value="{{ @old('penulis') }}" placeholder="Masukan Penulis" />
                            @error('penulis')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">penerbit</label>
                            <input type="text" id="emailBasic" class="form-control" wire:model='penerbit'
                                value="{{ @old('penerbit') }}" placeholder="penerbit" />
                            @error('penerbit')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tahun</label>
                            <input type="text" id="emailBasic" class="form-control" wire:model='tahun'
                                value="{{ @old('tahun') }}" placeholder="tahun" />
                            @error('tahun')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                        <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">ISBN</label>
                            <input type="text" id="emailBasic" class="form-control" wire:model='isbn'
                                value="{{ @old('isbn') }}" placeholder="isbn" />
                            @error('isbn')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">jumlah</label>
                            <input type="text" id="emailBasic" class="form-control" wire:model='jumlah'
                            value="{{ @old('jumlah') }}" placeholder="jumlah" />
                            @error('jumlah')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                            @enderror
                        </div>
                    </div>
                        <div class="row g-2">
                        <div class="col mb-0">
                            <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
                        <select class="form-select" wire:model='kategori' id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected>--Pilih</option>
                          @foreach ($kateg as $item)
                          <option value="{{$item->id}}">{{$item->nama}}</option>

                          @endforeach
                        </select>
                            @error('kategori')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" wire:click='store'>Tambah</button>
                </div>
            </div>
        </div>
    </div>

{{-- edit modal --}}
<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Judul</label>
                        <input type="text" id="nameBasic" class="form-control" wire:model='judul'
                            value="{{ @old('judul') }}" placeholder="Masukan Judul" />
                        @error('judul')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Penulis</label>
                        <input type="text" id="nameBasic" class="form-control" wire:model='penulis'
                            value="{{ @old('penulis') }}" placeholder="Masukan Penulis" />
                        @error('penulis')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailBasic" class="form-label">penerbit</label>
                        <input type="text" id="emailBasic" class="form-control" wire:model='penerbit'
                            value="{{ @old('penerbit') }}" placeholder="penerbit" />
                        @error('penerbit')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                        @enderror
                    </div>
                    <div class="col mb-0">
                        <label for="emailBasic" class="form-label">Tahun</label>
                        <input type="text" id="emailBasic" class="form-control" wire:model='tahun'
                            value="{{ @old('tahun') }}" placeholder="tahun" />
                        @error('tahun')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                        @enderror
                    </div>
                    <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailBasic" class="form-label">ISBN</label>
                        <input type="text" id="emailBasic" class="form-control" wire:model='isbn'
                            value="{{ @old('isbn') }}" placeholder="isbn" />
                        @error('isbn')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                        @enderror
                    </div>
                    <div class="col mb-0">
                        <label for="emailBasic" class="form-label">jumlah</label>
                        <input type="text" id="emailBasic" class="form-control" wire:model='jumlah'
                        value="{{ @old('jumlah') }}" placeholder="jumlah" />
                        @error('jumlah')
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>{{ $message }}</strong>

                        </div>
                        @enderror
                    </div>
                </div>
                    <div class="row g-2">
                    <div class="col mb-0">
                        <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
                    <select class="form-select" wire:model='kategori' id="exampleFormControlSelect1" aria-label="Default select example">
                      <option selected>--Pilih</option>
                      @foreach ($kateg as $item)
                      <option value="{{$item->id}}">{{$item->nama}}</option>

                      @endforeach
                    </select>
                        @error('kategori')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                        @enderror
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" wire:click='update'>Simpan</button>
            </div>
        </div>
    </div>
</div>
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Hapus data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <p>Yakin ingin menghapus data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="button" class="btn btn-primary" wire:click='destroy'>Hapus</button>
            </div>
        </div>
    </div>
</div>

</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
       if ({{session()->has('success')}}) {
         const modalElement = document.getElementById('basicModal');
            const modal = new bootstrap.Modal(modalElement);
            modal.hide();

       }
    });
</script> --}}

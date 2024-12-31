<div>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Perpustakaan /</span> Peminjaman Buku</h4>

    <!-- Basic Bootstrap Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Peminjaman Buku</h5>
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
                            <input type="text" wire:model.live='search' class="form-control"
                                placeholder="Search..." />
                        </div>
                    </div>

                    <div class="table-responsive text-nowrap mt-4 text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Member</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($pinjam->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center pt-3 fs-5">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                                @foreach ($pinjam as $data)
                                    <tr>
                                        <td><i class="fab fa-react fa-lg text-info me-2"></i>
                                            <strong>{{ $loop->iteration }}</strong>
                                        </td>
                                        <td>{{ $data->buku->judul }}</td>
                                        <td>
                                            {{ $data->user->nama }}
                                        </td>
                                        <td>
                                            {{ $data->tgl_pinjam }}
                                        </td>
                                        <td>
                                            {{ $data->tgl_kembali }}
                                        </td>
                                        <td>
                                            <span class="badge bg-label-primary me-1">{{$data->status}}</span>
                                        </td>

                                        <td>
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal" wire:click='edit({{ $data->id }})'>

                                                <span class="bx bx-pencil"></span>
                                            </button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                wire:click='confirmDelete({{ $data->id }})'>
                                                <span class="bx bx-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pinjam->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="col mb-0">
                                <label for="exampleFormControlSelect1" class="form-label">Judul Buku</label>
                                <select class="form-select" wire:model='buku' id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected>-- Pilih --</option>
                                    @foreach ($books as $item)
                                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('buku')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">member</label>
                            <select class="form-select" wire:model='user' id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option selected>-- Pilih --</option>
                                @foreach ($member as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('user')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="row-g2">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Lama Pinjam ( Hari )</label>
                            <input type="text" id="nameBasic" class="form-control" wire:model='lama'
                                value="{{ @old('lama') }}" placeholder="EX : 7" />
                            @error('lama')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
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
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="col mb-0">
                                <label for="exampleFormControlSelect1" class="form-label">Judul Buku</label>
                                <select class="form-select" wire:model='buku' id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected>-- Pilih --</option>
                                    @foreach ($books as $item)
                                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('buku')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">member</label>
                            <select class="form-select" wire:model='user' id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option selected>-- Pilih --</option>
                                @foreach ($member as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('user')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="row-g2">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Lama Pinjam ( Hari )</label>
                            <input type="text" id="nameBasic" class="form-control" wire:model='lama'
                                value="{{ @old('lama') }}" placeholder="ex : 7" />
                            @error('lama')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" wire:click='update'>Tambah</button>
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

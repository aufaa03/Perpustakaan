<div>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Perpustakaan /</span> Kelola Member</h4>

    <!-- Basic Bootstrap Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Member</h5>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Ponsel</th>
                                    <th>Alamat</th>
                                    {{-- <th>Role</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($member->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center pt-3 fs-5">Data tidak ditemukan</td>
                                    </tr>
                                    @endif
                                @foreach ($member as $data)
                                    <tr>
                                        <td><i class="fab fa-react fa-lg text-info me-2"></i>
                                            <strong>{{ $loop->iteration }}</strong>
                                        </td>
                                        <td>{{ $data->nama }}</td>
                                       <td> {{ $data->email }}</td>
                                        <td>{{ $data->telepon }}</td>

                                            <td>{{ $data->alamat }}</td>

                                        {{-- <td><span class="badge bg-label-info me-1">{{ $data->role }}</span></td> --}}
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
                        {{ $member->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama</label>
                            <input type="text" id="nameBasic" class="form-control" wire:model='nama'
                                value="{{ @old('nama') }}" placeholder="Masukan Nama" />
                            @error('nama')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Telepon</label>
                            <input type="text" id="nameBasic" class="form-control" wire:model='telepon'
                                value="{{ @old('telepon') }}" placeholder="Masukan nomor" />
                            @error('telepon')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Email</label>
                            <input type="email" id="emailBasic" class="form-control" wire:model='email'
                                value="{{ @old('email') }}" placeholder="xxxx@xxx.xx" />
                            @error('email')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                        <div class="col mb-0">
                            <label for="dobBasic" class="form-label">password</label>
                            <input type="password" id="dobBasic" class="form-control" wire:model='password'
                                value="{{ @old('password') }}" placeholder="password" />
                            @error('password')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model='alamat'>{{@old('alamat')}}</textarea>
                            @error('alamat')
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
                <h5 class="modal-title" id="exampleModalLabel1">Edit Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Nama</label>
                        <input type="text" id="nameBasic" class="form-control" wire:model='nama'
                            value="{{ @old('nama') }}" placeholder="Masukan Nama" />
                        @error('nama')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Telepon</label>
                        <input type="text" id="nameBasic" class="form-control" wire:model='telepon'
                            value="{{ @old('telepon') }}" placeholder="Masukan nomor" />
                        @error('telepon')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailBasic" class="form-label">Email</label>
                        <input type="email" id="emailBasic" class="form-control" wire:model='email'
                            value="{{ @old('email') }}" placeholder="xxxx@xxx.xx" />
                        @error('email')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ $message }}</strong>

                            </div>
                        @enderror
                    </div>

                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model='alamat'>{{@old('alamat')}}</textarea>
                        @error('alamat')
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

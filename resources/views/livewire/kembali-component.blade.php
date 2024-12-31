<div>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Perpustakaan /</span> Pengembalian Buku</h4>

    <!-- Basic Bootstrap Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Pengembalian Buku</h5>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="card-body ">


                    <div class="table-responsive text-nowrap mt-4 text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Member</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
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
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pilih"
                                                wire:click='pilih({{ $data->id }})'>

                                                <span class="bx bx-low-vision"></span> pilih
                                            </button>
                                            {{-- <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal" wire:click='edit({{ $data->id }})'>

                                                <span class="bx bx-pencil"></span>
                                            </button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                wire:click='confirmDelete({{ $data->id }})'>
                                                <span class="bx bx-trash"></span> --}}
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

    {{-- pilih modal --}}
    <div wire:ignore.self class="modal fade" id="pilih" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Pengembalian Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row mt-2 align-items-center">
                        <dt class="col-md-4 text-md-end">Judul Buku :</dt>
                        <dd class="col-md-8">{{ $judul }}</dd>
                        <dt class="col-md-4 text-md-end">Member :</dt>
                        <dd class="col-md-8">{{ $member }}</dd>
                        <dt class="col-md-4 text-md-end">Tanggal Kembali :</dt>
                        <dd class="col-md-8">{{ $tglkembali }}</dd>
                        <dt class="col-md-4 text-md-end">Tanggal Hari Ini :</dt>
                        <dd class="col-md-8">{{ date('Y-m-d') }}</dd>
                        <dt class="col-md-4 text-md-end">Status :</dt>
                        <dd class="col-md-8">{{ $status }}</dd>
                        <dt class="col-md-4 text-md-end">Denda :</dt>
                        <dd class="col-md-8">{{ $denda }}</dd>
                    </dl>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" wire:click='store'>Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
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

    </div> --}}
    {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
       if ({{session()->has('success')}}) {
         const modalElement = document.getElementById('basicModal');
            const modal = new bootstrap.Modal(modalElement);
            modal.hide();

       }
    });
</script> --}}

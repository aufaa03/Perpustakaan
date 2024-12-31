<div>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Perpustakaan /</span> History Pengembalian Buku</h4>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>History Pengembalian Buku</h5>
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
                                    <th>ID Pinjam</th>
                                    <th>Judul</th>
                                    <th>Member</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($pengembalian->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center pt-3 fs-5">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                                @foreach ($pengembalian as $data)
                                    <tr>
                                        <td><i class="fab fa-react fa-lg text-info me-2"></i>
                                            <strong>{{ $loop->iteration }}</strong>
                                        </td>
                                        <td>
                                            {{ $data->pinjam_id }}
                                        </td>
                                        <td>{{ $data->pinjam->buku->judul }}</td>
                                        <td>
                                            {{ $data->pinjam->user->nama }}
                                        </td>
                                        <td>
                                            {{ $data->tgl_kembali }}
                                        </td>

                                        <td>
                                           RP. {{ $data->denda }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pengembalian->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

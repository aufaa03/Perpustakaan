<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card w-100">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">

                    <i class="bx bx-user"></i>


                </div>
                <span class="fw-semibold d-block mb-1">Member</span>
                <h3 class="card-title mb-2">{{ $member }}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +5%</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card w-100">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <i class="bx bx-book"></i>

                </div>
                <span class="fw-semibold d-block mb-1">Buku</span>
                <h3 class="card-title text-nowrap mb-1">{{ $buku }}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card w-100">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                   <i class="bx bx-time"></i>

                </div>
                <span class="fw-semibold d-block mb-1">Dipinjam</span>
                <h3 class="card-title text-nowrap mb-2">{{ $pinjam }}</h3>
                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card w-100">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <i class="bx bx-message-check"></i>

                </div>
                <span class="fw-semibold d-block mb-1">Dikembalikan</span>
                <h3 class="card-title mb-2">{{ $kembali }}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
            </div>
        </div>
    </div>
</div>

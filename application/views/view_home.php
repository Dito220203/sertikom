<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 mb-4">
            <h4 class="fw-bold text-secondary">Selamat Datang, Admin!</h4>
            <p class="text-muted">Berikut adalah ringkasan toko kamu hari ini.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm text-white" style="background-color: #006b4d;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small">Penjualan Hari Ini</h6>
                            <h3 class="fw-bold mb-0">Rp 1.250.000</h3>
                        </div>
                        <i class="bi bi-cash-stack display-6 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm bg-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small text-muted">Total Transaksi</h6>
                            <h3 class="fw-bold mb-0 text-dark">42</h3>
                        </div>
                        <i class="bi bi-cart-check display-6 text-success opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm bg-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small text-muted">Stok Barang</h6>
                            <h3 class="fw-bold mb-0 text-dark">152</h3>
                        </div>
                        <i class="bi bi-box-seam display-6 text-primary opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm bg-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small text-muted">Pelanggan</h6>
                            <h3 class="fw-bold mb-0 text-dark">12</h3>
                        </div>
                        <i class="bi bi-people display-6 text-warning opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold mb-3">Menu Cepat</h5>
                <div class="row">
                    <div class="col-4 text-center">
                        <a href="<?= base_url('kasir') ?>" class="text-decoration-none p-3 d-block border rounded bg-light text-dark">
                            <i class="bi bi-printer display-6 text-success"></i><br>
                            <span class="small fw-bold">Transaksi Baru</span>
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <a href="#" class="text-decoration-none p-3 d-block border rounded bg-light text-dark">
                            <i class="bi bi-file-earmark-bar-graph display-6 text-primary"></i><br>
                            <span class="small fw-bold">Laporan Penjualan</span>
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <a href="#" class="text-decoration-none p-3 d-block border rounded bg-light text-dark">
                            <i class="bi bi-plus-square display-6 text-warning"></i><br>
                            <span class="small fw-bold">Tambah Barang</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">Aktivitas Terbaru</div>
                <ul class="list-group list-group-flush small">
                    <li class="list-group-item">Penjualan #10000005 - <span class="text-success fw-bold">Rp 128.700</span></li>
                    <li class="list-group-item">Penjualan #10000004 - <span class="text-success fw-bold">Rp 15.400</span></li>
                    <li class="list-group-item">Penjualan #10000003 - <span class="text-success fw-bold">Rp 45.000</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

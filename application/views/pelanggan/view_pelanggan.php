<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold" style="color: var(--primary-emerald);"><i class="bi bi-people"></i> DATA PELANGGAN</h4>
        <a href="<?= base_url('pelanggan/tambah_pelanggan') ?>" class="btn btn-success fw-bold shadow-sm" style="background-color: var(--primary-emerald);">
            <i class="bi bi-plus-lg"></i> TAMBAH PELANGGAN
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr class="text-uppercase small fw-bold">
                            <th class="ps-3">No</th>
                            <th>Nama Pelanggan</th>
                            <th>No. Telp / WA</th>
                            <th>Alamat</th>
                            <th>Total Transaksi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pelanggan)): ?>
                            <?php $no=1; foreach($pelanggan as $p): ?>
                            <tr>
                                <td class="ps-3"><?= $no++; ?></td>
                                <td class="fw-bold"><?= strtoupper($p['nama_pelanggan']) ?></td>
                                <td><a href="https://wa.me/<?= $p['telp'] ?>" target="_blank" class="text-decoration-none text-success"><i class="bi bi-whatsapp"></i> <?= $p['telp'] ?></a></td>
                                <td><?= $p['alamat'] ?></td>
                                <td><span class="badge bg-light text-dark border">0 Transaksi</span></td>
                                <td class="text-center">
                                    <a href="<?= base_url('pelanggan/edit_pelanggan/'.$p['id_pelanggan']) ?>" class="btn btn-sm btn-outline-primary border-0"><i class="bi bi-pencil-square"></i></a>
                                    <a href="<?= base_url('pelanggan/hapus_pelanggan/'.$p['id_pelanggan']) ?>" class="btn btn-sm btn-outline-danger border-0" ><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data pelanggan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-4">Detail Barang: <?= $item['nama_barang'] ?></h5>
            
            <div class="row">
                <div class="col-md-4 text-center">
                    <?php if(!empty($item['foto_barang'])): ?>
                        <img src="<?= $item['foto_barang'] ?>" class="img-fluid rounded shadow-sm" alt="Foto Barang">
                    <?php else: ?>
                        <div class="p-5 bg-light text-muted border rounded">Tidak ada foto</div>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr><th width="200">Kode Barang</th><td>: <?= $item['kode_barang'] ?></td></tr>
                        <tr><th>Kategori</th><td>: <?= $item['kategori'] ?></td></tr>
                        <tr><th>Harga Beli</th><td>: Rp <?= number_format($item['harga_beli'], 0, ',', '.') ?></td></tr>
                        <tr><th>Harga Jual</th><td>: Rp <?= number_format($item['harga_jual'], 0, ',', '.') ?></td></tr>
                        <tr><th>Stok</th><td>: <?= $item['stok'] ?> <?= $item['satuan'] ?></td></tr>
                        <tr><th>Stok Minimum</th><td>: <?= $item['stok_minimum'] ?></td></tr>
                        <tr><th>Berat/Ukuran</th><td>: <?= $item['berat_ukuran'] ?></td></tr>
                        <tr><th>Lokasi Simpan</th><td>: <?= $item['lokasi_simpan'] ?></td></tr>
                        <tr><th>Deskripsi</th><td>: <?= $item['deskripsi'] ?></td></tr>
                    </table>
                    
                    <a href="<?= base_url('barang') ?>" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

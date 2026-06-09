<div class="container-fluid mt-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header border-0 text-white p-3" style="background-color: var(--primary-emerald);">
            <h5 class="m-0"><i class="bi bi-file-earmark-text"></i> Laporan Penjualan</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary">
                        <tr>
                            <th class="ps-3" style="width: 5%;">No</th>
                            <th>No. Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Total Bayar</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($laporan)): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted p-4">Belum ada data transaksi penjualan.</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; foreach($laporan as $row): ?>
                                <tr>
                                    <td class="ps-3"><?= $no++; ?></td>
                                    <td class="fw-bold text-success"><?= $row['no_transaksi']; ?></td>
                                    <td><?= date('d-m-Y H:i', strtotime($row['tanggal_rekam'])); ?> WIB</td>
                                    <td><span class="badge bg-secondary px-2.5 py-1.5"><?= $row['nama_pelanggan']; ?></span></td>
                                    <td class="fw-bold">Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success btn-detail" data-id="<?= $row['no_transaksi']; ?>">
                                            <i class="bi bi-eye-fill"></i> Detail Barang
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header text-white" style="background-color: var(--primary-emerald);">
                <h5 class="modal-title" id="modalDetailLabel"><i class="bi bi-cart-check"></i> Rincian Barang Belanjaan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="p-3 bg-light border-bottom">
                    <strong>No. Transaksi:</strong> <span id="text_no_transaksi" class="text-danger fw-bold"></span>
                </div>
                <table class="table table-hover align-middle m-0">
                    <thead class="table-light text-secondary">
                        <tr>
                            <th class="ps-3">Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_detail_barang">
                        </tbody>
                </table>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary fw-bold shadow-sm" data-bs-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fungsi pembantu format rupiah di JavaScript
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID').format(angka);
        }

        // Ketika tombol "Detail Barang" diklik
        $('.btn-detail').on('click', function() {
            const noTransaksi = $(this).data('id');
            $('#text_no_transaksi').text(noTransaksi);

            // Ambil rincian data barang lewat AJAX
            $.ajax({
                url: "<?= base_url('penjualan/ambil_detail_ajax/') ?>" + noTransaksi,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    const $tabelDetail = $('#tabel_detail_barang');
                    $tabelDetail.empty(); // Bersihkan isi modal sebelumnya

                    // Looping data rincian barang dari server
                    data.forEach(item => {
                        const row = `
                            <tr>
                                <td class="ps-3 fw-bold">${item.nama_barang}</td>
                                <td>Rp ${formatRupiah(item.harga_jual)}</td>
                                <td class="fw-bold text-muted">x ${item.qty}</td>
                                <td class="fw-bold text-success">Rp ${formatRupiah(item.subtotal)}</td>
                            </tr>
                        `;
                        $tabelDetail.append(row);
                    });

                    // Munculkan Modal secara soft
                    $('#modalDetail').modal('show');
                },
                error: function() {
                    alert('Gagal memuat data rincian barang.');
                }
            });
        });
    });
</script>

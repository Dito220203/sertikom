<div class="container-fluid mt-3">
	<form id="form_penjualan">
		<div class="row">
			<div class="col-md-4">
				<div class="card border-0 shadow-sm mb-3">
					<div class="card-header border-0 text-white" style="background-color: var(--primary-emerald);">
						<h6 class="m-0"><i class="bi bi-qr-code-scan"></i> Input Penjualan</h6>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<label class="small fw-bold">NAMA PRODUK</label>
							<select class="form-select border-success" id="pilih_barang">
								<option value="" data-harga="0">-- Pilih Barang --</option>
								<?php foreach ($barang as $b) : ?>
									<option value="<?= $b['id_barang'] ?>" data-harga="<?= $b['harga_jual'] ?>">
										<?= $b['nama_barang'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="small fw-bold">HARGA JUAL</label>
								<input type="text" id="harga_tampil" class="form-control" readonly value="0">
							</div>
							<div class="col-md-6 mb-3">
								<label class="small fw-bold">JUMLAH BELI</label>
								<input type="number" id="jumlah_beli" class="form-control border-success" value="1" min="1">
							</div>
						</div>
						<button type="button" id="btn_tambah" class="btn btn-success w-100 fw-bold shadow-sm" style="background-color: var(--primary-emerald);">
							<i class="bi bi-plus-circle"></i> TAMBAH
						</button>
					</div>
				</div>

				<div class="card border-0 shadow-sm">
					<div class="card-body p-2">
						<table class="table table-sm table-borderless m-0">
							<tr>
								<td class="small" style="width: 40%;">No. Transaksi</td>
								<td class="small fw-bold">
									<input type="text" id="no_transaksi" class="form-control form-control-sm border-0 bg-transparent p-0 fw-bold" value="<?= $no_transaksi_otomatis; ?>" readonly>
								</td>
							</tr>
							<tr>
								<td class="small">Pelanggan</td>
								<td class="small fw-bold">
									<select class="form-select form-select-sm border-success" id="id_pelanggan">
										<?php foreach ($pelanggan as $p) : ?>
											<option value="<?= $p['id_pelanggan'] ?>" <?= (strtoupper($p['nama_pelanggan']) == 'UMUM') ? 'selected' : ''; ?>>
												<?= $p['nama_pelanggan'] ?>
											</option>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<div class="card bg-total shadow-sm border-0 mb-3">
					<div class="card-body d-flex justify-content-between align-items-center p-4">
						<span class="display-5 fw-bold">Rp</span>
						<span id="total_bayar" class="display-3 fw-bold">0</span>
					</div>
				</div>

				<div class="card border-0 shadow-sm">
					<div class="card-body p-0">
						<div class="table-responsive" style="height: 350px;">
							<table class="table table-hover align-middle mb-0">
								<thead class="table-light text-secondary">
									<tr>
										<th class="ps-3">Nama Produk</th>
										<th>Harga</th>
										<th>Qty</th>
										<th>Subtotal</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="tabel_keranjang">
									<tr>
										<td colspan="5" class="text-center text-muted p-4">Belum ada produk yang dipilih.</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="p-3 bg-light border-top d-flex justify-content-between">
							<button type="button" id="btn_batal" class="btn btn-danger px-4 fw-bold shadow-sm">BATAL</button>
							<button type="button" id="btn_simpan" class="btn btn-success px-5 fw-bold shadow-sm" style="background-color: var(--primary-emerald);">SIMPAN DATA</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	$(document).ready(function() {
		let keranjang = [];

		// 1. Dropdown barang berubah
		$('#pilih_barang').on('change', function() {
			const harga = $(this).find(':selected').data('harga');
			$('#harga_tampil').val(harga || 0);
		});

		function formatRupiah(angka) {
			return new Intl.NumberFormat('id-ID').format(angka);
		}

		// 2. Render Tabel Keranjang
		function renderKeranjang() {
			const $tabel = $('#tabel_keranjang');
			$tabel.empty();

			if (keranjang.length === 0) {
				$tabel.append('<tr><td colspan="5" class="text-center text-muted p-4">Belum ada produk yang dipilih.</td></tr>');
				$('#total_bayar').text('0');
				return;
			}

			let grandTotal = 0;
			keranjang.forEach((item, index) => {
				grandTotal += item.subtotal;
				const row = `
                    <tr>
                        <td class="ps-3 fw-bold">${item.nama}</td>
                        <td>${formatRupiah(item.harga)}</td>
                        <td>${item.qty}</td>
                        <td>${formatRupiah(item.subtotal)}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-danger border-0 btn-hapus" data-index="${index}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
				$tabel.append(row);
			});

			$('#total_bayar').text(formatRupiah(grandTotal));
		}

		// 3. Tombol Tambah Produk
		$('#btn_tambah').on('click', function() {
			const id_barang = $('#pilih_barang').val();
			const nama_barang = $('#pilih_barang').find(':selected').text().trim();
			const harga = parseInt($('#harga_tampil').val()) || 0;
			const qty = parseInt($('#jumlah_beli').val()) || 0;

			if (!id_barang) {
				alert('Silakan pilih barang!');
				return;
			}
			if (qty <= 0) {
				alert('Jumlah beli minimal 1!');
				return;
			}

			const existingIndex = keranjang.findIndex(item => item.id === id_barang);
			if (existingIndex !== -1) {
				keranjang[existingIndex].qty += qty;
				keranjang[existingIndex].subtotal = keranjang[existingIndex].qty * keranjang[existingIndex].harga;
			} else {
				keranjang.push({
					id: id_barang,
					nama: nama_barang,
					harga: harga,
					qty: qty,
					subtotal: harga * qty
				});
			}

			renderKeranjang();
			$('#pilih_barang').val('').trigger('change');
			$('#jumlah_beli').val(1);
		});

		// 4. Tombol Hapus Item
		$(document).on('click', '.btn-hapus', function() {
			const index = $(this).data('index');
			keranjang.splice(index, 1);
			renderKeranjang();
		});

		// 5. Tombol Batal
		$('#btn_batal').on('click', function() {
			if (confirm('Kosongkan keranjang?')) {
				keranjang = [];
				renderKeranjang();
			}
		});

		// ==========================================
		// PROSES KIRIM DATA (AJAX POST TO CONTROLLER)
		// ==========================================
		$('#btn_simpan').on('click', function() {
			// Validasi keranjang kosong
			if (keranjang.length === 0) {
				alert('Keranjang belanja masih kosong!');
				return;
			}

			// Kumpulkan data utama & data detail item
			const dataTransaksi = {
				no_transaksi: $('#no_transaksi').val(),
				id_pelanggan: $('#id_pelanggan').val(),
				total_harga: keranjang.reduce((sum, item) => sum + item.subtotal, 0),
				items: keranjang // Array daftar barang
			};

			// Kirim data menggunakan AJAX
			$.ajax({
				url: "<?= base_url('kasir/simpan_transaksi') ?>", // Sesuaikan nama controller Anda
				type: "POST",
				data: JSON.stringify(dataTransaksi),
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				beforeSend: function() {
					$('#btn_simpan').prop('disabled', true).text('Menyimpan...');
				},
				success: function(response) {
					if (response.status === 'success') {
						alert(response.message);
						// Reload halaman agar nomor transaksi berganti baru & form bersih
						window.location.reload();
					} else {
						alert('Gagal: ' + response.message);
						$('#btn_simpan').prop('disabled', false).text('SIMPAN DATA');
					}
				},
				error: function(xhr, status, error) {
					alert('Terjadi kesalahan server!');
					$('#btn_simpan').prop('disabled', false).text('SIMPAN DATA');
				}
			});
		});
	});
</script>

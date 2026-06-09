<div class="container-fluid mt-4">

	<div class="card border-0 shadow-sm">
		<div class="card-body">
			<div class="row mb-3 align-items-center">

				<div class="col-md-4">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Cari Kode atau Nama...">
						<button class="btn btn-outline-success"><i class="bi bi-search"></i></button>
					</div>
				</div>


			</div>

			<div class="table-responsive">
				<table class="table table-hover align-middle">
					<thead class="table-light">
						<tr class="text-uppercase small fw-bold">
							<th class="ps-3">No</th>
							<th>Barang</th>
							<th>Stok Sistem</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($barang as $index => $b) : ?>
							<tr>
								<td class="ps-3"><?= $index + 1 ?></td>
								<td><?= $b['nama_barang'] ?></td>
								<td><?= $b['stok'] ?></td>
								<td>
									<button class="btn btn-sm btn-warning" onclick="bukaModal('<?= $b['id_barang'] ?>', '<?= $b['stok'] ?>', '<?= $b['nama_barang'] ?>')">
										Sesuaikan Stok
									</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalStok" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content border-0 shadow">
			<div class="modal-header text-white" style="background-color: var(--primary-emerald);">
				<h5 class="modal-title" id="modalDetailLabel"><i class="bi bi-cart-check"></i> Sesuaikan Stok</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-0">

				<form action="<?= base_url('stok/proses_penyesuaian') ?>" method="post" class="modal-content">
					
					<div class="modal-body">
						<input type="hidden" name="id_barang" id="id_barang">
						<input type="hidden" name="stok_sistem" id="stok_sistem">
						<p>Barang: <b id="nama_barang"></b></p>
						<div class="mb-3">
							<label>Stok Fisik (Hasil Hitung):</label>
							<input type="number" name="stok_fisik" class="form-control" required>
						</div>
						<div class="mb-3">
							<label>Keterangan:</label>
							<input type="text" name="keterangan" class="form-control" placeholder="Contoh: Barang rusak/selisih">
						</div>
					</div>

					<div class="modal-footer"><button type="submit" class="btn btn-success">Simpan</button></div>
				</form>
			</div>

		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
	function bukaModal(id, stok, nama) {
		document.getElementById('id_barang').value = id;
		document.getElementById('stok_sistem').value = stok;
		document.getElementById('nama_barang').innerText = nama;

		// Membuka modal dengan cara Bootstrap 5
		var myModal = new bootstrap.Modal(document.getElementById('modalStok'));
		myModal.show();
	}
</script>

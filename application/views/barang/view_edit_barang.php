<div class="container-fluid mt-4">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="d-flex align-items-center mb-3">
				<a href="<?= base_url('barang') ?>" class="btn btn-sm btn-outline-secondary me-3">
					<i class="bi bi-arrow-left"></i> Kembali
				</a>
				<h4 class="fw-bold m-0" style="color: var(--primary-emerald);">EDIT DATA BARANG</h4>
			</div>

			<div class="card border-0 shadow-sm">
				<div class="card-body p-4">
					<form action="<?= base_url('barang/simpan_edit_barang') ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id_barang" value="<?= $item['id_barang'] ?>">
						<div class="mb-4">
							<label class="form-label small fw-bold text-muted">Foto barang</label>
							<div class="text-center p-4" style="border: 1px dashed #ccc; border-radius: 4px; background-color: #fcfcfc;">

								<?php if (!empty($item['foto_barang'])): ?>
									<div class="mb-3">
										<img id="previewFoto"
											src="<?= !empty($item['foto_barang']) ? base_url('uploads/barang/') . $item['foto_barang'] : '#' ?>"
											class="img-thumbnail"
											style="max-width: 150px; <?= empty($item['foto_barang']) ? 'display:none;' : 'display:block;' ?> margin: 0 auto;">
										<small class="text-muted">Foto saat ini</small>
									</div>
								<?php else: ?>
									<i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
								<?php endif; ?>

								<p class="mt-2 mb-1 text-muted small">Pilih foto baru untuk mengganti</p>

								<label class="btn btn-secondary btn-sm px-3" for="uploadFoto">Pilih Foto</label>
								<input type="file" id="uploadFoto" name="foto_barang" class="d-none" accept="image/jpeg, image/png" onchange="tampilkanNamaFile()">

								<div id="namaFileTerpilih" class="mt-3 text-success fw-bold small"></div>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label small fw-bold">KODE BARANG</label>
							<input type="text" name="kode_barang" class="form-control border-success" placeholder="Contoh: BRG001" value="<?= $item['kode_barang'] ?>" required>
						</div>

						<div class="mb-3">
							<label class="form-label small fw-bold">NAMA BARANG</label>
							<input type="text" name="nama_barang" class="form-control border-success" placeholder="Masukkan nama barang..." value="<?= $item['nama_barang'] ?>" required>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="form-label small fw-bold text-muted">Kategori <span class="text-danger">*</span></label>
								<select name="kategori" class="form-select border-success" required>
									<option value="">Pilih kategori</option>

									<?php foreach ($kategori_list as $kat) : ?>
										<option value="<?= $kat['kategori'] ?>"
											<?php if ($item['kategori'] == $kat['kategori']) echo 'selected'; ?>>
											<?= $kat['kategori'] ?>
										</option>
									<?php endforeach; ?>

								</select>
							</div>
							<div class="col-md-6 mb-3">
								<label class="form-label small fw-bold">SATUAN</label>
								<input type="text" name="satuan" class="form-control border-success" placeholder="Pcs / Pack / Kg" value="<?= $item['satuan'] ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="form-label small fw-bold text-muted">Jumlah stok <span class="text-danger">*</span></label>
								<input type="number" name="stok" class="form-control border-success" value="<?= $item['stok'] ?>" required>
							</div>
							<div class="col-md-6 mb-3">
								<label class="form-label small fw-bold text-muted">Stok minimum</label>
								<input type="number" name="stok_minimum" class="form-control border-success" value="<?= $item['stok_minimum'] ?>" >
							</div>
						</div>


						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="form-label small fw-bold">HARGA BELI (Rp)</label>
								<input type="number" name="harga_beli" class="form-control border-success" placeholder="0" value="<?= $item['harga_beli'] ?>">
							</div>
							<div class="col-md-6 mb-3">
								<label class="form-label small fw-bold">HARGA JUAL (Rp)</label>
								<input type="number" name="harga_jual" class="form-control border-success" placeholder="0" value="<?= $item['harga_jual'] ?>">
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="form-label small fw-bold text-muted">Berat / ukuran</label>
								<input type="text" name="berat_ukuran" class="form-control border-success" value="<?= $item['berat_ukuran'] ?>">
							</div>
							<div class="col-md-6 mb-3">
								<label class="form-label small fw-bold text-muted">Lokasi simpan</label>
								<input type="text" name="lokasi_simpan" class="form-control border-success" value="<?= $item['lokasi_simpan'] ?>">
							</div>
						</div>

						<div class="mb-4">
							<label class="form-label small fw-bold text-muted">Deskripsi</label>
							<textarea name="deskripsi" class="form-control border-success" rows="3"><?= $item['deskripsi'] ?></textarea>
						</div>

						<hr>

						<div class="d-flex justify-content-end">
							<button type="reset" class="btn btn-light me-2 fw-bold">RESET</button>
							<button type="submit" class="btn btn-success px-4 fw-bold shadow-sm" style="background-color: var(--primary-emerald);">
								<i class="bi bi-save"></i> SIMPAN BARANG
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function tampilkanNamaFile() {
		const inputFoto = document.getElementById('uploadFoto');
		const tempatNama = document.getElementById('namaFileTerpilih');
		const previewFoto = document.getElementById('previewFoto');

		if (inputFoto.files && inputFoto.files[0]) {
			const reader = new FileReader();
			reader.onload = function(e) {
				previewFoto.src = e.target.result;
				previewFoto.style.display = 'block';
			}
			reader.readAsDataURL(inputFoto.files[0]);
			tempatNama.innerHTML = "✔️ Foto baru terpilih: " + inputFoto.files[0].name;
		}
	}
</script>

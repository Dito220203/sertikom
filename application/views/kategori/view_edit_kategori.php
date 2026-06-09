<div class="container-fluid mt-4">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="d-flex align-items-center mb-3">
				<a href="<?= base_url('kategori') ?>" class="btn btn-sm btn-outline-secondary me-3">
					<i class="bi bi-arrow-left"></i> Kembali
				</a>
				<h4 class="fw-bold m-0" style="color: var(--primary-emerald);">EDIT DATA KATEGORI</h4>
			</div>

			<div class="card border-0 shadow-sm">
				<div class="card-body p-4">
					<form action="<?= base_url('kategori/simpan_edit_kategori') ?>" method="POST">
						<input type="hidden" name="id_kategori" value="<?= $data['id_kategori'] ?>">

						<div class="mb-3">
							<label class="form-label small fw-bold text-muted">Nama kategori <span class="text-danger">*</span></label>
							<input type="text" name="kategori" class="form-control border-success" placeholder="Nama kategori" value="<?= $data['kategori'] ?>" required>
						</div>

						<div class="mb-4">
							<label class="form-label small fw-bold text-muted">Deskripsi</label>
							<textarea name="deskripsi" class="form-control border-success" rows="3"><?= $data['deskripsi'] ?></textarea>
						</div>

						<hr>

						<div class="d-flex justify-content-end">
							<button type="reset" class="btn btn-light me-2 fw-bold">RESET</button>
							<button type="submit" class="btn btn-success px-4 fw-bold shadow-sm" style="background-color: var(--primary-emerald);">
								<i class="bi bi-save"></i> SIMPAN KATEGORI
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

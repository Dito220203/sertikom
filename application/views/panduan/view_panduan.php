<div class="container-fluid mt-4">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h4 class="fw-bold" style="color: var(--primary-emerald);"><i class="bi bi-people"></i> DATA PANDUAN</h4>
		<a href="<?= base_url('panduan/tambah_panduan') ?>" class="btn btn-success fw-bold shadow-sm" style="background-color: var(--primary-emerald);">
			<i class="bi bi-plus-lg"></i> PANDUAN PENGGUNAAN
		</a>
	</div>

	<div class="card border-0 shadow-sm">
		<div class="card-body p-4">
			<div class="card p-4">
				<?php foreach ($panduan as $p) : ?>
					<div class="d-flex justify-content-between align-items-start">
						<h5 class="fw-bold"><?= $p['judul'] ?></h5>

						<div>
							<a href="<?= base_url('panduan/edit/' . $p['id_panduan']) ?>" class="btn btn-sm btn-outline-primary border-0">
								<i class="bi bi-pencil-square"></i>
							</a>
							<button type="button" class="btn btn-sm btn-outline-danger border-0"
								onclick="hapus('<?= base_url('panduan/hapus/' . $p['id_panduan']) ?>')">
								<i class="bi bi-trash"></i>
							</button>
						</div>
					</div>

					<ol class="text-muted">
						<?php foreach ($p['langkah'] as $l) : ?>
							<li><?= $l['deskripsi'] ?></li>
						<?php endforeach; ?>
					</ol>
					<hr>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

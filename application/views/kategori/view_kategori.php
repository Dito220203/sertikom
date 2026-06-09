<div class="container-fluid mt-4">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h4 class="fw-bold" style="color: var(--primary-emerald);"><i class="bi bi-people"></i> DATA KATEGORI</h4>
		<a href="<?= base_url('kategori/tambah_kategori') ?>" class="btn btn-success fw-bold shadow-sm" style="background-color: var(--primary-emerald);">
			<i class="bi bi-plus-lg"></i> TAMBAH KATEGORI
		</a>
	</div>


	<div class="card border-0 shadow-sm">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover align-middle table-data">
					<thead class="table-light">
						<tr class="text-uppercase small fw-bold">
							<th class="ps-3">No</th>
							<th>Kategori</th>
							<th>Jumlah Barang</th>
							<th>Dibuat</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($kategori)) : ?>
							<?php foreach ($kategori as $index => $item) : ?>
								<tr>
									<td class="ps-3"><?= $index + 1 ?></td>
									<td><span class="badge bg-light text-dark border"><?= $item['kategori'] ?></span></td>
									<td class="fw-bold"><?= $item['jumlah'] ?></td>
									<td><?= $item['dibuat'] ?></td>
									<td class="text-center">
										<a href="<?= base_url('kategori/edit_kategori/' . $item['id_kategori']) ?>" class="btn btn-sm btn-outline-primary border-0">
											<i class="bi bi-pencil-square"></i>
										</a>
										<button type="button" class="btn btn-sm btn-outline-danger border-0"
											onclick="hapus('<?= base_url('kategori/hapus_kategori/' . $item['id_kategori']) ?>')">
											<i class="bi bi-trash"></i>
										</button>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="5" class="text-center text-secondary">Data kategori tidak ditemukan.</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

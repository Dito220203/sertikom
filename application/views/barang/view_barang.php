<div class="container-fluid mt-4">
	<div class="row">
		<div class="col-md-3 mb-4">
			<div class="card border-0 shadow-sm text-white" style="background-color: #006b4d;">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<h6 class="text-uppercase small">TOTAL BARANG</h6>
							<h3 class="fw-bold mb-0"><?= $stats['total_barang'] ?></h3>
						</div>
						<i class="bi bi-box-seam display-6 opacity-50"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3 mb-4">
			<div class="card border-0 shadow-sm bg-white">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<h6 class="text-uppercase small text-muted">TOTAL KATEGORI</h6>
							<h3 class="fw-bold mb-0 text-dark"><?= $stats['total_kategori'] ?></h3>
						</div>
						<i class="bi bi-tags display-6 text-success opacity-50"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3 mb-4">
			<div class="card border-0 shadow-sm bg-white">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<h6 class="text-uppercase small text-muted">STOK MENIPIS</h6>
							<h3 class="fw-bold mb-0 text-dark"><?= $stats['stok_menipis'] ?></h3>
						</div>
						<i class="bi bi-exclamation-triangle display-6 text-primary opacity-50"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3 mb-4">
			<div class="card border-0 shadow-sm bg-white">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<h6 class="text-uppercase small text-muted">STOK HABIS</h6>
							<h3 class="fw-bold mb-0 text-dark"><?= $stats['stok_habis'] ?></h3>
						</div>
						<i class="bi bi-x-circle display-6 text-warning opacity-50"></i>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="card border-0 shadow-sm">
		<div class="card-body">
			<div class="row mb-3">
				<div class="col-md-12 text-end">
					<a href="<?= base_url('barang/tambah_barang') ?>" class="btn btn-success fw-bold shadow-sm" style="background-color: #006b4d; border-color: #006b4d;">
						<i class="bi bi-plus-lg"></i> TAMBAH BARANG
					</a>
				</div>
			</div>

			<div class="table-responsive">
				<select id="filterKategoriManual" class="form-select mb-3 form-select-sm" style="width: auto; display: inline-block;">
					<option value="all">Semua Kategori</option>
					<?php foreach ($kategori_list as $kat) : ?>
						<option value="<?= $kat['kategori'] ?>"><?= $kat['kategori'] ?></option>
					<?php endforeach; ?>
				</select>
				<table class="table table-hover align-middle table-data" id="example">
					<thead class="table-light">
						<tr class="text-uppercase small fw-bold">
							<th class="ps-3">No</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Kategori</th>
							<th>Stok</th>
							<th>Satuan</th>
							<th>Harga Jual</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($barang)) : ?>
							<?php foreach ($barang as $index => $item) : ?>
								<tr>
									<td class="ps-3"><?= $index + 1 ?></td>
									<td><span class="badge bg-light text-dark border"><?= $item['kode_barang'] ?></span></td>
									<td class="fw-bold"><?= $item['nama_barang'] ?></td>
									<td><?= $item['kategori'] ?></td>
									<td>
										<span class="<?= $item['stok'] > 0 ? 'text-success fw-bold' : 'text-danger fw-bold' ?>">
											<?= $item['stok'] ?>
										</span>
									</td>
									<td><?= $item['satuan'] ?></td>
									<td>Rp <?= number_format($item['harga_jual'], 0, ',', '.') ?></td>
									<td class="text-center">
										<button type="button" class="btn btn-sm btn-outline-info border-0"
											data-bs-toggle="modal" data-bs-target="#detailModal<?= $item['id_barang'] ?>">
											<i class="bi bi-eye"></i>
										</button>
										<a href="<?= base_url('barang/edit_barang/' . $item['id_barang']) ?>" class="btn btn-sm btn-outline-primary border-0">
											<i class="bi bi-pencil-square"></i>
										</a>
										<button type="button" class="btn btn-sm btn-outline-danger border-0"
											onclick="hapus('<?= base_url('barang/hapus_barang/' . $item['id_barang']) ?>')">
											<i class="bi bi-trash"></i>
										</button>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="8" class="text-center text-secondary">Data barang tidak ditemukan.</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>

			<?php foreach ($barang as $item) : ?>
				<div class="modal fade" id="detailModal<?= $item['id_barang'] ?>" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl modal-dialog-centered">
						<div class="modal-content border-0 shadow">
							<div class="modal-header text-white" style="background-color: #006b4d;">
								<h5 class="modal-title" id="modalDetailLabel"><i class="bi bi-cart-check me-2"></i>Detail Barang: <?= $item['nama_barang'] ?></h5>
								<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

							<div class="modal-body">
								<div class="row align-items-center">
									<div class="col-md-3 text-center">
										<?php
										$nama_file = $item['foto_barang'];
										if (!empty($nama_file)) : ?>
											<div class="border rounded shadow-sm overflow-hidden" style="height: 200px; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
												<img src="<?= base_url('uploads/barang/') . $nama_file ?>"
													style="max-height: 100%; max-width: 100%; object-fit: contain;"
													alt="Foto Barang"
													onerror="this.src='https://via.placeholder.com/200?text=Gambar+Rusak';">
											</div>
										<?php else : ?>
											<div class="bg-light p-4 rounded border text-muted d-flex align-items-center justify-content-center" style="height: 200px;">
												<span>Tidak ada foto</span>
											</div>
										<?php endif; ?>
									</div>

									<div class="col-md-4">
										<table class="table table-borderless table-sm mb-0">
											<tr>
												<th width="45%">Kode Barang</th>
												<td>: <?= $item['kode_barang'] ?></td>
											</tr>
											<tr>
												<th>Nama Barang</th>
												<td>: <?= $item['nama_barang'] ?></td>
											</tr>
											<tr>
												<th>Kategori</th>
												<td>: <?= $item['kategori'] ?></td>
											</tr>
											<tr>
												<th>Satuan</th>
												<td>: <?= $item['satuan'] ?></td>
											</tr>
											<tr>
												<th>Harga Beli</th>
												<td>: Rp <?= number_format($item['harga_beli'], 0, ',', '.') ?></td>
											</tr>
											<tr>
												<th>Harga Jual</th>
												<td>: Rp <?= number_format($item['harga_jual'], 0, ',', '.') ?></td>
											</tr>
										</table>
									</div>

									<div class="col-md-5">
										<table class="table table-borderless table-sm mb-0">
											<tr>
												<th width="45%">Stok</th>
												<td>: <?= $item['stok'] ?></td>
											</tr>
											<tr>
												<th>Stok Minimum</th>
												<td>: <?= $item['stok_minimum'] ?></td>
											</tr>
											<tr>
												<th>Berat/Ukuran</th>
												<td>: <?= $item['berat_ukuran'] ?></td>
											</tr>
											<tr>
												<th>Lokasi</th>
												<td>: <?= $item['lokasi_simpan'] ?></td>
											</tr>
											<tr>
												<th>Deskripsi</th>
												<td>: <?= $item['deskripsi'] ?></td>
											</tr>

										</table>
									</div>
								</div>
							</div>

							<div class="modal-footer bg-light">
								<button type="button" class="btn btn-secondary fw-bold shadow-sm" data-bs-dismiss="modal">TUTUP</button>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

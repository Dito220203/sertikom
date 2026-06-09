<div class="container-fluid mt-4">
	<h4 class="fw-bold mb-3" style="color: var(--primary-emerald);">TAMBAH PANDUAN BARU</h4>

	<div class="card border-0 shadow-sm">
		<div class="card-body p-4">
			<form action="<?= base_url('panduan/simpan_panduan') ?>" method="post">
				<label>Judul Panduan:</label>
				<input type="text" name="judul" class="form-control mb-3" required>

				<label>Langkah-langkah:</label>
				<div id="box-langkah">
					<input type="text" name="langkah[]" class="form-control mb-2" placeholder="Langkah 1" required>
				</div>
				<button type="button" class="btn btn-sm btn-info" onclick="tambah()">+ Tambah Langkah</button>
				<button type="submit" class="btn btn-success">Simpan Panduan</button>
			</form>

			<script>
				function tambah() {
					$('#box-langkah').append('<input type="text" name="langkah[]" class="form-control mb-2" placeholder="Langkah selanjutnya...">');
				}
			</script>
		</div>
	</div>
</div>

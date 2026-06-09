<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center mb-3">
                <a href="<?= base_url('pelanggan') ?>" class="btn btn-sm btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <h4 class="fw-bold m-0" style="color: var(--primary-emerald);">EDIT PELANGGAN BARU</h4>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="<?= base_url('pelanggan/simpan_edit_pelanggan') ?>" method="POST">
						<input type="hidden" name="id_pelanggan" value="<?= $item['id_pelanggan'] ?>">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">NAMA LENGKAP</label>
                            <input type="text" name="nama_pelanggan" class="form-control border-success" placeholder="Masukkan nama pelanggan..." value="<?= $item['nama_pelanggan'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">NO. TELP / WHATSAPP</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-success text-success"><i class="bi bi-whatsapp"></i></span>
                                <input type="number" name="telp" class="form-control border-success" placeholder="Contoh: 08123456xxx" value="<?= $item['telp'] ?>" required>
                            </div>
                            <div class="form-text small">Gunakan format angka saja tanpa spasi.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">ALAMAT LENGKAP</label>
                            <textarea name="alamat" class="form-control border-success" rows="3" placeholder="Masukkan alamat pelanggan..."><?= $item['alamat'] ?></textarea>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light me-2 fw-bold text-secondary">RESET</button>
                            <button type="submit" class="btn btn-success px-4 fw-bold shadow-sm" style="background-color: var(--primary-emerald);">
                                <i class="bi bi-person-plus-fill"></i> UPDATE PELANGGAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

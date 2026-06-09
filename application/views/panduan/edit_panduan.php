<div class="container-fluid mt-4">
    <h4 class="fw-bold mb-3" style="color: var(--primary-emerald);">EDIT PANDUAN</h4>
    
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="<?= base_url('panduan/proses_edit/' . $panduan['id_panduan']) ?>" method="post">
                <label>Judul Panduan:</label>
                <input type="text" name="judul" class="form-control mb-3" value="<?= $panduan['judul'] ?>" required>

                <label>Langkah-langkah:</label>
                <div id="box-langkah">
                    <?php foreach ($panduan['langkah'] as $l) : ?>
                        <div class="input-group mb-2">
                            <input type="text" name="langkah[]" class="form-control" value="<?= $l['deskripsi'] ?>" required>
                            <button type="button" class="btn btn-outline-danger" onclick="$(this).parent().remove()">×</button>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <button type="button" class="btn btn-sm btn-info mt-2" onclick="tambah()">+ Tambah Langkah</button>
                <button type="submit" class="btn btn-success mt-2">Update Panduan</button>
            </form>
        </div>
    </div>
</div>

<script>
    function tambah() {
        $('#box-langkah').append(`
            <div class="input-group mb-2">
                <input type="text" name="langkah[]" class="form-control" placeholder="Langkah baru...">
                <button type="button" class="btn btn-outline-danger" onclick="$(this).parent().remove()">×</button>
            </div>
        `);
    }
</script>

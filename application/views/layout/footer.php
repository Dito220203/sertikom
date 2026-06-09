<footer class="mt-5 py-3 text-center text-secondary border-top">
	<small>&copy; 2026 <strong>Toko Semua Bisa</strong> - Aplikasi Kasir Modern</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('.table-data').DataTable({
        "language": {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "paginate": {
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });

    // 2. Fungsi Filter Manual
    $('#filterKategoriManual').on('change', function() {
        var val = $(this).val();
        if (val === 'all') {
            table.search('').draw();
        } else {
            table.search(val).draw();
        }
    });
});
</script>

<script>
	// Ambil pesan dari Flashdata CI3
	const flashData = "<?= $this->session->flashdata('pesan'); ?>";

	if (flashData) {
		let titleText = "Berhasil!";
		let iconType = "success";
		let btnColor = "#006b4d"; // Hijau Emerald

		// Logika penentu status berdasarkan isi teks
		if (flashData.includes("Gagal") || flashData.includes("gagal")) {
			titleText = "Oops...";
			iconType = "error";
			btnColor = "#d33"; // Merah
		}

		Swal.fire({
			icon: iconType,
			title: titleText,
			text: flashData,
			confirmButtonColor: btnColor
		});
	}
</script>
<script>
    function hapus(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;

            }

        });

    }

</script> 
</body>

</html>

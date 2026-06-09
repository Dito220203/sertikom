<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FROZERIA</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
	<style>
		:root {
			--primary-emerald: #006b4d;
			--dark-emerald: #004d37;
			--light-bg: #f4f7f6;
		}

		body {
			background-color: var(--light-bg);
			font-family: 'Segoe UI', Roboto, sans-serif;
		}

		/* Navbar Styling */
		.navbar-custom {
			background-color: var(--primary-emerald);
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		.navbar-brand {
			font-weight: 800;
			letter-spacing: 1px;
		}

		/* Sidebar/Menu Styling (Optional) */
		.nav-menu {
			background: #e9ecef;
			padding: 10px 0;
			border-bottom: 2px solid #dee2e6;
		}

		.nav-menu a {
			color: #333;
			text-decoration: none;
			font-weight: 600;
			padding: 5px 15px;
			font-size: 14px;
		}

		.nav-menu a:hover {
			color: var(--primary-emerald);
		}

		/* Custom Card */
		.bg-total {
			background-color: var(--dark-emerald);
			color: white;
			border-radius: 8px;
		}
	</style>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><i class="bi bi-shop"></i> FROZERIA</a>
			<div class="navbar-nav ms-auto">
				<span class="nav-link text-white"><i class="bi bi-person-circle"></i> Kasir: <strong>ADMIN</strong></span>
			</div>
		</div>
	</nav>

	<div class="nav-menu shadow-sm">
		<div class="container-fluid d-flex flex-wrap">
			<a href="<?= base_url('barang') ?>"><i class="bi bi-list-ul"></i> DASHBOARD</a>
			<a href="<?= base_url('kategori') ?>"><i class="bi bi-people"></i> KATEGORI</a>
			<a href="<?= base_url('panduan') ?>"><i class="bi bi-gear-fill"></i> BANTUAN</a>
			<a href="#"><i class="bi bi-box-arrow-right"></i> LOGOUT</a>
		</div>
	</div>

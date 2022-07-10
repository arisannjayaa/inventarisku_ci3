<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Belanja</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/bootstrap.css">

	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/vendors/iconly/bold.css">

	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/app.css">
	<link rel="shortcut icon" href="<?= base_url('') ?>public/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
	<div id="app">
		<div id="main" class="layout-horizontal">
			<header class="mb-5">
				<div class="header-top">
					<div class="container">
						<div class="logo">
							<a href="<?= base_url('belanja') ?>" class="fw-bold fs-4">InventarisKu</a>
						</div>
						<div class="header-top-right">

							<div class="dropdown">
								<?php
								$id_users = $this->session->userdata('id_user');
								$data_users = $this->db->query("select * from tb_user where id_user = '$id_users'");
								$row = $data_users->row();
								?>
								<a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown" aria-expanded="false">
									<div class="avatar avatar-md2">
										<img src="<?= base_url('public/dist/assets/images/avatars/' . $row->avatar) ?>" alt="Avatar">
									</div>
									<div class="text">
										<h6 class="user-dropdown-name"><?= $this->session->userdata('username'); ?></h6>
										<p class="user-dropdown-status text-sm text-muted"><?= $this->session->userdata('level'); ?></p>
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="<?= base_url('') ?>">Dashboard</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
								</ul>
							</div>

							<!-- Burger button responsive -->
							<a href="#" class="burger-btn d-block d-xl-none">
								<i class="bi bi-justify fs-3"></i>
							</a>
						</div>
					</div>
				</div>
				<nav class="main-navbar">
					<div class="container">
						<ul class="justify-content-end">
							<li class="menu-item">
								<a href="<?= base_url('keranjang') ?>" class='menu-link'>
									<i class="bi bi-basket-fill"></i>
									<span>Keranjang <span class="badge bg-danger">0</span></span>
								</a>
							</li>
						</ul>
					</div>
				</nav>

			</header>

			<div class="content-wrapper container">
				<?php if ($this->session->flashdata('logged')) { ?>
					<div class="alert alert-light-success color-success"><?= $this->session->flashdata('logged') ?></div>
				<?php } ?>
				<div class="page-heading">
					<h3>List Inventaris Yang Bisa Kamu Sewa 🥰</h3>
				</div>
				<div class="page-content">
					<section class="row">
						<div class="col-12 col-lg-12">
							<div class="row">
								<?php foreach ($barang as $key) { ?>
									<div class="col-lg-3 col-md-2 col-12">
										<div class="card shadow-sm">
											<div class="card-content">
												<img class="card-img-top img-fluid p-4" src="<?= base_url('') ?>public/assets/images/barang/default.png" alt="Card image cap" style="height: 15rem" />
												<div class="card-body">
													<h6 class="fs-6 fw-bold"><?= $key->nama_barang ?></h6>
													<div class="mb-3">
														<span class="d-block">Stok <?= $key->stok_barang ?></span>
														<span class="d-block fw-bold <?= ($key->stok_barang > 0) ? 'text-success' : 'text-danger' ?>"><?= ($key->stok_barang > 0) ? 'Tersedia' : 'Kosong' ?></span>
													</div>
													<div class="d-grid gap-2">
														<button class="btn btn-outline-primary">Detail</button>
														<button class="btn btn-primary <?= ($key->stok_barang <= 0) ? 'disabled' : '' ?>">Keranjang</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</section>
				</div>

			</div>
		</div>
	</div>
	<script src="<?= base_url('') ?>public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/pages/horizontal-layout.js"></script>
</body>

</html>

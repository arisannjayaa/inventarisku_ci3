<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Belanja</title>

	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/main/app.css">
	<link rel="shortcut icon" href="<?= base_url('') ?>public/assets/images/logo/favicon.svg" type="image/x-icon">
	<link rel="shortcut icon" href="<?= base_url('') ?>public/assets/images/logo/favicon.png" type="image/png">

	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/shared/iconly.css">

</head>

<body>
	<div id="app">
		<div id="main" class="layout-horizontal">
			<header class="mb-5">
				<div class="header-top">
					<div class="container">
						<div class="logo fs-4 fw-bold">
							<a href="<?= base_url('') ?>" class="text-dark">Inventaris<span class="text-primary">Ku</span></a>
						</div>
						<div class="header-top-right">
							<?php
							$id_users = $this->session->userdata('id_user');
							$data_users = $this->db->query("select * from tb_user where id_user = '$id_users'");
							$row = $data_users->row();
							?>
							<div class="dropdown">
								<a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown" aria-expanded="false">
									<div class="avatar avatar-md2">
										<img src="<?= base_url('public/assets/images/avatars/' . $row->avatar) ?>">
									</div>
									<div class="text">
										<h6 class="mb-0 text-gray-600"><?= ucfirst($this->session->userdata('username')) ?></h6>
										<p class="mb-0 text-sm text-gray-600"><?= ucfirst($this->session->userdata('level')) ?></p>
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="#">Profile Saya</a></li>
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
								<a href="<?= base_url('belanja') ?>" class='menu-link'>
									<i class="bi bi-cart-fill"></i>
									<span>Belanja <span class="badge bg-danger"></span></span>
								</a>
							</li>
							<li class="menu-item">
								<a href="<?= base_url('keranjang') ?>" class='menu-link'>
									<i class="bi bi-basket-fill"></i>
									<span>Keranjang <span class="badge bg-danger"><?= $belanja ?></span>
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
					<h3>Keranjang</h3>
				</div>
				<div class="page-content">
					<section class="row">
						<div class="col-12 col-lg-12 col-md-10">
							<div class="row">
								<div class="col-lg-8">
									<?php if (!$this->cart->contents()) { ?>
										<div class="alert alert-primary">Yahh kamu belum memilih inventaris yang mau disewa</div>
									<?php } ?>
									<?php
									foreach ($this->cart->contents() as $cart) { ?>
										<div class="d-flex mb-3">
											<div class="d-flex align-items-center justify-content-center bg-white p-4 rounded-3 shadow-sm">
												<img src="<?= base_url('public/assets/images/barang/default.png') ?>" alt=" Card image cap" height="70px" width="70px" />
											</div>
											<div class="ms-3 d-flex justify-content-end flex-column">
												<span class="d-block fs-5 text-primary"><?= $cart['name'] ?></span>
												<span class="d-block">Jumlah <?= $cart['qty'] ?></span>
												<span class="d-block fw-bold">Rp.<?= $cart['price'] ?></span>
											</div>
										</div>
									<?php } ?>
								</div>
								<div class="col-4">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-center">
												<h5>Total Harga</h5>
												<span class="fs-5 fw-bold">Rp.<?= $this->cart->total() ?></span>
											</div>
											<hr>
											<div class="d-grid">
												<a href="#" class="btn btn-primary p-2">Pesan</a>
											</div>
										</div>
									</div>
								</div>
							</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('') ?>public/assets/js/app.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/pages/dashboard.js"></script>

	<script src="<?= base_url('') ?>public/assets/js/pages/horizontal-layout.js"></script>
</body>

</html>

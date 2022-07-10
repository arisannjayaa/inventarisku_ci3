<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/vendors/fontawesome/all.min.css">
	<style>
		table.dataTable td {
			padding: 15px 8px;
		}

		.fontawesome-icons .the-icon svg {
			font-size: 24px;
		}
	</style>

	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/app.css">
	<link rel="shortcut icon" href="<?= base_url('') ?>public/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
	<div id="app">
		<div id="sidebar" class="active">
			<div class="sidebar-wrapper active">
				<div class="sidebar-header">
					<div class="d-flex justify-content-between">
						<div class="logo">
							<a href="index.html"><a href="<?= base_url('') ?>">InventarisKu</a></a>
						</div>
						<div class="toggler">
							<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
						</div>
					</div>
				</div>
				<div class="sidebar-menu">

					<ul class="menu">
						<li class="sidebar-title">Menu</li>

						<li class="sidebar-item <?= ($sidebar_item == 'Dashboard') ? 'active' : ''; ?>">
							<a href="<?= base_url('dashboard') ?>" class='sidebar-link'>
								<i class="bi bi-grid-fill"></i>
								<span>Dashboard</span>
							</a>
						</li>

						<?php if ($this->session->userdata('level') == 'admin') { ?>
							<li class="sidebar-item has-sub <?= ($side_menu == 'Master Data') ? 'active' : ''; ?>">
								<a href="#" class='sidebar-link'>
									<i class="bi bi-stack"></i>
									<span>Master Data</span>
								</a>
								<ul class="submenu <?= ($side_menu == 'Master Data') ? 'active' : ''; ?>">
									<li class="submenu-item <?= ($submenu_item == 'Data Barang') ? 'active' : ''; ?>">
										<a href="<?= base_url('barang') ?>">Data Barang</a>
									</li>
									<li class="submenu-item <?= ($submenu_item == 'Data Jurusan') ? 'active' : ''; ?>">
										<a href="<?= base_url('jurusan') ?>">Data Jurusan</a>
									</li>
									<li class="submenu-item <?= ($submenu_item == 'Data Prodi') ? 'active' : ''; ?>">
										<a href="<?= base_url('prodi') ?>">Data Prodi</a>
									</li>
									<li class="submenu-item <?= ($submenu_item == 'Data Users') ? 'active' : ''; ?>">
										<a href="<?= base_url('users') ?>">Data Users</a>
									</li>
								</ul>
							</li>
						<?php } ?>

						<?php if ($this->session->userdata('level') == 'mahasiswa') { ?>
							<li class="sidebar-item <?= ($sidebar_item == 'Data Belanja') ? 'active' : ''; ?>">
								<a href="<?= base_url('belanja') ?>" class='sidebar-link'>
									<i class="bi bi-bag-heart-fill"></i>
									<span>Belanja</span>
								</a>
							</li>
						<?php } ?>

						<li class="sidebar-item <?= ($sidebar_item == 'Data Orders') ? 'active' : ''; ?>">
							<a href="<?= base_url('orders') ?>" class='sidebar-link'>
								<i class="bi bi-grid-fill"></i>
								<span>Orders</span>
								<span class="badge bg-warning ms-auto">0</span>
							</a>
						</li>

						<li class="sidebar-item <?= ($sidebar_item == 'Data Transaksi') ? 'active' : ''; ?>">
							<a href="#" class='sidebar-link'>
								<i class="bi bi-grid-fill"></i>
								<span>Transaksi</span>
								<span class="badge bg-warning ms-auto">0</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="main" class='layout-navbar'>
			<header class='mb-3'>
				<nav class="navbar navbar-expand navbar-light ">
					<div class="container-fluid">
						<a href="#" class="burger-btn d-block">
							<i class="bi bi-justify fs-3"></i>
						</a>

						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
							<div class="dropdown">
								<a href="#" data-bs-toggle="dropdown" aria-expanded="false">
									<div class="user-menu d-flex">
										<div class="user-name text-end me-3">
											<h6 class="mb-0 text-gray-600"><?= ucfirst($this->session->userdata('username')) ?></h6>
											<p class="mb-0 text-sm text-gray-600"><?= ucfirst($this->session->userdata('level')) ?></p>
										</div>
										<?php
										$id_users = $this->session->userdata('id_user');
										$data_users = $this->db->query("select * from tb_user where id_user = '$id_users'");
										$row = $data_users->row();
										?>
										<div class="user-img d-flex align-items-center">
											<div class="avatar avatar-md">
												<img src="<?= base_url('public/dist/assets/images/avatars/' . $row->avatar) ?>">
											</div>
										</div>
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
									<li>
										<h6 class="dropdown-header">Hello, <?= ucfirst($this->session->userdata('username')) ?></h6>
									</li>
									<li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
											Profile</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Keluar</a></li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</header>
			<div id="main-content">

				<div class="page-heading">
					<div class="page-title">
						<div class="row">
							<div class="col-12 col-md-6 col-lg-12 order-md-1 order-last mb-3">
								<div class="card shadow-sm">
									<div class="card-body">
										<span class="fs-5 fw-bold text-primary" style="text-shadow: 20px;"><?= $heading ?></span>
									</div>
								</div>

							</div>
						</div>
					</div>
					<section class="section">

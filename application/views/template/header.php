<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/main/app-dark.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/pages/fontawesome.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/pages/datatables.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/main/app.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/pages/filepond.css">
	<link rel="shortcut icon" href="<?= base_url('') ?>public/assets/images/logo/favicon.svg" type="image/x-icon">
	<link rel="shortcut icon" href="<?= base_url('') ?>public/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
	<div id="app">
		<div id="sidebar" class="active">
			<div class="sidebar-wrapper active">
				<div class="sidebar-header position-relative">
					<div class="d-flex justify-content-between align-items-center">
						<div class="logo fs-5">
							<a href="<?= base_url('') ?>" class="text-dark">Inventaris<span class="text-primary">Ku</span></a>
						</div>
						<div class="theme-toggle d-flex gap-2  align-items-center">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
								<g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
									<path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
									<g transform="translate(-210 -1)">
										<path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
										<circle cx="220.5" cy="11.5" r="4"></circle>
										<path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
									</g>
								</g>
							</svg>
							<div class="form-check form-switch fs-6">
								<input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
								<label class="form-check-label"></label>
							</div>
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
								<path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
							</svg>
						</div>
						<div class="sidebar-toggler  x">
							<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
						</div>
					</div>
				</div>
				<div class="sidebar-menu">
					<ul class="menu">
						<li class="sidebar-title">Main Menu</li>

						<li class="sidebar-item <?= ($sidebar_item == 'Dashboard') ? 'active' : ''; ?>">
							<a href="<?= base_url('') ?>" class='sidebar-link'>
								<i class="bi bi-grid-1x2-fill"></i>
								<span>Dashboard</span>
							</a>
						</li>

						<?php if ($this->session->userdata('level') == 'admin') { ?>
							<li class="sidebar-item <?= ($sidebar_item == 'Data Pengembalian') ? 'active' : ''; ?>">
								<a href="<?= base_url('pengembalian') ?>" class='sidebar-link'>
									<i class="bi bi-arrow-return-right"></i>
									<span>Pengembalian</span>
								</a>
							</li>
						<?php } ?>
						<?php if ($this->session->userdata('level') == 'admin') {
							$transaksi = $this->db->get('tb_transaksi')->num_rows();
						} else {
							$id = $this->session->userdata('id_user');
							$transaksi = $this->db->query("select id_user from tb_transaksi where id_user='$id'")->num_rows();
						}
						?>
						<li class="sidebar-item <?= ($sidebar_item == 'Data Transaksi') ? 'active' : ''; ?>">
							<a href="<?= base_url('transaksi') ?>" class='sidebar-link d-flex align-item-center justify-content-between'>
								<div class="d-flex align-item-center">
									<i class="bi bi-cart-fill"></i>
									<span>Transaksi</span>
								</div>
								<span class="badge bg-danger"><?= $transaksi ?></span>
							</a>
						</li>

						<?php if ($this->session->userdata('level') == 'admin') { ?>
							<li class="sidebar-title">Master Data</li>
							<li class="sidebar-item has-sub <?= ($side_menu == 'Master Data') ? 'active' : ''; ?>">
								<a href="<?= base_url('') ?>" class='sidebar-link'>
									<i class="bi bi-archive-fill"></i>
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
									<li class="submenu-item <?= ($submenu_item == 'Data Rekening') ? 'active' : ''; ?>">
										<a href="<?= base_url('rekening') ?>">Data Rekening</a>
									</li>
								</ul>
							</li>
						<?php } ?>
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

						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							</ul>
							<div class="dropdown">
								<a href="" data-bs-toggle="dropdown" aria-expanded="false">
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
												<img src="<?= base_url('public/assets/images/avatars/' . $row->avatar) ?>">
											</div>
										</div>
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
									<li><a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="icon-mid bi bi-person me-2"></i>Profile Saya</a></li>
									<?php if ($this->session->userdata('level') != 'admin') { ?>
										<li><a class="dropdown-item" href="<?= base_url('belanja') ?>"><i class="icon-mid bi bi-cart me-2"></i>Sewa</a></li>
										<hr class="dropdown-divider">
										</li>
									<?php } ?>
									<li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i>Keluar</a></li>
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
							<div class="col-12 col-md-6 col-lg-12 order-md-1 order-last">
								<?php
								if ($this->session->flashdata('add_success')) {
									echo $this->session->flashdata('add_success');
								} elseif ($this->session->flashdata('delete_success')) {
									echo $this->session->flashdata('delete_success');
								} elseif ($this->session->flashdata('update_success')) {
									echo $this->session->flashdata('update_success');
								} elseif ($this->session->flashdata('logged')) {
									echo $this->session->flashdata('logged');
								} elseif ($this->session->flashdata('error_upload')) {
									echo $this->session->flashdata('error_upload');
								}
								?>
								<div class="card shadow-sm">
									<div class="card-body">
										<h4><?= $heading ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<section class="section">

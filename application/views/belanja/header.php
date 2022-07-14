<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>

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
									<span>Belanja <span class="badge bg-danger"></span>
								</a>
							</li>
							<li class="menu-item">
								<a href="<?= base_url('keranjang') ?>" class='menu-link'>
									<i class="bi bi-basket-fill"></i>
									<span>Keranjang <span class="badge bg-danger"><?= $belanja ?></span></span>
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<div class="content-wrapper container">
				<?php if ($this->session->flashdata('logged')) {
					echo $this->session->flashdata('logged');
				} ?>
				<div class="page-heading">
					<h3><?= $heading ?></h3>
				</div>
				<div class="page-content">
					<section class="row">
						<div class="col-12 col-lg-12 col-md-12">
							<div class="row">

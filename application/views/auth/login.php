<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/main/app.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/pages/auth.css">
	<link rel="shortcut icon" href="<?= base_url('') ?>public/assets/images/logo/favicon.svg" type="image/x-icon">
	<link rel="shortcut icon" href="<?= base_url('') ?>public/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
	<div id="auth">
		<div class="row h-100 justify-content-center align-items-center" style="background-color: #F0F1FF;">
			<div class="col-lg-3 col-10">
				<?php if ($this->session->flashdata('gagal')) {
					echo $this->session->flashdata('gagal');
				} elseif ($this->session->flashdata('register_sukses')) {
					echo $this->session->flashdata('register_sukses');
				} elseif ($this->session->flashdata('ganti_pass_sukses')) {
					echo $this->session->flashdata('ganti_pass_sukses');
				} ?>
				<div class="card shadow-sm">
					<div class="card-body">
						<h1 class="text-center fs-4 text-dark">Login | Inventaris<span class="text-primary">Ku</span></h1>
					</div>
				</div>
				<div class="card shadow-sm">
					<div class="card-content">
						<div class="card-body">
							<form class="form" method="post" action="<?= base_url('auth/cek_login') ?>">
								<div class="form-body">
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" id="username" class="form-control" placeholder="Username" name="user" required>
									</div>
									<div class="form-group mb-4">
										<label for="password">Password</label>
										<input type="password" id="password" class="form-control" placeholder="Password" name="pass">
									</div>
								</div>
								<div class="form-actions d-grid mb-2">
									<button type="submit" name="login" class="btn btn-primary">Login</button>
								</div>
								<hr>
								<span class="text-center d-block mb-2">Belum memiliki akun?</span>
								<div class="form-actions d-grid">
									<a href="<?= base_url('register') ?>" class="btn btn-outline-primary">Daftar</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

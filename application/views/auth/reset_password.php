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
			<div class="col-lg-4 col-10">
				<?php if ($this->session->flashdata('gagal')) {
					echo $this->session->flashdata('gagal');
				} elseif ($this->session->flashdata('register_sukses')) {
					echo $this->session->flashdata('register_sukses');
				} ?>
				<div class="card">
					<div class="card-body">
						<h1 class="text-center fs-4 text-dark">Reset Password | Inventaris<span class="text-primary">Ku</span></h1>
					</div>
				</div>
				<div class="card shadow-sm">
					<div class="card-content">
						<div class="card-body">
							<form class="form" method="post" action="<?= base_url('reset-password') ?>">
								<div class="form-body">
									<div class="form-group">
										<label for="pass_lama">Password Lama</label>
										<input type="password" id="pass_lama" class="form-control" placeholder="Password Lama" name="pass_lama" required>
									</div>
									<div class="form-group">
										<label for="pass_baru">Password Baru</label>
										<input type="password" id="pass_baru" class="form-control" placeholder="Password Baru" name="pass_baru">
									</div>
									<div class="form-group mb-4">
										<label for="konfirmasi_pass_baru">Konfirmasi Password Baru</label>
										<input type="password" id="konfirmasi_pass_baru" class="form-control" placeholder="Konfirmasi Password Baru" name="konfirmasi_pass_baru">
									</div>
								</div>
								<div class="form-actions d-grid mb-2">
									<button type="submit" name="login" class="btn btn-primary">Simpan</button>
								</div>
								<hr>
								<div class="form-actions d-grid">
									<a href="<?= base_url('profile') ?>" class="btn btn-outline-primary">Kembali</a>
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

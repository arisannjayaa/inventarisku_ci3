<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="<?= base_url() ?>/public/dist/assets/css/main/app.css">
	<link rel="stylesheet" href="<?= base_url() ?>/public/dist/assets/css/pages/auth.css">
	<link rel="shortcut icon" href="<?= base_url() ?>/public/dist/assets/images/logo/favicon.svg" type="image/x-icon">
	<link rel="shortcut icon" href="<?= base_url() ?>/public/dist/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
	<div id="auth">
		<div class="row h-100 justify-content-center align-items-center" style="background-color: #F0F1FF;">
			<div class="col-lg-3">
				<div class="card" style="border: 1px solid #545BFC;">
					<div class="card-content">
						<div class="card-body">
							<h1 class="text-center fs-4 mb-4" style="color: #333333;">Register | Inventaris<span style="color: #545BFC">Ku</span></h1>
							<form class="form" method="post" action="<?= base_url('auth/cek_login') ?>">
								<div class="form-body">
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" id="username" class="form-control" placeholder="Username" name="user" required>
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" id="password" class="form-control" placeholder="Password" name="pass" required>
									</div>
									<div class="form-group mb-4">
										<label for="confirm">Konfirmasi</label>
										<input type="password" id="confirm" class="form-control" placeholder="Konfirmasi" name="confirm" required>
									</div>
								</div>
								<div class="form-actions d-grid mb-2">
									<button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
								</div>
								<hr>
								<span class="text-center d-block mb-2">Sudah memiliki akun?</span>
								<div class="form-actions d-grid">
									<a href="<?= base_url('login') ?>" class="btn btn-outline-primary">Login</a>
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

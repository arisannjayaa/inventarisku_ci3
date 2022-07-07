<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
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
							<?php if ($this->session->flashdata('add_success')) { ?>
								<div class="alert alert-success"><?= $this->session->flashdata('error'); ?></div>
							<?php } ?>
							<h1 class="text-center fs-4 mb-4" style="color: #333333;">Login | Inventaris<span style="color: #545BFC">Ku</span></h1>
							<form class="form" method="post" action="<?= base_url('auth/cek_login') ?>">
								<div class="form-body">
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" id="username" class="form-control" placeholder="Name" name="user">
									</div>
									<div class="form-group mb-4">
										<label for="password">Password</label>
										<input type="password" id="password" class="form-control" placeholder="Password" name="pass">
									</div>
								</div>
								<div class="form-actions d-grid">
									<button type="submit" class="btn btn-primary me-1">Login</button>
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

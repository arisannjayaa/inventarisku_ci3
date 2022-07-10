<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Mazer Admin Dashboard</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/app.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/pages/auth.css">
</head>

<body>

	<body style="background-color: #F0F1FF;">
		<div class="container-fluid pt-5">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-5">
					<div class="card shadow-sm">
						<div class="card-content">
							<div class="card-body">
								<h1 class="text-center fs-4 mb-4" style="color: #333333;">Register | Inventaris<span style="color: #545BFC">Ku</span></h1>
								<form class="form" method="post" action="<?= base_url('auth/register_proses') ?>">
									<div class="form-body">
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
													<input type="text" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap">
													<small class="text-danger"><?= form_error('nama_lengkap') ?></small>
												</div>
												<div class="form-group">
													<label for="nim">NIM <span class="text-danger">*</span></label>
													<input type="text" id="nim" class="form-control" placeholder="NIM" name="nim">
													<small class="text-danger"><?= form_error('nim') ?></small>
												</div>
												<div class="form-group">
													<label for="jurusan">Jurusan <span class="text-danger">*</span></label>
													<select class="form-select" name="jurusan" id="jurusan">
														<option value="">Pilih nama jurusan</option>
														<?php foreach ($jurusan as $key) { ?>
															<option value="<?= $key->id_jurusan ?>"><?= $key->nama_jurusan ?></option>
														<?php } ?>
														<small class="text-danger"><?= form_error('prodi') ?></small>
													</select>
												</div>
												<div class="form-group">
													<label for="prodi">Prodi <span class="text-danger">*</span></label>
													<select class="form-select" name="prodi">
														<option>Pilih nama prodi</option>
														<?php foreach ($prodi as $key) { ?>
															<option value="<?= $key->id_prodi ?>"><?= $key->nama_prodi ?></option>
														<?php } ?>
														<small class="text-danger"><?= form_error('prodi') ?></small>
													</select>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="no_telepon">No Telepon <span class="text-danger">*</span></label>
													<input type="text" id="no_telepon" class="form-control" placeholder="No Telepon" name="no_telp">
													<small class="text-danger"><?= form_error('no_telp') ?></small>
												</div>
												<div class="form-group">
													<label for="username">Username <span class="text-danger">*</span></label>
													<input type="text" id="username" class="form-control" placeholder="Username" name="username">
													<small class="text-danger"><?= form_error('username') ?></small>
												</div>
												<div class="form-group">
													<label for="password">Password <span class="text-danger">*</span></label>
													<input type="password" id="password" class="form-control" placeholder="Password" name="password">
													<small class="text-danger"><?= form_error('password') ?></small>
												</div>
												<div class="form-group mb-4">
													<label for="confirm">Konfirmasi Password <span class="text-danger">*</span></label>
													<input type="password" id="confirm" class="form-control" placeholder="Konfirmasi" name="konfirmasi_pass">
													<small class="text-danger"><?= form_error('konfirmasi_pass') ?></small>
												</div>
											</div>
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

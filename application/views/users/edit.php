<div class="card shadow-sm">
	<div class="card-content">
		<div class="card-body">
			<?php foreach ($users as $key) {
			?>
				<form class="form form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url('users/edit_proses') ?>">
					<div class="form-body">
						<div class="row mb-3">
							<div class="col">
								<img alt="" class=" img-thumbnail p-3 img-preview" src="<?= base_url('public/assets/images/avatars/' . $key->avatar) ?>" style="height: 200px; width: 200px; ">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="col-12">
									<div class="form-group">
										<label for="file_gambar" class="form-label">Foto Profile</label>
										<input class="form-control" type="file" id="file_gambar" name="file_gambar" onchange="img_preview()">
									</div>
								</div>
								<input type="text" value="<?= $key->avatar ?>" name="gambar_lama" hidden>
								<input value="<?= $key->id_user ?>" type="text" name="id" hidden>
								<div class="col-12">
									<div class="form-group">
										<label for="nim">NIM</label>
										<input value="<?= $key->nim ?>" type="text" id="nim" class="form-control" name="nim" placeholder="NIM">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="nama">Nama</label>
										<input value="<?= $key->nama_lengkap ?>" type="text" id="nama" class="form-control" name="nama" placeholder="Nama">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="jurusan">Jurusan</label>
										<select class="choices form-select" name="id_jurusan">
											<option value="">Pilih nama jurusan</option>
											<?php foreach ($jurusan as $jrs) { ?>
												<option value="<?= $jrs->id_jurusan ?>"><?= $jrs->nama_jurusan ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="prodi">Prodi</label>
										<select class="choices form-select" name="id_prodi">
											<option value="">Pilih nama prodi</option>
											<?php foreach ($prodi as $prd) { ?>
												<option value="<?= $prd->id_jurusan ?>"><?= $prd->nama_jurusan ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="no_telp">No Telepon</label>
										<input value="<?= $key->no_telp ?>" type="number" id="no_telp" class="form-control" name="no_telp" placeholder="No Telepon">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="email">Email</label>
										<input value="<?= $key->email ?>" type="email" id="email" class="form-control" name="email" placeholder="Email">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="agama">Agama</label>
										<select class="choices form-select" name="agama">
											<option value="">Pilih nama agama</option>
											<option value="Hindu" <?= ($key->agama == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
											<option value="Islam" <?= ($key->agama == 'Islam') ? 'selected' : '' ?>>Islam</option>
											<option value="Katolik" <?= ($key->agama == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
											<option value="Protestan" <?= ($key->agama == 'Protestan') ? 'selected' : '' ?>>Protestan</option>
											<option value="Konghuchu" <?= ($key->agama == 'Konghuchu') ? 'selected' : '' ?>>Konghuchu</option>
										</select>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="alamat">Alamat</label>
										<input value="<?= $key->alamat ?>" type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="jenis_kelamin">Jenis Kelamin</label>
										<select class="choices form-select" name="jenis_kelamin">
											<option value="">Pilih jenis kelamin</option>
											<option value="Laki-laki" <?= ($key->jenis_kelamin == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
											<option value="Perempuan" <?= ($key->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
										</select>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="tanggal_lahir">Tanggal Lahir</label>
										<input value="<?= $key->tanggal_lahir ?>" type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="username">Username</label>
										<input value="<?= $key->username ?>" type="text" id="username" class="form-control" name="username" placeholder="Username">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" id="password" class="form-control" name="password" placeholder="Password">
									</div>
								</div>
								<div class="col-12 d-flex justify-content-end">
									<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
									<a href="<?= base_url('users') ?>" class="btn btn-warning me-1 mb-1">Kembali</a>
									<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			<?php } ?>
		</div>
	</div>
</div>

<div class="card shadow-sm">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-4">
				<img alt="" class="img-thumbnail p-3 img-preview mb-3" src="<?= base_url('public/assets/images/avatars/' . $profile->avatar) ?>" style="height: 300px; width: 400px; ">
				<div class="d-grid">
					<a href="<?= base_url('profile/edit') ?>" class="btn btn-primary mb-2">Edit Profile</a>
					<a href="<?= base_url('reset-password') ?>" class="btn btn-secondary mb-2">Reset Password</a>
				</div>
			</div>
			<div class="col-7">
				<table class="table table-borderless">
					<tr>
						<td style="width: 20%;">Username</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->username ?></td>
					</tr>
					<tr>
						<td style="width: 20%;">NIM</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->nim ?></td>
					</tr>
					<tr>
						<td style="width: 20%;">Nama</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->nama_lengkap ?></td>
					</tr>
					<tr>
						<td style="width: 20%;">Jurusan</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->nama_jurusan ?></td>
					</tr>
					<tr>
						<td style="width: 20%;">Prodi</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->nama_prodi ?></td>
					</tr>
					<tr>
						<td style="width: 20%;">Email</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->email ?></td>
					</tr>
					<tr>
						<td style="width: 20%;">Agama</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->agama ?></td>
					</tr>
					<tr>
						<td style="width: 20%;">Alamat</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->alamat ?></td>
					</tr>
					<tr>
						<td style="width: 20%;">Jenis Kelamin</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->jenis_kelamin ?></td>
					</tr>
					<tr>
						<td style="width: 20%;">Tanggal Lahir</td>
						<td style="width: 1%;">:</td>
						<td><?= $profile->tanggal_lahir ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

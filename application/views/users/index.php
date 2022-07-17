<?php
if ($this->session->flashdata('add_success')) { ?>
	<div class="alert alert-success"><?= $this->session->flashdata('add_success'); ?></div>
<?php } elseif ($this->session->flashdata('delete_success')) { ?>
	<div class="alert alert-danger"><?= $this->session->flashdata('delete_success'); ?></div>
<?php } elseif ($this->session->flashdata('update_success')) { ?>
	<div class="alert alert-success"><?= $this->session->flashdata('update_success'); ?></div>
<?php }
?>
<div class="card shadow-sm">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
		<a href="<?= base_url('users/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body table-responsive">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 2%;">No</th>
					<th>Nim</th>
					<th>Nama</th>
					<th>No Telepon</th>
					<th>Email</th>
					<th style="width: 20%;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($users as $key) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $key->nim ?></td>
						<td><?= $key->nama_lengkap ?></td>
						<td><?= $key->no_telp ?></td>
						<td><?= $key->email ?></td>
						<td>
							<a href="<?= base_url('users/edit/') . $key->id_user ?>" class="btn btn-warning">
								<i class="bi bi-pen-fill"></i>
							</a>
							<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#detail<?= $key->id_user ?>"><i class="bi bi-eye-fill"></i></button>
							<button onclick="confirm_del('<?= base_url('barang/remove/') . $key->id_user ?>')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>
<?php foreach ($users as $detail) { ?>
	<div class="modal fade text-left modal-borderless" id="detail<?= $detail->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail Users</h5>
					<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="row mb-3">
						<div class="col-4">
							<img alt="" class="img-thumbnail p-3 img-preview" src="<?= base_url('public/assets/images/avatars/' . $detail->avatar) ?>" style="height: 250px; width: 300px; ">
						</div>
						<div class="col-8">
							<table class="table table-borderless">
								<tr>
									<td style="width: 20%;">Username</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->username ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">NIM</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->nim ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Nama</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->nama_lengkap ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Jurusan</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->nama_jurusan ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Prodi</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->nama_prodi ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Email</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->email ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Agama</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->agama ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Alamat</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->alamat ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Jenis Kelamin</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->jenis_kelamin ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Tanggal Lahir</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->tanggal_lahir ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

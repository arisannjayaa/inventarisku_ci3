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
					<th>Agama</th>
					<th>Jenis Kelamin</th>
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
						<td><?= $key->agama ?></td>
						<td><?= $key->jenis_kelamin ?></td>
						<td>
							<a href="<?= base_url('prodi/edit/') . $key->id_prodi ?>" class="btn btn-warning">
								<i class="fa-fw select-all fas"></i>
							</a>
							<a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#border-less"><i class="fa-fw select-all fas"></i></a>
							<a href="<?= base_url('prodi/remove/') . $key->id_prodi ?>" class="btn btn-danger"><i class="fa-fw select-all fas"></i></a>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Details</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<img src="<?= base_url('public/dist/assets/images/barang/yamaha.jpg') ?>" class="img-fluid" alt="">
									</div>
									<div class="col">
										<h1></h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
						<i class="bx bx-x d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Close</span>
					</button>
					<button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
						<i class="bx bx-check d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Accept</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if ($this->session->flashdata('add_success')) { ?>
	<div class="alert alert-success"><?= $this->session->flashdata('add_success'); ?></div>
<?php } elseif ($this->session->flashdata('delete_success')) { ?>
	<div class="alert alert-danger"><?= $this->session->flashdata('delete_success'); ?></div>
<?php } elseif ($this->session->flashdata('update_success')) { ?>
	<div class="alert alert-success"><?= $this->session->flashdata('update_success'); ?></div>
<?php }
?>
<div class="card" style="border: 2px solid #545BFC;">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
		<a href="<?= base_url('users/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body table-responsive">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 8%;">No</th>
					<th>Nim</th>
					<th>Nama</th>
					<th>No Telepon</th>
					<th>Email</th>
					<th>Agama</th>
					<th>Jenis Kelamin</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($users as $key) { ?>
					<tr>
						<td style="width: 8%;"><?= $no++ ?></td>
						<td><?= $key->nim ?></td>
						<td><?= $key->nama_lengkap ?></td>
						<td><?= $key->no_telp ?></td>
						<td><?= $key->email ?></td>
						<td><?= $key->agama ?></td>
						<td><?= $key->jenis_kelamin ?></td>
						<td style="width: 20%;">
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

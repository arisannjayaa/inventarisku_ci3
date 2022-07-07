<?php
if ($this->session->flashdata('add_success')) { ?>
	<div class="alert alert-success"><?= $this->session->flashdata('add_success'); ?></div>
<?php } elseif ($this->session->flashdata('delete_success')) { ?>
	<div class="alert alert-danger"><?= $this->session->flashdata('delete_success'); ?></div>
<?php } elseif ($this->session->flashdata('update_success')) { ?>
	<div class="alert alert-success"><?= $this->session->flashdata('update_success'); ?></div>
<?php }
?>
<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
		<a href="<?= base_url('prodi/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body table-responsive">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 8%;">No</th>
					<th style="width: 8%;">KP</th>
					<th style="width: 8%;">KJ</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($prodi as $key) { ?>
					<tr>
						<td style="width: 8%;"><?= $no++ ?></td>
						<td><?= $key->id_prodi ?></td>
						<td><?= $key->id_jurusan ?></td>
						<td><?= $key->nama_prodi ?></td>
						<td style="width: 20%;">
							<a href="<?= base_url('prodi/edit/') . $key->id_prodi ?>" class="btn btn-warning">
								<i class="fa-fw select-all fas"></i>
							</a>
							<a href="#" class="btn btn-primary"><i class="fa-fw select-all fas"></i></a>
							<a href="<?= base_url('prodi/remove/') . $key->id_prodi ?>" class="btn btn-danger"><i class="fa-fw select-all fas"></i></a>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>

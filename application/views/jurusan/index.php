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
		<a href="<?= base_url('jurusan/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 8%;">No</th>
					<th>Kode</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($jurusan as $key) { ?>
					<tr>
						<td style="width: 8%;"><?= $no++ ?></td>
						<td style="width: 8%;"><?= $key->id_jurusan ?></td>
						<td><?= $key->nama_jurusan ?></td>
						<td style="width: 20%;">
							<a href="<?= base_url('jurusan/edit/') . $key->id_jurusan ?>" class="btn btn-warning">
								<i class="fa-fw select-all fas"></i>
							</a>
							<a href="#" class="btn btn-primary"><i class="fa-fw select-all fas"></i></a>
							<a class="btn btn-danger"><i class="fa-fw select-all fas" onclick="confirm_del('<?= base_url('jurusan/remove/') . $key->id_jurusan ?>')"></i></a>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	function confirm_del(url) {
		if (confirm('Yakin ingin menghapus data ini?')) {
			window.location.href = url;
		}
		return false;
	}
</script>

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
		<a href="<?= base_url('barang/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body table-responsive">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 8%;">No</th>
					<th>Nama</th>
					<th>Stok</th>
					<th>Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($barang as $key) { ?>
					<tr>
						<td style="width: 8%;"><?= $no++ ?></td>
						<td><?= $key->nama_barang ?></td>
						<td><?= $key->stok_barang ?></td>
						<td><?= $key->harga_barang ?></td>
						<td style="width: 20%;">
							<a href="<?= base_url('barang/edit/') . $key->id_barang ?>" class="btn btn-warning">
								<i class="fa-fw select-all fas"></i>
							</a>
							<a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#border-less"><i class="fa-fw select-all fas"></i></a>
							<a class="btn btn-danger"><i class="fa-fw select-all fas" onclick="confirm_del('<?= base_url('barang/remove/') . $key->id_barang ?>')"></i></a>
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
	<script>
		function confirm_del(url) {
			if (confirm('Yakin ingin menghapus data ini?')) {
				window.location.href = url;
			}
			return false;
		}
	</script>

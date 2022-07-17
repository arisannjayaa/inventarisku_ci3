<div class="card shadow-sm">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
		<a href="<?= base_url('barang/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 2%;">No</th>
					<th>Nama</th>
					<th style="width: 10%;">Stok</th>
					<th>Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($barang as $key) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $key->nama_barang ?></td>
						<td><?= $key->stok_barang ?></td>
						<td><?= $key->harga_barang ?></td>
						<td style="width: 20%;">
							<a href="<?= base_url('barang/edit/') . $key->id_barang ?>" class="btn btn-warning">
								<i class="bi bi-pen-fill"></i>
							</a>
							<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#detail<?= $key->id_barang ?>"><i class="bi bi-eye-fill"></i></button>
							<button class="btn btn-danger" onclick="confirm_del('<?= base_url('barang/remove/') . $key->id_barang ?>')"><i class="bi bi-trash3-fill"></i></button>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Details modal -->
<?php foreach ($barang as $detail) { ?>
	<div class="modal fade text-left modal-borderless" id="detail<?= $detail->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail Barang</h5>
					<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="row mb-3">
						<div class="col-4">
							<img alt="" class="img-thumbnail p-3 img-preview img-fluid" src="<?= base_url('public/assets/images/barang/' . $detail->gambar_barang) ?>" style="height: 250px; width: 250px; ">
						</div>
						<div class="col-8">
							<table class="table table-borderless">
								<tr>
									<td style="width: 20%;">Nama</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->nama_barang ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Stok</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->stok_barang ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Harga</td>
									<td style="width: 1%;">:</td>
									<td><?= $detail->harga_barang ?></td>
								</tr>
								<tr>
									<td style="width: 20%; vertical-align: text-top;">Keterangan</td>
									<td style="width: 1%; vertical-align: text-top;">:</td>
									<td><?= $detail->keterangan_barang ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

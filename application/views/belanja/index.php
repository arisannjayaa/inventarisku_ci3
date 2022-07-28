<?php foreach ($barang as $key) { ?>
	<div class="col-12 col-lg-3 col-md-6">
		<div class="card shadow-sm">
			<div class="card-content">
				<img class="card-img-top img-thumbnail p-4" src="<?= base_url('public/assets/images/barang/' . $key->gambar_barang) ?>" alt=" Card image cap" style="height: 15rem" />
				<div class="card-body">
					<h6 class="fs-6 fw-bold text-truncate"><?= $key->nama_barang ?></h6>
					<div class="mb-3">
						<span class="d-block">Rp. <?= number_format($key->harga_barang) ?></span>
						<span class="d-block">Stok <?= $key->stok_barang ?></span>
						<span class="d-block fw-bold <?= ($key->stok_barang > 0) ? 'text-success' : 'text-danger' ?>"><?= ($key->stok_barang > 0) ? 'Tersedia' : 'Kosong' ?></span>
					</div>
					<div class="d-grid gap-2">
						<a data-bs-toggle="modal" data-bs-target="#detail<?= $key->id_barang ?>" class="btn btn-outline-primary">Detail</a>
						<a href="<?= base_url('belanja/addcart/' . $key->id_barang) ?>" class="btn btn-primary <?= ($key->stok_barang <= 0) ? 'disabled' : '' ?>">Keranjang</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php foreach ($barang as $detail) { ?>
	<div class="modal fade text-left modal-borderless" id="detail<?= $detail->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
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
							<img alt="" class="img-thumbnail p-3 img-preview img-fluid" src="<?= base_url('public/assets/images/barang/' . $detail->gambar_barang) ?>" style="height: 150px; width: 250px; ">
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

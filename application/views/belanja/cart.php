<div class="col-lg-8 col-12">
	<?php if (!$this->cart->contents()) { ?>
		<div class="alert alert-primary">Yahh kamu belum memilih inventaris yang mau disewa</div>
	<?php } ?>
	<?php
	foreach ($this->cart->contents() as $cart) { ?>
		<div class="d-flex mb-4">
			<div class="d-flex align-items-center justify-content-center bg-white p-2 rounded-3 shadow-sm">
				<img src="<?= base_url('public/assets/images/barang/' . $cart['img']) ?>" alt=" Card image cap" height="100px" width="100px" />
			</div>
			<div class="ms-3 d-flex justify-content-end flex-column">
				<span class="d-block fs-5 text-primary"><?= $cart['name'] ?></span>
				<span class="d-block">Jumlah <?= $cart['qty'] ?></span>
				<span class="d-block fw-bold">Rp.<?= number_format($cart['price']) ?></span>
			</div>
		</div>
	<?php } ?>
</div>
<div class="col-lg-4 col-12">
	<div class="card shadow-sm">
		<div class="card-body">
			<div class="d-flex justify-content-between align-items-center">
				<h5>Total Harga</h5>
				<h5>Rp.<?= number_format($this->cart->total()) ?></h5>
			</div>
			<hr>
			<div class="d-grid">
				<button data-bs-toggle="modal" data-bs-target="#pesan" href="<?= base_url('cekout') ?>" class="btn btn-primary p-2">Pesan</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade text-left modal-borderless" id="pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Pesanan</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<span>Inventaris yang disewa</span>
				<hr>
				<table class="table table-borderless">
					<tr>
						<td style="width: 5%;">No</td>
						<td>Nama</td>
						<td>Jumlah</td>
						<td>Harga</td>
					</tr>

					<?php
					$no = 1;
					foreach ($this->cart->contents() as $cart) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $cart['name'] ?></td>
							<td><?= $cart['qty'] ?></td>
							<td>Rp.<?= number_format($cart['price']) ?></td>
						</tr>
					<?php } ?>
				</table>
				<hr>
				<form action="<?= base_url('belanja/cekout_pesanan') ?>" method="post">
					<div class="row">
						<div class="col">
							<div class="form-group row align-items-center">
								<div class="col-lg-3">
									<label class="col-form-label">Tanggal Sewa</label>
								</div>
								<div class="col-lg-9">
									<input type="date" class="form-control" name="tanggal_sewa" placeholder="Tanggal Sewa" value="<?= date('Y-m-d') ?>">
								</div>
							</div>
							<div class="form-group row align-items-center">
								<div class="col-lg-3">
									<label class="col-form-label">Tanggal Kembali</label>
								</div>
								<div class="col-lg-9">
									<input type="date" class="form-control" name="tanggal_kembali" placeholder="Tanggal Kembali" value="<?= date('Y-m-d') ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-3">
									<label class="col-form-label">Keterangan</label>
								</div>
								<div class="col-lg-9">
									<textarea class="form-control" rows="3" name="keterangan"></textarea>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
					<i class="bx bx-check d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Sewa Inventaris</span>
				</button>
			</div>
			</form>
		</div>
	</div>
</div>

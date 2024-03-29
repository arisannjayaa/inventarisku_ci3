<div class="col-lg-8 col-12">
	<?php if (!$this->cart->contents()) { ?>
		<div class="alert alert-primary">Yahh kamu belum memilih inventaris yang mau disewa</div>
	<?php } ?>
	<?php
	foreach ($this->cart->contents() as $cart) { ?>
		<div class="d-flex justify-content-between mb-4">
			<div class="d-flex">
				<div class="d-flex align-items-center justify-content-center bg-white p-2 rounded-3 shadow-sm">
					<img src="<?= base_url('public/assets/images/barang/' . $cart['img']) ?>" alt=" Card image cap" height="100px" width="100px" />
				</div>
				<div class="ms-3 d-flex justify-content-end flex-column">
					<span class="d-block fs-5 text-primary"><?= $cart['name'] ?></span>
					<span class="d-block">Jumlah <?= $cart['qty'] ?></span>
					<span class="d-block fw-bold">Rp.<?= number_format($cart['price']) ?></span>
				</div>
			</div>
			<div class="align-self-end">
				<a href="<?= base_url('belanja/remove_selected/' . $cart['rowid'] . '/' . $cart['id'] . '/' . $cart['qty']) ?>" class="d-inline fw-bold btn btn-sm btn-danger">Hapus</i></a>
			</div>
		</div>
	<?php } ?>
</div>
<div class="col-lg-4 col-12">
	<div class="card shadow-sm">
		<div class="card-body">
			<h5 class="mb-4">Klik pesan untuk menyewa inventaris :)</h5>
			<div class="d-grid">
				<button data-bs-toggle="modal" data-bs-target="#pesan" href="<?= base_url('cekout') ?>" class="btn btn-primary p-2 <?= (!$this->cart->contents()) ? 'disabled' : ''; ?>">Pesan</button>
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
				<form action="<?= base_url('belanja/cekout_pesanan') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col">
							<div class="alert alert-light-primary color-primary">
								<p>Jika menggunakan metode pembayaran transfer bank, kirim ke salah satu rekening berikut:</p>
								<table class="table table-borderless">
									<?php foreach ($bank as $rek) { ?>
										<tr>
											<td style="width: 10px;"><?= $rek->nama_bank ?></td>
											<td style="width: 2px;">:</td>
											<td><?= $rek->no_rekening ?></td>
										</tr>
									<?php	} ?>
								</table>
							</div>
						</div>
					</div>
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
									<label class="col-form-label">Metode Pembayaran</label>
								</div>
								<div class="col-lg-9">
									<input class="form-check-input" type="radio" name="metode_bayar" id="Transfer" onclick="show_transfer(0)" checked value="Transfer Bank">
									<label class="form-check-label" for="Transfer">
										Transfer Bank
									</label>
									<input class="form-check-input" type="radio" name="metode_bayar" id="Langsung" onclick="show_transfer(1)" value="Bayar Langsung">
									<label class="form-check-label" for="Langsung">
										Bayar Langsung
									</label>
								</div>
							</div>
							<div class="form-group row" id="mytransfer">
								<div class="col-lg-3">
									<label class="col-form-label">Bukti Pembayaran</label>
								</div>
								<div class="col-lg-9">
									<input class="form-control" type="file" name="bukti_bayar">
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
<script>
	function show_transfer(x) {
		if (x == 0) document.getElementById("mytransfer").style.display = '';
		else document.getElementById("mytransfer").style.display = 'none';
		return;
	}
</script>

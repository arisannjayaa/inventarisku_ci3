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
				<a href="<?= base_url('cekout') ?>" class="btn btn-primary p-2">Pesan</a>
			</div>
		</div>
	</div>
</div>

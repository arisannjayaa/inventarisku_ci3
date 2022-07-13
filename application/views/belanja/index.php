<?php foreach ($barang as $key) { ?>
	<div class="col-12 col-lg-4 col-md-6">
		<div class="card shadow-sm">
			<div class="card-content">
				<img class="card-img-top img-thumbnail p-4" src="<?= base_url('public/assets/images/barang/' . $key->gambar_barang) ?>" alt=" Card image cap" style="height: 20rem" />
				<div class="card-body">
					<h6 class="fs-6 fw-bold text-truncate"><?= $key->nama_barang ?></h6>
					<div class="mb-3">
						<span class="d-block">Rp. <?= number_format($key->harga_barang) ?></span>
						<span class="d-block">Stok <?= $key->stok_barang ?></span>
						<span class="d-block fw-bold <?= ($key->stok_barang > 0) ? 'text-success' : 'text-danger' ?>"><?= ($key->stok_barang > 0) ? 'Tersedia' : 'Kosong' ?></span>
					</div>
					<div class="d-grid gap-2">
						<a class="btn btn-outline-primary">Detail</a>
						<a href="<?= base_url('belanja/addcart/' . $key->id_barang) ?>" class="btn btn-primary <?= ($key->stok_barang <= 0) ? 'disabled' : '' ?>">Keranjang</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

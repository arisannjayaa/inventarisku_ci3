<div class="card shadow-sm">
	<div class="card-content">
		<div class="card-body">
			<?php foreach ($barang as $key) { ?>
				<form class="form form-horizontal" method="post" action="<?= base_url('barang/edit_proses/') . $key->id_barang ?>">
					<div class="form-body">
						<div class="row">
							<input type="hidden" class="form-control" name="id" placeholder="Id Barang" value="<?= $key->id_barang ?>">
							<div class="col-md-4">
								<label>Nama Barang</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="text" class="form-control <?= (form_error('nama')) ? 'is-invalid' : '' ?>" name="nama" placeholder="Nama Barang" value="<?= $key->nama_barang ?>">
								<small class="text-danger"><?= form_error('nama') ?></small>
							</div>
							<div class="col-md-4">
								<label>Stok Barang</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="number" class="form-control <?= (form_error('stok')) ? 'is-invalid' : '' ?>" name="stok" placeholder="Stok Barang" value="<?= $key->stok_barang ?>">
								<small class="text-danger"><?= form_error('stok') ?></small>
							</div>
							<div class="col-md-4">
								<label>Harga Barang</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="number" class="form-control <?= (form_error('harga')) ? 'is-invalid' : '' ?>" name="harga" placeholder="Harga Barang" value="<?= $key->harga_barang ?>">
								<small class="text-danger"><?= form_error('harga') ?></small>
							</div>
							<div class="col-sm-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
								<a href="<?= base_url('barang') ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
							</div>
						</div>
					</div>
				</form>
			<?php } ?>
		</div>
	</div>
</div>

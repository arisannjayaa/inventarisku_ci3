<div class="card">
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
								<input type="text" class="form-control" name="nama" placeholder="Nama Barang" value="<?= $key->nama_barang ?>">
							</div>
							<div class="col-md-4">
								<label>Stok Barang</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="number" class="form-control" name="stok" placeholder="Stok Barang" value="<?= $key->stok_barang ?>">
							</div>
							<div class="col-md-4">
								<label>Harga Barang</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="number" class="form-control" name="harga" placeholder="Harga Barang" value="<?= $key->harga_barang ?>">
							</div>
							<div class="col-sm-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
								<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
							</div>
						</div>
					</div>
				</form>
			<?php } ?>
		</div>
	</div>
</div>

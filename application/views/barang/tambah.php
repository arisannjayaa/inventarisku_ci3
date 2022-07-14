<div class="card shadow-sm">
	<div class="card-content">
		<div class="card-body">
			<?= form_open_multipart('barang/add_proses') ?>
			<div class="form-body">
				<div class="row mb-3">
					<div class="col">
						<img alt="" class="img-thumbnail p-3 img-preview" src="<?= base_url('public/assets/images/barang/default.png') ?>" style="height: 200px; width: 200px; ">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="file_gambar" class="form-label">Upload Gambar</label>
									<input class="form-control" type="file" name="gambar" id="file_gambar" onchange="img_preview()">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="stok">Stok</label>
									<input type="number" id="stok" class="form-control" name="stok" placeholder="Stok">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="harga">Harga</label>
									<input type="number" id="harga" class="form-control" name="harga" placeholder="Harga">
								</div>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
								<a href="<?= base_url('barang') ?>" class="btn btn-warning me-1 mb-1">Kembali</a>
								<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

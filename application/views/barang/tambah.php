<div class="card shadow-sm">
	<div class="card-content">
		<div class="card-body">
			<form class="form form-horizontal" method="post" action="<?= base_url('barang/add_proses') ?>">
				<div class="form-body">
					<div class="row">
						<div class="col-4">
						</div>
						<div class="col-8">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="nama">Nama</label>
										<input type="text" id="nama" class="form-control" name="fname" placeholder="Nama">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="stok">Stok</label>
										<input type="number" id="stok" class="form-control" name="email-id" placeholder="Stok">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="harga">Harga</label>
										<input type="number" id="harga" class="form-control" name="contact" placeholder="Harga">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="file_gambar" class="form-label">Upload Gambar</label>
										<input class="form-control" type="file" id="file_gamber">
									</div>
								</div>
								<div class="col-12 d-flex justify-content-end">
									<button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
									<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="card shadow-sm">
	<div class="card-content">
		<div class="card-body">
			<?php foreach ($barang as $key) { ?>
				<?= form_open_multipart('barang/edit_proses/' . $key->id_barang) ?>
				<div class="form-body">
					<div class="row mb-3">
						<div class="col">
							<img alt="" class="img-thumbnail p-3 img-preview" src="<?= base_url('public/assets/images/barang/' . $key->gambar_barang) ?>" style="height: 200px; width: 200px; ">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="gambar" class="form-label">Upload Gambar</label>
										<input class="form-control" type="file" name="gambar" id="gambar" onchange="img_preview()">
									</div>
								</div>
								<input type="text" value="<?= $key->gambar_barang ?>" name="gambar_lama" hidden>
								<div class="col-12">
									<div class="form-group">
										<label for="nama">Kode</label>
										<input value="<?= $key->id_barang ?>" type="text" id="nama" class="form-control" name="id" placeholder="Nama" readonly>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="nama">Nama</label>
										<input value="<?= $key->nama_barang ?>" type="text" id="nama" class="form-control <?= (form_error('nama')) ? 'is-invalid' : '' ?>" name="nama" placeholder="Nama">
										<small class="text-danger"><?= form_error('nama') ?></small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="stok">Stok</label>
										<input value="<?= $key->stok_barang ?>" type="number" id="stok" class="form-control <?= (form_error('stok')) ? 'is-invalid' : '' ?>" name="stok" placeholder="Stok">
										<small class="text-danger"><?= form_error('stok') ?></small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="harga">Harga</label>
										<input value="<?= $key->harga_barang ?>" type="number" id="harga" class="form-control <?= (form_error('harga')) ? 'is-invalid' : '' ?>" name="harga" placeholder="Harga">
										<small class="text-danger"><?= form_error('harga') ?></small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="keterangan">Keterangan</label>
										<textarea class="form-control <?= (form_error('keterangan')) ? 'is-invalid' : '' ?>" id="keterangan" rows="3" name="keterangan"><?= $key->keterangan_barang ?></textarea>
										<small class="text-danger"><?= form_error('keterangan') ?></small>
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
			<?php } ?>
		</div>
	</div>
</div>

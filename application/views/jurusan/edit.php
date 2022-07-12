<div class="card shadow-sm">
	<div class="card-content">
		<div class="card-body">
			<?php foreach ($jurusan as $key) { ?>
				<form class="form form-horizontal" method="post" action="<?= base_url('jurusan/edit_proses/') . $key->id_jurusan ?>">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
								<label>Kode Jurusan</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="text" class="form-control" name="id" placeholder="Nama Barang" value="<?= $key->id_jurusan ?>" readonly>
								<small class="text-danger"><?= form_error('id') ?></small>
							</div>
							<div class="col-md-4">
								<label>Nama Jurusan</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="text" class="form-control <?= (form_error('jurusan')) ? 'is-invalid' : '' ?>" name="nama" placeholder="Nama Barang" value="<?= $key->nama_jurusan ?>">
								<small class="text-danger"><?= form_error('jurusan') ?></small>
							</div>
							<div class="col-sm-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
								<a href="<?= base_url('jurusan') ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
							</div>
						</div>
					</div>
				</form>
			<?php
			} ?>
		</div>
	</div>
</div>

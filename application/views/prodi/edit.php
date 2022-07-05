<div class="card">
	<div class="card-content">
		<div class="card-body">
			<?php foreach ($jurusan as $key) { ?>
				<form class="form form-horizontal" method="post" action="<?= base_url('jurusan/edit_process/') . $key->id_jurusan ?>">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
								<label>Nama Jurusan</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="text" class="form-control" name="nama" placeholder="Nama Barang" value="<?= $key->nama_jurusan ?>">
								<small class="text-danger"><?= form_error('nama') ?></small>
							</div>
							<div class="col-sm-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
								<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
							</div>
						</div>
					</div>
				</form>
			<?php
			} ?>
		</div>
	</div>
</div>

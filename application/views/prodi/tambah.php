<div class="card">
	<div class="card-content">
		<div class="card-body">
			<form class="form form-horizontal" method="post" action="<?= base_url('prodi/add_prosess') ?>">
				<div class="form-body">
					<div class="row">
						<div class="col-md-4">
							<label>Kode Prodi</label>
						</div>
						<div class="col-md-8 form-group">
							<input type="text" class="form-control" name="id" placeholder="Kode Prodi">
							<small class="text-danger"><?= form_error('prodi') ?></small>
						</div>
						<div class="col-md-4">
							<label>Nama Prodi</label>
						</div>
						<div class="col-md-8 form-group">
							<input type="text" class="form-control" name="prodi" placeholder="Nama Prodi">
							<small class="text-danger"><?= form_error('nama') ?></small>
						</div>
						<div class="col-md-4">
							<label>Nama Jurusan</label>
						</div>
						<div class="col-md-8 form-group">
							<select class="choices form-select" name="jurusan">
								<option value="">Pilih nama jurusan</option>
								<?php foreach ($jurusan as $key) { ?>
									<option value="<?= $key->id_jurusan ?>"><?= $key->nama_jurusan ?></option>
								<?php } ?>
							</select>
							<small class="text-danger"><?= form_error('jurusan') ?></small>
						</div>
						<div class="col-sm-12 d-flex justify-content-end">
							<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
							<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

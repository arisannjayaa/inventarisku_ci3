<div class="card shadow-sm">
	<div class="card-content">
		<div class="card-body">
			<form class="form form-horizontal" method="post" action="<?= base_url('jurusan/add_prosess') ?>">
				<div class="form-body">
					<div class="row">
						<div class="col-md-4">
							<label>Kode Jurusan</label>
						</div>
						<div class="col-md-8 form-group">
							<input type="text" class="form-control <?= (form_error('id')) ? 'is-invalid' : '' ?>" name="id" placeholder="Kode Jurusan">
							<small class="text-danger"><?= form_error('id') ?></small>
						</div>
						<div class="col-md-4">
							<label>Nama Jurusan</label>
						</div>
						<div class="col-md-8 form-group">
							<input type="text" class="form-control <?= (form_error('jurusan')) ? 'is-invalid' : '' ?>" name="nama" placeholder="Nama Jurusan">
							<small class="text-danger"><?= form_error('jurusan') ?></small>
						</div>
						<div class="col-sm-12 d-flex justify-content-end">
							<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
							<a href="<?= base_url('jurusan') ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
							<button type="reset" class="btn btn-warning me-1 mb-1">Reset</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

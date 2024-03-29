<div class="card shadow-sm">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
		<a href="<?= base_url('jurusan/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 2%;">No</th>
					<th style="width: 15%;">Kode Prodi</th>
					<th style="width: 15%;">Kode Jurusan</th>
					<th>Nama</th>
					<th style="width: 20%;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($prodi as $key) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $key->id_prodi ?></td>
						<td><?= $key->id_jurusan ?></td>
						<td><?= $key->nama_prodi ?></td>
						<td>
							<a href="<?= base_url('prodi/edit/') . $key->id_prodi ?>" class="btn btn-warning">
								<i class="bi bi-pen-fill"></i>
							</a>
							<button class="btn btn-danger" onclick="confirm_del('<?= base_url('prodi/remove/') . $key->id_prodi ?>')"><i class="bi bi-trash3-fill"></i></button>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>

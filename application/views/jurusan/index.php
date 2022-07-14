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
					<th style="width: 15%;">Kode</th>
					<th>Nama</th>
					<th style="width: 20%;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($jurusan as $key) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $key->id_jurusan ?></td>
						<td><?= $key->nama_jurusan ?></td>
						<td>
							<a href="<?= base_url('jurusan/edit/') . $key->id_jurusan ?>" class="btn btn-warning">
								<i class="fa-fw select-all fas"></i>
							</a>
							<a class="btn btn-danger"><i class="fa-fw select-all fas" onclick="confirm_del('<?= base_url('jurusan/remove/') . $key->id_jurusan ?>')"></i></a>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>

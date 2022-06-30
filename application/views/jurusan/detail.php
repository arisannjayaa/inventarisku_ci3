<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
		<a href="#" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($jurusan as $key) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $key->nama_jurusan ?></td>
						<td>
							<a href="#" class="btn btn-warning">Edit</a>
							<a href="#" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>

<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
		<a href="<?= base_url('barang/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Stok</th>
					<th>Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($barang as $key) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $key->nama_barang ?></td>
						<td><?= $key->stok_barang ?></td>
						<td><?= $key->harga_barang ?></td>
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

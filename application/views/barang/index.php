<div class="card shadow-sm">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
		<a href="<?= base_url('barang/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 2%;">No</th>
					<th>Nama</th>
					<th style="width: 10%;">Stok</th>
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
						<td style="width: 20%;">
							<a href="<?= base_url('barang/edit/') . $key->id_barang ?>" class="btn btn-warning">
								<i class="fa-fw select-all fas"></i>
							</a>
							<a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#border-less"><i class="fa-fw select-all fas"></i></a>
							<a class="btn btn-danger"><i class="fa-fw select-all fas" onclick="confirm_del('<?= base_url('barang/remove/') . $key->id_barang ?>')"></i></a>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>

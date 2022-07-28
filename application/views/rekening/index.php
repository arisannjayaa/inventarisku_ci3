<div class="card shadow-sm">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
		<a href="<?= base_url('rekening/add') ?>" class="btn btn-primary">Tambah</a>
	</div>
	<div class="card-body">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 2%;">No</th>
					<th style="width: 30%;">Nama</th>
					<th>No Rekening</th>
					<th style="width: 20%;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($rekening as $key) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $key->nama_bank ?></td>
						<td><?= $key->no_rekening ?></td>
						<td>
							<a href="<?= base_url('prodi/edit/') . $key->id_rekening ?>" class="btn btn-warning">
								<i class="bi bi-pen-fill"></i>
							</a>
							<button class="btn btn-danger" onclick="confirm_del('<?= base_url('prodi/remove/') . $key->id_rekening ?>')"><i class="bi bi-trash3-fill"></i></button>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>

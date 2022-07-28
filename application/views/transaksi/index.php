<div class="card shadow-sm table-responsive">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
	</div>
	<div class="card-body">
		<table class="table" id="table1">
			<thead>
				<tr>
					<th style="width: 2%;">No</th>
					<?php if ($this->session->userdata('level') == 'admin') { ?>
						<th style="width: 30%;">Nama Penyewa</th>
					<?php } ?>
					<th style="width: 15%;">Tanggal Sewa</th>
					<th style="width: 15%;">Tanggal Kembali</th>
					<th>Jumlah Items</th>
					<th>Jumlah Harga</th>
					<th>Metode Bayar</th>
					<th>Status Sewa</th>
					<th>Status Bayar</th>
					<th>Bukti Bayar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($transaksi as $key) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<?php if ($this->session->userdata('level') == 'admin') { ?>
							<td><?= $key->nama_lengkap ?></td>
						<?php } ?>
						<td><?= $key->tanggal_sewa ?></td>
						<td><?= $key->tanggal_kembali ?></td>
						<td><span class="badge bg-success"><?= $key->total_sewa ?></span></td>
						<td><span class="badge bg-success">Rp.<?= number_format($key->total_harga) ?></span></td>
						<td><span class="badge <?= ($key->metode_bayar == 'Transfer Bank') ? 'bg-primary' : 'bg-success'; ?>"><?= $key->metode_bayar ?></span></td>
						<td><span class="badge <?= ($key->status_sewa == 'Dibatalkan') ? 'bg-danger' : 'bg-success'; ?>"><?= $key->status_sewa ?></span></td>
						<td><span class="badge <?= ($key->status_bayar == 'Menunggu') ? 'bg-primary' : 'bg-success'; ?>"><?= $key->status_bayar ?></span></td>
						<td>
							<?php if ($key->metode_bayar == 'Transfer Bank') { ?>
								<span class="badge bg-primary" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#bukti<?= $key->id_transaksi ?>"><i class="bi bi-eye-fill"></i></span>
							<?php } else { ?>
								<span class="badge bg-danger">-</span>
							<?php } ?>
						</td>
						<td>
							<?php if ($this->session->userdata('level') == 'admin') { ?>
								<a href="<?= base_url('transaksi/detail/') . $key->id_transaksi ?>" class="badge bg-primary">
									<i class="bi bi-gear-fill"></i>
								</a>
							<?php } elseif ($key->status_sewa == 'Menunggu') { ?>
								<a href="<?= base_url('transaksi/transaksi_batal/') . $key->id_transaksi ?>" class="badge bg-danger">
									Batalkan
								</a>
							<?php	} ?>
							<a href="<?= base_url('transaksi/detail/') . $key->id_transaksi ?>" class="badge bg-primary">
								Invoice
							</a>
						</td>
					</tr>
				<?php	} ?>
			</tbody>
		</table>
	</div>
</div>
<?php foreach ($transaksi as $detail) { ?>
	<div class="modal fade text-left modal-borderless" id="bukti<?= $detail->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Bukti Transfer Bank</h5>
					<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<img alt="" src="<?= base_url('public/assets/upload/transaksi/' . $detail->bukti_bayar) ?>">
			</div>
		</div>
	</div>
	</div>
	</div>
<?php } ?>

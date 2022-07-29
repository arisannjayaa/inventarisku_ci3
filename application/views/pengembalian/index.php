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
					<th style="width: 20%;">Tanggal Sewa</th>
					<th style="width: 20%;">Tanggal Kembali</th>
					<th>Jumlah Items</th>
					<th>Jumlah Harga</th>
					<th>Metode Bayar</th>
					<th>Status Sewa</th>
					<th>Status Bayar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($pengembalian as $key) { ?>
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
							<?php if ($this->session->userdata('level') == 'admin') { ?>
								<a href="<?= base_url('pengembalian/transaksi_kembali/') . $key->id_transaksi ?>" class="badge bg-primary">
									Kembali
								</a>
							<?php } elseif ($key->status_sewa == 'Menunggu') { ?>
								<a href="<?= base_url('transaksi/transaksi_batal/') . $key->id_transaksi ?>" class="badge bg-danger">
									Batalkan
								</a>
							<?php	} ?>
						</td>
					</tr>
				<?php	} ?>
			</tbody>
		</table>
	</div>
</div>

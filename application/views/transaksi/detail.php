<div class="card shadow-sm">
	<div class="card-content">
		<div class="card-body">
			<div class="d-flex justify-content-end align-items-center mb-4">
				<a href="<?= base_url('transaksi') ?>" class="btn btn-sm btn-primary me-2">Kembali</a>
				<?php if ($this->session->userdata('level') == 'admin') { ?>
					<a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#status" class="btn btn-sm btn-warning">Edit Status</a>
				<?php } ?>
			</div>
			<div class="d-flex justify-content-between align-items-center mb-4">
				<h5>Detail Transaksi</h5>
				<span>Transaksi#<?= $user->id_transaksi ?></span>
			</div>
			<div class="d-flex justify-content-between mb-4">
				<div>
					<span class="d-block fw-bold">Identitas Penyewa:</span>
					<span class="d-block"><?= $user->nama_lengkap ?></span>
					<span class="d-block"><?= $user->nim ?></span>
					<span class="d-block"><?= $user->nama_jurusan ?></span>
					<span class="d-block"><?= $user->nama_prodi ?></span>
					<span class="d-block mb-3"><?= $user->alamat ?></span>
					<span class="d-block fw-bold text-end">Metode Pembayaran:</span>
					<span class="d-block badge bg-primary"><?= $user->metode_bayar ?></span>
				</div>
				<?php
				$tgl1 = strtotime($user->tanggal_sewa);
				$tgl2 = strtotime($user->tanggal_kembali);
				$jarak = $tgl2 - $tgl1;
				$hari = $jarak / 60 / 60 / 24;
				if ($hari == 0) {
					$hari = 1;
				}
				?>
				<div class="d-flex flex-column">
					<span class="d-block fw-bold text-end">Tanggal Sewa</span>
					<span class="d-block text-end mb-2"><?= $user->tanggal_sewa ?></span>
					<span class="d-block fw-bold text-end">Tanggal Kembali</span>
					<span class="d-block text-end mb-2"><?= $user->tanggal_kembali ?></span>
					<span class="d-block fw-bold text-end">Jumlah Sewa Hari</span>
					<span class="text-end"><?= $hari ?> Hari</span>
				</div>
			</div>
			<hr>
			<table class="table">
				<tr>
					<td>Nama Barang</td>
					<td>Jumlah Sewa</td>
					<td>Harga Sewa</td>
					<td>Total</td>
				</tr>
				<?php
				$total_sewa = 0;
				foreach ($barang as $key) {
					$total_sewa += $key->total; ?>
					<tr>
						<td><?= $key->nama_barang ?></td>
						<td><?= $key->jumlah_sewa ?></td>
						<td>Rp.<?= number_format($key->harga_sewa) ?></td>
						<td>Rp.<?= number_format($key->total) ?></td>
					</tr>
				<?php
				}
				$total_sewa = $total_sewa * $hari;
				?>
				<tr>
					<td></td>
					<td></td>
					<td class="fw-bold">Total</td>
					<td class="fw-bold">Rp.<?= number_format($total_sewa) ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="modal fade text-left modal-borderless" id="status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Status</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<form action="<?= base_url('transaksi/status_sewa_bayar') ?>" method="post">
				<div class="row">
					<input type="text" value="<?= $user->id_transaksi ?>" name="id_transaksi" hidden>
					<div class="col-12 px-4 mb-3">
						<h6>Status Sewa</h6>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="status_sewa" id="status_sewa" value="Sewa">
							<label class="form-check-label" for="status_sewa">
								Sewa
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="status_sewa" id="status_sewa" value="Menunggu">
							<label class="form-check-label" for="status_sewa">
								Menunggu
							</label>
						</div>
					</div>
					<div class="col-12 px-4">
						<h6>Status Bayar</h6>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="status_bayar" id="statusbayar" value="Lunas">
							<label class="form-check-label" for="statusbayar">
								Lunas
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="status_bayar" id="statusbayar" value="Menunggu">
							<label class="form-check-label" for="statusbayar">
								Menunggu
							</label>
						</div>
					</div>
					<div class="col-12 px-4 py-2 d-flex justify-content-end">
						<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

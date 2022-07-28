<div class="row">
	<?php if ($this->session->userdata('level') == 'admin') { ?>
		<div class="col-6 col-lg-3 col-md-6">
			<div class="card shadow-sm">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon purple">
								<i class="bi bi-person-fill"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold">Pengguna</h6>
							<h6 class="font-extrabold mb-0"><?= $user ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-lg-3 col-md-6">
			<div class="card shadow-sm">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon blue">
								<i class="bi bi-cart-fill"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold">Transaksi</h6>
							<h6 class="font-extrabold mb-0"><?= $transaksi ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-lg-3 col-md-6">
			<div class="card shadow-sm">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon green">
								<i class="bi bi-cart-fill"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold">Prodi</h6>
							<h6 class="font-extrabold mb-0"><?= $prodi ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="col-6 col-lg-3 col-md-6">
		<div class="card shadow-sm">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon red">
							<i class="bi bi-box"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h6 class="text-muted font-semibold">Barang</h6>
						<h6 class="font-extrabold mb-0"><?= $barang ?></h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

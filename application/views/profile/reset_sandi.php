<div class="card shadow-sm">
	<div class="card-header d-flex justify-content-between align-items-center">
		<span><?= $card_header ?></span>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<div class="col-4">
				<img alt="" class="img-thumbnail p-3 img-preview" src="<?= base_url('public/assets/images/avatars/' . $profile->avatar) ?>" style="height: 400px; width: 400px; ">
			</div>
			<div class="col-8">

			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<div class="d-grid">
					<a href="<?= base_url('profile/edit') ?>" class="btn btn-primary mb-2">Edit Profile</a>
					<a href="<?= base_url('profile/edit') ?>" class="btn btn-secondary mb-2">Reset Sandi</a>
				</div>
			</div>
		</div>
	</div>
</div>

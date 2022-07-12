<?php if ($this->session->flashdata('logged')) { ?>
	<div class="alert alert-light-success color-success"><?= $this->session->flashdata('logged') ?></div>
<?php } ?>

</section>
</div>
</div>
</div>
</div>
<script src="<?= base_url('') ?>public/assets/js/myjs.js"></script>
<script src="<?= base_url('') ?>public/assets/js/extensions/datatables.js"></script>
<script src="<?= base_url('') ?>public/assets/js/app.js"></script>
<script src="<?= base_url('') ?>public/assets/js/extensions/filepond.js"></script>
<script>
	// function img_preview() {
	// 	const gambar = document.querySelector("#file_gambar");
	// 	const gambar_preview = document.querySelector(".img-preview");

	// 	const file_gambar = new FileReader();
	// 	file_gambar.readAsDataURL(gambar.files[0]);
	// 	file_gambar.onload = function(e) {
	// 		gambar_preview.src = e.target.result;
	// 	};
	// }

	function confirm_del(url) {
		if (confirm("Yakin ingin menghapus data ini?")) {
			window.location.href = url;
		}
		return false;
	}
</script>
</body>

</html>

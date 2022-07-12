</section>
</div>
</div>
</div>
</div>

<script src="<?= base_url('') ?>public/assets/js/extensions/datatables.js"></script>
<script src="<?= base_url('') ?>public/assets/js/app.js"></script>
<script>
	function confirm_del(url) {
		if (confirm('Yakin ingin menghapus data ini?')) {
			window.location.href = url;
		}
		return false;
	}
</script>
</body>

</html>

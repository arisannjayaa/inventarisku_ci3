function confirm_del(url) {
	if (confirm("Yakin ingin menghapus data ini?")) {
		window.location.href = url;
	}
	return false;
}

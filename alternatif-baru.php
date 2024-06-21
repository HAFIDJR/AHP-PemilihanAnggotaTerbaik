<?php
include_once './dasboard/header_new.php';
if ($_POST) {

	include_once 'includes/alternatif.inc.php';
	$eks = new Alternatif($db);

	// $eks->kt = $_POST['kt'];
	$eks->id = $_POST['id'];
	$eks->nm = $_POST['nm'];

	if ($eks->insert()) {
?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="alternatif.php">lihat semua data</a>.
		</div>
	<?php
	} else {
	?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
		</div>
<?php
	}
}
?> <div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8">
			<div class="page-header">
				<h5>Tambah Alternatif</h5>
			</div>

			<form method="post">
				<div class="form-group">
					<label for="kt">ID Alternative</label>
					<input type="text" class="form-control" id="id" name="id" required>
				</div>
				<div class="form-group">
					<label for="kt">Nama Alternatif</label>
					<input type="text" class="form-control" id="nm" name="nm" required>
				</div>
				<div class="d-flex-container mt-2 justify-content-around">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<button type="button" onclick="location.href='alternatif.php'" class="btn btn-success">Kembali</button>
			</form>
				</div>
			

		</div>
	</div>
</div>
<?php
include_once './dasboard/header_new.php';
include_once 'includes/nilai.inc.php';
$pgn = new Nilai($db);
if ($_POST) {

	include_once 'includes/kriteria.inc.php';
	$eks = new Kriteria($db);

	$eks->id = $_POST['id'];
	$eks->nm = $_POST['nm'];

	if ($eks->insert()) {
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="kriteria.php">lihat semua data</a>.
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
?>
		<div class="row m-2">
		  <div class="col-xs-12 col-sm-12 col-md-8">
			  <div class="page-header">
			  <h5>Tambah Kriteria</h5>
			</div>
			
				<form method="post">
				  <div class="form-group">
					<label for="kt">ID Kriteria</label>
					<input type="text" class="form-control" id="id" name="id" required>
				  </div>
				  <div class="form-group">
					<label for="tp">Nama Kriteria</label>
					<input type="text" class="form-control" name="nm" id="nm" required="">
				  </div>
				  <div class="d-flex ">
				  <button type="submit" class="btn btn-primary m-2">Simpan</button>
				  <button type="button" onclick="location.href='kriteria.php'" class="btn btn-success m-2">Kembali</button>
				  </div>
				  
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
			  <?php include_once 'sidebar.php'; ?>
		  </div>
		</div>

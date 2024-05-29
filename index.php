<?php
include_once './dasboard/header_new.php';
include_once 'includes/nilai.inc.php';
$pro3 = new Nilai($db);
$stmt3 = $pro3->readAll();
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt4 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
?>


<div id="container2" style="min-width: 80%; height: 400px; margin: 10px auto"></div>
<div class="row" style="width: 80%; margin: 10px auto ">
	<div class="col-xs-12 col-sm-12 col-md-4">
		<div class="page-header">
			<h5>Nilai Preferensi</h5>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<ol>
					<?php
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
					?>
						<li><?php echo $row3['ket_nilai'] ?> (<?php echo $row3['jum_nilai'] ?>)</li>
					<?php
					}
					?>
				</ol>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4">
		<div class="page-header">
			<h5>Kriteria-Kriteria</h5>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<ol class="list-unstyled">
					<?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
					?>
						<li>(<?php echo $row2['id_kriteria'] ?>) <?php echo $row2['nama_kriteria'] ?></li>
					<?php
					}
					?>
				</ol>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4">
		<div class="page-header">
			<h5>Alternatif Produk</h5>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<ol class="list-unstyled">
					<?php
					$data = array();
					$object = new stdClass();
					while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
					?>
						<li>(<?php echo $row1['id_alternatif'] ?>) <?php echo $row1['nama_alternatif'] ?></li>
						<?php
							$object->name = $row1['nama_alternatif'] ;
							$object->data = [$row1['hasil_akhir']];
							$data[] =$object;
							$object = new stdClass();
						?>
					<?php
					}
					?>
				</ol>
			</div>
		</div>
	</div>
</div>


</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
	let value = <?php echo json_encode($data) ;?>;
	console.log(value)
	document.addEventListener('DOMContentLoaded', function() {
		Highcharts.chart('container2', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'Grafik Perangkingan '
			},
			xAxis: {
				categories: ['Sistem Informasi']
			},
			yAxis: {
				title: {
					text: 'Jumlah Nilai'
				}
			},
			series: value
		});

	});
</script>


</body>

</html>

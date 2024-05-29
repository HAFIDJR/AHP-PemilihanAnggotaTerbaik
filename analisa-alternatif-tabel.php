<?php
include_once './dasboard/header_new.php';
include_once 'includes/skor.inc.php';
$pro = new Skor($db);
$altkriteria = isset($_POST['kriteria']) ? $_POST['kriteria'] : $_GET['kriteria'];
print($altkriteria);
$stmt2 = $pro->readAll2();
$stmt3 = $pro->readAll2();
if (isset($_POST['hapus'])) {
	$pro->delete();
	$pro->delete_ahp_jum_alt_kri();
	header('location: analisa-alternatif.php');
	return;
}
if (isset($altkriteria)) {
	$pro->readKri($altkriteria);
	$count = $pro->countAll();
	if (isset($_POST['subankr'])) {
		$count_select_alternatif = 0;
		$count_option = 0;
		for ($i = 0; $i < $count * $count; $i++) {
			print('nl'.strval($count_select_alternatif +1));
			$pro->insert($_POST['A'.strval($count_option + 1)], $_POST['nl'.strval($count_select_alternatif +1)], $_POST['A'.strval($count_option+2)], $altkriteria);
			$count_option = $count_option+2;
			$count_select_alternatif += 1;
			
		}
	}
?>
<?php
} else {
	header('location: analisa-alternatif.php');
} ?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-2">
		<?php
		include_once 'sidebar.php';
		?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-10">
		<ol class="breadcrumb">
			<li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			<li><a href="analisa-alternatif.php"><span class="fa fa-balance-scale"></span> Analisa Alternatif</a></li>
			<li class="active"><span class="fa fa-table"></span> Tabel Analisa Alternatif</li>
		</ol>
		<form method="post">
			<div class="row">
				<div class="col-md-6 text-left">
					<strong style="font-size:18pt;"><span class="fa fa-table"></span> Alternatif Menurut Kriteria</strong>
				</div>
				<div class="col-md-6 text-right">
					<button name="hapus" class="btn btn-danger">Hapus Semua Data</button>
				</div>
			</div>
			<br />

			<table width="100%" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th><?php echo $pro->kri ?></th>
						<?php
						while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						?>
							<th><?php echo $row2['nama_alternatif'] ?></th>
						<?php
						}
						?>
					</tr>
				</thead>

				<tbody>
					<?php
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
					?>
						<tr>
							<th style="vertical-align:middle;"><?php echo $row3['nama_alternatif'] ?></th>
							<?php
							$stmt4 = $pro->readAll2();
							while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
							?>
								<td style="vertical-align:middle;">
									<?php
									if ($row3['id_alternatif'] == $row4['id_alternatif']) {
										echo '1';
									} else {
										$pro->readAll1($row3['id_alternatif'], $row4['id_alternatif'], $altkriteria);
										echo number_format($pro->kp, 3, '.', ',');
									}
									?>
								</td>
							<?php
							}
							?>
						</tr>
					<?php
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>Jumlah</th>
						<?php
						$stmt5 = $pro->readAll2();
						while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) {
						?>
							<th><?php
								$pro->readSum1($row5['id_alternatif'], $altkriteria);
								echo number_format($pro->nak, 3, '.', ',');
								if ($pro->insert3($row5['id_alternatif'], $altkriteria, $pro->nak)) {
								} else {
									$pro->insert5($pro->nak, $row5['id_alternatif'], $altkriteria);
								}
								?></th>
						<?php
						}
						?>
					</tr>
				</tfoot>

			</table>
		</form>

		<table width="100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Perbandingan</th>
					<?php
					$stmt2x = $pro->readAll2();
					$stmt3x = $pro->readAll2();
					while ($row2x = $stmt2x->fetch(PDO::FETCH_ASSOC)) {
					?>
						<th><?php echo $row2x['nama_alternatif'] ?></th>
					<?php
					}
					?>
					<th>Skor</th>
				</tr>
			</thead>

			<tbody>
				<?php
				while ($row3x = $stmt3x->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<th style="vertical-align:middle;"><?php echo $row3x['nama_alternatif'] ?></th>
						<?php
						$stmt4x = $pro->readAll2();
						while ($row4x = $stmt4x->fetch(PDO::FETCH_ASSOC)) {
						?>
							<td style="vertical-align:middle;">
								<?php
								$pro->readAll3($row4x['id_alternatif'], $altkriteria);
								$jakx = $pro->jak;
								if ($row3x['id_alternatif'] == $row4x['id_alternatif']) {
									$hs1 = 1 / $jakx;
									$pro->insert2($hs1, $row3x['id_alternatif'], $row4x['id_alternatif'], $altkriteria);
									echo number_format($hs1, 3, '.', ',');
								} else {
									$pro->readAll1($row3x['id_alternatif'], $row4x['id_alternatif'], $altkriteria);
									$kpx = $pro->kp;
									$jmk = $kpx / $jakx;
									$pro->insert2($jmk, $row3x['id_alternatif'], $row4x['id_alternatif'], $altkriteria);
									echo "p".number_format($jmk, 3, '.', ',');
								}
								?>
							</td>
						<?php
						}
						?>
						<th style="vertical-align:middle;"><?php
															$pro->readAvg($row3x['id_alternatif'],$altkriteria); //Revisi
															$bbt = $pro->hak;
															print_r("INI".$bbt." ");
															$pro->insert4($bbt, $row3x['id_alternatif'], $altkriteria); //test sini
															echo number_format($bbt, 3, '.', ',');
															?></th>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>Jumlah</th>
					<?php
					$stmt5x = $pro->readAll2();
					while ($row5x = $stmt5x->fetch(PDO::FETCH_ASSOC)) {
					?>
						<th><?php
							$pro->readSum2($row5x['id_alternatif'], $altkriteria);
							echo number_format($pro->nak, 3, '.', ',');
							?></th>
					<?php
					}
					?>
					<th><?php
						$pro->readSum3($altkriteria);
						echo number_format($pro->bb, 3, '.', ',');
						?></th>
				</tr>
			</tfoot>

		</table>
	</div>
</div>

<?php
include_once 'footer.php';
?>
<script>
	if (window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}
</script>
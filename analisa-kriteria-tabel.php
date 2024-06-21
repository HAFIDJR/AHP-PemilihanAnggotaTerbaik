<?php
ob_start();
include_once './dasboard/header_new.php';
include_once 'includes/bobot.inc.php';
$pro = new Bobot($db);
$stmt2 = $pro->readAll2();
$stmt3 = $pro->readAll2();
$count = $pro->countAll();
if (isset($_POST['subankr'])) {
	$pro->delete();
	$count_select_kriteria = 0;
	$count_kriteria = 0;
	$count_kriteria2 = 0;
	for ($i = 0; $i < $count * $count; $i++) {
		$pro->insert($_POST['A' . strval($count_kriteria + 1)], $_POST['nl' . strval($count_select_kriteria + 1)], $_POST['A' . strval($count_kriteria2 + 1)]);
		$count_kriteria2 += 1;
		$count_select_kriteria += 1;
		if ($count_kriteria2 == $count) {
			$count_kriteria2 = 0;
			$count_kriteria += 1;
		}
	}
}
if (isset($_POST['hapus'])) {
	$pro->delete();
	header('Location: ' . '/tugas-spk-ahp/analisa-kriteria.php');
	ob_end_flush();
	return;
}
?>
<div class="row m-2">
	<div class="container px-4">
		<ol class="d-flex">
			<li><a href="index.php"><span></span> Beranda</a></li>
			<li><a href="analisa-kriteria.php"><span class="fa-solid fa-slash"></span> Analisa Kriteria</a></li>
			<li class="active"><span class="fa-solid fa-slash"></span> Tabel Analisa Kriteria</li>
		</ol>
		<form method="post">
			<div class="row">
				<div class="col-md-6 text-left">
					<strong style="font-size:18pt;"><span class="fa fa-table"></span> Perbandingan Kriteria</strong>
				</div>
				<div class="col-md-6 text-right">
					<button name="hapus" class="btn btn-danger">Hapus Semua Data</button>
				</div>
			</div>
			<br />

			<table width="100%" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Antar Kriteria</th>
						<?php
						while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						?>
							<th><?php echo $row2['nama_kriteria'] ?></th>
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
							<th style="vertical-align:middle;"><?php echo $row3['nama_kriteria'] ?></th>
							<?php
							$stmt4 = $pro->readAll2();
							while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
							?>
								<td style="vertical-align:middle;">
									<?php
									if ($row3['id_kriteria'] == $row4['id_kriteria']) {
										echo '1';
									} else {
										$pro->readAll1($row3['id_kriteria'], $row4['id_kriteria']);
										echo number_format($pro->kp, 3, ',', '.');
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
								$pro->readSum1($row5['id_kriteria']);
								echo number_format($pro->nak, 3, '.', ',');
								$pro->insert3($pro->nak, $row5['id_kriteria']);
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
						<th><?php echo $row2x['nama_kriteria'] ?></th>
					<?php
					}
					?>
					<th>Nilai Prioritas</th>
					<th>Bobot</th>

				</tr>
			</thead>

			<tbody>
				<?php

				while ($row3x = $stmt3x->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<th style="vertical-align:middle;"><?php echo $row3x['nama_kriteria'] ?></th>
						<?php
						$stmt4x = $pro->readAll2();
						while ($row4x = $stmt4x->fetch(PDO::FETCH_ASSOC)) {
						?>
							<td style="vertical-align:middle;">
								<?php
								if ($row3x['id_kriteria'] == $row4x['id_kriteria']) {
									$hs1 = 1 / $row4x['jumlah_kriteria'];
									$pro->insert2($hs1, $row3x['id_kriteria'], $row4x['id_kriteria']);
									echo number_format($hs1, 3, '.', ',');
								} else {
									$pro->readAll1($row3x['id_kriteria'], $row4x['id_kriteria']);
									$jmk = $pro->kp / $row4x['jumlah_kriteria'];
									$pro->insert2($jmk, $row3x['id_kriteria'], $row4x['id_kriteria']);
									echo number_format($jmk, 3, '.', ',');
								}
								?>
							</td>
						<?php
						}
						?>
						<th>
							<?php
							$pro->readSum2($row3x['id_kriteria']);
							echo number_format($pro->nak, 3, '.', ',');
							?>
						</th>
						<th style="vertical-align:middle;">
							<?php
							$pro->readAvg($row3x['id_kriteria']);
							$bbt = $pro->hak;
							$pro->insert4($bbt, $row3x['id_kriteria']);
							echo number_format($bbt, 3, '.', ',');

							?>
						</th>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<script>
	if (window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}
</script>
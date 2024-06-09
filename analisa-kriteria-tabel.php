<?php
include_once './dasboard/header_new.php';
include_once 'includes/bobot.inc.php';
$pro = new Bobot($db);
$stmt2 = $pro->readAll2();
$stmt3 = $pro->readAll2();
$count = $pro->countAll();
if (isset($_POST['subankr'])) {
	$pro->delete();
	$pro->insert($_POST['C11'], $_POST['nl1'], $_POST['C21']) ? '' : $pro->update($_POST['C11'], $_POST['nl1'], $_POST['C21']);
	$pro->insert($_POST['C12'], $_POST['nl2'], $_POST['C32']) ? '' : $pro->update($_POST['C12'], $_POST['nl2'], $_POST['C32']);
	$pro->insert($_POST['C13'], $_POST['nl3'], $_POST['C43']) ? '' : $pro->update($_POST['C13'], $_POST['nl3'], $_POST['C43']);
	$pro->insert($_POST['C14'], $_POST['nl4'], $_POST['C54']) ? '' : $pro->update($_POST['C14'], $_POST['nl4'], $_POST['C54']);
	$pro->insert($_POST['C25'], $_POST['nl5'], $_POST['C35']) ? '' : $pro->update($_POST['C25'], $_POST['nl5'], $_POST['C35']);
	$pro->insert($_POST['C26'], $_POST['nl6'], $_POST['C46']) ? '' : $pro->update($_POST['C26'], $_POST['nl6'], $_POST['C46']);
	$pro->insert($_POST['C27'], $_POST['nl7'], $_POST['C57']) ? '' : $pro->update($_POST['C27'], $_POST['nl7'], $_POST['C57']);
	$pro->insert($_POST['C38'], $_POST['nl8'], $_POST['C48']) ? '' : $pro->update($_POST['C38'], $_POST['nl8'], $_POST['C48']);
	$pro->insert($_POST['C39'], $_POST['nl9'], $_POST['C59']) ? '' : $pro->update($_POST['C39'], $_POST['nl9'], $_POST['C59']);
	$pro->insert($_POST['C60'], $_POST['nl10'], $_POST['C60A']) ? '' : $pro->update($_POST['C60'], $_POST['nl10'], $_POST['C60A']);
	$pro->insert($_POST['C61'], $_POST['nl11'], $_POST['C61A']) ? '' : $pro->update($_POST['C61'], $_POST['nl11'], $_POST['C61A']);
	$pro->insert($_POST['C62'], $_POST['nl12'], $_POST['C62A']) ? '' : $pro->update($_POST['C62'], $_POST['nl12'], $_POST['C62A']);
	$pro->insert($_POST['C63'], $_POST['nl13'], $_POST['C63A']) ? '' : $pro->update($_POST['C63'], $_POST['nl13'], $_POST['C63A']);
	$pro->insert($_POST['C64'], $_POST['nl14'], $_POST['C64A']) ? '' : $pro->update($_POST['C64'], $_POST['nl14'], $_POST['C64A']);
	$pro->insert($_POST['C65'], $_POST['nl15'], $_POST['C65A']) ? '' : $pro->update($_POST['C65'], $_POST['nl15'], $_POST['C65A']);
	$pro->insert($_POST['C66'], $_POST['nl16'], $_POST['C66A']) ? '' : $pro->update($_POST['C66'], $_POST['nl16'], $_POST['C66A']);

}
if (isset($_POST['hapus'])) {
	$pro->delete();
	header('Location: ' . '/tugas-spk-ahp/analisa-kriteria.php');
	return;
}
?>
<div class="row m-2" >
	<div class="col-xs-12 col-sm-12 col-md-10">
		<ol class="breadcrumb">
			<li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			<li><a href="analisa-kriteria.php"><span class="fa fa-bomb"></span> Analisa Kriteria</a></li>
			<li class="active"><span class="fa fa-table"></span> Tabel Analisa Kriteria</li>
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
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
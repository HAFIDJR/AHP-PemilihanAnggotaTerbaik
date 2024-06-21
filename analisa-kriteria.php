<?php
include_once './dasboard/header_new.php';
include_once "includes/kriteria.inc.php";
$pro1 = new Kriteria($db);
$count1 = $pro1->countAll();
include_once "includes/nilai.inc.php";
$pro2 = new Nilai($db);
?>
<div class="row">
	<div class="container ">
		<ol class="d-flex ">
			<li><a href="index.php"><span></span> Beranda</a></li>
			<li class="active"><span class="fa-solid fa-slash"></span> Analisa Kriteria</li>
			<li><a href="analisa-kriteria-tabel.php"><span class="fa-solid fa-slash"></span> Tabel Analisa Kriteria</a></li>
		</ol>
		<p style="margin-bottom:10px;" class="ms-2">
			<strong style="font-size:18pt;" class="ms-2"><span class="m-2"></span> Analisa Kriteria</strong>
		</p>

		<div class="m-3">
			<div class="d-flex justify-content-center" >
				<form method="post" action="analisa-kriteria-tabel.php">
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label>Kriteria Pertama</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label>Pernilaian</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label>Kriteria Kedua</label>
							</div>
						</div>
					</div>
					<?php
					$all_kriteria = $pro1->readAll();
					$count_select_kriteria = 1;
					$count_kriteria = 1;
					$count_kriteria2 = 1;
					while ($data_kriteria1 = $all_kriteria->fetch(PDO::FETCH_ASSOC)) {

						$all_kriteria2 = $pro1->readAll();
						while ($data_kriteria2 = $all_kriteria2->fetch(PDO::FETCH_ASSOC)) { ?>
							<div class="row mb-2">
								<div class="col-xs-12 col-md-3">
										<div class=" form-group">
									<?php
									$stmt2 = $pro1->readSatu($data_kriteria1['id_kriteria']);
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
										<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
										<input type="hidden" name=<?php echo "A" . $count_kriteria ?> value="<?php echo $row1["id_kriteria"]; ?>" />
									<?php }
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-select <?php echo "A".$count_kriteria.$count_kriteria2?>" name=<?php echo "nl" . $count_select_kriteria; ?>>
										<?php
										$satu_nilai_kriteria = false;
										$stmt1 = $pro2->readAll();
										if ($data_kriteria1['id_kriteria'] == $data_kriteria2['id_kriteria']) {
											$pro2->id = 14;
											$pro2->readOne();
											$satu_nilai_kriteria = true;
										}
										if ($satu_nilai_kriteria) { ?>
											<option value="<?php echo $pro2->jm ?>"><?php echo $pro2->jm ?> - <?php echo $pro2->kt; ?></option>
										<?php } else { ?>
											<?php while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
												<?php if ($row2['id_nilai']) { ?>
													<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
												<?php } ?>
											<?php
											}
											?>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-md-3">
								<div class="form-group">
									<?php
									$stmt3 = $pro1->readSatu($data_kriteria2['id_kriteria']);
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
										<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
										<input type="hidden" name=<?php echo "A" . $count_kriteria2 ?> value="<?php echo $row3["id_kriteria"]; ?>" />
									<?php }
									?>
								</div>
							</div>

			</div>
	<?php
							$count_kriteria2 += 1;
							$count_select_kriteria += 1;
						}
						$count_kriteria += 1;
						$count_kriteria2 = 1;
					}
	?>

	<button type="submit" name="subankr" class="btn btn-primary mt-2"> Selanjutnya <span class="fa fa-arrow-right"></span></button>
	</form>

		</div>
	</div>
</div>
</div>

<script>
	function isFloat(value) {
		if (
			typeof value === 'number' &&
			!Number.isNaN(value) &&
			!Number.isInteger(value)
		) {
			return true;
		}

		return false;
	}

	$('select').on('change', function() {
		let classSelected = $(this)[0].classList[1]
		let inverseValue = null
		if (isFloat(Number(this.value))) {
			inverseValue = 1 / this.value
			inverseValue = inverseValue.toFixed()
		} else {
			inverseValue = 1 / this.value
			inverseValue = parseFloat(inverseValue.toFixed(3))
		}
		let inverseSelected = classSelected.split('')
		inverseSelected =inverseSelected[0]+inverseSelected[2]+inverseSelected[1]
		$(`select.${inverseSelected}`).val(inverseValue)

	});
</script>
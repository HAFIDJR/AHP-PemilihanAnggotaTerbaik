<?php
include_once './dasboard/header_new.php';
include_once "includes/kriteria.inc.php";
$pro1 = new Kriteria($db);
$count1 = $pro1->countAll();
include_once "includes/nilai.inc.php";
$pro2 = new Nilai($db);
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-10">
		<ol class="breadcrumb">
			<li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			<li class="active"><span class="fa fa-bomb"></span> Analisa Kriteria</li>
			<li><a href="analisa-kriteria-tabel.php"><span class="fa fa-table"></span> Tabel Analisa Kriteria</a></li>
		</ol>
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-bomb"></span> Analisa Kriteria</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">

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

					<!-- C1 -->
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C1");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C11" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl1">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<?php if ($row2["jum_nilai"] == 1) { ?>

											<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
										<?php } ?>


									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C1");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C21" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C1");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C12" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C1-C2" name="nl2">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C2");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C32" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C1");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C13" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C1-C3" name="nl3">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C3");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C43" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C1");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C14" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C1-C4" name="nl4">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C4");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C54" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<!-- End C1 -->


					<!-- C2 -->
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C2");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C25" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C2-C1" name="nl5">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C1");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C35" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C2");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C26" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl6">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>

										<?php if ($row2["jum_nilai"] == 1) { ?>

											<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
										<?php } ?>

									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C2");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C46" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C2");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C27" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C2-C3" name="nl7">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C3");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C57" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C2");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C38" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C2-C4" name="nl8">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C4");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C48" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<!-- end C2 -->

					<!-- C3 -->
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C3");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C39" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C3-C1" name="nl9">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C1");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C59" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C3");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C60" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C3-C2" name="nl10">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C2");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C60A" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C3");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C61" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl11">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
											<?php
											if ($row2["jum_nilai"] == 1) { ?>
													
													<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2[
														   	"jum_nilai"
														   ]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
														<?php
												};?>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C3");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C61A" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C3");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C62" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C3-C4" name="nl12">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C4");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C62A" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<!-- end C3 -->


					<!-- C4 -->
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C4");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C63" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C4-C1" name="nl13">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C1");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C63A" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C4");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C64" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C4-C2" name="nl14">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C2");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C64A" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C4");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C65" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control C4-C3" name="nl15">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C3");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C65A" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readSatu("C4");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C66" value="<?php echo $row1["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl16">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
											<?php
											if ($row2["jum_nilai"] == 1) { ?>
													
													<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2[
														   	"jum_nilai"
														   ]; ?> - <?php echo $row2["ket_nilai"]; ?></option>
														<?php
												};?>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readSatu("C4");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_kriteria"]; ?>" readonly />
									<input type="hidden" name="C66A" value="<?php echo $row3["id_kriteria"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>

					<!-- end revisi -->

					<!-- End C4 -->
					<button type="submit" name="subankr" class="btn btn-primary"> Selanjutnya <span class="fa fa-arrow-right"></span></button>
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
		// Mendapatkan nilai Kelas
		let classSelected = $(this)[0].classList[1]
		let inverseValue = null
		if (isFloat(Number(this.value))) {
			inverseValue = 1 / this.value
			inverseValue = inverseValue.toFixed()
		} else {
			inverseValue = 1 / this.value
			inverseValue = parseFloat(inverseValue.toFixed(3))
		}
		// console.log(1/this.value)
		// console.log("Inverse Value "+ inverseValue)
		// console.log($(this)[0].classList[1])

		// C1
		if (classSelected == 'C1-C2') {
			$('select.C2-C1').val(inverseValue)
		}
		if (classSelected == 'C1-C3') {
			$('select.C3-C1').val(inverseValue)
		}
		if (classSelected == "C3-C1") {
			$('select.C1-C3').val(inverseValue)
		}

		if (classSelected == 'C1-C4') {
			$('select.C4-C1').val(inverseValue)
		}

		// End C1

		// C2
		if (classSelected == "C2-C1") {
			$('select.C1-C2').val(inverseValue)
		}
		if (classSelected == 'C2-C3') {
			// Find Selected Class "C2-C1"
			$('select.C3-C2').val(inverseValue)
		}
		if (classSelected == "C2-C4") {
			$('select.C4-C2').val(inverseValue)
		}
		// End C2


		// C3
		if (classSelected == "C3-C1") {
			$('select.C1-C3').val(inverseValue)
		}
		if (classSelected == "C3-C2") {
			$('select.C2-C3').val(inverseValue)
		}
		if (classSelected == "C3-C4") {
			$('select.C4-C3').val(inverseValue)
		}
		// End C3

		// C4
		if (classSelected == "C4-C1") {
			$('select.C1-C4').val(inverseValue)
		}
		if (classSelected == "C4-C3") {
			$('select.C3-C4').val(inverseValue)
		}
		if (classSelected == "C4-C2") {
			$('select.C2-C4').val(inverseValue)
		}
		// End C4

	});
</script>
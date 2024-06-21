<?php
include_once './dasboard/header_new.php';
include_once "includes/skor.inc.php";
$pro1 = new Skor($db);
$count1 = $pro1->countAll();
include_once "includes/kriteria.inc.php";
$pro3 = new Kriteria($db);
include_once "includes/nilai.inc.php";
$pro2 = new Nilai($db);

?>
<div class="row">
	<div class="container">
		<ol class="d-flex ">
			<li><a href="index.php"><span></span> Beranda</a></li>
			<li class="active"><span class="fa-solid fa-slash"></span> Analisa Alternatif</li>
		</ol>
		<!-- Modal -->
		<div class="modal fade" id="myModalalt" tabindex="-1" role="dialog" aria-labelledby="myModalLabelalt">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabelalt">Pilih Kriteria</h4>
					</div>
					<div class="modal-body">
						<div class="list-group">
							<?php
							$stmt5 = $pro3->readAll();
							while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) { ?>
								<a href="analisa-alternatif-tabel.php?kriteria=<?php echo $row5["id_kriteria"]; ?>" class="list-group-item"><?php echo $row5["nama_kriteria"]; ?></a>
							<?php }
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<p style="margin-bottom:10px;" class="ms-4">
			<strong style="font-size:18pt;" class="ms-1"><span></span> Analisa Alternatif</strong>
		</p>
		<div class="m-3">
			<div class=" d-flex justify-content-center">
				<form method="post" action="analisa-alternatif-tabel.php">
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<p style="padding:10px 0;"><label>Pilih Kriteria</label></p>
							</div>
						</div>
						<div class="col-xs-12 col-md-9">
							<div class="form-group">
								<select class="form-select" id="kriteria" name="kriteria">
									<?php
									$stmt4 = $pro3->readAll();
									while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row4["id_kriteria"]; ?>">
											<?php echo $row4["nama_kriteria"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
					</div>
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

					<!-- Buat Merender Alternatif -->
					<?php
					$row = $pro1->readAll();
					$count_select_alternatif = 0;
					$count_option = 0;
					while ($row_new = $row->fetch(PDO::FETCH_ASSOC)) { ?>
						<?php
						$colum = $pro1->readAll();
						while ($colum_new = $colum->fetch(PDO::FETCH_ASSOC)) { ?>
							<div class="row mb-2">
								<div class="col-xs-12 col-md-3">
									<div class="form-group">
										<?php
										$stmt2 = $pro1->readAlternatif($row_new["id_alternatif"]);
										while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
											<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
											<input type="hidden" name=<?php echo "A" . strval($count_option + 1);
																		$count_option += 1; ?> value="<?php echo $row1["id_alternatif"]; ?>" />
										<?php }
										?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="form-group">
										<select id="alternativ-select" class="form-select <?php echo $row_new["id_alternatif"] .
																								"-" .
																								$colum_new["id_alternatif"]; ?>" name=<?php echo "nl" . strval($count_select_alternatif + 1);
																																		$count_select_alternatif += 1;
																																		?>>
											<?php
											// Revisi
											$stmt1 = $pro2->readAll();
											$stmt2 = $pro2->readAll();
											$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
											if (
												$row_new["id_alternatif"] == $colum_new["id_alternatif"]
											) { ?>
												<option value="<?php
																$pro2->id = 14;
																$pro2->readOne();
																echo $pro2->jm; ?>">
													<?php
													echo $pro2->jm . "-" . $pro2->kt;
													?>
												</option>
												<?php
											} else {
												while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
													<option value="<?php
																	echo $row2["jum_nilai"];
																	?>">
														<?php
														echo $row2["jum_nilai"] . "-" . $row2["ket_nilai"];
														?>
													</option>
											<?php
												}
											} ?>

										</select>
									</div>
								</div>
								<div class="col-xs-12 col-md-3">
									<div class="form-group">
										<?php
										$stmt3 = $pro1->readAlternatif($colum_new["id_alternatif"]);
										while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
											<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
											<input type="hidden" name=<?php echo "A" . strval($count_option + 1);
																		$count_option += 1; ?> value="<?php echo $row3["id_alternatif"]; ?>" />
										<?php }
										?>
									</div>
								</div>
							</div>
						<?php }
						?>
					<?php }
					?>


					<!-- <div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readAlternatif("A1");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A12" value="<?php echo $row1["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl2">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> -
											<?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readAlternatif("A2");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A32" value="<?php echo $row3["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readAlternatif("A1");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A13" value="<?php echo $row1["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl3">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> -
											<?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readAlternatif("A2");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A43" value="<?php echo $row3["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readAlternatif("A1");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A14" value="<?php echo $row1["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl4">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> -
											<?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readAlternatif("A2");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A54" value="<?php echo $row3["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readAlternatif("A2");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A25" value="<?php echo $row1["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl5">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> -
											<?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readAlternatif("A1");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A35" value="<?php echo $row3["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readAlternatif("A2");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A26" value="<?php echo $row1["id_alternatif"]; ?>" />
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
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> -
											<?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readAlternatif("A1");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A46" value="<?php echo $row3["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readAlternatif("A2");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A27" value="<?php echo $row1["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl7">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> -
											<?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readAlternatif("A1");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A57" value="<?php echo $row3["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $pro1->readAlternatif("A2");
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A27" value="<?php echo $row1["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" name="nl7">
									<?php
									$stmt1 = $pro2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $row2["jum_nilai"]; ?>"><?php echo $row2["jum_nilai"]; ?> -
											<?php echo $row2["ket_nilai"]; ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $pro1->readAlternatif("A1");
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
									<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
									<input type="hidden" name="A57" value="<?php echo $row3["id_alternatif"]; ?>" />
								<?php }
								?>
							</div>
						</div>
					</div> -->
					<!-- <div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
							$stmt2 = $pro1->readAlternatif("A3");
							while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A38" value="<?php echo $row1["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl8">
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
							$stmt3 = $pro1->readAlternatif("A4");
							while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A48" value="<?php echo $row3["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
							$stmt2 = $pro1->readAlternatif("A3");
							while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A39" value="<?php echo $row1["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl9">
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
							$stmt3 = $pro1->readAlternatif("A4");
							while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A59" value="<?php echo $row3["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
							$stmt2 = $pro1->readAlternatif("A3");
							while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A39" value="<?php echo $row1["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl9">
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
							$stmt3 = $pro1->readAlternatif("A4");
							while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A59" value="<?php echo $row3["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
							$stmt2 = $pro1->readAlternatif("A3");
							while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A39" value="<?php echo $row1["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl9">
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
							$stmt3 = $pro1->readAlternatif("A4");
							while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A59" value="<?php echo $row3["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
							$stmt2 = $pro1->readAlternatif("A4");
							while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A410" value="<?php echo $row1["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl10">
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
							$stmt3 = $pro1->readAlternatif("A1");
							while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A510" value="<?php echo $row3["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
							$stmt2 = $pro1->readAlternatif("A4");
							while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A410" value="<?php echo $row1["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl10">
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
							$stmt3 = $pro1->readAlternatif("A1");
							while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A510" value="<?php echo $row3["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
							$stmt2 = $pro1->readAlternatif("A4");
							while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A410" value="<?php echo $row1["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl10">
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
							$stmt3 = $pro1->readAlternatif("A1");
							while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A510" value="<?php echo $row3["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
							$stmt2 = $pro1->readAlternatif("A4");
							while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row1["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A410" value="<?php echo $row1["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl10">
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
							$stmt3 = $pro1->readAlternatif("A1");
							while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
							<input type="text" class="form-control" value="<?php echo $row3["nama_alternatif"]; ?>" readonly />
							<input type="hidden" name="A510" value="<?php echo $row3["id_alternatif"]; ?>" />
							<?php }
							?>
						</div>
					  </div>
					</div> -->

					<div class="d-flex">
						<button type="submit" name="subankr" class="btn btn-primary mt-2 me-auto"> Selanjutnya <span class="fa fa-arrow-right"></span></button>

						<button type="button" class="btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
							Hasil Perhitungan Kriteria
						</button>
					</div>


					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Kriteria</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="list-group">
										<?php
										$stmt5 = $pro3->readAll();
										while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) { ?>
											<a href="analisa-alternatif-tabel.php?kriteria=<?php echo $row5["id_kriteria"]; ?>" class="list-group-item"><?php echo $row5["nama_kriteria"]; ?></a>
										<?php }
										?>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
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

	$('select#alternativ-select').on('change', function() {
		let classSelected = $(this)[0].classList[1]
		let inverseValue = null
		if (isFloat(Number(this.value))) {
			inverseValue = 1 / this.value
			inverseValue = inverseValue.toFixed()
		} else {
			inverseValue = 1 / this.value
			inverseValue = parseFloat(inverseValue.toFixed(3))
		}
		let inverseSelected = classSelected.split('-')
		inverseSelected = inverseSelected[1] + "-" + inverseSelected[0]
		$(`select.${inverseSelected}`).val(inverseValue)

	});
</script>
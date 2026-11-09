<style>
	[data-toggle="collapse"].collapsed .if-not-collapsed {
	display: none;
	}
	[data-toggle="collapse"]:not(.collapsed) .if-collapsed {
	display: none;
	}
	#tablematrix {
	position: relative;
	}
	#tablematrix:before,
	#tablematrix:after {
	content: '';
	height: 100%;
	position: absolute;
	border-color: black;
	border-style: solid;
	width: 10px;
	top: -1px;
	}
	#tablematrix:before {
	left: -2px;
	border-width: 2px 0px 2px 2px;
	}
	#tablematrix:after {
	right: -2px;
	border-width: 2px 2px 2px 0px;
	}
</style>
<br />
<h6><strong>Analisa Menggunakan SPK Metode SAW</strong><h6>

<hr />

<div class="card card-body">
	
	<?php
		error_reporting(0);
		// mysqli_connect("127.0.0.1", "root", "");
		// mysqli_select_db("db_kmeans");
		$db = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);

	?>
	
	<div class="container-fluid p-0">

		<!-- <section class="resume-section p-3 p-lg-5 d-flex d-column"> -->
			<div class="my-auto">
				<!-- <h1 class="mb-0">Sistem Pakar 
					<span class="text-primary">Metode Certainty Factor</span>
				</h1>
				<div class="subheading mb-5">Analisa Menggunakan Sistem Pakar Metode CF (Certainty Factor)
					<a href="mailto:name@email.com"></a>
				</div> -->
				<?php if (!isset($_POST['button'])) { ?>
				<form name="form1" method="post" action="">
				<br>
				<table class="table table-bordered">
					<tr>
						<td>Pilih Gejala</td>
						<?php $q = mysqli_query($db, "SELECT * FROM gejala ORDER BY id_gejala"); while ($r = mysqli_fetch_array($q)) { ?>        
					</tr>
					<tr>
						<td> 
							<input id="gejala<?php echo $r['id_gejala']; ?>" name="gejala<?php echo $r['id_gejala']; ?>" type="checkbox" value="true">
							<?php echo $r['nama_gejala']; ?><br/>                
						</td>
					</tr>
					<?php } ?>	
					<tr>
						<td><input class="btn btn-secondary btn-block" type="submit" name="button" value="Proses"></td>
					</tr>
				</table>
				<br>
				</form>

				<?php } else { ?>
					
				<?php
				$perintah = "SELECT * FROM gejala";
				$minta = mysqli_query($db, $perintah);
				$sql = '';
				$sql1 = '';
				$i = 0;
				//mengecek semua chekbox gejala
				while($hs=mysqli_fetch_array($minta))
				{
					//jika gejala dipilih
					//menyusun daftar gejala misal '1','2','3' dst utk dipakai di query
					if ($_POST['gejala'.$hs['id_gejala']] == 'true')
					{
						if ($sql == '')
						{
							$sql = "'$hs[id_gejala]'";
							$sql1 = "'$hs[nama_gejala]'";
						}
						else
						{
							$sql = $sql.",'$hs[id_gejala]'";
							$sql1 = $sql1.",'$hs[nama_gejala]'";
						}
					}
					$i++;
				}
				echo $sql.'<br/>';
				empty($daftar_penyakit);
				empty($daftar_cf);
				if ($sql != '')
				{
					//mencari id_penyakit di tabel pengetahuan yang gejalanya dipilih
					$perintah = "SELECT id_penyakit FROM pengetahuan WHERE id_gejala IN ($sql) GROUP BY id_penyakit ORDER BY id_penyakit";
					// echo "<br/>".$perintah."<br/>";
					$minta = mysqli_query($db, $perintah);
					$id_penyakit_terbesar = '';
					$nama_penyakit_terbesar = '';
					$c = 0;
					while($hs=mysqli_fetch_array($minta))
					{
						//memProses id penyakit satu persatu
						$id_penyakit = $hs['id_penyakit'];
						$qry = mysqli_query($db, "SELECT * FROM penyakit WHERE id_penyakit = '$id_penyakit'");
						$dt = mysqli_fetch_array($qry);
						$nama_penyakit = $dt['nama_penyakit'];
						$daftar_penyakit[$c] = $hs['id_penyakit'];
						echo "<br/>Proses Penyakit ".$daftar_penyakit[$c].". ".$nama_penyakit."<hr>";
						//mencari gejala yang mempunyai id penyakit tersebut, agar bisa menghitung CF dari MB dan MD nya
						$p = "SELECT id_penyakit, mb, md, id_gejala FROM pengetahuan WHERE id_gejala IN ($sql) AND id_penyakit = '$id_penyakit'";
						// echo $p.'<br/>';
						$m =mysqli_query($db, $p);
						//mencari jumlah gejala yang ditemukan
						$jml = mysqli_num_rows($m);
						//jika gejalanya 1 langsung ketemu CF nya
						echo "Jumlah Gejala = ".$jml."<hr>";
						if ($jml == 1)
						{
							$h=mysqli_fetch_array($m);
							$mb = $h['mb'];
							$md = $h['md'];
							$cf = $mb - $md;
							$daftar_cf[$c] = $cf;
							//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
							if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
							{
								$cf_terbesar = $cf;
								$id_penyakit_terbesar = $id_penyakit;
								$nama_penyakit_terbesar = $nama_penyakit;
							}
							echo "<br/>Proses 1<hr>";
							echo "mb = ".$mb."<br/>";
							echo "md = ".$md."<br/>";
							echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
						}
						//jika gejala lebih dari satu harus diProses semua gejala
						else if ($jml > 1)
						{
							$i = 1;
							//Proses gejala satu persatu
							while($h=mysqli_fetch_array($m))
							{
								echo "<br/>Proses ".$i."<hr>";
								//pada gejala yang pertama masukkan MB dan MD menjadi MBlama dan MDlama
								if ($i == 1)
								{
									$mblama = $h['mb'];
									$mdlama = $h['md'];
									echo "mblama = ".$mblama."<br/>";
									echo "mdlama = ".$mdlama."<br/>";
								}
								//pada gejala yang nomor dua masukkan MB dan MD menjadi MBbaru dan MB baru kemudian hitung MBsementara dan MDsementara
								else if ($i == 2)
								{
									$mbbaru = $h['mb'];
									$mdbaru = $h['md'];
									echo "mbbaru = ".$mbbaru."<br/>";
									echo "mdbaru = ".$mdbaru."<br/>";
									$mbsementara = $mblama + ($mbbaru * (1 - $mblama));
									$mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
									echo "mbsementara = mblama + (mbbaru * (1 - mblama)) = $mblama + ($mbbaru * (1 - $mblama)) = ".$mbsementara."<br/>";
									echo "mdsementara = mdlama + (mdbaru * (1 - mdlama)) = $mdlama + ($mdbaru * (1 - $mdlama)) = ".$mdsementara."<br/>";
									//jika jumlah gejala cuma dua maka CF ketemu
									if ($jml == 2)
									{
										$mb = $mbsementara;
										$md = $mdsementara;
										$cf = $mb - $md;
										echo "mb = mbsementara = ".$mb."<br/>";
										echo "md = mdsementara = ".$md."<br/>";
										echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
										$daftar_cf[$c] = $cf;
										//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
										if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
										{
											$cf_terbesar = $cf;
											$id_penyakit_terbesar = $id_penyakit;
											$nama_penyakit_terbesar = $nama_penyakit;
										}
									}
								}
								//pada gejala yang ke 3 dst Proses MBsementara dan MDsementara menjadi MBlama dan MDlama
								//MB dan MD menjadi MBbaru dan MDbaru
								//hitung MBsementara dan MD sementara yg sekarang
								else if ($i >= 3)
								{
									$mblama = $mbsementara;
									$mdlama = $mdsementara;
									echo "mblama = mbsementara = ".$mblama."<br/>";
									echo "mdlama = mdsementara = ".$mdlama."<br/>";
									$mbbaru = $h['mb'];
									$mdbaru = $h['md'];
									echo "mbbaru = ".$mbbaru."<br/>";
									echo "mdbaru = ".$mdbaru."<br/>";
									$mbsementara = $mblama + ($mbbaru * (1 - $mblama));
									$mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
									echo "mbsementara = mblama + (mbbaru * (1 - mblama)) = $mblama + ($mbbaru * (1 - $mblama)) = ".$mbsementara."<br/>";
									echo "mdsementara = mdlama + (mdbaru * (1 - mdlama)) = $mdlama + ($mdbaru * (1 - $mdlama)) = ".$mdsementara."<br/>";
									//jika ini adalah gejala terakhir berarti CF ketemu
									if ($jml == $i)
									{
										$mb = $mbsementara;
										$md = $mdsementara;
										$cf = $mb - $md;
										echo "mb = mbsementara = ".$mb."<br/>";
										echo "md = mdsementara = ".$md."<br/>";
										echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
										$daftar_cf[$c] = $cf;
										//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
										if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
										{
											$cf_terbesar = $cf;
											$id_penyakit_terbesar = $id_penyakit;
											$nama_penyakit_terbesar = $nama_penyakit;
										}
									}
								}
								$i++;
							}
						}
						$c++;
					}
				}
				
				//urutkan daftar gejala berdasarkan besar CF
				for ($i = 0; $i < count($daftar_penyakit); $i++)
				{
					for ($j = $i + 1; $j < count($daftar_penyakit); $j++)
					{
						if ($daftar_cf[$j] > $daftar_cf[$i])
						{
							$t = $daftar_cf[$i];
							$daftar_cf[$i] = $daftar_cf[$j];
							$daftar_cf[$j] = $t;
							
							$t = $daftar_penyakit[$i];
							$daftar_penyakit[$i] = $daftar_penyakit[$j];
							$daftar_penyakit[$j] = $t;
						}
					}
				}
				echo "Penyakit dengan nilai CF terbesar = ".$nama_penyakit_terbesar."<hr>";
				?>

				<table class="table table-bordered">
					<tr>
						<td width="605" class="pageName" align="center"><p>Hasil Konsultasi</p></td>
					</tr>
					<tr>
						<td class="bodyText">
							<p align="justify">
							<table class="table table-bordered">
								<tr>
									<td width="33%" valign="top">Gejala yang dipilih</td>
									<td width="63%">
										<!-- <strong> -->
										<?php
										$perintah = "SELECT * FROM gejala";
										$minta = mysqli_query($db, $perintah);
										while($hs = mysqli_fetch_array($minta))
										{
											if ($_POST['gejala'.$hs['id_gejala']] == 'true')
											{
										?>
											<?php echo $hs['nama_gejala']; ?> <br />
										<?php
											}
										}				
										?>
										<!-- </strong> -->
									</td>
								</tr>

								<tr>
									<td valign="top">&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Daftar penyakit </td>
									<td>CF</td>
								</tr>
								<?php
								for ($i = 0; $i < count($daftar_penyakit); $i++)
								{
									$perintah = "SELECT * FROM penyakit where id_penyakit = '".$daftar_penyakit[$i]."'";
									$minta = mysqli_query($db, $perintah);
									$hs = mysqli_fetch_array($minta);
									//$id_penyakit_terbesar
								?>
								<tr>
									<td><?php echo $hs['nama_penyakit']; ?></td>
									<td><?php echo $daftar_cf[$i]; ?></td>
								</tr>
								<?php
								}
								?>
								<tr>
									<td valign="top">&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td valign="top">Kemungkinan Terbesar Terkena Penyakit </td>
									<?php
									$perintah = "SELECT * FROM penyakit where id_penyakit = '$id_penyakit_terbesar'";
									$minta = mysqli_query($db, $perintah);
									$hs = mysqli_fetch_array($minta);
									//$id_penyakit_terbesar
									?>
									<td><strong><?php echo $hs['nama_penyakit']; ?> </strong></td>
								</tr>
								<tr>
									<td>CF</td>
									<td><strong><?php echo $cf_terbesar; ?></strong></td>
								</tr>
						
								<tr>
									<td>Solusi</td>
									<td><strong><?php echo $hs['solusi']; ?> </strong></td>
								</tr>
							</table>
							</p>		
						</td>
					</tr>
				</table>

				<form action="<?php echo site_url('admin/cf/save'); ?>" method="post">
					<input type="hidden" name="gejala" value="<?= str_replace("'", "", $sql1); ?>">
					<input type="hidden" name="penyakit" value="<?= $nama_penyakit_terbesar; ?>">
					<input type="hidden" name="nilaicf" value="<?= $cf_terbesar; ?>">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Laporan</button>
				</form>

				<?php } ?>
			</div>
		<!-- </section> -->

	</div>

</div>

<?php
	// }
?>

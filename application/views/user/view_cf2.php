<?php
	error_reporting(0);
	$db = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);

?>
<div class="card card-body">
	<div class="container-fluid p-0">
		<div class="my-auto">
			<title>Diagnosa - Certainty Factor V.2</title>
			<?php
			switch (1) {

				default:
					if ($_POST['submit']) {
						$arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
						date_default_timezone_set("Asia/Makassar");
						$inptanggal = date('Y-m-d H:i:s');

						$arbobot = array('0', '1', '0.8', '0.6', '0.4', '-0.2', '-0.4', '-0.6', '-0.8', '-1');
						$argejala = array();
						$arrne = array();

						for ($i = 0; $i < count($_POST['kondisi']); $i++) {
							$arkondisi = explode("_", $_POST['kondisi'][$i]);
							$arrne[] = $arkondisi[0];
							if (strlen($_POST['kondisi'][$i]) > 1) {
							$argejala += array($arkondisi[0] => $arkondisi[1]);
							}
						}
						$newarrne = array_diff($arrne, array(0));
						$newarrne = implode(",", $newarrne);
						// echo $newarrne;

						$sqlkondisi = mysqli_query($db, "SELECT * FROM kondisi ORDER BY id+0");
						while ($rkondisi = mysqli_fetch_array($sqlkondisi)) {
							$arkondisitext[$rkondisi['id']] = $rkondisi['kondisi'];
						}
						
						$sqlpkt = mysqli_query($db, "SELECT penyakit.* FROM penyakit, pengetahuan WHERE penyakit.id_penyakit=pengetahuan.id_penyakit AND pengetahuan.id_gejala IN ($newarrne) GROUP BY penyakit.id_penyakit ORDER BY penyakit.id_penyakit+0");
						// $sqlpkt = mysqli_query($db, "SELECT * FROM penyakit ORDER BY id_penyakit+0");
						while ($rpkt = mysqli_fetch_array($sqlpkt)) {
							$arpkt[$rpkt['id_penyakit']] = $rpkt['nama_penyakit'];
							$ardpkt[$rpkt['id_penyakit']] = $rpkt['deskripsi'];
							$arspkt[$rpkt['id_penyakit']] = $rpkt['solusi'];
							$argpkt[$rpkt['id_penyakit']] = $rpkt['gambar'];
						}
						?>

						<div class='content'>
							Hasil Diagnosis
							<hr>
							<table class='table table-bordered table-striped diagnosa'> 
								<thead>
									<tr>
										<th width=8%>No</th>
										<!-- <th width=10%>Kode</th> -->
										<th>Gejala yang dialami (keluhan)</th>
										<th width=20%>Pilihan</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$ig = 0;
								$argejalan = array();
								foreach ($argejala as $key => $value) {
									$kondisi = $value;
									$ig++;
									$gejala = $key;
									$sql4 = mysqli_query($db, "SELECT * FROM gejala where id_gejala = '$key'");
									$r4 = mysqli_fetch_array($sql4);
								?>
									<tr>
										<td><?=$ig?></td>
										<!-- <td><?=$r4['id_gejala']?></td> -->
										<td><span class="hasil text text-primary"><?=$r4['nama_gejala']?></span></td>
										<td><span class="kondisipilih" style="color:<?=$arcolor[$kondisi]?>"><?=$arkondisitext[$kondisi]?></span></td>
									</tr>
								<?php 
								$argejalan[]=$r4['nama_gejala'];
								}
								?>
								</tbody>
							</table>
							<hr>
						<?php
						//print_r($arkondisitext);
						// -------- perhitungan certainty factor (CF) ---------
						// --------------------- START ------------------------
						$sqlpenyakit = mysqli_query($db, "SELECT penyakit.* FROM penyakit, pengetahuan WHERE penyakit.id_penyakit=pengetahuan.id_penyakit AND pengetahuan.id_gejala IN ($newarrne) GROUP BY penyakit.id_penyakit ORDER BY id_penyakit");
						$arpenyakit = array();
						while ($rpenyakit = mysqli_fetch_array($sqlpenyakit)) {
							$cftotal_temp = 0;
							$cf = 0;
							$sqlgejala = mysqli_query($db, "SELECT * FROM pengetahuan WHERE id_penyakit=$rpenyakit[id_penyakit]");
							$countgejala = mysqli_num_rows($sqlgejala);

							echo '<strong>'.$rpenyakit['nama_penyakit'].'</strong><hr>';

							$cflama = 0;
							while ($rgejala = mysqli_fetch_array($sqlgejala)) {
								// $arkondisi = explode("_", $_POST['kondisi'][0]);
								// $gejala = $arkondisi[0];
								// echo $gejala,'<br>';
								for ($i = 0; $i < count($_POST['kondisi']); $i++) {
									$arkondisi = explode("_", $_POST['kondisi'][$i]);
									$gejala = $arkondisi[0];
									// echo $gejala;
									// echo "<br>";
									if ($rgejala['id_gejala'] == $gejala) {
										//echo "CF = (MB - MD) x CF(User) <br>";
										//echo 'CF = ('.$rgejala['mb'].' - '.$rgejala['mb'].') x '.$arbobot[$arkondisi[1]].' = '.(($rgejala['mb'] - $rgejala['md']) * $arbobot[$arkondisi[1]]).'<br><br>';
										$cf = ($rgejala['mb'] - $rgejala['md']) * $arbobot[$arkondisi[1]];
										if (($cf >= 0) && ($cf * $cflama >= 0)) {
											//echo 'CF baru = CF lama + (CF x (1-CF lama))<br>';
											//echo 'CF baru = '.$cflama.' + ('.$cf.' x (1 - '.$cflama.')) = '.($cflama + ($cf * (1 - $cflama))).'<br><br>';
											$cflama = $cflama + ($cf * (1 - $cflama));
										}
										if ($cf * $cflama < 0) {
											// $cflama = ($cflama + $cf) / (1 - Min(abs($cflama),abs($cf)));
											//echo 'CF baru = (CF lama + CF) / (1 - MATH(MIN(ABS(CF lama), ABS(CF))))<br>';
											//echo 'CF baru = ('.$cflama.' + '.$cf.') / (1 - '.Math . Min(Math . abs($cflama), Math . abs($cf)).') = '.(($cflama + $cf) / (1 - Math . Min(Math . abs($cflama), Math . abs($cf)))).'<br><br>';
											$cflama = ($cflama + $cf) / (1 - Min(abs($cflama),abs($cf)));
										}
										if (($cf < 0) && ($cf * $cflama >= 0)) {
											//echo 'CF baru = CF lama + (CF x (1 + CF lama))<br>';
											//echo 'CF baru = '.$cflama.' + ('.$cf.' x (1 + '.$cflama.')) = '.($cflama + ($cf * (1 + $cflama))).'<br><br>';
											$cflama = $cflama + ($cf * (1 + $cflama));
										}
									}
								}
							}
							if ($cflama > 0) {
								$arpenyakit += array($rpenyakit['id_penyakit'] => number_format($cflama, 4));
							}
						}

						arsort($arpenyakit);

						$inpgejala = serialize($argejala);
						$inppenyakit = serialize($arpenyakit);

						$np1 = 0;
						foreach ($arpenyakit as $key1 => $value1) {
							$np1++;
							$idpkt1[$np1] = $key1;
							$vlpkt1[$np1] = $value1;
						}
						
						// echo 'Berdasarkan basis pengetahuan, tidak ada gejala penyakit '.$rpenyakit['nama_penyakit'].' yang dipilih.';
						?>

						<!-- <pre>
							<?php
							print_r($arpenyakit) ;
							$np = 0;
							$idpkt = array();
							foreach ($arpenyakit as $key => $value) {
								$np++;
								$idpkt[$np] = $key;
								$nmpkt[$np] = $arpkt[$key];
								$vlpkt[$np] = $value;
							}
							?>
						</pre> -->
						<!-- <button class='btn btn-primary float-right' id='print' onClick='window.print();' data-toggle='tooltip' data-placement='right' title='Klik tombol ini untuk mencetak hasil diagnosa'><i class='fa fa-print'></i> Cetak</button> -->
							<hr>
							<!-- <img class='card-img-top img-bordered-sm' style='float:right; margin-left:15px;' src='" . $gambar . "' height=200> -->
							<div class='well well-small'>
								<strong>Hasil Diagnosa</strong>
								<div class='callout callout-default'>
									Jenis penyakit yang diderita adalah <b><?=$nmpkt[1]?></b> / <?=round($vlpkt[1]*100, 2)?> % (<?=round($vlpkt[1], 2)?>)<br>
								</div>
							</div>
							<hr>
							<div class='box box-info box-solid'>
								<div class='box-header with-border'><strong>Detail</strong></div>
								<div class='box-body'>
									<?= $ardpkt[$idpkt[1]]; ?>
								</div>
							</div>
							<hr>
							<div class='box box-warning box-solid'>
								<div class='box-header with-border'><strong>Saran</strong></div>
								<div class='box-body'>
									<?= $arspkt[$idpkt[1]]; ?>
								</div>
							</div>
							<hr>
							<div class='box box-danger box-solid'>
								<div class='box-header with-border'><strong>Semua kemungkinan:</strong></div>
								<div class='box-body'>
									<ul>
									<?php for ($ipl = 1; $ipl < count($idpkt); $ipl++) { ?>
									<i class='fa fa-caret-square-right'></i> <?=$nmpkt[$ipl]?></b> / <?=round($vlpkt[$ipl]*100, 2)?> % (<?=round($vlpkt[$ipl], 2)?>)<br>
									<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						
						<hr>

						<form action="<?php echo site_url('user/cf/save');?>" method="post"> 
							<input type="hidden" name="gejala" value="<?= str_replace("'", "", implode(",",$argejalan)); ?>">
							<input type="hidden" name="penyakit" value="<?= $nmpkt[1]; ?>">
							<input type="hidden" name="nilaicf" value="<?= $vlpkt[1]; ?>">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Laporan</button>
							<script>alert('memproses data');</script>	
							<script>location('save');</script>	
						</form>		
			
						
						<pre>
							<?php 
							// $str = http_build_query($argejala,'','&');
							// echo $str;
							// echo implode(",",$argejalan);
							// parse_str($str, $output);
							// print_r($output);
							
							// print_r($argejala);
							?>
						</pre>
						
						<?php
					} else {
						echo "Diagnosa Penyakit <hr>
								<div class='alert alert-success alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
									<i class='icon fa fa-exclamation-triangle'></i> Perhatian !
									Silahkan memilih gejala sesuai dengan kondisi anda, anda dapat memilih kepastian kondisi dari pasti tidak sampai pasti ya, jika sudah tekan tombol proses (<i class='fa fa-search-plus'></i>)  di bawah untuk melihat hasil.
								</div>
							<form name='text_form' method='POST' action=''>
							<table class='table table-bordered table-striped konsultasi'><tbody class='pilihkondisi'>
							<tr><th>No</th><th hidden>Kode</th><th>Gejala</th><th width='20%'>Pilih Kondisi</th></tr>";

						$sql3 = mysqli_query($db, "SELECT * FROM gejala ORDER BY id_gejala");
						$i = 0;
						while ($r3 = mysqli_fetch_array($sql3)) {
							$i++;
							echo "<tr><td class=opsi>$i</td>";
							// echo "<td class=opsi>$r3[id_gejala]</td>";
							echo "<td class=gejala>$r3[nama_gejala]</td>";
							echo '<td class="opsi"><select name="kondisi[]" id="sl' . $i . '" class="opsikondisi"/><option data-id="0" value="0">Pilih jika sesuai</option>';
							$s = "SELECT * FROM kondisi ORDER BY id";
							$q = mysqli_query($db, $s) or die($s);
							while ($rw = mysqli_fetch_array($q)) {
							?>
							<option data-id="<?php echo $rw['id']; ?>" value="<?php echo $r3['id_gejala'] . '_' . $rw['id']; ?>"><?php echo $rw['kondisi']; ?></option>
							<?php
							}
							echo '</select></td>';
							?>
							<script type="text/javascript">
							$(document).ready(function () {
								var arcolor = new Array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
								setColor();
								$('.pilihkondisi').on('change', 'tr td select#sl<?php echo $i; ?>', function () {
								setColor();
								});
								function setColor()
								{
								var selectedItem = $('tr td select#sl<?php echo $i; ?> :selected');
								var color = arcolor[selectedItem.data("id")];
								$('tr td select#sl<?php echo $i; ?>.opsikondisi').css('background-color', color);
								console.log(color);
								}
								
							});
							</script>
							
							<?php
							echo "</tr>";
						}
						echo "</tbody></table><button class='btn btn-primary' type='submit' data-toggle='tooltip' data-placement='top' title='Klik disini untuk melihat hasil diagnosa' name=submit value='Submit'><i class='fa fa-search-plus'></i> Proses</button></form>";
					}
				break;
			}
			?>
		</div>
	</div>
</div>


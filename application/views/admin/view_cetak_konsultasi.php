<div class="page" style="font-size:10pt">

	<div>
		<table hidden>
			<td align='center'>
				<span style='font-size:12pt'><b>PT. Bersama Bersaudara</b></span></br>
				JL. RAYA SUNGAILIAT KM.7 NO.99 PAGARAWAN MERAWANG <br>
				NPWP 02.490.032.6-315.000
			</td>
		</table>
		<br>
		<center><h3><u>Laporan Riwayat Konsultasi <?= tgl_indo($_POST['tgl_awal']) ;?> - <?= tgl_indo($_POST['tgl_akhir']) ;?></u></h3></center>
		<br><br><br>
		<table id="rab">
			<thead>
				<tr>
					<th>No</th>
					<th>Waktu Konsultasi</th>
					<th>User</th>
					<th>Gejala</th>
					<th>Penyakit</th>
					<th>Nilai Keyakinan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1; 
				foreach ($tabelkonsultasi as $rowKonsultasi) { 
					if($_POST['tgl_awal'] && $_POST['tgl_akhir']){
						if(strtotime(date_format(date_create($rowKonsultasi->waktu),"Y-m-d")) >= strtotime($_POST['tgl_awal']) && strtotime(date_format(date_create($rowKonsultasi->waktu),"Y-m-d")) <= strtotime($_POST['tgl_akhir'])){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo date_format(date_create($rowKonsultasi->waktu),"Y-m-d"); ?></td>
					<td><?php echo $rowKonsultasi->user; ?></td>
					<td><?php echo $rowKonsultasi->gejala; ?></td>
					<td><?php echo $rowKonsultasi->penyakit; ?></td>
					<td><?php echo $rowKonsultasi->nilaicf*100; ?> %</td>
				</tr>
				<?php
						}
					} else {
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $rowKonsultasi->user; ?></td>
					<td><?php echo $rowKonsultasi->waktu; ?></td>
					<td><?php echo $rowKonsultasi->gejala; ?></td>
					<td><?php echo $rowKonsultasi->penyakit; ?></td>
					<td><?php echo $rowKonsultasi->nilaicf*100; ?> %</td>
				</tr>
				<?php
					}
				?>
				<?php } ?>
			</tbody>
		</table>
	</div>

</div>

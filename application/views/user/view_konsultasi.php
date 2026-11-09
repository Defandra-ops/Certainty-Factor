<?php error_reporting(0); ?>
<br />
<style>
	@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: fixed;
    left: 0;
    top: 0;
  }
}
</style>
<strong>Data Konsultasi</strong><br />
<br />

<div class="row">
	<div class="col-md-6">
		<form action="" method="post" class="form-inline">
			<label for="tgl_awal">Filter Tanggal</label>&nbsp;&nbsp;&nbsp;
			<input type="date" name="tgl_awal" id="tgl_awal" class="form-control" value="<?=$_POST['tgl_awal']?>">&nbsp;
			<input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" value="<?=$_POST['tgl_akhir']?>">&nbsp;
			<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
			&nbsp;

		</form>
	</div>
	<div class="col-md-6">
		<form action="<?php echo site_url('user/konsultasi/cetak'); ?>" method="post" target="_blank">
			<input type="hidden" name="tgl_awal" id="tgl_awal" class="form-control" value="<?=$_POST['tgl_awal']?>">&nbsp;
			<input type="hidden" name="tgl_akhir" id="tgl_akhir" class="form-control" value="<?=$_POST['tgl_akhir']?>">&nbsp;
			<?php if($_POST['tgl_awal']) { ?>
			<button type="submit" class="btn btn-success float-right"><i class="fa fa-print"></i> Cetak</button>
			<?php } ?>
		</form>
	</div>
</div>

<hr>
<div class="table-responsive">
	<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="79">ID Konsultasi</th>
				<th width="196">Nama</th>
				<th width="196">Waktu Konsultasi</th>
				<th width="140">Gejala</th>
				<th width="140">Penyakit</th>
				<th width="140">Nilai Keyakinan</th>
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
				<td><?php echo $rowKonsultasi->user; ?></td>
				<td><?php echo date_format(date_create($rowKonsultasi->waktu),"Y-m-d"); ?></td>
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
<hr>
<div id="section-to-print" style="visibility: hidden;">
	<center><h3><u>Laporan Riwayat Konsultasi <?= tgl_indo($_POST['tgl_awal']) ;?> - <?= tgl_indo($_POST['tgl_akhir']) ;?></u></h3></center>
	<br>
	<br>
	<br>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="79">No</th>
				<th width="196">Nama</th>
				<th width="196">Waktu Konsultasi</th>
				<th width="140">Gejala</th>
				<th width="140">Penyakit</th>
				<th width="140">Nilai Keyakinan</th>
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
				<td><?php echo $rowKonsultasi->user; ?></td>
				<td><?php echo date_format(date_create($rowKonsultasi->waktu),"Y-m-d"); ?></td>
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

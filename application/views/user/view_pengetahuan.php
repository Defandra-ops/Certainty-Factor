<br />
<strong>Data Pengetahuan</strong><br />
<br />
<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped">
	<thead>
	<tr>
		<th>No</th>
		<th>Nama Penyakit</th>
		<th>Daftar Gejala</th>
	</tr>
	</thead>
	<?php
	$no=1;
	foreach ($tabelpenyakit as $rowpenyakit) {
?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $rowpenyakit->nama_penyakit; ?></td>
		<td>
			<ul>
				<?php
				foreach ($tabelpengetahuan as $rowpengetahuan) {
					if ($rowpengetahuan->id_penyakit == $rowpenyakit->id_penyakit) {
				?>
				<li>
				<?= $rowpengetahuan->nama_gejala ;?> (MB = <?= $rowpengetahuan->mb ;?>, MD = <?= $rowpengetahuan->md ;?>) 
				<!-- Button trigger modalEditGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?> -->
				<a href="#" type="button" class="" data-toggle="modal" data-target="#modalEditGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?>">
					<i class="fa fa-edit"></i>
				</a>

				<!-- modalEditGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?> -->
				<div class="modal fade" id="modalEditGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?>" tabindex="-1" role="dialog" aria-labelledby="modalEditGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?>Label" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalEditGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?>Label">Edit Gejala Penyakit <?= $rowpenyakit->nama_penyakit ;?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="<?php echo site_url('admin/pengetahuan/update/'.$rowpengetahuan->id_pengetahuan); ?>" method="POST">
									<input type="hidden" readonly value="<?= $rowpenyakit->id_penyakit ;?>" name="id_penyakit">
									<select name="id_gejala" id="id_gejala" class="form-control" required>
										<option value="">Pilih Gejala</option>
										<?php foreach ($tabelgejala as $gejala) : ?>
											<option value="<?= $gejala->id_gejala ?>" <?=($rowpengetahuan->id_gejala==$gejala->id_gejala) ? 'selected' : ''?>><?= $gejala->nama_gejala ?></option>
										<?php endforeach ?>
									</select>
									<br>
									<input type="number" step="0.01" name="mb" class="form-control" placeholder="Measures of Belief (Step : 0.01)" value="<?=$rowpengetahuan->mb?>">
									<br>
									<input type="number" step="0.01" name="md" class="form-control" placeholder="Measures of Disbelief (Step : 0.01)" value="<?=$rowpengetahuan->md?>">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!-- Button trigger modelDeleteGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?> -->
				<a href="#" type="button" class="" data-toggle="modal" data-target="#modelDeleteGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?>">
					<i class="fa fa-trash"></i>
				</a>

				<!-- modelDeleteGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?> -->
				<div class="modal fade" id="modelDeleteGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?>" tabindex="-1" role="dialog" aria-labelledby="modelDeleteGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?>Label" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modelDeleteGejala<?=$rowpengetahuan->id_gejala?><?=$rowpenyakit->id_penyakit?>Label">Delete Gejala Penyakit <?= $rowpenyakit->nama_penyakit ;?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="<?php echo site_url('admin/pengetahuan/delete/'.$rowpengetahuan->id_pengetahuan); ?>" method="POST">

								Are You Sure?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				</li>
				<?php
					}
				}
				?>
				<!-- Button trigger modalTambahGejala<?=$rowpenyakit->id_penyakit?> -->
				<a href="#" type="button" class="" data-toggle="modal" data-target="#modalTambahGejala<?=$rowpenyakit->id_penyakit?>">
					Tambah Gejala
				</a>

				<!-- modalTambahGejala<?=$rowpenyakit->id_penyakit?> -->
				<div class="modal fade" id="modalTambahGejala<?=$rowpenyakit->id_penyakit?>" tabindex="-1" role="dialog" aria-labelledby="modalTambahGejala<?=$rowpenyakit->id_penyakit?>Label" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalTambahGejala<?=$rowpenyakit->id_penyakit?>Label">Tambah Gejala Penyakit <?= $rowpenyakit->nama_penyakit ;?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="<?php echo site_url('admin/pengetahuan/save'); ?>" method="POST">
									<input type="hidden" readonly value="<?= $rowpenyakit->id_penyakit ;?>" name="id_penyakit">
									<select name="id_gejala" id="id_gejala" class="form-control" required>
										<option value="">Pilih Gejala</option>
										<?php foreach ($tabelgejala as $gejala) : ?>
											<option value="<?= $gejala->id_gejala ?>"><?= $gejala->nama_gejala ?></option>
										<?php endforeach ?>
									</select>
									<br>
									<input type="number" step="0.01" name="mb" class="form-control" placeholder="Measures of Belief (Step : 0.01)">
									<br>
									<input type="number" step="0.01" name="md" class="form-control" placeholder="Measures of Disbelief (Step : 0.01)">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</ul>
		</td>
	</tr>
	<?php
}
?>
</table>
<br />
<br />

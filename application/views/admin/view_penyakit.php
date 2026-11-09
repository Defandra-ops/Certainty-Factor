<br />
      <strong>Data Penyakit</strong><br />
      <br />
      <table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th width="79">ID Penyakit</th>
          <th width="196">Nama Penyakit</th>
          <th width="196">Deskripsi</th>
          <th width="140">Solusi</th>
          <th width="100"><a class="btn btn-primary" href="<?php echo site_url('admin/penyakit/add'); ?>"><i class="fas fa-plus"></i></a></th>
        </tr>
        </thead>
        <?php
        $no=1;
        foreach ($tabelpenyakit as $rowpenyakit) {
    ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $rowpenyakit->nama_penyakit; ?></td>
          <td><?php echo $rowpenyakit->deskripsi; ?></td>
          <td><?php echo $rowpenyakit->solusi; ?></td>
          <td>
            <a class="btn btn-warning" href="<?php echo site_url('admin/penyakit/edit/'.$rowpenyakit->id_penyakit); ?>"><i class="fas fa-pen"></i></a> 
            <a onclick="return confirm('Hapus data?');" class="btn btn-danger" href="<?php echo site_url('admin/penyakit/delete/'.$rowpenyakit->id_penyakit); ?>"><i class="fas fa-trash"></i></a></td>
        </tr>
        <?php
			}
		?>
      </table>
      <br />
    <br />

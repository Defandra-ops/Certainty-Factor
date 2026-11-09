<br />
      <strong>Data Gejala</strong><br />
      <br />
      <table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th width="79">ID Gejala</th>
          <th width="196">Nama Gejala</th>
          <th width="100"><a class="btn btn-primary" href="<?php echo site_url('admin/gejala/add'); ?>"><i class="fas fa-plus"></i></a></th>
        </tr>
        </thead>
        <?php
        $no=1;
        foreach ($tabelgejala as $rowgejala) {
    ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $rowgejala->nama_gejala; ?></td>
          <td>
            <a class="btn btn-warning" href="<?php echo site_url('admin/gejala/edit/'.$rowgejala->id_gejala); ?>"><i class="fas fa-pen"></i></a> 
            <a onclick="return confirm('Hapus data?');" class="btn btn-danger" href="<?php echo site_url('admin/gejala/delete/'.$rowgejala->id_gejala); ?>"><i class="fas fa-trash"></i></a></td>
        </tr>
        <?php
			}
		?>
      </table>
      <br />
    <br />

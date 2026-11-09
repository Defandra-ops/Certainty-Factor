<br />
      <strong>Data Penyakit</strong><br />
      <br />
      <table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th width="79">ID Penyakit</th>
          <th width="196">Nama Penyakit</th>
          <th width="196">Deskripsi</th>
          <th width="800">Solusi</th>
          
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

        </tr>
        <?php
			}
		?>
      </table>
      <br />
    <br />

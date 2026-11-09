<br />
      <strong>Edit Data Gejala</strong><br />
      <br />
      <form id="form1" name="form1" method="post" action="<?php echo site_url('admin/gejala/update/'.$rowgejala->id_gejala); ?>">
        <table class="table">
          <tr>
            <td>ID Gejala</td>
            <td><input type="text" name="id_gejala" id="id_gejala" readonly value="<?php echo $rowgejala->id_gejala; ?>" class="form-control" required /></td>
          </tr>
          <tr>
            <td width="128">Nama Gejala</td>
            <td width="249"><input type="text" name="nama_gejala" id="nama_gejala" value="<?php echo $rowgejala->nama_gejala; ?>" class="form-control" required /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><button type="submit" id="button" class="btn btn-primary"><i class="fas fa-save"></i> Save</button></td>
          </tr>
        </table>
      </form>
      <br />
    <br />

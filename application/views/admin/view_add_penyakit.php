<br />
      <strong>Tambah Data Penyakit</strong><br />
      <br />
      <form id="form1" name="form1" method="post" action="<?php echo site_url('admin/penyakit/save'); ?>">
        <table class="table">
          <tr>
            <td width="128">Nama Penyakit</td>
            <td width="249"><input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control" required /></td>
          </tr>
          <tr>
            <td width="128">Deskripsi</td>
            <td width="249"><textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea></td>
          </tr>
          <tr>
            <td>Solusi</td>
            <td><textarea name="solusi" id="solusi" class="form-control" required></textarea>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><button type="submit" id="button" class="btn btn-primary"><i class="fas fa-save"></i> Save</button></td>
          </tr>
        </table>
      </form>
      <br />
    <br />

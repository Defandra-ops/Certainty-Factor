<br />
      <strong>Tambah User</strong><br />
      <br />
      <form id="form1" name="form1" method="post" action="<?php echo site_url('admin/home/save'); ?>">
        <table class="table">
          <tr>
            <td width="128">Nama User</td>
            <td width="249"><input type="text" name="nama" id="nama" class="form-control" required /></td>
          </tr>
          <tr>
            <td width="128">Username</td>
            <td width="249"><input type="text" name="username" id="username" class="form-control" required /></td>
          </tr>
          <tr>
            <td width="128">Password</td>
            <td width="249"><input type="password" name="password" id="password" class="form-control" required /></td>
          </tr>
          <tr>
            <td>Role</td>
            <td><select name="role" id="role" class="form-control" required>
              <option value=""></option>
              <option value="admin">Admin</option>
            </select>
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
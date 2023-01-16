<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Form Ubah Password</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
    <?php
      echo form_open('Pegawai/ubah_password');
    ?>
    <div class="box-body">
    <?php echo $this->session->flashdata('message');?>
      <div class="form-group">
        <label for="exampleInputPassword1">Password Lama</label>
        <input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Password Lama" style="width: 500px" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password Baru</label>
        <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Password Baru" style="width: 500px" required>
      </div>
<!--       <div class="form-group">
        <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
        <input type="password" class="form-control" id="newpass2" name="newpass2" equalTo="#newpass" placeholder="Password Baru Konfirmasi" style="width: 500px" required>
      </div> -->
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-primary">Ubah Password</button>
    </div>
  </form>
</div>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Form Tambah Data Cuti</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
    <?php
      echo form_open('Cuti/simpan');
    ?>
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Cuti</label>
        <input type="text" class="form-control" id="id_cuti" name="id_cuti" placeholder="ID Jabatan" style="width: 200px" required value="<?php echo $code ?>" readonly >
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Cuti Kpd</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Jabatan" style="width: 500px" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Jumlah Hari</label>
        <input type="number" class="form-control" id="jml_hari" name="jml_hari" placeholder="Jumlah Hari" style="width: 500px" required>
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
     <?php echo anchor('Cuti','Kembali',array('class' => 'btn btn-danger'));?>
    </div>
  </form>
</div>
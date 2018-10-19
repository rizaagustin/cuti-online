<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Form Ubah Jabatan</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
    <?php
      echo form_open('Jabatan/ubah');
    ?>
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Jabatan</label>
        <input type="text" class="form-control" id="id_jabatan" name="id_jabatan" placeholder="ID Jabatan" style="width: 200px" required value="<?php echo $record['id_jabatan'] ?>" readonly>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Jabatan</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Jabatan" style="width: 500px" value="<?php echo $record['nama_jabatan'] ?>" required>
      </div>
        <div class="form-group">
          <label>Nama Departemen</label>
          <select name="id_departemen" class="form-control" style="width: 500px">
            <?php 
              foreach ($departemen->result() as $b) {
                if ($b->id_departemen == $record['id_departemen']) {
                  echo "<option value ='$b->id_departemen' selected>$b->nama_departemen</option>";
                } else {
                  echo "<option value ='$b->id_departemen'>$b->nama_departemen</option>";
                }
                

              }
            ?>
          </select>
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
     <?php echo anchor('Jabatan','Kembali',array('class' => 'btn btn-danger'));?>
    </div>
  </form>
</div>
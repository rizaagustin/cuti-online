<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Form Tambah Pegawai</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
    <?php
      echo form_open('Pegawai/ubah');
    ?>
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Pegawai</label>
        <input type="text" class="form-control" id="id_pegawai" name="id_pegawai" placeholder="ID Pegawai" style="width: 200px" value="<?php echo $record['id_pegawai'] ?>" readonly required >
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Pegawai</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pegawai" style="width: 500px" value="<?php echo $record['nama_pegawai'] ?>" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">No Telpon</label>
        <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Nomor Telpon" style="width: 500px" value="<?php echo $record['no_tlp'] ?>" required>
      </div>
        <div class="form-group">
          <label>Nama Jabatan</label>
          <select name="id_jabatan" class="form-control" style="width: 500px">
            <?php 
              foreach ($jabatan->result() as $b) {

                if ($b->id_jabatan == $record['id_jabatan']) {
                  echo "<option value ='$b->id_jabatan' checked>$b->nama_jabatan</option>";
                } else {
                  echo "<option value ='$b->id_jabatan'>$b->nama_jabatan</option>";
                }                 

              }
            ?>
          </select>
        </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" style="width: 500px"><?php echo $record['alamat'] ?></textarea>
      </div>
      <div class="form-group">
        <label>TMK:</label>
        <div class="input-group date" style="width: 500px">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" name="tmk" id="datepicker" value="<?php echo $record['tmk'] ?>" autocomplete = 'off'>
        </div>
        <!-- /.input group -->
      </div> 

      <?php
        $hak_akses = array ('ADMIN' => 'ADMIN','OPERATOR' => 'OPERATOR','LEADER' => 'LEADER','STAFF' => 'STAFF','SPV' => 'SPV', 'MANAGER' => 'MANAGER', 'DIREKTUR' => 'DIREKTUR');
        echo form_dropdown('tipe_user', $hak_akses,$record['tipe_user'],'
        class="form-control" required style = "width:500px"')?>
                
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
      <?php echo anchor('Pegawai','Kembali',array('class' => 'btn btn-danger'));?>
    </div>
  </form>
</div>
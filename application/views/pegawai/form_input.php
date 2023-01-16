<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Form Tambah Pegawai</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
    <?php
      echo form_open('Pegawai/simpan');
    ?>
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Pegawai</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pegawai" style="width: 500px" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">No Telpon</label>
        <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Nomor Telpon" style="width: 500px" required>
      </div>
        <div class="form-group">
          <label>Nama Jabatan</label>
          <select name="id_jabatan" class="form-control" style="width: 500px">
            <?php 
              foreach ($jabatan->result() as $b) {
                echo "<option value ='$b->id_jabatan'>$b->nama_jabatan</option>";
              }
            ?>
          </select>
        </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" style="width: 500px"></textarea>
      </div>
      <div class="form-group">
        <label>TMK:</label>
        <div class="input-group date" style="width: 500px">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" name="tmk" id="datepicker">
        </div>
        <!-- /.input group -->
      </div>
        <div class="form-group">
          <label>Tipe User</label>
          <select name="tipe_user" class="form-control" style="width: 500px">
            <option value="OPERATOR">OPERATOR</option>
            <option value="LEADER">LEADER</option>
            <option value="STAFF">STAFF</option>
            <option value="SPV">SPV</option>
            <option value="MANAGER">MANAGER</option>
            <option value="DIREKTUR">DIREKTUR</option>
            <option value="ADMIN">ADMIN</option>
          </select>
        </div>                  
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
     <?php echo anchor('Pegawai','Kembali',array('class' => 'btn btn-danger'));?>
    </div>
  </form>
</div>
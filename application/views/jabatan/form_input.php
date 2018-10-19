<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Form Tambah Jabatan</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
    <?php
      echo form_open('Jabatan/simpan');
    ?>
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Jabatan</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Jabatan" style="width: 500px" required>
      </div>
      <div class="form-group">
        <div class="form-group">
          <label>Nama Departemen</label>
          <select name="id_departemen" class="form-control" style="width: 500px">
            <?php 
              foreach ($departemen->result() as $b) {
                echo "<option value ='$b->id_departemen'>$b->nama_departemen</option>";
              }
            ?>
          </select>
        </div>
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
     <?php echo anchor('Jabatan','Kembali',array('class' => 'btn btn-danger'));?>
    </div>
  </form>
</div>
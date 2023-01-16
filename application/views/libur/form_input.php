<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Form Libur</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
    <?php
      echo form_open('libur/simpan');
    ?>
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Libur</label>
        <input type="date" class="form-control" id="tgl_libur" name="tgl_libur" placeholder="" style="width: 200px" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Keterangan Libur</label>
        <input type="text" class="form-control" id="keterangan_libur" name="keterangan_libur" placeholder="Keterangan Libur" style="width: 500px" required>
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
     <?php echo anchor('libur','Kembali',array('class' => 'btn btn-danger'));?>
    </div>
  </form>
</div>
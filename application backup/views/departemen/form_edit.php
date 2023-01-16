          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Ubah Departemen</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <?php
                echo form_open('Departemen/ubah');
              ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID Departemen</label>
                  <input type="text" class="form-control" id="id_departemen" name="id_departemen" placeholder="ID Departemen" style="width: 200px" required value="<?php echo $record['id_departemen'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Departemen</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Departemen" style="width: 500px" value="<?php echo $record['nama_departemen'] ?>" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
               <?php echo anchor('Departemen','Kembali',array('class' => 'btn btn-danger'));?>
              </div>
            </form>
          </div>
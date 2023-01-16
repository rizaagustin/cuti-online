<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Form Input Permohonan</h3>
  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
      <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
    	<i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
    <?php
      echo form_open('Permohonan');
    ?>
	<div class="form-group" style="width: 75%">
	  <label for="exampleInputPassword1">Nama Pegawai</label>
      <!-- /.form-group -->
        <select name="id_pegawai" class="form-control select2" style="width: 100%;">
        	<option enabled selected>Silahkan Pilih Pegawai</option>
        	<?php 
        		foreach ($pegawai as $p) {
        			echo "<option value = '$p->id_pegawai'>$p->id_pegawai | $p->nama_pegawai | $p->nama_jabatan</option>";
        		}

        	?>
        </select>
       <!-- /.form-group -->
	   <br><br>
	  <button type="submit" name="submit" class="btn btn-success">Cek Histori Cuti</button>
	  <button class="pull-right btn btn-primary show-confirm-modal">Ajukan Cuti</button>
	</div>
	</form>
	<hr>

	<div class="row">
		<div class="col-md-6">	
			<label>Histori Cuti</label>
			<table  class="table table-bordered">
			   <thead>
			        <tr>
						<th>Cuti</th>
						<th>Tgl Mulai</th>
						<th>Tgl Selasai</th>
						<th>Keterangan</th>
					</tr>
				</thead>

				<?php 
					foreach ($histori->result() as $b) {
						echo "<tr>
							<td>$b->cuti_kpd</td>
							<td>$b->tgl_mulai</td>
							<td>$b->tgl_selesai</td>
							<td>$b->keterangan</td>
						</tr>";
					}
				?>
			</table>
		</div>		
	</div>
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>
<!-- /.box-footer-->
</div>

<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="confirm-title" style="color:black"><strong>Form Permohonan</strong></h4>
      </div>
      <div class="modal-body" id="confirm-body">
        <form action="#" class="login-form" method="post" id="permohonanform">
	  		<div class="form-group">
		    <label for="">Nama Pegawai</label>
	        <select name="id_pegawai" onchange="changeValue(this.value)" id="id_pegawai" class="form-control" style="width: 100%;" required>
        	<option enabled>Silahkan Pilih Pegawai</option>
	        	<?php 
	        		foreach ($pegawai as $p) {
	        			if ($p->waktu_kerja != 1) {
		        			echo "<option value = '$p->id_pegawai'>$p->id_pegawai | $p->nama_pegawai | Lama Kerja $p->waktu_kerja tahun </option>";
	        			}

	        		}
	        	?>
	        </select>              
	    	</div>
	      <div class="form-group">
	        <label>Sisa Cuti Tahunan</label>
	        <div class="input-group date" style="width: 75%">
	          <input type="hidden" class="form-control pull-right" name="sisacuti" id="sisacuti" required placeholder="sisa cuti tahunan" readonly required>
	          <input type="text" class="form-control pull-right" name="sisacuti2" id="sisacuti2" required placeholder="sisa cuti tahunan" readonly required>
	        </div>
	        <!-- /.input group -->
	      </div>
	  		<div class="form-group">
		    <label for="">Cuti</label>
	        <select name="id_cuti" class="form-control" style="width: 100%;" required>
        		<option  enabled>Silahkan Pilih</option>
	        	<?php 
	        		foreach ($cuti as $p) {
	        			echo "<option value ='$p->id_cuti'>$p->cuti_kpd | <strong>$p->jml_hari Hari</strong> </option>";
	        		}

	        	?>
	        </select>              
	    	</div>	    	
		      <div class="form-group">
		        <label>Tanggal Mulai:</label>
		        <div class="input-group date" style="width: 75%">
		          <input type="text" class="form-control pull-right" name="tgl_mulai" id="datepicker" required placeholder="tanggal mulai" autocomplete="off">
		        </div>
		        <!-- /.input group -->
		      </div>
		      <div class="form-group">
		        <label>Tanggal Selesai:</label>
		        <div class="input-group date" style="width: 75%">
		          <input type="text" class="form-control pull-right" name="tgl_selesai" id="datepicker2" placeholder="tanggal selesai" autocomplete="off" required>
		        </div>
		        <!-- /.input group -->
		      </div>
		      <div class="form-group">
		        <label>Keterangan</label>
		        <textarea class="form-control" name="keterangan" id="keterangan" style="width: 75%" required></textarea>
		      </div>
      </div>
      <div class="modal-footer">
<!--                                     <input type="submit" value="Sign In" class="btn green-jungle"> -->
        <button type="submit" class="btn btn-primary" id="confirm-remove-btn">Ajukan Permohonan Cuti</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div class="box" style="width: 100%">
<div class="box-header with-border">
  <h3 class="box-title">Data Permohonan menunggu persetujuan</h3>
  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
      <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
    	<i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
	<div>	
	<?php echo $this->session->flashdata('message');?>
	</div>
	<div class="row">
		<div class="col-md-12">	
			<table  class="table table-bordered display nowrap" id="table1" width="100%">
			   <thead>
			        <tr>
						<th>ID Permohonan</th>
						<th>Nama Pegawai</th>
						<th>Cuti</th>
						<th>Tanggal Permohonan</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Jumlah Hari</th>
						<th>Keterangan</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<?php 
					foreach ($record->result() as $b) {
						echo "<tr>
							<td>$b->id_permohonan</td>
							<td>$b->nama_pegawai</td>
							<td>$b->cuti_kpd</td>
							<td>$b->tgl_permohonan</td>
							<td>$b->tgl_mulai</td>
							<td>$b->tgl_selesai</td>
							<td>$b->jml_hari</td>
							<td>$b->keterangan</td>
							<td>$b->validasi</td>
							<td>					
								<a id_permohonan = '$b->id_permohonan' nm_pegawai = '$b->nama_pegawai' data = 'Tolak' class = 'btn btn-danger hapus-permohonan'>Hapus</a>
							</td>
						</tr>";
					}
				?>
			</table>
			</div>
	</div>
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>
<!-- /.box-footer-->
</div>


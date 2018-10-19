<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Data Permohonan Cuti</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
      <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
	<?php echo $this->session->flashdata('message');?>
	<table  class="table table-bordered display nowrap" id="table1" width="100%">
	   <thead>
	        <tr>
				<th>ID Permohonan</th>
				<th>Nama Pegawai</th>
				<th>Nama Jabatan</th>
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
		       //kondisi untuk pegawai tidak bisa validasi permohonan dirinya sendiri
			   if ($b->id_pegawai != $this->session->userdata('id_pegawai')) {				
					echo "<tr>
					<td>$b->id_permohonan</td>
					<td>$b->nama_pegawai</td>
					<td>$b->nama_jabatan</td>
					<td>$b->cuti_kpd</td>
					<td>$b->tgl_permohonan</td>
					<td>$b->tgl_mulai</td>
					<td>$b->tgl_selesai</td>
					<td>$b->jml_hari</td>
					<td>$b->keterangan</td>
					<td>$b->validasi</td>
					<td>					
						<a id_permohonan = '$b->id_permohonan' nm_pegawai = '$b->nama_pegawai' data = 'Tolak' class = 'btn btn-danger validasi-permohonan'>Tolak</a>
						<a id_permohonan = '$b->id_permohonan' nm_pegawai = '$b->nama_pegawai' data = 'Setuju' class = 'btn btn-success validasi-permohonan'>Setuju</a>
					</td>
				</tr>";
			    }
			}
		?>
	</table>
</div>
<!-- /.box-body -->
<div class="box-footer">
	<!-- isi footer -->
</div>
<!-- /.box-footer-->
</div>
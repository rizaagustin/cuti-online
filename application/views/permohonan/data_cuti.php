<style type="text/css">
	div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
</style>
<!-- Custom tabs (Charts with tabs)-->
<div class="nav-tabs-custom">
<!-- Tabs within a box -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#revenue-chart" data-toggle="tab">Data Permohanan Staff</a></li>
  <li><a href="#sales-chart" data-toggle="tab">Data Permohanan Anda</a></li>
</ul>
<div class="tab-content no-padding">
	  <!-- Tab 1-->
    <div class="chart tab-pane active" id="revenue-chart" >
		<div class="box-body">
		<?php 
			if ($this->session->userdata('tipe_user') != 'STAFF') {
		?>
		  <h3>Data Permohonan Cuti Tolak</h3>	
			<?php echo $this->session->flashdata('message');?>
			<table  class="table table-bordered display nowrap" id="table1" width="100%">
			   <thead>
			        <tr>
						<th>ID Permohonan</th>
						<th>Pegawai</th>
						<th>Jabatan</th>
						<th>Cuti</th>
						<th>Tanggal Permohonan</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Jumlah Hari</th>
						<th>Tanggal Validasi</th>
						<th>Keterangan</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach ($record->result() as $b) {
						echo "<tr>
							<td>$b->id_permohonan</td>
							<td>$b->nama_pegawai</td>
							<td>$b->nama_jabatan</td>
							<td>$b->cuti_kpd</td>
							<td>$b->tgl_permohonan</td>
							<td>$b->tgl_mulai</td>
							<td>$b->tgl_selesai</td>
							<td>$b->jml_hari</td>
							<td>$b->tgl_validasi</td>
							<td>$b->keterangan</td>
							<td>$b->validasi</td>
						</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
		<hr>
		<div class="box-body">
			<h3>Data Permohonan Cuti Setuju</h3>
			<?php echo $this->session->flashdata('message');?>
			<table  class="table table-bordered display nowrap" id="table2" width="100%">
			   <thead>
			        <tr>
						<th>ID Permohonan</th>
						<th>Pegawai</th>
						<th>Jabatan</th>
						<th>Cuti</th>
						<th>Tanggal Permohonan</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Jumlah Hari</th>
						<th>Tanggal Validasi</th>
						<th>Keterangan</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach ($record2->result() as $b) {
						echo "<tr>
							<td>$b->id_permohonan</td>
							<td>$b->nama_pegawai</td>
							<td>$b->nama_jabatan</td>
							<td>$b->cuti_kpd</td>
							<td>$b->tgl_permohonan</td>
							<td>$b->tgl_mulai</td>
							<td>$b->tgl_selesai</td>
							<td>$b->jml_hari</td>
							<td>$b->tgl_validasi</td>
							<td>$b->keterangan</td>
							<td>$b->validasi</td>
							<td>					
							".anchor('permohonan/cetak/'.$b->id_permohonan,'Cetak',array('class' => 'btn btn-warning','target' => '_blank'))."
							</td>
						</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
		<?php			
			}
		?>

		<!-- /.box-body -->

		<!-- Akhir Tab 1 -->
  </div>
  <div class="chart tab-pane" id="sales-chart">
  		<div class="box-body">
			<?php echo $this->session->flashdata('message');?>
			<table  class="table table-bordered display nowrap" id="table3" width="100%">
				<thead>
					<tr>
		      	<th>ID Permohonan</th>
						<th>Pegawai</th>
						<th>Jabatan</th>
						<th>Cuti</th>
						<th>Tanggal Permohonan</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Jumlah Hari</th>
						<th>Tanggal Validasi</th>
						<th>Keterangan</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach ($record3->result() as $b) {
						echo "<tr>
							<td>$b->id_permohonan</td>
							<td>$b->nama_pegawai</td>
							<td>$b->nama_jabatan</td>
							<td>$b->cuti_kpd</td>
							<td>$b->tgl_permohonan</td>
							<td>$b->tgl_mulai</td>
							<td>$b->tgl_selesai</td>
							<td>$b->jml_hari</td>
							<td>$b->tgl_validasi</td>
							<td>$b->keterangan</td>
							<td>$b->validasi</td><td>";
							if ($b->validasi == 'Setuju') {
						    echo anchor('permohonan/cetak/'.$b->id_permohonan,'Cetak',array('class' => 'btn btn-warning','target' => '_blank'));
							} else {
								
							}
							
						echo"
						</td>
						</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
  </div>
</div>
</div>
<!-- /.nav-tabs-custom -->



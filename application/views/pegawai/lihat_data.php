<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Data Pegawai</h3>

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
	<table  class="table table-bordered" id="example1">
	   <thead>
	        <tr>
				<th>ID Pegawai</th>
				<th>Nama Pegawai</th>
				<th>Departemen</th>
				<th>Jabatan</th>
				<th>Alamat</th>
				<th>No Tlp</th>
				<th>TMK</th>
				<th>Lama Kerja</th>				
				<th>Tipe User</th>
				<th><?php echo anchor('Pegawai/simpan','Tambah',array('class' => 'btn btn-primary'));?></th>
			</tr>
		</thead>
		<?php 
			foreach ($record->result() as $b) {
				echo "<tr>
					<td>$b->id_pegawai</td>
					<td>$b->nama_pegawai</td>
					<td>$b->nama_departemen</td>
					<td>$b->nama_jabatan</td>
					<td>$b->alamat</td>
					<td>$b->no_tlp</td>
					<td>$b->tmk</td>
					<td>$b->waktu_kerja</td>
					<td>$b->tipe_user</td>
					<td>					
						<a id_pegawai = '$b->id_pegawai' nm_pegawai = '$b->nama_pegawai' class = 'btn btn-danger hapus-pegawai'>Hapus</a>
						".anchor('pegawai/ubah/'.$b->id_pegawai,'Ubah',array('class' => 'btn btn-success'))."
						<a id_pegawai = '$b->id_pegawai' nm_pegawai = '$b->nama_pegawai' class = 'btn btn-warning reset'>Reset</a>
					</td>
				</tr>";
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
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Sisa Cuti</h3>&nbsp;
  <?php echo anchor('permohonan/cetak_sisacuti','Cetak Sisa Cuti',array('class' => 'btn btn-warning','target' => '_blank')) ?>
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
				<th>Jabatan</th>
				<th>Waktu Kerja</th>
				<th>Jatah Cuti</th>
				<th>Cuti dipakai</th>
				<th>Sisa Cuti</th>
			</tr>
		</thead>
		<?php 
			foreach ($record->result() as $b) {
				if ($b->waktu_kerja != 1) {
					$sisacuti = 0;
					if($b->waktu_kerja % 7) {
						$jatahcuti = 12;
						$sisacuti = $jatahcuti - $b->jml_cuti;
					} else {
						//echo 18;
						$jatahcuti = 18;
						$sisacuti = $jatahcuti - $b->jml_cuti;
					}	

					echo "<tr>
						<td>$b->id_pegawai</td>
						<td>$b->nama_pegawai</td>
						<td>$b->nama_jabatan</td>
						<td>$b->waktu_kerja</td>
						<td>$jatahcuti</td>
						<td>$b->jml_cuti</td>
						<td>$sisacuti</td>
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
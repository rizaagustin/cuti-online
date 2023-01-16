<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Data Cuti <?php echo anchor('cuti/cetak/','Cetak',array('class' => 'btn btn-warning','target' => '_blank')) ?></h3>

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
				<th>ID Cuti</th>
				<th>Cuti KPD</th>
				<th>Jumlah Hari</th>
				<th><?php echo anchor('Cuti/simpan','Tambah',array('class' => 'btn btn-primary'));?></th>
			</tr>
		</thead>
		<?php 
			foreach ($record->result() as $b) {
				echo "<tr>
					<td>$b->id_cuti	</td>
					<td>$b->cuti_kpd</td>
					<td>$b->jml_hari</td>
					<td>					
						<a id_cuti = '$b->id_cuti' nm_cuti = '$b->cuti_kpd' class = 'btn btn-danger hapus-cuti'>Hapus</a>
						".anchor('cuti/ubah/'.$b->id_cuti,'Ubah',array('class' => 'btn btn-success'))."
					</td>
				</tr>";
			}
		?>
	</table>
</div>
<!-- /.box-body -->
<div class="box-footer">
	Created By. Arifin Supardan
<label style="color:red"><i>* id cuti tahunan harus CT-001</i></label>
</div>
<!-- /.box-footer-->
</div>
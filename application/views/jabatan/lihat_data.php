<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Data Jabatan <?php echo anchor('Jabatan/cetak/','Cetak',array('class' => 'btn btn-warning','target' => '_blank')) ?></h3>

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
				<th>ID Jabatan</th>
				<th>Nama Jabatan</th>
				<th>ID Departemen</th>
				<th><?php echo anchor('Jabatan/simpan','Tambah',array('class' => 'btn btn-primary'));?></th>
			</tr>
		</thead>
		<?php 
			foreach ($record->result() as $b) {
				echo "<tr>
					<td>$b->id_jabatan</td>
					<td>$b->nama_jabatan</td>
					<td>$b->nama_departemen</td>
					<td>					
						<a id_jabatan = '$b->id_jabatan' nama_jabatan = '$b->nama_jabatan' class = 'btn btn-danger hapus'>Hapus</a>
						".anchor('Jabatan/ubah/'.$b->id_jabatan,'Ubah',array('class' => 'btn btn-success'))."
					</td>
				</tr>";
			}
		?>
	</table>
</div>
<!-- /.box-body -->
<div class="box-footer">
   Created By. Arifin Supardan
</div>
<!-- /.box-footer-->
</div>
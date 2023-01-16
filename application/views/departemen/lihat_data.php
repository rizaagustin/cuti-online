<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Data Departemen <?php echo anchor('Departemen/cetak/','Cetak',array('class' => 'btn btn-warning')) ?></h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
      <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
	<table  class="table table-bordered" id="example1">
	   <thead>
	        <tr>
				<th>ID Departemen</th>
				<th>Nama Departemen</th>
				<th><?php echo anchor('Departemen/simpan','Tambah',array('class' => 'btn btn-primary'));?></th>
			</tr>
		</thead>

		<?php 
			foreach ($record as $b) {
				echo "<tr>
					<td>$b->id_departemen</td>
					<td>$b->nama_departemen</td>
					<td>
					<a id_dept = '$b->id_departemen' nm_dept = '$b->nama_departemen' class = 'btn btn-danger hapus-departemen'>Hapus</a>
					".anchor('Departemen/ubah/'.$b->id_departemen,'Ubah',array('class' => 'btn btn-success'))."
					</td>
				</tr>";
			}
								// ".anchor('Departemen/hapus/'.$b->id_departemen,'Hapus',array('class' => 'btn btn-danger','onclick' => "return confirm('Anda ingin menghapus data ini ?')"))."
		?>
	</table>
</div>
<!-- /.box-body -->
<div class="box-footer">
  Created By. Arifin Supardan
</div>
<!-- /.box-footer-->
</div>

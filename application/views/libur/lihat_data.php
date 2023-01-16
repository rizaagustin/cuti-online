<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Data Libur</h3>

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
	    	<th width="5%">No</th>
				<th>Tgl Libur</th>
				<th>Keterangan</th>
				<th><?php echo anchor('Libur/simpan','Tambah',array('class' => 'btn btn-primary'));?></th>
			</tr>
		</thead>

		<?php 
			$no=1;
			foreach ($record as $b) {
				echo "<tr>
					<td>$no</td>
					<td>$b->tgl_libur</td>
					<td>$b->keterangan_libur</td>
					<td>
					<a id_libur = '$b->id_libur' nm_libur = '$b->keterangan_libur' class = 'btn btn-danger hapus-libur'>Hapus</a>
					".anchor('libur/ubah/'.$b->id_libur,'Ubah',array('class' => 'btn btn-success'))."
					</td>
				</tr>";
				$no++;
			}
								// ".anchor('Departemen/hapus/'.$b->id_libur,'Hapus',array('class' => 'btn btn-danger','onclick' => "return confirm('Anda ingin menghapus data ini ?')"))."
		?>
	</table>
</div>
<!-- /.box-body -->
<div class="box-footer">
  Created By. Arifin Supardan
</div>
<!-- /.box-footer-->
</div>

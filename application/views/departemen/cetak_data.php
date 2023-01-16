<h2 class="box-title">Data Departemen</h2>
<table  width="100%" border="1" cellpadding="0" cellspacing="0">
 <thead>
  <tr>
		<th>ID Departemen</th>
		<th>Nama Departemen</th>
	</tr>
</thead>

<?php 
	foreach ($record as $b) {
		echo "
		<tr>
			<td style='text-align:center'>$b->id_departemen</td>
			<td style='text-align:center'>$b->nama_departemen</td>
		</tr>";
	}
						// ".anchor('Departemen/hapus/'.$b->id_departemen,'Hapus',array('class' => 'btn btn-danger','onclick' => "return confirm('Anda ingin menghapus data ini ?')"))."
?>
</table>


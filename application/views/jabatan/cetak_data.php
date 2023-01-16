<h2 class="box-title">Data Jabatan</h2>
<hr>
<table width="100%" cellspacing="0" cellpadding="0" border="1">
   <thead>
    <tr>
			<th>ID Jabatan</th>
			<th>Nama Jabatan</th>
			<th>ID Departemen</th>
		</tr>
	</thead>
	<?php 
		foreach ($record->result() as $b) {
			echo "<tr>
				<td>$b->id_jabatan</td>
				<td>$b->nama_jabatan</td>
				<td>$b->nama_departemen</td>
			</tr>";
		}
	?>
</table>

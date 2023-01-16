<h2 class="box-title">Data Pegawai</h2>
<hr>
<table cellpadding="0" cellspacing="0" border="1" width="100%">
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
				<td>$b->waktu_kerja Tahun</td>
				<td>$b->tipe_user</td>
			</tr>";
		}
	?>
</table>

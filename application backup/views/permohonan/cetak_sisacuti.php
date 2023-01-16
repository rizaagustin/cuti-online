	<h3> SISA CUTI KARYAWAN PT KARYAPRATAMA DUNIA PADA TAHUN <?php echo $tahun ?></h3>
	<hr>
	<table border="1" width="100%" cellspacing = "0" cellpadding = "4">
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
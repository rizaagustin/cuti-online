<h3>LAPORAN CUTI KARYAWAN PT KARYAPRATAMA DUNIA - CIKARANG PADA TAHUN <?php echo $tahun ?></h3>
	<table border="1" width="100%">
	   <thead>
	        <tr>
				<th>ID Permohonan</th>
				<th>Nama Pegawai</th>
				<th>Nama Jabatan</th>
				<th>Cuti</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Keterangan</th>
				<th>Status</th>
				<th>Aprrove</th>
			</tr>
		</thead>
		<?php 
			foreach ($record->result() as $b) {
				echo "<tr>
					<td>$b->id_permohonan</td>
					<td>$b->nama_pegawai</td>
					<td>$b->nama_jabatan</td>
					<td>$b->cuti_kpd</td>
					<td>$b->tgl_mulai</td>
					<td>$b->tgl_selesai</td>
					<td>$b->keterangan</td>
					<td>$b->validasi</td>
					<td>$b->user_update					
					</td>
				</tr>";
			}
		?>
	</table>
<html>
<title>RPS Realisasi</title>
	<head>
	</head>
		<body bgcolor = "white">
			<font size =5><center><b><u>FORM CUTI KARYAWAN PT KARYAPRATAMA DUNIA - CIKARANG</u></b></center></font>

			<br>
			<section style="margin-left:100px;margin-right:100px">
			<table width ="100%" border = "0" cellpadding = "4" style="font-size: 16px">
					<tr>
						<td width="15%">Id Pegawai</td>
						<td width="1%">:</td>
						<td><?php echo $record[0]->id_pegawai ?></td>
					</tr>
					<tr>
						<td width="15%">Nama</td>
						<td width="1%">:</td>
						<td><?php echo strtoupper($record[0]->nama_pegawai) ?></td>
					</tr>
					<tr>
						<td width="15%">Jabatan</td>
						<td width="1%">:</td>
						<td><?php echo $record[0]->nama_jabatan ?></td>
					</tr>
					<tr>
						<td width="15%">Tanggal Permohonan</td>
						<td width="1%">:</td>
						<td><?php echo $record[0]->tgl_permohonan ?></td>
					</tr>
			</table>
			<br>
			<hr>			
			
			<table align ="center" width ="100%" border = "1" cellspacing = "0" cellpadding = "4">
				<tr>
					<td>Id Permohonan</td>
					<td>Cuti</td>
					<td>Tanggal Mulai</td>
					<td>Tanggal Selesai</td>
					<td>Keterangan</td>
					<td>Approve</td>
				</tr>
				<?php 
					foreach ($record as $b) {
						echo "<tr>
							<td>$b->id_permohonan</td>
							<td>$b->cuti_kpd</td>
							<td>$b->tgl_mulai</td>
							<td>$b->tgl_selesai</td>
							<td>$b->keterangan</td>
							<td>$b->user_update</td>
						</tr>";
					}
				?>		
			</table>
			</section>			
		</body>
</html>

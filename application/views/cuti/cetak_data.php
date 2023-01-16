  <h2 class="box-title">Data Cuti</h2>
	<hr>
	<table width="100%" border="1" cellpadding="0" cellspacing="0">
	   <thead>
	        <tr>
				<th>ID Cuti</th>
				<th>Cuti KPD</th>
				<th>Jumlah Hari</th>
			</tr>
		</thead>
		<?php 
			foreach ($record->result() as $b) {
				echo "<tr>
					<td style='text-align:center'>$b->id_cuti	</td>
					<td style='text-align:center'>$b->cuti_kpd</td>
					<td style='text-align:center'>$b->jml_hari</td>

				</tr>";
			}
		?>
	</table>

<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Laporan Cuti Bulanan</h3>
</div>
<div class="box-body">
	<?php echo form_open('permohonan/laporan') ?>
	<table class="table table-bordered">
		<tr>
			<td><strong>Bulan</strong></td>
			<td>
				<select name="bulan" class="form-control" style="width: 400px">
					<option value="1">JANUARI</option>
					<option value="2">FEBRUARI</option>
					<option value="3">MARET</option>
					<option value="4">APRIL</option>
					<option value="5">MEI</option>
					<option value="6">JUNI</option>
					<option value="7">JULI</option>
					<option value="8">AGUSTUS</option>
					<option value="9">SEPTEMBER</option>					
					<option value="10">OKTOBER</option>					
					<option value="11">NOVEMBER</option>					
					<option value="12">DESEMBER</option>					
				</select>
			</td>
		</tr>
		<tr>
			<td><strong>Tahun</strong></td>
			<td>
			<select name="tahun" class="form-control" style="width: 200px;">
				<?php
					echo $tahun_sekarang = date('Y');
					echo $tahun_batas = date('Y') - 8;
					for ($i=$tahun_batas; $i <= $tahun_sekarang; $i++) { 
						echo "<option value = '$i'>$i</option>";
					}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" name="submit" class="btn btn-success">Lihat Data</button></td>
		</tr>
	</table>
	</form>
	<hr>	
	<?php echo $this->session->flashdata('message');?>
	<table  class="table table-bordered">
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
</div>
<!-- /.box-body -->
<div class="box-footer">
<?php if (isset($bulan)) {?>	
	<a href="<?php echo base_url()?>/permohonan/cetak_laporan/<?php echo $tahun ?>/<?php echo $bulan ?>" class="btn btn-warning" target='_blank'>Cetak Bulanan</a>
	<a href="<?php echo base_url()?>/permohonan/cetak_laporan_tahunan/<?php echo $tahun ?>/<?php echo $bulan ?>" class="btn btn-primary" target='_blank'>Cetak Tahunan</a>
<?php } ?>
</div>
</div>

<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Laporan Cuti Tahunan</h3>
</div>
<div class="box-body">
	<?php echo form_open('permohonan/laporan') ?>
	<table class="table table-bordered">
		<tr>
			<td width="10%"><strong>Tahun</strong></td>
			<td>
			<select name="tahun" class="form-control" style="width: 200px;">
				<?php
					echo $tahun_sekarang = date('Y');
					echo $tahun_batas = date('Y') - 8;
					for ($i=$tahun_batas; $i <= $tahun_sekarang; $i++) { 
						echo "<option value = '$i'>$i</option>";
					}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" name="submit_tahun" class="btn btn-success">Lihat Data</button></td>
		</tr>
	</table>
	</form>
	<hr>	
	<?php echo $this->session->flashdata('message');?>
	<table  class="table table-bordered">
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
			foreach ($record2->result() as $b) {
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
</div>
<!-- /.box-body -->
<div class="box-footer">
<?php if (isset($tahun)) {?>	
	<a href="<?php echo base_url()?>/permohonan/cetak_laporan_tahunan/<?php echo $tahun ?>/<?php echo $bulan ?>" class="btn btn-primary" target='_blank'>Cetak Tahunan</a>
<?php } ?>
</div>
</div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
                <marquee><h3 style="color: #ce3406;"><strong style="text-decoration: blink;">--- SELAMAT DATANG DI SICUTI ONLINE ---</strong></h3></marquee>
            </div>
          </div>            
        </div>
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 <!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>   
<!-- fullCalendar -->
<script src="<?php echo base_url(); ?>asset/bower_components/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script type="text/javascript">

 $('#calendar').fullCalendar({
    
    events: [
    {
      title: 'All Day Event',
      start: '2017-07-01'
    },
    <?PHP foreach ($buat_calender->result() as $row) {
         // $tgl_selesai = 0;
         // $tgl_selesai =  $row->tgl_selesai + 1;
         $tgl_selesai = date('Y-m-d', strtotime('+1 days', strtotime($row->tgl_selesai))); 
     ?>

      {
        title : '<?php echo $row->id_permohonan.' '.$row->nama_pegawai ?>
                 <?php echo 'Cuti ' .$row->cuti_kpd.' '.$row->keterangan ?>'  
        ,
        start : "<?php echo $row->tgl_mulai ?>",
        end   : "<?php echo $tgl_selesai ?>",
        color: '#ff002f'

      },
    <?php } ?>      
  ]

});

</script>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cuti Online</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
u       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link href="<?=base_url('asset/bootstrap-sweetalert/sweetalert.css')?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <style type="text/css">
      label.error{
          color:red;
      }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">SI<b>CUTI</b> ONLINE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a> -->
            <ul class="dropdown-menu">
<!--               <li class="header">You have 4 messages</li> -->
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>asset/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_pegawai'); ?> <strong>[<?php echo $this->session->userdata('nama_jabatan'); ?>]</strong></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama_pegawai'); ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-circle-o text-red"></i> <span>Halaman Utama</span></a></li>        
        <?php $tipe_user = $this->session->userdata('tipe_user');?>
      
      <?php if ($tipe_user == 'ADMIN') { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>departemen"><i class="fa fa-circle-o"></i> Departemen</a></li>
            <li><a href="<?php echo base_url(); ?>jabatan"><i class="fa fa-circle-o"></i> Jabatan</a></li>
            <li><a href="<?php echo base_url(); ?>pegawai"><i class="fa fa-circle-o"></i> Pegawai</a></li>
            <li><a href="<?php echo base_url(); ?>Cuti"><i class="fa fa-circle-o"></i> Cuti</a></li>
          </ul>
        </li>
        <?php } ?>      

        <li><a href="<?php echo base_url(); ?>permohonan"><i class="fa fa-circle-o text-red"></i> <span>Permohonan</span></a></li>

        <?php if ($tipe_user != 'STAFF') { ?>
        <li><a href="<?php echo base_url(); ?>permohonan/validasi"><i class="fa fa-circle-o text-red"></i> <span>Persetujuan</span></a></li>
        <?php } ?>      
        <li><a href="<?php echo base_url(); ?>permohonan/data_cuti"><i class="fa fa-circle-o text-red"></i> <span>Data Cuti Validasi</span></a></li>        
        <!-- HRD -->
        <?php 
        $jabatan = $this->session->userdata('nama_jabatan');
        $posisi= strpos(strtoupper($jabatan),"HQD");
        if ($posisi !== false) { ?>
        <li><a href="<?php echo base_url(); ?>permohonan/laporan"><i class="fa fa-circle-o text-red"></i> <span>Laporan Cuti</span></a></li>                
        <li><a href="<?php echo base_url(); ?>permohonan/sisacuti"><i class="fa fa-circle-o text-red"></i> <span>Sisa Cuti Karyawan</span></a></li>                        
        <?php } ?>      
        
        <!-- ADMIN -->
        <?php if ($tipe_user == 'ADMIN') { ?>
        <li><a href="<?php echo base_url(); ?>permohonan/laporan"><i class="fa fa-circle-o text-red"></i> <span>Laporan Cuti</span></a></li>                
        <li><a href="<?php echo base_url(); ?>permohonan/sisacuti"><i class="fa fa-circle-o text-red"></i> <span>Sisa Cuti Karyawan</span></a></li>                        
        <?php } ?>      

        <li><a href="<?php echo base_url(); ?>pegawai/ubah_password"><i class="fa fa-circle-o text-green"></i> <span>Ubah Password</span></a></li>        
        <li><a href="<?php echo base_url(); ?>Auth/logout"><i class="fa fa-circle-o text-yellow"></i> <span>Logout</span></a></li>        
        <!-- HRD -->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<input type="hidden" id="weburi" name="weburi" value="<?php echo base_url() ?>">
    <!-- Main content -->
    <section class="content" id="isikonten">
    <?php echo $contents; ?>
      <!-- Default box -->
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
<!--     <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved. -->
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
 
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url('asset/bootstrap-sweetalert/sweetalert.js')?>" type="text/javascript"></script>
<script src="<?=base_url('asset/jquery-validation/js/jquery.validate.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('asset/jquery-validation/js/additional-methods.min.js')?>" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<!-- fullCalendar -->
<script src="<?php echo base_url(); ?>asset/bower_components/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>asset/web/global.js"></script>
<script src="<?php echo base_url(); ?>asset/web/departemen.js"></script>
<script src="<?php echo base_url(); ?>asset/web/jabatan.js"></script>
<script src="<?php echo base_url(); ?>asset/web/pegawai.js"></script>
<script src="<?php echo base_url(); ?>asset/web/cuti.js"></script>
<script src="<?php echo base_url(); ?>asset/web/permohonan.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd' 
    })

    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd' 
    })


    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select3').select2()

// $('#calendar').fullCalendar({
//    defaultView: 'month'
// });
   
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table3').DataTable( {
        "scrollX": true
    } );
} );
$(document).ready(function() {
    $('#table2').DataTable( {
        "scrollX": true
    } );
} );  
$(document).ready(function() {
    $('#table1').DataTable( {
        "scrollX": true
    } );
} );  
</script>
</html>

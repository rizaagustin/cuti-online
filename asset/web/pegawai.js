 var weburi = $("#weburi").val();
 $('body').on('click', '.hapus-pegawai', function(event) {
	 // $("body").load(window.weburi+"departemen");
      event.preventDefault();
      var me = $(this),
          id = me.attr('id_pegawai'),
          nama = me.attr('nm_pegawai');
		swal({
		  title: "Anda Ingin Menghapus data "+nama+" ini?",
		  // text: "Your will not be able to recover this imaginary file!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Hapus!",
		  closeOnConfirm: false
		},
		function(){
		  $.ajax({
		  	url: window.weburi+"pegawai/hapus",
		  	type: "post",
		  	data:{id:id},
		  	success:function(data){
			     // swal("Delete!", "Data Berhasil di hapus.", "success");				 
				 window.location.replace(window.weburi +"Pegawai");
		  	},
		  	error:function(){
				swal("Delete!", "Data Gagal di hapus.", "error");
		  	}
		  });
		});
  
 });


 $('body').on('click', '.reset', function(event) {
	 // $("body").load(window.weburi+"departemen");
      event.preventDefault();
      var me = $(this),
          id = me.attr('id_pegawai'),
          nama = me.attr('nm_pegawai');
		swal({
		  title: "Anda Ingin Reset Password "+nama+" ini?",
		  // text: "Your will not be able to recover this imaginary file!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Reset!",
		  closeOnConfirm: false
		},
		function(){
		  $.ajax({
		  	url: window.weburi+"pegawai/reset",
		  	type: "post",
		  	data:{id:id},
		  	success:function(data){
			     // swal("Delete!", "Data Berhasil di hapus.", "success");				 
				 window.location.replace(window.weburi +"Pegawai");
		  	},
		  	error:function(){
				swal("Delete!", "Data Gagal di reset.", "error");
		  	}
		  });
		});
  
 });
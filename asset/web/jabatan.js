 var weburi = $("#weburi").val();
 $('body').on('click', '.hapus', function(event) {
	 // $("body").load(window.weburi+"departemen");
      event.preventDefault();
      var me = $(this),
          id = me.attr('id_jabatan'),
          nama = me.attr('nm_jabatan');
		swal({
		  title: "Anda Ingin Menghapus "+nama+" ini?",
		  // text: "Your will not be able to recover this imaginary file!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Hapus!",
		  closeOnConfirm: false
		},
		function(){
		  $.ajax({
		  	url: window.weburi+"Jabatan/hapus",
		  	type: "post",
		  	data:{id:id},
		  	success:function(){
			     // swal("Delete!", "Data Berhasil di hapus.", "success");				 
				 window.location.replace(window.weburi + "Jabatan");
		  	},
		  	error:function(){
				swal("Delete!", "Data Gagal di hapus.", "error");
		  	}
		  });
		});
  
 });

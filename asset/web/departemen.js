 var weburi = $("#weburi").val();
 $('body').on('click', '.hapus-departemen', function(event) {
	 // $("body").load(window.weburi+"departemen");
      event.preventDefault();
      var me = $(this),
          id = me.attr('id_dept'),
          nama = me.attr('nm_dept');
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
		  	url: window.weburi+"departemen/hapus",
		  	type: "post",
		  	data:{id:id},
		  	success:function(){
			     // swal("Delete!", "Data Berhasil di hapus.", "success");				 
				 window.location.replace(window.weburi + "departemen");
		  	},
		  	error:function(){
				swal("Delete!", "Data Gagal di hapus.", "error");
		  	}
		  });
		});
  
 });

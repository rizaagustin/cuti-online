 var weburi = $("#weburi").val();
$("#permohonanform").validate({
  submitHandler: function(form) {
    // some other code
    // maybe disabling submit button
    // then:
        var url = window.weburi+"permohonan/post";
        var form_data = $(form).serialize();
            $.ajax({
                url: url, // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                data: form_data,
                type: 'post',
                success: function (response) { 

                $('#confirm-modal').modal('hide');
                  // }
                  // window.location.replace(window.weburi + "permohonan");
                  location.reload();
                },
                error: function (response) {
			            swal("Berhasil!", "Data Gagal di disimpan.", "error");				 
                }
            });

  }
 });

$('body').on('click', '.show-confirm-modal', function(event) {
  event.preventDefault();
  $('#confirm-modal').modal('show');
});

$('body').on('click', '.validasi-permohonan', function(event) {
   // $("body").load(window.weburi+"departemen");
      event.preventDefault();
      var me = $(this),
          id = me.attr('id_permohonan'),
          nama = me.attr('nm_pegawai'),
          status = me.attr('data');
      if(status == 'Tolak'){
       var button = 'btn-danger';
       var textbtn = 'Tolak';   
      }else{
       var button = 'btn-primary';
       var textbtn = 'Setuju';
      }    
    swal({
      title: "Anda Ingin "+textbtn+" permohanan "+nama+"?",
      // text: "Your will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: button,
      confirmButtonText: textbtn,
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        url: window.weburi+"permohonan/approve",
        type: "post",
        data:'id='+id+'&validasi='+status,
        success:function(data){
           // swal("Delete!", "Data Berhasil di hapus.", "success");         
         window.location.replace(window.weburi +"permohonan/validasi");
        },
        error:function(){
        swal("Delete!", "Data Gagal di hapus.", "error");
        }
      });
    });
  
 });

 $('body').on('click', '.hapus-permohonan', function(event) {
   // $("body").load(window.weburi+"departemen");
      event.preventDefault();
      var me = $(this),
          id = me.attr('id_permohonan'),
          nama = me.attr('nm_pegawai');
    swal({
      title: "Anda Ingin Menghapus Permohonan "+nama+" ini?",
      // text: "Your will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Hapus!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        url: window.weburi+"permohonan/hapus",
        type: "post",
        data:{id:id},
        success:function(data){
           // swal("Delete!", "Data Berhasil di hapus.", "success");         
         window.location.replace(window.weburi +"permohonan");
        },
        error:function(){
        swal("Delete!", "Data Gagal di hapus.", "error");
        }
      });
    });
  
 });


function changeValue(id_pegawai){ 
   $.ajax({
        type:"GET",
        url: window.weburi+"permohonan/get_datacuti/"+id_pegawai,
        success: function(res){
            document.getElementById('sisacuti2').value = res;  
            document.getElementById('sisacuti').value = res;
        }
   });

};  
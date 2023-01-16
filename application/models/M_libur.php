<?php 
class M_libur extends CI_Model{


	function tampilkan_data(){

		return $this->db->get('libur');		

	}

	function simpan($data){
		$this->db->insert('libur',$data);
	}

	function hapus($id){
		$this->db->where('id_libur', $id);
		$this->db->delete('libur');
	}

	function get_data($id){
		$vans = array('id_libur' => $id);
		return $this->db->get_where('libur', $vans);
	}

	function update($data, $id){
		$this->db->where('id_libur', $id);
		$this->db->update('libur', $data);
	}

	function cek_libur($tgl_libur)
	{
		$chek=	$this->db->get_where('libur',array('tgl_libur'=>$tgl_libur));
		
		// untuk check data username dan password ada atau tidak
		if ($chek->num_rows()>0) 
		{
			return 0;
		}
		else {
			return 1;
		}
	}

}
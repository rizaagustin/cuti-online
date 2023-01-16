<?php
class M_departemen extends CI_Model{

	// 	function login($username,$password)
	// {
	// 	$chek=	$this->db->get_where('tb_biodata',array('username'=>$username,'password'=>$password));
		
	// 	// untuk check data username dan password ada atau tidak
	// 	if ($chek->num_rows()>0) 
	// 	{
	// 		return 1;
	// 	}
	// 	else {
	// 		return 0;
	// 	}
	// }
	// function code_otomatis(){
 //        $q = $this->db->query("select MAX(RIGHT(id_pelamar,3)) as code_max from tb_data_pelamar");
 //        $code = "";
 //        if($q->num_rows()>0){
 //            foreach($q->result() as $cd){
 //                $tmp = ((int)$cd->code_max)+1;
 //                $code = sprintf("%03s", $tmp);
 //            }
 //        }else{
 //            $code = "001";
 //        }
 //        // $date = date('mY');
 //        return "PEL".$code;
 //    }
	function tampilkan_data(){
		//untuk menampilkan data
	return $this->db->get('departemen');

	}

	function simpan($data){
		$this->db->insert('departemen', $data);
	}

	function hapus($id){
		$this->db->where('id_departemen', $id);
		$this->db->delete('departemen');
	}

	function get_data($id){
		$vans = array('id_departemen' => $id);
		return $this->db->get_where('departemen', $vans);
	}

	function update($data, $id){
		$this->db->where('id_departemen', $id);
		$this->db->update('departemen', $data);
	}

}

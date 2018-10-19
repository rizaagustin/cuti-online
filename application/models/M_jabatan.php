<?php
class M_jabatan extends CI_Model{

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
	
	function code_otomatis($id_departemen){
        $q = $this->db->query("select MAX(RIGHT(id_jabatan,2)) as code_max from jabatan where id_departemen = '{$id_departemen}'");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%02s", $tmp);
            }
        }else{
            $code = "01";
        }
        // $date = date('mY');
        return $id_departemen.'-'.$code;
    }

	function tampilkan_data(){
	$this->db->select('*');
	$this->db->from('jabatan');
	$this->db->join('departemen', 'departemen.id_departemen = jabatan.id_departemen');
	$query = $this->db->get();
	return $query;
	}

	function simpan($data){
		$this->db->insert('jabatan', $data);
	}

	function hapus($id){
		$this->db->where('id_jabatan', $id);
		$this->db->delete('jabatan');
	}

	function get_data($id){
		$vans = array('id_jabatan' => $id);
		return $this->db->get_where('jabatan', $vans);
	}

	function update($data, $id){
		$this->db->where('id_jabatan', $id);
		$this->db->update('jabatan', $data);
	}

}

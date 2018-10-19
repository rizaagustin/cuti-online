<?php 
class M_cuti extends CI_Model{

	function code_otomatis(){
        $q = $this->db->query("select MAX(RIGHT(id_cuti,3)) as code_max from cuti");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        // $date = date('mY');
        return "CT-".$code;
    }
	function tampilkan_data(){

		return $this->db->get('cuti');		

	}

	function simpan($data){
		$this->db->insert('cuti',$data);
	}

	function hapus($id){
		$this->db->where('id_cuti', $id);
		$this->db->delete('cuti');
	}

	function get_data($id){
		$vans = array('id_cuti' => $id);
		return $this->db->get_where('cuti', $vans);
	}

	function update($data, $id){
		$this->db->where('id_cuti', $id);
		$this->db->update('cuti', $data);
	}
}
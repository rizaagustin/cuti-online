<?php 
Class M_pegawai extends CI_Model{
	
	function login($id_pegawai,$password)
	{
		$chek=	$this->db->get_where('pegawai',array('id_pegawai'=>$id_pegawai,'password'=>$password));
		
		// untuk check data username dan password ada atau tidak
		if ($chek->num_rows()>0) 
		{
			return 1;
		}
		else {
			return 0;
		}
	}

	function code_otomatis($id_jabatan){
        $q = $this->db->query("select MAX(RIGHT(id_jabatan,3)) as code_max from pegawai where id_jabatan = '{$id_jabatan}'");
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
        return $id_jabatan.'-'.$code;
    }

	function tampilkan_data(){
		// return $this->db->get('pegawai');
		$this->db->select('*,
		(year(now()) - year(pegawai.tmk)) + 1 as waktu_kerja');
		$this->db->from('pegawai');
		$this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
		$this->db->join('departemen', 'departemen.id_departemen = jabatan.id_departemen');
		$query = $this->db->get();
		return $query;
	}

	function tampilkan_data_byid($id_pegawai){
		// return $this->db->get('pegawai');
		$this->db->select('*,
		(year(now()) - year(pegawai.tmk)) + 1 as waktu_kerja');
		$this->db->from('pegawai');
		$this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
		$this->db->join('departemen', 'departemen.id_departemen = jabatan.id_departemen');
        $this->db->where('pegawai.id_pegawai', $id_pegawai);
		$query = $this->db->get();
		return $query;
	}

	function tampilkan_data_oprator_spv($id_departemen){
		// return $this->db->get('pegawai');
		$tipe_user = array('SPV','OPERATOR');
		$this->db->select('*,
		(year(now()) - year(pegawai.tmk)) + 1 as waktu_kerja');
		$this->db->from('pegawai');
		$this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
		$this->db->join('departemen', 'departemen.id_departemen = jabatan.id_departemen');
        $this->db->where('jabatan.id_departemen', $id_departemen);
        $this->db->where_in('pegawai.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;		
	}

	function simpan($data){
		$this->db->insert('pegawai',$data);
	}

	function hapus($id){
		$this->db->where('id_pegawai', $id);
		$this->db->delete('pegawai');
	}

	function get_data($id){
		$vans = array('id_pegawai' => $id);
		return $this->db->get_where('pegawai', $vans);
	}

	function update($data, $id){
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai', $data);
	}

}
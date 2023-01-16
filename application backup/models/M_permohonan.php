<?php
Class M_permohonan extends CI_Model{

	function simpan($data){
		$this->db->insert('permohonan',$data);
	}

	function code_otomatis(){
        $q = $this->db->query("select MAX(RIGHT(id_permohonan,4)) as code_max from permohonan");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%04s", $tmp);
            }
        }else{
            $code = "0001";
        }
        // $date = date('mY');
        return 'PR-'.$code;
    }
 

	//SETUJU
    function tampilkan_data_setuju_byid($id_pegawai2){
		// return $this->db->get('pegawai');
    	$tahun = date('Y');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Setuju');
        $this->db->where('view_permohonan.id_pegawai', $id_pegawai2);
        $this->db->where('year(view_permohonan.tgl_mulai)', $tahun);
		$query = $this->db->get();
		return $query;    	
    }

    function tampilkan_data_setuju(){
		// return $this->db->get('pegawai');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Setuju');
		$query = $this->db->get();
		return $query;    	
    }

    function tampilkan_data_setuju_bydepartemen(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Tolak');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER STAFF
    function tampilkan_data_setuju_spv(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('STAFF','OPERATOR');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Setuju');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }
    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER SPV
    function tampilkan_data_setuju_manager(){
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('STAFF','OPERATOR','SPV');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Setuju');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user',$tipe_user);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER MANAGER
    function tampilkan_data_setuju_direktur(){
		$id_departemen = $this->session->userdata('id_departemen');
		$departemen = substr($this->session->userdata('id_departemen'), 0, 3);  // abcd
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Setuju');
		$this->db->like('id_departemen', $departemen);
        // $this->db->where('view_permohonan.id_departemen', $id_departemen);
        // $this->db->where('view_permohonan.tipe_user', 'MANAGER');
		$query = $this->db->get();
		return $query;    	
    }


//TOLAK
    function tampilkan_data_tolak(){
		// return $this->db->get('pegawai');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Tolak');
		$query = $this->db->get();
		return $query;    	
    }

    function tampilkan_data_tolak_bydepartemen(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Tolak');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER STAFF OPERATOR
    function tampilkan_data_tolak_spv(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('STAFF','OPERATOR');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Tolak');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }
    
    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER SPV
    function tampilkan_data_tolak_manager(){
		$tipe_user = array('STAFF','OPERATOR','SPV');
		$id_departemen = $this->session->userdata('id_departemen');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Tolak');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER MANAGER
    function tampilkan_data_tolak_direktur(){
		$id_departemen = $this->session->userdata('id_departemen');
		$departemen = substr($this->session->userdata('id_departemen'), 0, 3);  // abcd
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Tolak');
        // $this->db->where('view_permohonan.id_departemen', $id_departemen);
		$this->db->like('id_departemen', $departemen);
        // $this->db->where('view_permohonan.tipe_user', 'MANAGER');
		$query = $this->db->get();
		return $query;    	
    }


	// PENDING
    function tampilkan_data_pending(){
		// return $this->db->get('pegawai');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Pending');
		$query = $this->db->get();
		return $query;    	
    }
    
    function tampilkan_data_pending_bydepartemen(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Pending');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER STAFF
    function tampilkan_data_pending_spv(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('STAFF','OPERATOR');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Pending');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }
    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER SPV
    function tampilkan_data_pending_manager(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Pending');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where('view_permohonan.tipe_user', 'SPV');
		$query = $this->db->get();
		return $query;    	
    }



    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER MANAGER
    function tampilkan_data_pending_direktur($departemen){
		$tipe_user = array('DIREKTUR','MANAGER');
		$id_departemen = $this->session->userdata('id_departemen');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Pending');
		$this->db->like('id_departemen', $departemen);
        // $this->db->where('view_permohonan.id_departemen', $id_departemen);
        // $this->db->where_in('view_permohonan.tipe_user', 'MANAGER');
		$query = $this->db->get();
		return $query;    	
    }
    
    function tampilkan_data_pending_byid($user_create){
		// return $this->db->get('pegawai');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Pending');
        $this->db->where('view_permohonan.user_create', $user_create);
		$query = $this->db->get();
		return $query;    	
    }

    function tampilkan_data_byid($id_pegawai){
		// return $this->db->get('pegawai');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.id_pegawai', $id_pegawai);
		$query = $this->db->get();
		return $query;    	
    }

	function update($data, $id){
		$this->db->where('id_permohonan',$id);
		$this->db->update('permohonan',$data);
	}


	function hapus($id){
		$this->db->where('id_permohonan', $id);
		$this->db->delete('permohonan');
	}

	function laporan($tahun,$bulan){
		$query = "SELECT view_permohonan.id_permohonan,view_permohonan.id_pegawai, view_permohonan.nama_pegawai, view_permohonan.nama_jabatan, view_permohonan.cuti_kpd, view_permohonan.tgl_mulai, view_permohonan.tgl_selesai, view_permohonan.keterangan, view_permohonan.validasi, pegawai.nama_pegawai as user_update, view_permohonan.tgl_permohonan FROM view_permohonan, pegawai WHERE view_permohonan.user_update = pegawai.id_pegawai and year(view_permohonan.tgl_mulai) = '{$tahun}' and month(view_permohonan.tgl_mulai)= '{$bulan}' and view_permohonan.validasi = 'Setuju'";
		return $this->db->query($query);
	}

	function laporan_tahunan($tahun){
		$query = "SELECT view_permohonan.id_permohonan,view_permohonan.id_pegawai, view_permohonan.nama_pegawai, view_permohonan.nama_jabatan, view_permohonan.cuti_kpd, view_permohonan.tgl_mulai, view_permohonan.tgl_selesai, view_permohonan.keterangan, view_permohonan.validasi, pegawai.nama_pegawai as user_update, view_permohonan.tgl_permohonan FROM view_permohonan, pegawai WHERE view_permohonan.user_update = pegawai.id_pegawai and year(view_permohonan.tgl_mulai) = '{$tahun}' and view_permohonan.validasi = 'Setuju'";
		return $this->db->query($query);
	}

	function cuti_byid($id_permohonan){
		$query = "SELECT view_permohonan.id_permohonan,view_permohonan.id_pegawai, view_permohonan.nama_pegawai, view_permohonan.nama_jabatan, view_permohonan.cuti_kpd, view_permohonan.tgl_mulai, view_permohonan.tgl_selesai, view_permohonan.keterangan, view_permohonan.validasi, pegawai.nama_pegawai as user_update, view_permohonan.tgl_permohonan FROM view_permohonan, pegawai WHERE view_permohonan.user_update = pegawai.id_pegawai and view_permohonan.id_permohonan = '{$id_permohonan}'";
		return $this->db->query($query);
	}

	function jml_cuti($id_pegawai){
		$query = "SELECT sum(jml_hari) as jml_cuti FROM `permohonan` where id_pegawai = '{$id_pegawai}' and year(tgl_mulai) = year(now()) and id_cuti = 'CT-001' and permohonan.validasi = 'Setuju'";
		return $this->db->query($query);
	}

	function sisa_cuti($tahun){
		$query="select b.id_pegawai,
				b.nama_pegawai,
				b.nama_jabatan,
				b.waktu_kerja ,
				i.jml_cuti 
				from (SELECT pegawai.id_pegawai,pegawai.nama_pegawai ,jabatan.nama_jabatan,(year(now()) - year(pegawai.tmk)) + 1 as waktu_kerja FROM pegawai,jabatan where jabatan.id_jabatan = pegawai.id_jabatan) as b 
				LEFT JOIN (SELECT id_pegawai, sum(jml_hari) as jml_cuti FROM `permohonan` where year(tgl_mulai) = '{$tahun}' and id_cuti = 'CT-001' AND permohonan.validasi = 'Setuju' group by id_pegawai) as i 
				ON i.id_pegawai = b.id_pegawai";
		return $this->db->query($query);
	}


}
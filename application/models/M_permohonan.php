<?php
Class M_permohonan extends CI_Model{

	function simpan($data){
		$this->db->insert('permohonan',$data);
	}

	function simpan_detail($data_detail){
		$this->db->insert('detail_permohonan',$data_detail);
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
        $this->db->where('view_permohonan.validasi', 'Setuju');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER STAFF, OPERATOR, & LEADER
    function tampilkan_data_setuju_spv(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('OPERATOR','LEADER','STAFF');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Setuju');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER OPERATOR
    function tampilkan_data_setuju_leader(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('OPERATOR');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Setuju');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }


    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER OPERATOR, LEADER, STAFF & SPV
    function tampilkan_data_setuju_manager(){
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('OPERATOR','LEADER','STAFF','SPV');
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

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER OPERATOR, LEADER, STAFF
    function tampilkan_data_tolak_spv(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('OPERATOR','LEADER','STAFF');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Tolak');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER OPERATOR
    function tampilkan_data_tolak_leader(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('OPERATOR');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Tolak');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER OPERATOR, LEADER, STAFF, & SPV
    function tampilkan_data_tolak_manager(){
		$tipe_user = array('OPERATOR','LEADER','STAFF','SPV');
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

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER OPERATOR, LEADER & STAFF
    function tampilkan_data_pending_spv(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('OPERATOR','LEADER','STAFF');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Pending');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER OPERATOR
    function tampilkan_data_pending_leader(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('OPERATOR');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Pending');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where_in('view_permohonan.tipe_user', $tipe_user);
		$query = $this->db->get();
		return $query;    	
    }

    //HANYA MENAMPILKAN DATA PERMOHONAN TIPE USER LEADER & SPV
    function tampilkan_data_pending_manager(){
		// return $this->db->get('pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$tipe_user = array('LEADER','SPV');
		$this->db->select('*');
		$this->db->from('view_permohonan');
        $this->db->where('view_permohonan.validasi', 'Pending');
        $this->db->where('view_permohonan.id_departemen', $id_departemen);
        $this->db->where('view_permohonan.tipe_user', $tipe_user);
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

		$this->db->where('id_permohonan', $id);
		$this->db->delete('detail_permohonan');
	}

	function hapus_detail($id){
		$this->db->where('id_permohonan', $id);
		$this->db->delete('detail_permohonan');
	}

	
	function cek_pending($id_pegawai){
		$chek =	$this->db->get_where('permohonan',array('id_pegawai'=>$id_pegawai,'validasi'=> 'Pending'));		
		// untuk check data username dan password ada atau tidak
		if ($chek->num_rows()>0) 
		{
			return 0;
		}
		else {
			return 1;
		}
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
		// $query = "SELECT sum(jml_hari) as jml_cuti FROM `permohonan` where id_pegawai = '{$id_pegawai}' and year(tgl_mulai) = year(now()) and id_cuti = 'CT-001' and permohonan.validasi = 'Setuju'";

		// $query = "SELECT *, sum(detail_permohonan.hari) as jml_cuti FROM detail_permohonan, permohonan, view_pegawai where detail_permohonan.id_permohonan = permohonan.id_permohonan and permohonan.id_pegawai = view_pegawai.id_pegawai and permohonan.validasi = 'Setuju' and permohonan.id_cuti = 'CT-001' and detail_permohonan.tgl_cuti  between view_pegawai.batas_bawah and view_pegawai.batas_atas AND permohonan.id_pegawai = '{$id_pegawai}'";

		$query = "SELECT *, sum(detail_permohonan.hari) as jml_cuti FROM detail_permohonan, permohonan, view_pegawai where detail_permohonan.id_permohonan = permohonan.id_permohonan and permohonan.id_pegawai = view_pegawai.id_pegawai and detail_permohonan.tgl_cuti and permohonan.validasi = 'Setuju' and permohonan.id_cuti = 'CT-001' between view_pegawai.batas_bawah and view_pegawai.batas_atas group by permohonan.id_pegawai";

// SELECT *, sum(detail_permohonan.hari) as jml_cuti FROM detail_permohonan, permohonan, view_pegawai where detail_permohonan.id_permohonan = permohonan.id_permohonan and permohonan.id_pegawai = view_pegawai.id_pegawai and permohonan.validasi = 'Setuju' and permohonan.id_cuti = 'CT-001' and detail_permohonan.tgl_cuti  between view_pegawai.batas_bawah and view_pegawai.batas_atas group by permohonan.id_pegawai
		return $this->db->query($query);
	}

	function sisa_cuti($tahun){
		// $query="select b.id_pegawai,
		// 		b.nama_pegawai,
		// 		b.nama_jabatan,
		// 		b.waktu_kerja ,
		// 		i.jml_cuti 
		// 		from (SELECT pegawai.id_pegawai,pegawai.nama_pegawai ,jabatan.nama_jabatan,TIMESTAMPDIFF(YEAR,pegawai.tmk, CURDATE()) as waktu_kerja FROM pegawai,jabatan where jabatan.id_jabatan = pegawai.id_jabatan) as b 
		// 		LEFT JOIN (SELECT id_pegawai, sum(jml_hari) as jml_cuti FROM `permohonan` where year(tgl_mulai) = '{$tahun}' and id_cuti = 'CT-001' AND permohonan.validasi = 'Setuju' group by id_pegawai) as i 
		// 		ON i.id_pegawai = b.id_pegawai";
		// return $this->db->query($query);

		$query="select b.id_pegawai,
				b.nama_pegawai,
				b.nama_jabatan,
				b.waktu_kerja ,
				i.jml_cuti 
				from (SELECT pegawai.id_pegawai,pegawai.nama_pegawai ,jabatan.nama_jabatan,TIMESTAMPDIFF(YEAR,pegawai.tmk, CURDATE()) as waktu_kerja FROM pegawai,jabatan where jabatan.id_jabatan = pegawai.id_jabatan) as b 
				LEFT JOIN (SELECT view_pegawai.id_pegawai,sum(detail_permohonan.hari) as jml_cuti FROM detail_permohonan, permohonan, view_pegawai where detail_permohonan.id_permohonan = permohonan.id_permohonan and permohonan.id_pegawai = view_pegawai.id_pegawai and permohonan.validasi = 'Setuju' and permohonan.id_cuti = 'CT-001' and detail_permohonan.tgl_cuti  between view_pegawai.batas_bawah and view_pegawai.batas_atas group by permohonan.id_pegawai) as i 
				ON i.id_pegawai = b.id_pegawai";
		return $this->db->query($query);

	}
// $sql = "SELECT 
// 				a.tgl_selesai, a.id_pegawai,a.jml_hari ,DATE_ADD(b.tmk,INTERVAL TIMESTAMPDIFF(YEAR,b.tmk, CURDATE()) YEAR) as waktu_kerja,CURDATE() FROM permohonan as a,pegawai as b where id_cuti = 'CT-001' AND a.validasi =  'Setuju' AND b.id_b = a.id_b and  DATE_ADD(b.tmk,INTERVAL TIMESTAMPDIFF(YEAR,b.tmk, CURDATE()) YEAR) < a.tgl_selesai";

	// $sql = "SELECT *,TIMESTAMPDIFF(YEAR,tmk, CURDATE()) as waktu_kerja,DATE_ADD(tmk,INTERVAL TIMESTAMPDIFF(YEAR,tmk, CURDATE()) YEAR) + interval 1 year as batas_atas, DATE_ADD(tmk,INTERVAL TIMESTAMPDIFF(YEAR,tmk, CURDATE()) YEAR) as batas_atas, CURDATE() - interval 1 year as batas_akhir FROM `pegawai`";

	// $sql = "SELECT * DATE_ADD(tmk,INTERVAL TIMESTAMPDIFF(YEAR,tmk, CURDATE()) YEAR) + interval 1 year as batas_atas ";
	// $sql = "SELECT *,sum(jml_hari) as jml_hari FROM view_pegawai, permohonan where view_pegawai.id_pegawai = permohonan.id_pegawai and permohonan.id_cuti = 'CT-001' AND permohonan.validasi = 'Setuju' AND permohonan.tgl_selesai between  view_pegawai.batas_bawah and view_pegawai.batas_atas group by view_pegawai.id_pegawai";
}
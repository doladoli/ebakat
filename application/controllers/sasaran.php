<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sasaran extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('skt_model', 'pm');
	}

	public function index($id="")
	{
		// $this->load->controller('prestasi');
		$this->load->library('util');
		// $box = $this->prestasi->box_kriteria();
		$box = $this->util->box_kriteria($id, true);
		$this->page_title = 'SKT';
		$kriteria = $this->pm->get_all_kriteria();
		if ($id == "") 
		{
			$first = $kriteria->row(); 
			$id = $first->KR_ID;
		}
		
		$sub = $this->pm->get_sub_kriteria($id);
		$gred = $this->pm->get_all_gred();
		$array = array(
			"kriteria" => $kriteria,
			"sub"	=> 	$sub,
			"id"	=>	$id, 
			"dd_k"	=>	$box,
			"gred"	=>	$gred
		);
		$this->render($array);
	}
	
	public function index_tdb($id="")
	{
		$role = 1;
		// $this->load->controller('prestasi');
		$this->load->library('util');
		// $box = $this->prestasi->box_kriteria();
		$box = $this->util->box_kriteria($id, true);
		$this->page_title = 'SKT';
		$kriteria = $this->pm->get_all_kriteria();
		if ($id == "") 
		{
			$first = $kriteria->row(); 
			$id = $first->KR_ID;
		}
		
		$sub = $this->pm->get_sub_kriteria($id);
		$gred = $this->pm->get_all_gred();
		$array = array(
			"kriteria" => $kriteria,
			"sub"	=> 	$sub,
			"id"	=>	$id, 
			"dd_k"	=>	$box,
			"gred"	=>	$gred
		);
		$this->render($array);
	}
	
	public function index_pensyarah($id="")
	{
		$nokp = $_SESSION['icno'];
		$skt_tahun = $_SESSION['skt_tahun'];
		
		$pp = $this->pm->get_all_penilai($nokp);
		$this->page_title = 'SASARAN KERJA TAHUNAN';
		$array = array(
			"pp"	=>	$pp,
			"submit"	=>	$this->pm->check_skt_submit ($nokp, $skt_tahun),
			"isi"	=>	$this->pm->check_skt_isi ($nokp, $skt_tahun)
		);
		$this->render($array);
	}
	
	public function skt_pensyarah($id="")
	{
		$nokp = $_SESSION['icno'];
		$i = $this->pm->get_pensyarah($nokp);
		$role = 1;
		// $this->load->controller('prestasi');
		$this->load->library('util');
		// $box = $this->prestasi->box_kriteria();
		$box = $this->util->box_kriteria($id, "sasaran/skt_pensyarah");
		$this->page_title = 'SKT';
		$kriteria = $this->pm->get_all_kriteria();
		if ($id == "") 
		{
			$first = $kriteria->row(); 
			$id = $first->KR_ID;
		}
		
		$sub = $this->pm->get_sub_kriteria($id);
		$gred = $this->pm->get_all_gred();
		$array = array(
			"kriteria" => $kriteria,
			"sub"	=> 	$sub,
			"id"	=>	$id, 
			"dd_k"	=>	$box,
			"gred"	=>	$gred,
			"profil"=>	$i->row()
		);
		$this->render($array);
	}
	
	public function save_skt()
	{
		$ptj = $this->input->post("nama_ptj");
		
		if ($ptj == "0")
		{
			$all = $this->pm->get_all_ptj();
			foreach($all->result() as $a){
				$this->__save_skt($a->PTJ_KOD);
			}
		}
		else 
		{
			$this->__save_skt($ptj);
		}
		
	}
	
	public function save_skt_pensyarah()
	{
		$nokp = $_SESSION['icno'];
		
		foreach($_POST as $p => $key)
		{
			if (strpos($p, "field") !== false) {  
				$value = $this->input->post($p); 
				list($remove, $id_kriteria) = explode("_", $p);  
				$d = array(
					"sp_nokp"			=>	$nokp,
					"sp_id_kriteria"	=>	$id_kriteria,
					"sp_sasaran"		=>	$value,
					"sp_catatan"		=>  $this->input->post("catatan_".$id_kriteria)
				);
				$this->pm->insert_skt_pensyarah($d);
			} 
		}
		ajaxResponse();
	}
	
	private function __save_skt($ptj)
	{
		foreach($_POST as $p => $key)
		{ 
			if (strpos($p, "field") !== false) {  
				$value = $this->input->post($p); 
				list($remove, $id_kriteria, $kod_jawatan) = explode("_", $p);  
				$d = array(
					"sj_kod_jawatan"	=>	$kod_jawatan,
					"sj_id_kriteria"	=>	$id_kriteria,
					"sj_value"			=>	$value,
					"sj_ptj"			=>  $ptj
				);
				$this->pm->insert_skt_jawatan($d);
			} 
						
		}
	}
	
	public function summary()
	{
		$nokp = $_SESSION['icno'];
		
		$pp = $this->pm->get_all_penilai($nokp);
		$this->page_title = 'PENGESAHAN';
		$array = array(
			"pp"	=>	$pp,
		);
		$this->render($array);
	}
	
	public function submission()
	{
		$nokp = $_SESSION['icno'];
		$skt_tahun = $_SESSION['skt_tahun'];
		
		$array = array(
			"st_nokp"	=>	$nokp,
			"st_tahun"	=>	$skt_tahun,
		);
		$this->pm->insert_skt_tahunan($array);
		
		ajaxAlert('Sasaran Kerja Tahunan Telah Dihantar Untuk Pengesahan');
		ajaxRedirect(base_url()."index.php/sasaran/index_pensyarah");
		ajaxResponse();
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Selenggara extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('selenggara_model', 'sm');
	}

	function setup_workflow($id="")
	{
			$this->load->controller('prestasi');
			$this->load->library('corek1');
			$this->page_title = 'Setup Workflow Pegawai';
			$kriteria = $this->sm->get_all_kriteria();
			$ptj = $this->sm->get_ptj();
			
			
			$data = array (
					 "kriteria" => $kriteria,
					 "ptj" => $ptj
					 
				);	
			$this->render($data);    
	}
	
	function setup_workflow_pop_ppp ()
	{
	
			$this->disable_layout(); 
			$ptj=$_GET['ptj'];
		    $sen_staf=$this->sm->senarai_staf_umt($ptj);
		
			$data = array (
				 "sen_staf" => $sen_staf	 
		    );	
			$this->render($data);  
	}
	
	function setup_workflow_pop_ppk ()
	{
	
			$this->disable_layout(); 
			$ptj=$_GET['ptj'];
		    $sen_staf=$this->sm->senarai_staf_umt($ptj);
			$data = array (
				 "sen_staf" => $sen_staf
		    );	
			$this->render($data);  
	}
	
	function cari_ptj_staf()
	{
			$ptj = $this->input->post("ptj");
			$ptjpilih = $this->sm->get_senarai_staf($ptj);
			
			$data = array ("ptjpilih" => $ptjpilih); 
			 
			$table = $this->load->view('selenggara/senarai_pegawai_dinilai.tpl.php', $data, true);
			ajaxQuery("#senarai_pegawai_dinilai")->html($table);
			ajaxResponse();
	}
	
	function carian_kriteria_pegawai($ptj_y="")
	{
			$this->load->controller('prestasi');
			$this->load->library('corek1');
			$this->page_title = 'Senarai Workflow Pegawai';
			$ptj = $this->sm->get_ptj();
			$ptj_z = $this->sm->get_ptj_pilih($ptj_y);
			$sen_peg_nilai = $this->sm->get_senarai_staf($ptj_y);
			$sen_peg_kriteria = $this->sm->senarai_pegawai_kriteria($ptj_y);
			$data = array ("ptj" => $ptj,
						   "ptj_y" => $ptj_y,
						   "ptj_z" => $ptj_z->row(),
						   "sen_peg_dinilai" => $sen_peg_nilai,
						   "sen_peg_kriteria" => $sen_peg_kriteria
						   );	
			$this->render($data);  	  
	}
	
	function cari_kriteria_penilai()
	{
		$ptj = $this->input->post("ptj");
		$sen_peg_nilai = $this->sm->get_senarai_staf($ptj);
		$sen_peg_kriteria = $this->sm->senarai_pegawai_kriteria($ptj);

		$data = array ("sen_peg_dinilai" => $sen_peg_nilai,
					    "sen_peg_kriteria" => $sen_peg_kriteria);
		$table = $this->load->view('selenggara/senarai_peg_dinilai.tpl.php', $data, true);
		ajaxQuery("#sen_workflow_peg_nilai")->html($table);
		ajaxResponse();
	}
	
	
	function simpan_setup_workflow()
	{
	
		$staf = $this->input->post("staf");
	    $kriteria = $this->input->post("kriteria");
		$nokp_ppp = $this->input->post("nokp_ppp");
	    $nokp_ppk = $this->input->post("nokp_ppk");
		$penilai_sama = $this->input->post("penilai_sama");
		$ptj_y = $this->input->post("ptj");
		
		foreach ($staf as $key => $val)
		{ 
	
		  
		   if ($penilai_sama == 'Y')
		   {
		    $d = array ( 
				"WF_NOKP" => $key,
				"WF_NOKP_PPP" => $nokp_ppp, 
				"WF_NOKP_PPK" => $nokp_ppp, 
				"WF_ID_KRITERIA" => $kriteria);	
			
			$this->sm->save_workflow_peg($d);
			}
		    else 
		    {
			 $d = array ( 
				"WF_NOKP" => $key,
				"WF_NOKP_PPP" => $nokp_ppp, 
				"WF_NOKP_PPK" => $nokp_ppk, 
				"WF_ID_KRITERIA" => $kriteria);	
			
			 $this->sm->save_workflow_peg($d);
		    }
		}
		ajaxAlert("Proses Setup Berjaya.Terima Kasih");
		ajaxRedirect(base_url().'index.php/selenggara/carian_kriteria_pegawai/'.$ptj_y);
		ajaxResponse();
	}
	
}
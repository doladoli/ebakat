<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skt extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('skt_model', 'pm');
	}
	
	public function index()
	{
		$nokp = getic();
		$this->page_title = 'Sasaran Kerja Tahunan';
		
		$kriteria = $this->pm->get_all_kriteria();
		
		$d = array("kriteria"=>$kriteria);
		// $this->load->view("admin/index.tpl.php", $d);
		$this->render($d);
	}
	
	function prestasi($id)
	{
		$sub = $this->pm->get_sub_kriteria($id);
		$array = array(
			"kriteria" => $sub
		);
		$this->render($array);
	}
	
	
	public function cetak($id)
	{
		$this->page_title = 'Maklumat Aduan';
		$us = $this->pm->get_user_by_id($id)->row();
		$d = array("id"=>$us->ID,  "u"=>$us);
		// $this->load->view('admin/cetak.tpl.php', $d);
		
		$this->disable_layout();
		$this->render($d);
	}
	
	
	public function saveskt()
	{
		$nokp = getic();
		$aktiviti = $this->input->post('aktiviti');
		$petunjuk = $this->input->post('petunjuk');
		$sasaran = $this->input->post('sasaran');
		$id_kriteria = $this->input->post('wf_id_kriteria');
		$d = array(
			"SP_ID_KRITERIA"	=>	$id_kriteria,
			"SP_PETUNJUK_PRESTASI"	=>	$petunjuk,
			"SP_SASARAN"		=>	$sasaran,
			"SP_AKTIVITI"		=>	$aktiviti,
			"SP_NOKP"			=>	getic()
		);
		
		$this->pm->insert_skt($d);

		$skt = $this->pm->get_sasaran_tahunan($nokp, $id_kriteria);
		
		// print $success ? $file : 'Unable to save the file.';
		//redirect(base_url()."index.php/admin");
		
		$senarai = $this->load->view("skt/listskt.tpl.php", array("skt"=>$skt), true);
		ajaxQuery("#sp_list_".$id_kriteria." tbody")->empty();
		ajaxQuery("#sp_list_".$id_kriteria." tbody")->html($senarai);
		ajaxEvalScript("$('#myModal').modal('hide')");
		ajaxEvalScript('$("#myForm").get(0).reset()');
		ajaxResponse();
	}
	
	public function submission()
	{
		ajaxAlert("Sasaran kerja telah berjaya dihantar");
		ajaxResponse();
	}
	
	function listsktpengesahan()
	{
		$this->page_title = 'Pengesahan SKT';
		$nokp = getic();
		$d = array(
			"senarai"	=>	$this->pm->get_sasaran_pengesahan($nokp)
		);
		$this->render($d);
	}
	
	public function detailskt($nokp)
	{
		$this->page_title = 'Sasaran Kerja Tahunan';

		$kriteria = $this->pm->get_all_kriteria();
		
		$d = array("kriteria"=>$kriteria);
		// $this->load->view("admin/index.tpl.php", $d);
		$this->render($d);
	}
	
}
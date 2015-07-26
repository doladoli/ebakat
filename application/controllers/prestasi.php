<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prestasi extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('skt_model', 'pm');
	}

	/*
	function index($id="")
	{
		$this->page_title = 'Maklumat Penilaian Prestasi';
		$kriteria = $this->pm->get_all_kriteria();
		if ($id == "") 
		{
			$first = $kriteria->row(); 
			$id = $first->KR_ID;
		}
		
		$sub = $this->pm->get_sub_kriteria($id);
		$array = array(
			"kriteria" => $kriteria,
			"sub"	=> $sub,
			"id"	=>	$id
		);
		$this->render($array);
	} */
	
	function index($id = "")
	{
		$k = $this->pm->get_all_kriteria(); 
		if ($id == "") 
		{ 
			$first = $k->row(); 
			$id = $first->KR_ID;
			redirect(base_url() . "index.php/".$first->KR_URL."/".$id);
		}
	}
	
	function test($id="")
	{
		$this->render();
	}
	
	function index4()
	{
		ajaxResponse();
	}
	
	function box_kriteria($id="")
	{
		$kriteria = $this->pm->get_all_kriteria();
		if ($id == "") 
		{
			$first = $kriteria->row(); 
			$id = $first->KR_ID;
		}
		$array = array(
			"kriteria" => $kriteria,
			"id"	=>	$id
		);
		return $this->load->view("prestasi/box_kriteria.tpl.php", $array, true);
	}
	
	function pointo($id="", $skt=false)
	{
		$k = $this->pm->get_kriteria_by_id($id)->row();
		if ($skt != "1")
			redirect(base_url() . "index.php/".$k->KR_URL."/".$id);
		else
			redirect(base_url() . "index.php/".$k->KR_SKT_DS."/".$id);
	}
}
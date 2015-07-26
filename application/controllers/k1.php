<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class K1 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('skt_model', 'pm');
	}

	function index($id="")
	{
		$this->load->controller('prestasi');
		$this->load->library('corek1');
		$box = $this->prestasi->box_kriteria();
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
			"id"	=>	$id, 
			"dd_k"	=>	$box
		);
		$this->render($array);
	}
}
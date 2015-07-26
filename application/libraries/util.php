<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Util 
{	
	public function dropdown_number($name, $id, $selected = "") //Kursus baharu atau kursus lama
	{
		$str = '
		<select name="'.$name.'" id="'.$id.'">
			<option value="null"></option> ';
		
		for($i=0; $i <= 40; $i++) {		
			$str_selected = ($selected == $i) ? "selected" : "";
			$str .= '<option value="'.$i.'" '.$str_selected.'>'.$i.'</option>';
		}	
		$str .= '</select>';
		return $str;
	}

	public function box_kriteria($id="", $url="")
	{
		$ci =& get_instance();
		$ci->load->model('skt_model', 'pm');
		$kriteria = $ci->pm->get_all_kriteria();
		if ($id == "") 
		{
			$first = $kriteria->row(); 
			$id = $first->KR_ID;
		}
		$array = array(
			"kriteria" => $kriteria,
			"id"	=>	$id,
			"url"	=>	$url,
			"skt"	=>	true,
			
		);
		return $ci->load->view("prestasi/box_kriteria.tpl.php", $array, true);
	}
	
	public function box_ptj($id="", $role="")
	{
		$nokp = $_SESSION['icno'];
		$ci =& get_instance();
		$ci->load->model('skt_model', 'pm');
		$kriteria = ($role == "") ? $ci->pm->get_all_ptj() : $ci->pm->get_all_ptj_by_role($nokp, $role);
		if ($id == "") 
		{
			$first = $kriteria->row(); 
			$id = $first->PTJ_KOD;
		}
		$array = array(
			"kriteria" => $kriteria,
			"id"	=>	$id,
			"skt"	=>	true,
			"role"	=>	$role
		);
		return $ci->load->view("prestasi/box_ptj.tpl.php", $array, true);
	}
}
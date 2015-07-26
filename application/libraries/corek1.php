<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Corek1 
{
	function dropdown_num()
	{
		$str = '
		<select name="hm">
			<option value=""> - Sila pilih - </option>';
		for($i=1; $i<=10;$i++)
			$str.= '<option value="'.$i.'">'.$i.'</option>';
			
		$str .='</select>';
		
		return $str;
	}
	
	function read_from_rms_item_one()
	{
		$CI = & get_instance();
		$CI->load->model("skt_model");
		
		$bil = $CI->skt_model->get_bilangan_subjek('991919191');
		return $bil;
	}
	
	function dropdown_statuskursus() //Kursus baharu atau kursus lama
	{
		$str = '
		<select name="s_kursus">
			<option value=""> - Sila pilih - </option>
			<option value="B">Baharu</option>
			<option value="L">Lama</option>
		</select>';
		
		return $str;
	}
	
	function dropdown_pelajarlemah() //Penglibatan dalam projek peningkatan pelajar lemah
	{
		$str = '
		<select name="p_lemah">
			<option value=""> - Sila pilih - </option>
			<option value="1">Ada</option>
			<option value="0">Tiada</option>
		</select>';
		
		return $str;
	}
}
?>
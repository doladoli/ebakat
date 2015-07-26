<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jana extends CI_Controller {

	function index()
	{
		$this->load->library("ushift");
		$this->load->library("unormal");
		
		$arr = array (
			array("MULA"=> 1425160800 ,"TAMAT"=> 1425164520, "CUTI"=>false),
			array("MULA"=> 1425192180 ,"TAMAT"=> 1425221940, "CUTI"=>false),
			array("MULA"=> 1425452460 ,"TAMAT"=> 1425481260, "CUTI"=>false),
			array("MULA"=> 1425531600 ,"TAMAT"=> 1425539100, "CUTI"=>false),
			array("MULA"=> 1425653340 ,"TAMAT"=> 1425682800, "CUTI"=>true),
		);

		$arr = array (
			//real data
			// array("MULA"=>"01-03-2015-06-00", "TAMAT"=>"01-03-2015-07-02", "CUTI"=>false),
			 array("MULA"=>"01-03-2015-14-43", "TAMAT"=>"01-03-2015-22-59", "CUTI"=>false),
			array("MULA"=>"04-03-2015-15-01", "TAMAT"=>"04-03-2015-23-01", "CUTI"=>true),
			// array("MULA"=>"05-03-2015-13-00", "TAMAT"=>"05-03-2015-15-05", "CUTI"=>false),
			array("MULA"=>"06-03-2015-22-49", "TAMAT"=>"07-03-2015-07-00", "CUTI"=>false),
			
			//test data
			array("MULA"=>"06-03-2015-15-49", "TAMAT"=>"06-03-2015-22-30", "CUTI"=>false),
			array("MULA"=>"14-03-2015-23-00", "TAMAT"=>"15-03-2015-07-00", "CUTI"=>false),
			array("MULA"=>"18-03-2015-10-00", "TAMAT"=>"18-03-2015-23-59", "CUTI"=>false),
		);



		$offdays = array ( 
			'sh' => 1, 
			'off' => array(
				'0403-2015',
				'0603-2015',
				'1303-2015',
				'2003-2015', 
				'2703-2015'
			) 
		);


		$i = 0;
		$tr = "";
		foreach($arr as $a)
		{	
			
			$mula = $this->__dmk($a["MULA"]); 
			$tamat = $this->__dmk($a["TAMAT"]); 
			$iscuti = $a["CUTI"];
			
			//echo 'array("MULA"=>"'.date("d-m-Y-H-i", $mula).'", "TAMAT"=>"'.date("d-m-Y-H-i", $tamat).'", "CUTI"=>false)<br>';
			
			
			
			
			$tr .= "<tr class='list'><td>".++$i."</td><td>".date('d/m/Y D H:i', $mula)."</td><td>".date('d/m/Y D H:i', $tamat )."</td>";
					
			$hari = mktime (0,0,0,date ('m',$mula), date ('d',$mula), date ('Y',$mula));
			
			// $column = $this->unormal->jana_column ($mula, $tamat, $iscuti, $offdays); 			
			// $tr .= $this->unormal->get_td_column ($column);
			
			$column = $this->ushift->jana_column ($mula, $tamat, $iscuti, $offdays); 			
			$tr .= $this->ushift->get_td_column ($column);
			
			$tr . "</tr>";
			

			
			++$i;
		}
		$toview = array("tr"=>$tr);
		$this->load->view('vjana', $toview);
	}
	
	function __dmk($date)
	{
		list($hari, $bulan, $tahun, $jam, $minit) = explode("-", $date);
		return mktime($jam, $minit, 0, $bulan, $hari, $tahun);
	}
}
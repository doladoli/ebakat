<?php
function getColumns($mula, $tamat)
{ 
	$inc = 0;
	$i = $mula;
	$period = array();
	while ($i <= $tamat)
	{	
		$d = date ('d',$i);
		$m = date ('m',$i);
		$y = date ('Y',$i);

		$mula_siang = mktime(6,0,0,$m, $d, $y);
		$tamat_siang = $mula_siang + 57600; 

		$mula_malam = mktime(22,0,0,$m, $d, $y);
		$tamat_malam = $mula_malam + 28800; 

		if (strlen(date("Gi", $i)) == 3)
		{
			$mula_malam -= 86400;
			$tamat_malam = $mula_malam + 28800;
		}

		//		echo "mula siang= ".date("D d/M/Y H:i",$mula_siang)." tamat = ".date("D d/M/Y H:i",$tamat_siang )."<br>";

		if (($i >= $mula_siang) && ($i < $tamat_siang))
		{
			if ($i > $mula_siang) $m = $i; else $m=$mula_siang;

			//if ($i < $tamat_siang) $t = $i; else $t = $tamat_siang;
			if ($tamat_siang <= $tamat) $t = $tamat_siang; else $t=$tamat;

			$period[$inc]["mula"] = $m;
			$period[$inc]["tamat"] = $t;
			$i = $tamat_siang;

			$inc++;
			continue;
		}
		//		echo date("D d/M/Y H:i",$i);
		//		echo " mula malam = ".date("D d/M/Y H:i",$mula_malam)." tamat = ".date("D d/M/Y H:i",$tamat_malam )."<br>";
		if (($i >= $mula_malam) && ($i < $tamat_malam))
		{
			if ($i> $mula_malam) $m = $i; else $m = $mula_malam;

			if ($tamat_malam <= $tamat) $t = $tamat_malam; else	$t=$tamat;

			$period[$inc]["mula"] = $m;
			$period[$inc]["tamat"] = $t;
			$i=$tamat_malam;

			$inc++;
			continue;
		}
		
	}
	
	return $period; 
}

function timeDifference($startTime, $endTime = false)
{
	$endTime = $endTime ? $endTime : time();

	if ($endTime > $startTime)
	{
		$diffA = $endTime - $startTime;

		$hours = floor($diffA/3600);
		$diffA = $diffA % 3600;

		$minutes = floor($diffA/60);
		$diffA = $diffA % 60;

		$masa["jam"] =  str_pad($hours, 2, '0', STR_PAD_LEFT);
		$masa["minit"] =  str_pad($minutes, 2, '0', STR_PAD_LEFT);
		return $masa;
		//$seconds = $diff;

		//return str_pad($hours, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutes, 2, '0', STR_PAD_LEFT) . ':' . str_pad($seconds, 2, '0', STR_PAD_LEFT);
		//return str_pad($hours, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutes, 2, '0', STR_PAD_LEFT) ;
	}
	else
	{
		return 'Error: Start time should be less than end time!';
	}
}

function checkColumnSatu($mula, $tamat, $iscuti)
{
	$isWeekend = false;
	$isNotWeekend = false;
	
	if ($mula == $tamat) return;

	$col = checkKerjaSiang($mula, $tamat);

	if ($iscuti) return;

	$hari_col = date('D',$col["mula_siang"]);

	if (($hari_col <> "Fri") && ($hari_col <> "Sat"))
	{
		$isNotWeekend = true;
	}

	if ($isNotWeekend)
	{
				// if ($col) {
					// echo "<br>Mula Kerja Siang = ".date("d/M/Y H:i",$col["mula"]);
					// echo "<br>Tamat Kerja Siang = ".date("d/M/Y H:i",$col["tamat"]);
					// echo "<br>Jumlah Jam Col 1= ".$col["tempoh"]["jam"] . " j ".$col["tempoh"]["minit"]." m <br><br>";
				// }

		$jumcol1 = $col["tempoh"];
		return getRightJamMinit($jumcol1);
	}

	return false;

}

function checkColumnDua($mula, $tamat, $iscuti)
{
	$isWeekend = false;
	$isNotWeekend = false;
	$jumcol2 = array("jam"=> 0, "minit"=>0);
	
	if ($mula == $tamat) return;

	$colmalam = checkKerjaMalam($mula, $tamat);

	if ($iscuti) return;

	$hari_colmalam = date('D',$colmalam["mula_malam"]);

	if (($hari_colmalam <> "Fri") && ($hari_colmalam <> "Sat"))
	{
		$isNotWeekend = true;
	}

	if ($isNotWeekend) {

		if (is_array($colmalam)){ 
			//			echo "<BR>Mula Kerja Malam = ".date("D d/M/Y H:i",$colmalam["mula"]);
			//			echo "<BR>Tamat Kerja Malam = ".date("D d/M/Y H:i",$colmalam["tamat"]);
			//			echo "<br>Jumlah Jam Col 2= ".$colmalam["tempoh"]["jam"] . " j ".$colmalam["tempoh"]["minit"]." m <br><br>";
			$jumcol2 =  $colmalam["tempoh"]; 

		}
	}

	$colsiang = checkKerjaSiang($mula, $tamat);
	if ($iscuti) return;
	$hari_colsiang = date('D',$colsiang["mula_siang"]);
	
	
	if (($hari_colsiang == "Fri") || ($hari_colsiang == "Sat"))
	{
		$isWeekend = true;
	}

	
	if ($isWeekend) { 
		if (is_array($colsiang)){
			//			echo "<BR>Mula Kerja Siang Col 2 = ".date("D d/M/Y H:i",$colsiang["mula"]);
			//			echo "<BR>Tamat Kerja Siang Col 2 = ".date("D d/M/Y H:i",$colsiang["tamat"]);
			//			echo "<br>Jumlah Jam Col 2= ".$colsiang["tempoh"]["jam"] . " j ".$colsiang["tempoh"]["minit"]." m <br><br>";
			$jumcol2["jam"] += intval($colsiang["tempoh"]["jam"]); 
			$jumcol2["minit"] += intval($colsiang["tempoh"]["minit"]);
		}
	}

	if(is_array($jumcol2))
	{
		$jumcol2 = getRightJamMinit($jumcol2); 
		return $jumcol2;

	}

	return false;

}

function checkColumnTiga($mula, $tamat, $iscuti)
{
	$isWeekend = false;
	
	if ($iscuti) return;
	$colmalam = checkKerjaMalam($mula, $tamat);

	$hari_colmalam = date('D',$colmalam["mula_malam"]);

	if (($hari_colmalam == "Fri") || ($hari_colmalam == "Sat"))
	{
		$isWeekend = true;
	}

	if ($isWeekend) {

		if (is_array($colmalam)){
			//			echo "<BR>Mula Kerja Malam = ".date("D d/M/Y H:i",$colmalam["mula"]);
			//			echo "<BR>Tamat Kerja Malam = ".date("D d/M/Y H:i",$colmalam["tamat"]);
			//			echo "<br>Jumlah Jam Col 3= ".$colmalam["tempoh"]["jam"] . " j ".$colmalam["tempoh"]["minit"]." m <br><br>";
			$jumcol3 = $colmalam["tempoh"];
			return getRightJamMinit($jumcol3);
		}
	}

	return false;
}

function checkColumnEmpat($mula, $tamat, $iscuti)
{

	$col4 = checkKerjaSiang($mula, $tamat);

	if ($iscuti)
	{
		if (is_array($col4)){
			//			echo "<BR>Mula Kerja Siang Col 4 = ".date("d/M/Y H:i",$col4["mula"]);
			//			echo "<BR>Tamat Kerja Siang Col 4 = ".date("d/M/Y H:i",$col4["tamat"]);
			//			echo "<br>Jumlah Jam Col 4= ".$col4["tempoh"]["jam"] . " j ".$col4["tempoh"]["minit"]." m <br><br>";

			$jumcol4 = $col4["tempoh"];
			return getRightJamMinit($jumcol4);
		}
	}

	return false;
}

function checkColumnLima($mula, $tamat, $iscuti)
{
	$col5 = checkKerjaMalam($mula, $tamat);

	if ($iscuti)
	{
		if (is_array($col5)){
			//			echo "<BR>Mula Kerja Malam = ".date("d/M/Y H:i",$col5["mula"]);
			//			echo "<BR>Tamat Kerja Malam = ".date("d/M/Y H:i",$col5["tamat"]);
			//			echo "<br>Jumlah Jam Col 5= ".$col5["tempoh"]["jam"] . " j ".$col5["tempoh"]["minit"]." m <br><br>";
			$jumcol4 = $col5["tempoh"];
			return getRightJamMinit($jumcol4);
		}
	}
	return false;

}

function checkKerjaSiang($mula, $tamat)
{
	$hari_mula_d = date ('d',$mula);
	$hari_mula_m = date ('m',$mula);
	$hari_mula_y = date ('Y',$mula);
	$hari_mula_jamminit = date ('Gi',$mula);

	$hari_tamat_d = date ('d',$tamat);
	$hari_tamat_m = date ('m',$tamat);
	$hari_tamat_y = date ('Y',$tamat);
	$hari_tamat_jamminit = date ('Gi',$tamat);

	$mula_siang = mktime (6,00,0, $hari_mula_m, $hari_mula_d, $hari_mula_y);
	$tamat_siang = mktime (22,00,0,$hari_mula_m, $hari_mula_d, $hari_mula_y);

	//	$mula_siang = mktime (6,00,0, $hari_tamat_m, $hari_tamat_d, $hari_tamat_y);
	//	$tamat_siang = mula_siang + 57600;

	//tamat lepas pukul 12 malam
	//	if ((strlen($hari_tamat_jamminit) == 3) && (strlen($hari_mula_jamminit) == 4))
	//	{
	//		//		$mula_siang = mktime (6,00,0, $hari_mula_m, $hari_mula_d, $hari_mula_y);
	//		//		$tamat_siang = mktime (22,00,0, $hari_mula_m, $hari_mula_d, $hari_mula_y);
	//		$mula_siang = mktime (6,00,0, $hari_tamat_m, $hari_tamat_d, $hari_tamat_y);
	//		$tamat_siang = mktime (22,00,0,$hari_tamat_m, $hari_tamat_d, $hari_tamat_y);
	//	}

	//if tamat selepas masuk keje malam lepas kul 10 malam
	//	if ($tamat > $tamat_siang)
	//	{
	//		$tamat = $tamat_siang;
	//	}
	//
	//	//if mula sebelum masuk waktu kerja siang sebelum kul 6 pagi
	//	if ($mula < $mula_siang)
	//	{
	//		$mula = $mula_siang;
	//	}



	/*
	if masuk mula malam dan tamat siang
	*/

	/*
	* if start pukul 6 pg hingga 10 malam
	*/

	if ($mula == $tamat) return;

	//		echo "mula siang ($mula_siang) ".date("d/M/Y H:i",$mula_siang)." vs tamat siang ($tamat_siang) ".date("d/M/Y H:i",$tamat_siang);

	if (($mula >= $mula_siang) && ($mula <= $tamat_siang))
	{

		if (($tamat >= $mula_siang) && ($tamat <= $tamat_siang))
		{
			$kerja_siang["mula"] = $mula;
			$kerja_siang["tamat"] = $tamat;

			$kerja_siang["mula_siang"] = $mula_siang;
			$kerja_siang["tamat_siang"] = $tamat_siang;

			//echo "Tamat Kerja Siang = ".date("d/M/Y H:i",$tamat);
			$dif = timeDifference($mula, $tamat);

			$kerja_siang["tempoh"] = $dif;
			return $kerja_siang;
			//echo "<br>Jumlah kerja siang = ".$dif["jam"] . " j ".$dif["minit"]." m";
		}

	}
	return false;
}

function checkKerjaMalam($mula, $tamat)
{
	$hari_mula_d = date ('d',$mula);
	$hari_mula_m = date ('m',$mula);
	$hari_mula_y = date ('Y',$mula);

	$hari_tamat_d = date ('d',$tamat);
	$hari_tamat_m = date ('m',$tamat);
	$hari_tamat_y = date ('Y',$tamat);

	$minit_mula = date("Gi", $mula);
	$minit_tamat = date("Gi", $tamat);

	$mula_malam = mktime (22,00,0,$hari_mula_m, $hari_mula_d, $hari_mula_y);
	$tamat_malam = (3600*8) + $mula_malam;

	if ((strlen($minit_mula) == 3) && ($minit_mula < 600))
	{
		$day_previous = mktime (0,0,0, $hari_mula_m, $hari_mula_d, $hari_mula_y) - 86400;
		$day_previous_d = date ('d',$day_previous);
		$day_previous_m = date ('m',$day_previous);
		$day_previous_y = date ('Y',$day_previous);
		$mula_malam = mktime (22,00,0,$day_previous_m, $day_previous_d, $day_previous_y);
		$tamat_malam = mktime (6,00,0,$hari_mula_m, $hari_mula_d, $hari_mula_y);
	}

	//	if (($mula < $mula_malam) && (($tamat >= $mula_malam) && ($tamat <= $tamat_malam)))
	//	{
	//		$mula = $mula_malam;
	//	}
	//
	//	if (($mula < $mula_malam) && ($tamat > $tamat_malam))
	//	{
	//		$mula = $mula_malam;
	//		$tamat = $tamat_malam;
	//	}



	//	echo "mula malam ($mula_malam) ".date("d/M/Y H:i",$mula_malam)." vs tamat malam ($tamat_malam) ".date("d/M/Y H:i",$tamat_malam);
	if ($mula == $tamat) return;

	if (($mula >= $mula_malam) && ($mula <= $tamat_malam))
	{
		if ($tamat < $tamat_malam)
		{
			$tamat_kerja_malam = $tamat;
		}
		else
		{
			$tamat_kerja_malam = $tamat_malam;
		}

		$kerja_malam["mula_malam"] = $mula_malam;
		$kerja_malam["tamat_malam"] = $tamat_malam;

		$kerja_malam["mula"] = $mula;
		$kerja_malam["tamat"] = $tamat_kerja_malam;

		//echo "<br>Tamat Kerja malam = ".date("d/M/Y H:i",$tamat);
		$dif = timeDifference($mula, $tamat_kerja_malam);

		$kerja_malam["tempoh"] = $dif;
		return $kerja_malam;
		//echo "<br>Jumlah kerja malam = ".$dif["jam"] . " j ".$dif["minit"]." m";
	}
	elseif (($mula < $mula_malam) && (($tamat >= $mula_malam) && ($tamat <= $tamat_malam)))
	{

	}


	return false;
}

function checkCuti($tkh)
{

	$hari_mula_d = date ('d',$tkh);
	$hari_mula_m = date ('m',$tkh);
	$hari_mula_y = date ('Y',$tkh);

	$hari = mktime (0,0,0,$hari_mula_m, $hari_mula_d, $hari_mula_y);

	$cuti = array (mktime(0,0,0,5,12,2009), mktime(0,0,0,6,20,2009));


	foreach ($cuti as $c => $v)
	{
		if ($v == $hari) return true;
	}

	return false;
}

function getRightJamMinit($masa)
{
	if ($masa <= 60) return $masa;

	$minit_jam = $masa["jam"] * 60;
	$jum_minit = $minit_jam + $masa["minit"];

	$new_jam = floor($jum_minit / 60);
	$new_minit = $jum_minit - ($new_jam * 60);

	$new_jam = str_pad($new_jam, 2, '0', STR_PAD_LEFT);
	$new_minit = str_pad($new_minit, 2, '0', STR_PAD_LEFT);

	$masa_betul["jam"] = $new_jam;
	$masa_betul["minit"] = $new_minit;


	return $masa_betul;

}

function getRowColumn($mula, $tamat, $gaji)
{
	$obj = new ApplyOT();
	$period = getColumns($mula, $tamat);
	
	$column = array();

	unset($column1);
	unset($column2);
	unset($column3);
	unset($column4);
	unset($column5);

	foreach ($period as $p)
	{
		$hari_mula_d = date ('d',$p["mula"]);
		$hari_mula_m = date ('m',$p["mula"]);
		$hari_mula_y = date ('Y',$p["mula"]);

		$hari = mktime (0,0,0,$hari_mula_m, $hari_mula_d, $hari_mula_y);

		$iscuti = $obj->checkCuti($hari);

		$col1 = checkColumnSatu($p["mula"], $p["tamat"], $iscuti);
		if (is_array($col1))
		{
			$isCol1 = true;
			$column1["jam"] += $col1["jam"];
			$column1["minit"] += $col1["minit"];

			$column["satu"] = $column1;

		}

		$col2 = checkColumnDua($p["mula"], $p["tamat"], $iscuti);
		if (is_array($col2))
		{
			$isCol2 = true;
			$column2["jam"] += $col2["jam"];
			$column2["minit"]  += $col2["minit"];

			$column["dua"] = $column2;
		}

		$col3 = checkColumnTiga($p["mula"], $p["tamat"], $iscuti);
		if (is_array($col3))
		{
			$isCol3 = true;
			$column3["jam"] += $col3["jam"];
			$column3["minit"]  += $col3["minit"];

			$column["tiga"] = $column3;
		}

		$col4 = checkColumnEmpat($p["mula"], $p["tamat"], $iscuti);
		if (is_array($col4))
		{
			$isCol4 = true;
			$column4["jam"] += $col4["jam"];
			$column4["minit"]  += $col4["minit"];

			$column["empat"] = $column4;
		}

		$col5 = checkColumnLima($p["mula"], $p["tamat"], $iscuti);
		if (is_array($col5))
		{
			$isCol5 = true;
			$column5["jam"] += $col5["jam"];
			$column5["minit"]  += $col5["minit"];

			$column["lima"] = $column5;
		}
	}
	
	$column1 = getRightJamMinit($column1);
	$Jum_Jam_Column1 += $column1["jam"];
	$Jum_Min_Column1 += $column1["minit"];

	$column2 = getRightJamMinit($column2);
	$Jum_Jam_Column2 += $column2["jam"];
	$Jum_Min_Column2 += $column2["minit"];

	$column3 = getRightJamMinit($column3);
	$Jum_Jam_Column3 += $column3["jam"];
	$Jum_Min_Column3 += $column3["minit"];

	$column4 = getRightJamMinit($column4);
	$Jum_Jam_Column4 += $column4["jam"];
	$Jum_Min_Column4 += $column4["minit"];

	$column5 = getRightJamMinit($column5);
	$Jum_Jam_Column5 += $column5["jam"];
	$Jum_Min_Column5 += $column5["minit"];

	$masa_col1["jam"] =  $Jum_Jam_Column1;
	$masa_col1["minit"] =  $Jum_Min_Column1;
	$jumcol1 = getRightJamMinit($masa_col1);
	$kadar_perjam_C1 = $gaji * 12 * 1.125 / 313 / 8;
	$jum_dapat_C1 = $kadar_perjam_C1 * $jumcol1["jam"] + $kadar_perjam_C1 * $jumcol1["minit"] / 60;

	$masa_col2["jam"] =  $Jum_Jam_Column2;
	$masa_col2["minit"] =  $Jum_Min_Column2;
	$jumcol2 = getRightJamMinit($masa_col2);
	$kadar_perjam_C2 = $gaji * 12 * 1.25 / 313 / 8;
	$jum_dapat_C2 = $kadar_perjam_C2 * $jumcol2["jam"] + $kadar_perjam_C2 * $jumcol2["minit"] / 60;

	$masa_col3["jam"] =  $Jum_Jam_Column3;
	$masa_col3["minit"] =  $Jum_Min_Column3;
	$jumcol3 = getRightJamMinit($masa_col3);
	$kadar_perjam_C3 = $gaji * 12 * 1.50 / 313 / 8;
	$jum_dapat_C3 = $kadar_perjam_C3* $jumcol3["jam"] + $kadar_perjam_C3 * $jumcol3["minit"] / 60;

	$masa_col4["jam"] =  $Jum_Jam_Column4;
	$masa_col4["minit"] =  $Jum_Min_Column4;
	$jumcol4 = getRightJamMinit($masa_col4);
	$kadar_perjam_C4 = $gaji * 12 * 1.75 / 313 / 8;
	$jum_dapat_C4 = $kadar_perjam_C4 * $jumcol4["jam"] + $kadar_perjam_C4 * $jumcol4["minit"] / 60;

	$masa_col5["jam"] =  $Jum_Jam_Column5;
	$masa_col5["minit"] =  $Jum_Min_Column5;
	$jumcol5 = getRightJamMinit($masa_col5);
	$kadar_perjam_C5 = $gaji * 12 * 2.00 / 313 / 8;
	$jum_dapat_C5 = $kadar_perjam_C5 * $jumcol5["jam"] + $kadar_perjam_C5 * $jumcol5["minit"] / 60;

	$jum = $jum_dapat_C1 + $jum_dapat_C2 + $jum_dapat_C3 + $jum_dapat_C4 + $jum_dapat_C5;
//		$jum_all_p = number_format($jum, 2, '.', '');

	return $jum;
}

function jana_column ($mula, $tamat, $iscuti)
{
	$period = getColumns($mula, $tamat);
			
	unset($column1);
	unset($column2);
	unset($column3);
	unset($column4);
	unset($column5);
	
	$column1 = array("jam" => "", "minit" => "");
	$column2 = array("jam" => "", "minit" => "");
	$column3 = array("jam" => "", "minit" => "");
	$column4 = array("jam" => "", "minit" => "");
	$column5 = array("jam" => "", "minit" => "");
	
	$isCol1 = false;
	$isCol2 = false;
	$isCol3 = false;
	$isCol4 = false;
	$isCol5 = false;
	
	$Jum_Jam_Column1 = 0; $Jum_Min_Column1 = 0; 
	$Jum_Jam_Column2 = 0; $Jum_Min_Column2 = 0;
	$Jum_Jam_Column3 = 0; $Jum_Min_Column3 = 0;
	$Jum_Jam_Column4 = 0; $Jum_Min_Column4 = 0;
	$Jum_Jam_Column5 = 0; $Jum_Min_Column5 = 0;
	
	foreach ($period as $p)
	{
		$hari_mula_d = date ('d',$p["mula"]);
		$hari_mula_m = date ('m',$p["mula"]);
		$hari_mula_y = date ('Y',$p["mula"]);

		$hari = mktime (0,0,0,$hari_mula_m, $hari_mula_d, $hari_mula_y);
		
		$col1 = checkColumnSatu($p["mula"], $p["tamat"], $iscuti);
		
		if (is_array($col1))
		{
			$isCol1 = true;
			$column1["jam"] += $col1["jam"];
			$column1["minit"] += $col1["minit"];

		}
		
		$col2 = checkColumnDua($p["mula"], $p["tamat"], $iscuti); 
		if (is_array($col2))
		{
			$isCol2 = true;
			$column2["jam"] += $col2["jam"];
			$column2["minit"]  += $col2["minit"];
		}
		
		$col3 = checkColumnTiga($p["mula"], $p["tamat"], $iscuti);
		if (is_array($col3))
		{
			$isCol3 = true;
			$column3["jam"] += $col3["jam"];
			$column3["minit"]  += $col3["minit"];
		}

		$col4 = checkColumnEmpat($p["mula"], $p["tamat"], $iscuti);
		if (is_array($col4))
		{
			$isCol4 = true;
			$column4["jam"] += $col4["jam"];
			$column4["minit"]  += $col4["minit"];
		}

		$col5 = checkColumnLima($p["mula"], $p["tamat"], $iscuti);
		if (is_array($col5))
		{
			$isCol5 = true;
			$column5["jam"] += $col5["jam"];
			$column5["minit"]  += $col5["minit"];
		}
	}
	

	$column1 = getRightJamMinit($column1);
	$Jum_Jam_Column1 += $column1["jam"];
	$Jum_Min_Column1 += $column1["minit"];

	$column2 = getRightJamMinit($column2);
	$Jum_Jam_Column2 += $column2["jam"];
	$Jum_Min_Column2 += $column2["minit"];

	$column3 = getRightJamMinit($column3);
	$Jum_Jam_Column3 += $column3["jam"];
	$Jum_Min_Column3 += $column3["minit"];

	$column4 = getRightJamMinit($column4);
	$Jum_Jam_Column4 += $column4["jam"];
	$Jum_Min_Column4 += $column4["minit"];

	$column5 = getRightJamMinit($column5);
	$Jum_Jam_Column5 += $column5["jam"];
	$Jum_Min_Column5 += $column5["minit"];
	
	$cols = array(
		"isCol1" => $isCol1,
		"isCol2" => $isCol2,
		"isCol3" => $isCol3,
		"isCol4" => $isCol4,
		"isCol5" => $isCol5,
		"column1" => $column1,
		"column2" => $column2,
		"column3" => $column3,
		"column4" => $column4,
		"column5" => $column5
	);
	
	return $cols;
}

function get_td_column ($column)
{
	extract ($column);

	$tr = "";	
	$tr .= check_zero ($column1);
	$tr .= check_zero ($column2);
	$tr .= check_zero ($column3);
	$tr .= check_zero ($column4);
	$tr .= check_zero ($column5);
	
	return $tr;
}

function check_zero ($column1)
{
	$tr = "";
	if (($column1["jam"]=="00") && ($column1["minit"]== "00") )
//			$tr .= "<td align='center'>".$column1["jam"]." J ".$column1["minit"]." M </td>";
		$tr .= "<td>&nbsp;</td>";
	else 
		//$tr .= "<td>&nbsp;</td>";
		$tr .= "<td align='center'>".$column1["jam"]." J ".$column1["minit"]." M </td>";
	
	return $tr;
}

function get_total_column ($total, $column)
{
	$total["jam"] += $column["jam"];
	$total["minit"] += $column["minit"];
	
	return $total;
}

function get_kadar ($gaji)
{
	$kadar_perjam_C1 = $gaji * 12 * 1.125 / 313 / 8;
	$kadar_perjam_C2 = $gaji * 12 * 1.25 / 313 / 8;
	$kadar_perjam_C3 = $gaji * 12 * 1.50 / 313 / 8;
	$kadar_perjam_C4 = $gaji * 12 * 1.75 / 313 / 8;
	$kadar_perjam_C5 = $gaji * 12 * 2.00 / 313 / 8;
	
	return array(
		"kadar_c1"	=>	$kadar_perjam_C1,
		"kadar_c2"	=>	$kadar_perjam_C2,
		"kadar_c3"	=>	$kadar_perjam_C3,
		"kadar_c4"	=>	$kadar_perjam_C4,
		"kadar_c5"	=>	$kadar_perjam_C5
	);
}

function kira_jumlah ($kadar, $jum)
{
	extract ($jum);
	extract ($kadar);
	$j_C1 = $kadar_c1 * $total_col1["jam"] + $kadar_c1 * $total_col1["minit"] / 60;
	$j_C2 = $kadar_c2 * $total_col2["jam"] + $kadar_c2 * $total_col2["minit"] / 60;
	$j_C3 = $kadar_c3 * $total_col3["jam"] + $kadar_c3 * $total_col3["minit"] / 60;
	$j_C4 = $kadar_c4 * $total_col4["jam"] + $kadar_c4 * $total_col4["minit"] / 60;
	$j_C5 = $kadar_c5 * $total_col5["jam"] + $kadar_c5 * $total_col5["minit"] / 60;
	
	$total = $j_C1 + $j_C2 + $j_C3 + $j_C4 + $j_C5;
	
	return array(
		"jum_c1"	=>	$j_C1, 
		"jum_c2"	=>	$j_C2, 
		"jum_c3"	=>	$j_C3, 
		"jum_c4"	=>	$j_C4, 
		"jum_c5"	=>	$j_C5,
		"total"		=>	$total
	);
}
?>

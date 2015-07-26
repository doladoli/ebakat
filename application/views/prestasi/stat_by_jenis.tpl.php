<?php
// This is a simple example on how to draw a chart using FusionCharts and PHP.
// We have included includes/fusioncharts.php, which contains functions
// to help us easily embed the charts.
	include(APPPATH."libraries/fusioncharts.php");
?>
<script type="text/javascript" src="<?=base_url()?>asset/fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/fusioncharts/js/themes/fusioncharts.theme.zune.js"></script>
<?php
	 // Create the chart - Column 2D Chart with data given in constructor parameter
	 // Syntax for the constructor - new FusionCharts("type of chart", "unique chart id", "width of chart", "height of chart", "div id to render the chart", "type of data", "actual data")
	 
	 // First we declare chart attributes
	$arrData = array(
		"chart" => array(
			"caption" => "Statistik Aduan Mengikut Kategori Masalah",
			"subCaption" => "Keseluruhan",
			"paletteColors" => "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
			"bgColor" => "#ffffff",
			"showBorder" => "0",
			"use3DLighting" => "0",
			"showShadow" => "0",
			"enableSmartLabels" => "0",
			"startingAngle" => "0",
			"showPercentValues" => "0",
			"showPercentInTooltip" => "0",
			"decimals" => "1",
			"captionFontSize" => "14",
			"subcaptionFontSize" => "14",
			"subcaptionFontBold" => "0",
			"toolTipColor" => "#ffffff",
			"toolTipBorderThickness" => "0",
			"toolTipBgColor" => "#000000",
			"toolTipBgAlpha" => "80",
			"toolTipBorderRadius" => "2",
			"toolTipPadding" => "5",
			"showHoverEffect" => "1",
			"showLegend" => "1",
			"legendBgColor" => "#ffffff",
			"legendBorderAlpha" => "0",
			"legendShadow" => "0",
			"legendItemFontSize" => "10",
			"legendItemFontColor" => "#666666",
			"useDataPlotColorForLabels" => "1"
		)
	);

	// Our actual data can be in key-value form
	// $actualData = array(
		// "Teenage" => 1250400,
		// "Adult" => 1463300,
		// "Mid-age" => 1050700,
		// "Senior" => 491000
	// );
	
	foreach ($rs->result() as $u)
	{
		$actualData[$u->KETERANGAN] =  $u->BIL;
	}

	// Now we need to convert it to FusionCharts consumable form.
	// Our data will be an array. So, let's declare it.
	$arrData['data'] = array();

	// Loop over actual data and insert it in data array.
	foreach ($actualData as $key => $value) {
		array_push($arrData['data'], array(
				'label' => $key,
				'value' => $value
			)
		);
	}

	// JSON Encode the arrData
	$jsonEncodedData = json_encode($arrData);

	// Create pieChart object
	$pieChart = new FusionCharts("doughnut3d", "myFirstChart" , 900, 500, "chart-1", "json", $jsonEncodedData);

	// Render the chart
	$pieChart->render();
?>
<div id="chart-1"><!-- Fusion Charts will render here--></div>
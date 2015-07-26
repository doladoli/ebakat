<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'pm');
	}
	
	public function index()
	{
		$users = $this->pm->get_all_users();
		
		$d = array("users"=>$users);
		$this->load->view("admin/index.tpl.php", $d);
		// $this->render($d);
	}
	
	public function preview($id)
	{
		$us = $this->pm->get_user_by_id($id)->row();
		$d = array("id"=>$id, "u"=>$us);
		// $this->load->view('photo/preview', $d);
		$this->render($d);
	}
	
	public function muatnaik($id)
	{
		$us = $this->pm->get_user_by_id($id)->row();
		$d = array("id"=>$us->ID,  "u"=>$us);
		$this->load->view('admin/muatnaik.tpl.php', $d);
		//$this->render($d);
	}
	
	public function uploader($id)
	{
		$us = $this->pm->get_user_by_id($id)->row();
		$d = array("nom_id"=>$us->t01_nom_id);
		$this->load->view('photo/uploader', $d);
	}
	
	public function savegambar()
	{
		define('UPLOAD_DIR', 'uploads/thumb/');
		$img = $_POST['image-data'];
		$singkatan = trim($this->input->post('singkatan'));
		$nom_id = $_POST['nom_id'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = UPLOAD_DIR . $nom_id . '.png';
		$success = file_put_contents($file, $data);
		
		$d = array(
			"NO_MATRIK"=>$nom_id,
			"SINGKATAN"=>$singkatan,
			"GAMBAR"=>$file
		);
		
		$this->pm->add_foto($d, $nom_id);
		// print $success ? $file : 'Unable to save the file.';
		redirect(base_url()."photo");
		
		
	}
	
	public function crop()
	{
		define('UPLOAD_DIR', 'uploads/thumb/');
		$img = $_POST['image-data'];
		$singkatan = trim($this->input->post('singkatan'));
		$nom_id = $_POST['no_matrik'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = UPLOAD_DIR . $nom_id . '.png';
		$success = file_put_contents($file, $data);
		
		$d = array(
			"NO_MATRIK"=>$nom_id,
			"SINGKATAN"=>$singkatan,
			"GAMBAR"=>$file,
			"CREATED_ON" => time()
		);
		
		$this->pm->add_foto($d, $nom_id);
		// print $success ? $file : 'Unable to save the file.';

		$return = array (
			'responseType' => 'success',
			// 'responseLargeImage' => $large_image_location,
			// 'responseThumbImage' =>	$kad
		);
		echo json_encode ($return);
	}
	
	public function mukadepan($id)
	{
		//Set the content type
		header('content-type: image/jpeg');
		
		$this->load->library('idcard');
		$us = $this->pm->get_user_by_id($id)->row();
		$p = array(
			"NAMA" 		=>	$us->R_NAMA, 
			"MATRIK"	=>	$us->R_NO_MATRIK_TMP, 
			"PROGRAM"	=>  $us->PRG_NAMA_PROGRAM_BM,  
			"SINGKATAN"	=>	$us->SINGKATAN,
			"GAMBAR"		=>	$us->GAMBAR
		);
			
		$this->idcard->kad_matrik($p);

	}
	
	public function belakang($id)
	{
		include(APPPATH.'libraries/phpqrcode/qrlib.php'); 
		
		header('content-type: image/jpeg');
		
		$this->load->library('barcode');
		$this->load->library('idcard');
		
		$us = $this->pm->get_user_by_id($id)->row();
		$p = array(
			"NAMA" 		=>	$us->R_NAMA, 
			"MATRIK"	=>	$us->R_NO_MATRIK_TMP, 
			"PROGRAM"	=>  $us->PRG_NAMA_PROGRAM_BM,
			"SINGKATAN"	=>	$us->SINGKATAN
		);
		
		// how to save PNG codes to server 
		 
		$tempDir = 'src/qr/'; 
		 
		$codeContents = 'mynemo.umt.edu.my/ocean/index.php/checker/index/'.$us->R_NO_MATRIK_TMP; 
		 
		// we need to generate filename somehow,  
		// with md5 or with database ID used to obtains $codeContents... 
		$fileName = '005_file_'.md5(time()).'.png'; 
		 
		$pngAbsoluteFilePath = $tempDir.$fileName; 
		 
		// generating 
		if (!file_exists($pngAbsoluteFilePath)) { 
			QRcode::png($codeContents, $pngAbsoluteFilePath); 
		} 
		 
		$this->idcard->belakang($p, $pngAbsoluteFilePath);
		unlink($pngAbsoluteFilePath);
		
	}


	public function cetak($id, $rotate="0")
	{
		$this->pm->update_foto(array("CETAK"=>"1"), $id);
		
		$this->load->library('idcard');
		include(APPPATH.'libraries/phpqrcode/qrlib.php'); 
		$this->load->library('barcode');
		
		require_once(APPPATH .'third_party/tcpdf/tcpdf.php');
		// require_once(APPPATH .'third_party/tcpdf/pdf_js.php');
		require_once(APPPATH .'third_party/tcpdf/pdf_autoprint.php');
		
		$us = $this->pm->get_user_by_id($id)->row();
		$p = array(
			"NAMA" 		=>	$us->R_NAMA, 
			"MATRIK"	=>	$us->R_NO_MATRIK_TMP, 
			"PROGRAM"	=>  $us->PRG_NAMA_PROGRAM_BM,  
			"SINGKATAN"	=>	$us->SINGKATAN,
			"GAMBAR"		=>	$us->GAMBAR
		);
			
		$muka_depan = $this->idcard->kad_matrik($p, true);
		
		$tempDir = 'src/qr/'; 
		 
		$codeContents = 'mynemo.umt.edu.my/sos/profile/'.$us->R_NO_MATRIK_TMP; 
		 
		// we need to generate filename somehow,  
		// with md5 or with database ID used to obtains $codeContents... 
		$fileName = '005_file_'.md5(time()).'.png'; 
		 
		$pngAbsoluteFilePath = $tempDir.$fileName; 
		 
		// generating 
		if (!file_exists($pngAbsoluteFilePath)) { 
			QRcode::png($codeContents, $pngAbsoluteFilePath); 
		} 
		 
		$muka_blkg = $this->idcard->belakang($p, $pngAbsoluteFilePath, true);		
		unlink($pngAbsoluteFilePath);
		
		
		$pdf = new PDF_AutoPrint('L', PDF_UNIT, array(59,98), true, 'UTF-8', false);

		$pdf->SetHeaderMargin(0);
		$pdf->SetFooterMargin(0);

		// remove default footer
		$pdf->setPrintFooter(false);

		// set auto page breaks
		$pdf->SetAutoPageBreak(FALSE);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		
		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', '', 48);


		// add a page
		$pdf->AddPage();
		$pdf->Image($muka_depan, 0, 0, 98, 59, '', '', '', false, 300, '', false, false, 0);
		// Print a text
		

		// --- example with background set on page ---

		// remove default header
		$pdf->setPrintHeader(false);

		// add a page
		$pdf->AddPage();


		// -- set new background ---

		// get the current page break margin
		$bMargin = $pdf->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $pdf->getAutoPageBreak();
		// disable auto-page-break
		$pdf->SetAutoPageBreak(false, 0);
		// set bacground image
		$pdf->StartTransform();
		if ($rotate == "1") {			
			$pdf->Rotate(180,49,30);
		}
		$pdf->Image($muka_blkg, 0, 0, 98, 59, '', '', '', false, 300, '', false, false, 0);
		$pdf->StopTransform();

		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();


		
		//Close and output PDF document
		$pdf->AutoPrint(false);
		$pdf->Output('matrik_'.$id.'.pdf', 'I');
		// unlink($muka_depan);
		// unlink($muka_blkg);
		
		
	}

	public function reload()
	{
		$last = $this->input->post("lastsync");
		$users = $this->pm->get_all_users_sync($last);
		
		if ($users->num_rows() > 0) 
		{
			ajaxQuery("#lastsync")->val(time());
			$pending = $this->load->view("photo/listpending.tpl.php", array("users"=>$users), true);
			ajaxQuery("#mytable tr.header")->after($pending);
		}
		
		$d = array("users"=>$users);
		
		ajaxResponse();
	}
}
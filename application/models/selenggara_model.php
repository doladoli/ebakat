<?php 
class Selenggara_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_all_kriteria()
	{
		$this->db->where("KR_STATUS", "1");	
		$this->db->where("KR_PID IS NULL");	
		$this->db->order_by("KR_KOD");
		return $this->db->get('SKT_TB_KRITERIA');
	}
	
	function senarai_staf_umt($ptj)
	{
		$this->db->select('A.NOKP_BARU,INITCAP(A.NAMA) AS NAMA');
		$this->db->where("A.STATUS_SEMASA", "01");
		$this->db->where("A.STATUS_AKTIF", "Y");
		$this->db->where("A.TEMPAT_KERJA", $ptj);
		$this->db->order_by("A.NAMA");	
		return $this->db->get('PERSONEL A');
	}
	
	function get_ptj()
	{
		$this->db->select('KOD,INITCAP(PERIHAL) AS PERIHAL');
		$this->db->where("STATUS", "Y");
		$this->db->order_by("PERIHAL");	
		return $this->db->get('TEMPAT_KERJA');	
	}
	
	function get_ptj_pilih($ptj)
	{
		$this->db->select('KOD,INITCAP(PERIHAL) AS PERIHAL');
		$this->db->where("STATUS", "Y");
		$this->db->where("KOD", $ptj);
		$this->db->order_by("PERIHAL");	
		return $this->db->get('TEMPAT_KERJA');	
	}
	
	
	function get_senarai_staf($ptj)
	{
		$this->db->select('A.NOKP_BARU,INITCAP(A.NAMA) AS NAMA,INITCAP(A.GELARAN_JWT) AS JAWATAN,A.STAF_GRED');
		$this->db->where("A.STATUS_SEMASA", "01");
		$this->db->where("A.STATUS_AKTIF", "Y");
		$this->db->where("A.TEMPAT_KERJA", $ptj);
		$this->db->order_by("A.NAMA");	
		return $this->db->get('PERSONEL A');
	}
	
	
	function senarai_pegawai_kriteria($ptj)
	{
		$this->db->select('B.WF_ID_KRITERIA,B.WF_NOKP_PPP,B.WF_NOKP_PPK');
		$this->db->select('INITCAP(C.NAMA) AS NAMA_PPP');
		$this->db->select('INITCAP(D.NAMA) AS NAMA_PPK');
		$this->db->select('INITCAP(E.KR_KETERANGAN) AS KR_KETERANGAN');
		$this->db->join("SKT_TB_WORKFLOW B", "A.NOKP_BARU=B.WF_NOKP");
		$this->db->join("PERSONEL C", "B.WF_NOKP_PPP=C.NOKP_BARU");	
		$this->db->join("PERSONEL D", "B.WF_NOKP_PPK=D.NOKP_BARU");	
		$this->db->join("SKT_TB_KRITERIA E", "E.KR_ID=B.WF_ID_KRITERIA");
		$this->db->where("A.TEMPAT_KERJA", $ptj);
		//$this->db->where("B.WF_NOKP", $nokp);
		$this->db->where("E.KR_STATUS","1");
		return $this->db->get('PERSONEL A');

	}
	
	function save_workflow_peg($d)
	{
		$this->db->insert("SKT_TB_WORKFLOW",$d);
	}
	
	function get_all_pending()
	{
		$this->db->where("KR_STATUS", "1");	
		$this->db->where("KR_PID", "0");	
		$this->db->order_by("KR_KOD");
		return $this->db->get('SKT_TB_KRITERIA');
	}
	
	function get_sub_kriteria($pid)
	{
		$this->db->where("KR_PID", $pid);
		$this->db->order_by("KR_ID");
		return $this->db->get('SKT_TB_KRITERIA');
	
	}
	
	function get_kriteria_by_id($pid)
	{
		$this->db->where("KR_ID", $pid);
		$this->db->order_by("KR_ID");
		return $this->db->get('SKT_TB_KRITERIA');
	
	}
	
	function get_bilangan_subjek($ic)
	{
		return "100";
	}
	
	function get_user_by_id($id)
	{
		$this->db->where("A.ID",$id);
		$this->db->join("VW_PELAJAR V", "V.PEL_NO_MATRIK=A.NO_MATRIK");
		$this->db->join("JENIS_MASALAH J", "J.KOD=A.KATEGORI_MASALAH");
		return $this->db->get('ADUAN_PELAJAR A');
	}
	
	function add_foto($d, $id)
	{
		$d["SINGKATAN"] = str_replace("'", "`", strtoupper($d["SINGKATAN"]));
		
		$this->db->delete("FOTO", array("NO_MATRIK"=>$id));
		$this->db->insert("FOTO", $d);
	}
	
	function update_aduan($d, $id)
	{ 
		$this->db->update("ADUAN_PELAJAR", $d, array("ID" => $id));
	}
	
	function get_all_users_sync($ts)
	{
		//$this->db->where("CETAK", "1");
		$this->db->where("FOTO.CREATED_ON > ", $ts);
		$this->db->join("FOTO", "CALON.R_NO_MATRIK_TMP=FOTO.NO_MATRIK");
		$this->db->join("PROGRAM", "CALON.R_PROGRAM_KUSTEM=PROGRAM.PRG_KOD_PROGRAM");
		$this->db->order_by("FOTO.CETAK", "DESC");
		$this->db->order_by("FOTO.CREATED_ON", "DESC");
		return $this->db->get('CALON');
	}
	
	function count_by_jenis()
	{
		$this->db->select('A.KETERANGAN, COUNT(*) AS BIL');
		$this->db->group_by('A.KETERANGAN'); 
		$this->db->join("ADUAN_PELAJAR P", "A.KOD=P.KATEGORI_MASALAH", 'left');
		return $this->db->get('JENIS_MASALAH A');
		
	}
}
?>
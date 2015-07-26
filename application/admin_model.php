<?php 
class Photo_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_all_users()
	{
		//$this->db->where("CETAK", "1");
		//$this->db->where("R_SESISEM", $_SESSION['current_sem']);
		$this->db->join("FOTO", "CALON.R_NO_MATRIK_TMP=FOTO.NO_MATRIK");
		$this->db->join("PROGRAM", "CALON.R_PROGRAM_KUSTEM=PROGRAM.PRG_KOD_PROGRAM");
		$this->db->order_by("FOTO.CETAK", "DESC");
		$this->db->order_by("FOTO.CREATED_ON", "DESC");
		return $this->db->get('CALON');
	}
	
	function get_user_by_id($id)
	{
		$this->db->where("R_NO_MATRIK_TMP",$id);
		$this->db->join("FOTO", "CALON.R_NO_MATRIK_TMP=FOTO.NO_MATRIK");
		$this->db->join("PROGRAM", "CALON.R_PROGRAM_KUSTEM=PROGRAM.PRG_KOD_PROGRAM");
		return $this->db->get('CALON');
	}
	
	function add_foto($d, $id)
	{
		$d["SINGKATAN"] = str_replace("'", "`", strtoupper($d["SINGKATAN"]));
		
		$this->db->delete("FOTO", array("NO_MATRIK"=>$id));
		$this->db->insert("FOTO", $d);
	}
	
	function update_foto($d, $id)
	{ 
		$this->db->update("FOTO", $d, array("NO_MATRIK" => $id));
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
}
?>
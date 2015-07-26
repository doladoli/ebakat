<?php 
class Skt_model extends CI_Model
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
	
	function get_all_ptj()
	{
		$this->db->select("TK.PERIHAL, P.PTJ_KOD");
		$this->db->join("TEMPAT_KERJA TK", "TK.KOD=P.PTJ_KOD");
		$this->db->order_by("TK.PERIHAL");
		return $this->db->get('SKT_TB_PTJ P');
	}
	
	function get_all_ptj_by_role($nokp, $id_role)
	{ 
		$this->db->select("TK.PERIHAL, P.PTJ_KOD");
		$this->db->join("TEMPAT_KERJA TK", "TK.KOD=P.PTJ_KOD");
		$this->db->join("SKT_TB_USER_ROLE US", "US.UR_PTJ=P.PTJ_KOD");
		$this->db->where("US.UR_ID_ROLE", $id_role);
		$this->db->where("US.UR_NOKP", $nokp);
		$this->db->order_by("TK.PERIHAL");
		return $this->db->get('SKT_TB_PTJ P');
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
	
	function get_all_gred()
	{
		$this->db->select('KOD');
		return $this->db->get('JAWATAN');
	}
	
	function get_sasaran_tahunan($nokp, $id)
	{
		$this->db->where("SP_NOKP", $nokp);	
		$this->db->where("SP_ID_KRITERIA", $id);	
		$this->db->order_by("SP_ID");
		return $this->db->get('SKT_TB_SKT_PENSYARAH');
	}
	
	function get_sasaran_pengesahan($nokp)
	{
		//$this->db->where("SP_ID_KRITERIA", $id);	
		//$this->db->order_by("SP_ID");
		$this->db->select('A.NAMA, A.NOKP_BARU, A.STAF_GRED, J.JAWATAN');
		$this->db->join('PERSONEL A','D.SP_NOKP=A.NOKP_BARU');
		$this->db->distinct();
		$this->db->join("JAWATAN J", "J.GRED = A.STAF_GRED");
		return $this->db->get('SKT_TB_SKT_PENSYARAH D');
	}
	
	function senarai_all_penilai($nokp, $id)
	{
		$dbarray = 
			"A.NAMA as NAMA_DINILAI,
			B.NAMA as NAMA_PPP,
			B.EMAIL EMAIL_PPP,
			C.NAMA NAMA_PPK,
			C.EMAIL EMAIL_PPK"			
		;
		
		$this->db->select($dbarray);
		
		$this->db->join('PERSONEL A',
						'D.WF_NOKP=A.NOKP_BARU');
		$this->db->join('PERSONEL B',
		                'D.WF_NOKP_PPP=B.NOKP_BARU');
		$this->db->join('PERSONEL C',
						'D.WF_NOKP_PPK=C.NOKP_BARU');
	    $this->db->where('D.WF_ID_KRITERIA', $id); //1
	    $this->db->where('D.WF_NOKP', $nokp);
		$query = $this->db->get('SKT_TB_WORKFLOW D');
		return $query;
	}
	
	function get_bilangan_subjek($ic)
	{
		return "100";
	}
	
	function insert_skt($d)
	{ 
		$this->db->insert("SKT_TB_SKT_PENSYARAH", $d);
	}
	
	function insert_skt_jawatan($d)
	{ 
		$this->db->insert("SKT_TB_SKT_JAWATAN", $d);
	}
	
	function insert_skt_pensyarah($d)
	{ 
		$this->db->insert("SKT_TB_SKT_PENSYARAH", $d);
	}
	
	function insert_skt_tahunan($d)
	{ 
		$this->db->insert("SKT_TB_SKT_TAHUNAN", $d);
	}
	
	function get_sasaran_by_jawatan($gred, $ptj, $id_kriteria)
	{ 
		$this->db->select("SJ_VALUE");
		$this->db->where("SJ_PTJ", $ptj);
		$this->db->where("SJ_KOD_JAWATAN", $gred);
		$this->db->where("SJ_ID_KRITERIA", $id_kriteria);
		$this->db->order_by("SJ_ID_KRITERIA");
		$query = $this->db->get('SKT_TB_SKT_JAWATAN');
		if ($query->num_rows() > 0)
		{
			$rs = $query->row();
			return $rs->SJ_VALUE;
		}
		
		return "";
	}
	
	function get_pensyarah($nokp)
	{
		$dbarray = "
			D.NAMA, D.STAF_GRED AS GRED, D.TEMPAT_KERJA AS PTJ"			
		;		
		$this->db->select($dbarray);
		$this->db->where('D.NOKP_BARU', $nokp);
		return $this->db->get('PERSONEL D');		
	}
	
	function get_all_penilai($nokp)
	{
		$dbarray = 
			"A.NAMA as NAMA_DINILAI,
			B.NAMA as NAMA_PPP,
			B.EMAIL EMAIL_PPP,
			C.NAMA NAMA_PPK,
			C.EMAIL EMAIL_PPK"			
		;
		
		$this->db->select($dbarray);		
		$this->db->join('PERSONEL A','D.WF_NOKP=A.NOKP_BARU');
		$this->db->join('PERSONEL B','D.WF_NOKP_PPP=B.NOKP_BARU');
		$this->db->join('PERSONEL C','D.WF_NOKP_PPK=C.NOKP_BARU');
	    $this->db->where('D.WF_NOKP', $nokp);
		$query = $this->db->get('SKT_TB_WORKFLOW D');
		return $query;
	}
	
	function check_skt_submit($nokp, $tahun)
	{
		$this->db->select("ST_STATUS");
		$this->db->where('ST_NOKP', $nokp);
		$this->db->where('ST_TAHUN', $tahun);
		return $this->db->get('SKT_TB_SKT_TAHUNAN');
		
		// $row = $query->row();
		
		// return ($row->BIL > 0) ? true : false;
			
	}
	
	function check_skt_isi($nokp, $tahun)
	{
		$this->db->select("COUNT(*) AS BIL");
		$this->db->where('SP_NOKP', $nokp);
		// $this->db->where('ST_TAHUN', $tahun);
		$query = $this->db->get('SKT_TB_SKT_PENSYARAH');
		
		$row = $query->row();
		
		return ($row->BIL > 0) ? true : false;
			
	}

}
?>
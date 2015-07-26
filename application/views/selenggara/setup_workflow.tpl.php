<script src="<?php echo base_url()?>js/jquery.js" type="text/javascript"></script>        
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.php.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.form.js"></script>

<script>
function cari_staf_ppp(ptj)
{
	window.open("<?php echo base_url()?>index.php/selenggara/setup_workflow_pop_ppp?ptj="+ptj,"win", "top=200px,left=200px,width=700px, height=800px, scrollbars=yes");
	
}


function cari_staf_ppk(ptj)
{
	
	window.open("<?php echo base_url()?>index.php/selenggara/setup_workflow_pop_ppk?ptj="+ptj,"win", "top=200px,left=200px,width=700px, height=800px, scrollbars=yes");
	

}

function cari_ptj()
{
	$.php('<?php echo base_url();?>index.php/selenggara/cari_ptj_staf', {ptj: $("#ptj").val()});

}

var showPnilai=false;
function Hide_Peg_Penilai() 
{
	var doc = document.getElementById("pegpenilai");
	if (showPnilai) 
	{
			doc.style.display='';
			showPnilai=false;
	} 
	else 
	{
			doc.style.display='none';
			showPnilai=true;
	}
	
}

function ConfirmSave()
{ 
   
	var doc=document.setup_workflow;
    var bil = ($("#staf:checked").length);
	
	if (bil> 0)
	{ 

	$.php('<?php echo base_url();?>index.php/selenggara/simpan_setup_workflow', $('form#setup_workflow').formToArray(true));
							
	} 
	else
	{
		alert('Sila klik pada kekotak yang telah disediakan');
		return false;
	}
}
</script>

<style type="text/css">

.btn {
	border:1px solid #CCCCCC;
}
</style>


<form name="setup_workflow" id="setup_workflow" action="" method="post">
<input type="hidden" name="id">
<table width="100%" border="0">
	<tr>
    	<td colspan="2">&nbsp;</td>
	</tr>
	
	 <tr>
        <td height="24">PTJ</td>
		<td width="66%" style="width: 50ex;font-size:12px">
		<select name="ptj" id="ptj" style="width: 50ex;font-size:12px" onchange="cari_ptj(this.value)">
      		<option value="" selected>-Sila Pilih-</option>
			<?php foreach($ptj->result() as $tempat_kerja)
			{?>
            <option value="<?=$tempat_kerja->KOD?>"><?=$tempat_kerja->PERIHAL?></option>
            <?php } ?>
    	</select>
		</td>
     </tr>
	 
	 <tr>
    	<td colspan="2">&nbsp;</td>
	</tr>
	
	 <tr>
        <td height="24">Kriteria</td>
		<td width="66%" style="width: 50ex;font-size:12px">
		<?php
	    foreach($kriteria->result() as $kriteria_x)
	    {?>
		<input type="radio" name="kriteria" id="kriteria" value="<?php echo $kriteria_x->KR_ID?>"><?php echo $kriteria_x->KR_KETERANGAN?><br>
         <?php }?>
		</td>
     </tr>
	 
	 <tr>
    	<td colspan="2">&nbsp;</td>
	</tr>
	
	 <tr>
          <td width="30%" align="left">&nbsp; </td>
            <td width="66%" style="width: 50ex;font-size:12px">
              <input name="penilai_sama" type="checkbox" id="penilai_sama" onclick="Hide_Peg_Penilai()" value="Y" />
              Sila klik pada kekotak ini jika Pegawai Penilai Pertama dan Pegawai Penilai Kedua adalah orang yang sama.          </td>
     </tr>
	 
	 <tr>
    	<td colspan="2">&nbsp;</td>
	</tr>
	
	<tr> 
      	<td width="30%" align="left">Pegawai Penilai Pertama </td>
		<td width="66%" style="width: 50ex;font-size:12px">
		<input type="hidden" name="nokp_ppp" size="12"/>
		<input type="text" name="nama_ppp" id="nama_ppp" size="50"/>
		<input type="button" name="ppp" id="ppp" value="...." class="btn" 
		onclick="cari_staf_ppp(document.setup_workflow.ptj.value);"></td>
	</tr>
	
	<tr>
    	<td colspan="2">&nbsp;</td>
	</tr>
	
	<tr id="pegpenilai"> 
      	<td width="30%" align="left">Pegawai Penilai Kedua </td>
		<td width="66%" style="width: 50ex;font-size:12px">
		<input type="hidden" name="nokp_ppk" size="12"/>
		<input type="text" name="nama_ppk" id="nama_ppk" size="50"/>
		<input type="button" name="ppk" id="ppk" value="...." class="btn" 
		onclick="cari_staf_ppk(document.setup_workflow.ptj.value);"></td>
	</tr>
	
   
    
	 <tr> 
		 <td width="30%" align="left">&nbsp;</td>
		 <td width="66%">&nbsp;</td>
	 </tr>
	 <tr>
		 <td align="right" colspan="2">
		 <input type="button" value="Simpan" name="btnSimpan2" onclick="ConfirmSave();" class="btn">		 </td>
	 </tr>
</table>
<br>
	<div id="senarai_pegawai_dinilai"></div>
</form>

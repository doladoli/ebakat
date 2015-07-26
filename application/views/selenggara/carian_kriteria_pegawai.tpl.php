<script type='text/javascript' src='<?=base_url()?>js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery.autocomplete.css"/>
<script>

/*function cari_ktiteria()
{
    alert('test');
	$.php('<?php echo base_url();?>index.php/selenggara/cari_kriteria_penilai', {kriteria: $("#kriteria").val()});

}*/

function cari_ptj()
{
	$.php('<?php echo base_url();?>index.php/selenggara/cari_kriteria_penilai', {ptj: $("#ptj").val()});

}



</script>
<style type="text/css">

.btn {
	border:1px solid #CCCCCC;
}
</style>


<form name="sen_workflow_peg" action="" method="post">
<input type="hidden" name="id">
<table width="100%" border="0">
	<tr>
    	<td colspan="2">&nbsp;</td>
	</tr>
	
	  <tr>
        <td style="width: 10ex;font-size:12px">PTJ</td>
		<td width="745" style="width: 50ex;font-size:12px">
		<?php
		if($ptj_y!='')
		{
		$kod=$ptj_z->KOD;
		$perihal=$ptj_z->PERIHAL;
		  echo $perihal;
	    }
	    else
	    {?>
		<select name="ptj" id="ptj" style="width: 50ex;font-size:12px" onchange="cari_ptj(this.value)">
		<option value="" selected>-Sila Pilih-</option>
			<?php foreach($ptj->result() as $ptj_x)
			{?>
            <option value="<?=$ptj_x->KOD?>"><?=$ptj_x->PERIHAL?></option>
      <?php } ?>
    	</select>
		<?php
	    }?></td>
     </tr>
	  <tr>
    	<td colspan="2">&nbsp;</td>
	</tr>
	 <tr>
	 <td width="130" height="24">&nbsp;</td>
    	<td></td>
	</tr>
</table>
<?php 
if($ptj_y!='')
{
?>
<fieldset>
<legend>Senarai Pegawai Yang Dinilai mengikut PTJ</legend>
<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="0" cellspacing="1" style="border:1px #CCCCCC solid">
	<tr style="width: 50ex;font-size:12px">
		<td width="1%" align="center">Bil</td>
		<td width="25%" align="left">Nama</td>
		<td width="20%" align="left">Jawatan</td>
        <td width="5%" align="center">Gred</td>
		<td width="50%" align="center">Kriteria</td>
		</tr>
		<?php 
		$i=0;
	    foreach($sen_peg_dinilai->result() as $sen_peg_n)
		{?>
		<tr style="width: 50ex;font-size:12px">
		<td align="center" valign="top"><?php echo ++$i?></td>
		<td align="left" valign="top"><?php echo $sen_peg_n->NAMA?><br><?php echo $sen_peg_n->NOKP_BARU?></td>
		<td align="left" valign="top"><?php echo $sen_peg_n->JAWATAN?></td>
		<td align="center" valign="top"><?php echo $sen_peg_n->STAF_GRED?></td>
		<td align="left" valign="top">
			<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="0" cellspacing="1" style="border:1px #CCCCCC solid">
			<tr style="width: 50ex;font-size:12px">
			<td width="1%" align="center"><b>Bil</b></td>
			<td width="25%" align="left"><b>Pegawai Penilai Pertama</b></td>
		    <td width="25%" align="left"><b>Pegawai Penilai Kedua</b></td>
		    <td width="25%" align="left"><b>Kriteria</b></td>
			
			<?php 
			$x=0;
			foreach($sen_peg_kriteria->result() as $sen_peg_k)
			{?>
			<tr style="width: 50ex;font-size:12px">
			<td align="center" valign="top"><?php echo ++$x?></td>
			<td align="left" valign="top"><?php echo $sen_peg_k->NAMA_PPP?></td>
			<td align="left" valign="top"><?php echo $sen_peg_k->NAMA_PPK?></td>
			<td align="left" valign="top"><?php echo $sen_peg_k->KR_KETERANGAN?></td>
			<?php 
			}?>
		</tr>
			</table>
		</td>
		<?php }?>
		
</table>
</fieldset>
<?php 
}
else
{
?>
<div id="sen_workflow_peg_nilai">
</div>
<?php 
}
?>
</form>

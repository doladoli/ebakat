<link rel="stylesheet" href="<?php echo base_url()?>css/style.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="<?php echo base_url()?>css/example.css" TYPE="text/css" MEDIA="screen">
<fieldset>
<legend>Senarai Pegawai Mengikut PTJ</legend>
<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="0" cellspacing="1" style="border:1px #CCCCCC solid">
	<tr style="width: 50ex;font-size:12px">
		<td width="1%" align="center">Bil</td>
		<td width="10%" align="center">NO KP</td>
		<td width="40%" align="left">Nama Pegawai Yang Dinilai</td>
		<td width="30%" align="left">Jawatan</td>
        <td width="10%" align="left">Gred</td>
        <td width="5%" align="center">Pilih</td>
		</tr>
		<?php 
		$i=0;
	    foreach($ptjpilih->result() as $ptjpilih_staf)
		{?>
		
		<tr style="width: 50ex;font-size:12px">
		<td align="center" valign="top"><?php echo ++$i?></td>
		<td align="center" valign="top"><?php echo $ptjpilih_staf->NOKP_BARU?></td>
		<td align="left" valign="top"><?php echo $ptjpilih_staf->NAMA?></td>
		<td align="left" valign="top"><?php echo $ptjpilih_staf->JAWATAN?></td>
		<td align="left" valign="top"><?php echo $ptjpilih_staf->STAF_GRED?></td>
		<td align="center" valign="top">
		
		<input type="checkbox" name="staf[<?php echo $ptjpilih_staf->NOKP_BARU?>]" id="staf" value"<?php echo $ptjpilih_staf->NOKP_BARU?>">
		
		</td>
		<?php }?>
		</tr>
</table>
</fieldset>

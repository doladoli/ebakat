<link rel="stylesheet" href="<?php echo base_url()?>css/style.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="<?php echo base_url()?>css/example.css" TYPE="text/css" MEDIA="screen">
<fieldset>
<legend>Senarai Pegawai Yang Dinilai mengikut PTJ</legend>
<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="0" cellspacing="1" style="border:1px #CCCCCC solid">
	<tr style="width: 50ex;font-size:12px">
		<td width="1%" align="center">Bil</td>
		<td width="25%" align="left">Nama</td>
		<td width="20%" align="left">Jawatan</td>
        <td width="5%" align="left">Gred</td>
		<td width="50%" align="left">Kriteria</td>
		</tr>
		<?php 
		$i=0;
	    foreach($sen_peg_dinilai->result() as $sen_peg_n)
		{?>
		<tr style="width: 50ex;font-size:12px">
		<td align="center" valign="top"><?php echo ++$i?></td>
		<td align="left" valign="top"><?php echo $sen_peg_n->NAMA?><br><?php echo $sen_peg_n->NOKP_BARU?></td>
		<td align="left" valign="top"><?php echo $sen_peg_n->JAWATAN?></td>
		<td align="left" valign="top"><?php echo $sen_peg_n->STAF_GRED?></td>
		<td align="left" valign="top">
			<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="0" cellspacing="1" style="border:1px #CCCCCC solid">
			<tr style="width:50ex;font-size:12px;">
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
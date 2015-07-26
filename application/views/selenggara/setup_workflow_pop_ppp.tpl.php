<script language="javascript">
function pilih(nokp_ppp,nama_ppp) 
{
	
	var strReplaceAll = nokp_ppp;
	var intIndexOfMatch = strReplaceAll.indexOf( ";" );
  	if (window.opener && !window.opener.closed)
		window.opener.document.setup_workflow.nama_ppp.value = nama_ppp;
		while (intIndexOfMatch != -1){
		strReplaceAll = strReplaceAll.replace( ";", " " )
		intIndexOfMatch = strReplaceAll.indexOf( ";" );
		}
	

	window.opener.document.setup_workflow.nokp_ppp.value = strReplaceAll;
	window.opener.document.setup_workflow.nama_ppp.value = nama_ppp;
	
	window.close();
	
}

</script>
<style type="text/css">
.header_bg {
	background-color:#DDD8E0;
	font-family: Arial;
	font-size:14px;
	font-weight:bold;
}
.header {
	font-family: Arial;
	font-size:11px;
}
.btn {
	border:1px solid #CCCCCC;
}
</style>



<table width="100%" border="1">
  <tr>
    <td>SENARAI NAMA PEGAWAI</td>
  </tr>
 
  <tr>
   <td>
	<table width="100%" border="1" cellpadding="0" cellspacing="0" style="border:1px #CCCCCC solid"> 
      <tr>
        <td width="1%">Bil</td>
        <td width="20%">No. KP </td>
        <td width="69%">Nama</td>
        <td width="10%">Pilih</td>
      </tr>
	  <?php  
	  $i=0; 
	  foreach($sen_staf->result() as $senarai_staf)
	  {
	
		?>	
      <tr class="header">
        <td><?php echo ++$i;?></td>
        <td><?php echo $senarai_staf->NOKP_BARU?></td>
		<td><?php echo $senarai_staf->NAMA?></td>
        <td>
		<input type=button value='Pilih' onclick="pilih('<?php echo $senarai_staf->NOKP_BARU?>','<?php echo $senarai_staf->NAMA?>')" class='btn' /></td>
      </tr>
	<?php }?>
    </table>
	</td>
  </tr>
</table>


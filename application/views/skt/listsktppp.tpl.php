
<?php $i=0; foreach ($skt->result() as $u){ ?>
<tr class="list">

	


	<td valign="middle"><?php echo $u->SP_AKTIVITI?></td>	
	
	<td><?php echo $u->SP_PETUNJUK_PRESTASI?></td>	
	<td><?php echo $u->SP_SASARAN?></td>	
	
	
	

</tr>
<?php }?>
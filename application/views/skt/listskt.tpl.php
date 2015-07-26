
<?php $i=0; foreach ($skt->result() as $u){ ?>
<tr class="list">

	


	<td valign="middle"><?php echo $u->SP_AKTIVITI?></td>	
	
	<td><?php echo $u->SP_PETUNJUK_PRESTASI?></td>	
	<td><?php echo $u->SP_SASARAN?></td>	
	
	
	<td align="center">
		<a href="<?php echo base_url()?>index.php/admin/detail/<?=$u->SP_ID?>">Edit</a>		
		<a href="<?php echo base_url()?>index.php/admin/detail/<?=$u->SP_ID?>">Hapus</a>		
	</td>	

</tr>
<?php }?>
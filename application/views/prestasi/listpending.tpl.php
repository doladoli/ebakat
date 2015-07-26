
<?php $i=0; foreach ($users->result() as $u){ ?>
<tr class="list">
	<td><?php echo ++$i?></td>
	


	<td valign="middle"<?php echo $u->TARIKH_ADUAN?>></td>	
	
	<td><?php echo $u->KETERANGAN?></td>	
	<td><?php echo $u->KETERANGAN_MASALAH?></td>	
	
	
	<td align="center"><a href="<?php echo base_url()?>index.php/admin/detail/<?=$u->ID?>">Hapus</a></td>	

</tr>
<?php }?>
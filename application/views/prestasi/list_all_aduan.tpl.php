
<?php $i=0; foreach ($aduan->result() as $u){ ?>
<tr class="list">
	<td><?php echo ++$i?></td>
	<td><?php
	switch($u->STATUS)
	{
		case 'S' : echo "SIAP";break;
		case 'K' : echo "KIV";break;
		case 'B' : echo "BATAL";break;
		default: echo "PENDING";
	}
	?>
	</td>

	<td valign="middle"<?php echo $u->TARIKH_ADUAN?>></td>	
	
	<td><b><?php echo $u->PEL_NAMA_PELAJAR?></b><br><?php echo $u->PEL_NO_MATRIK?><br><?php echo $u->PRG_NAMA_PROGRAM_BM?></td>	

	<td><?php echo $u->KETERANGAN?></td>	
	<td><?php echo $u->KETERANGAN_MASALAH?></td>	
	
	
	<td align="center"><a href="<?php echo base_url()?>index.php/admin/detail/<?=$u->ID?>">Papar</a></td>	

</tr>
<?php }?>
<table class="ltable">
<tr>
	<th>Bil</th>
	<th>Nama</th>
	<th>Preview</th>
</tr>
<?php $i=0; foreach ($users->result() as $u){ ?>
<tr class="list">
	<td><?=++$i?></td>
	<td><?php echo $u->R_NAMA?></td>
	<td><a href="<?php echo base_url()?>index.php/photo/preview/<?=$u->R_NO_MATRIK_TMP?>">Preview</a></td>	
	<!--<td><a href="<?php echo base_url()?>index.php/photo/cetak/<?=$u->t01_id_user?>" target="_blank">Cetak</a></td>	-->
</tr>
<?php }?>
</table>

<table class="ltable" id="mytable">
<tr>
	<th>Bil.</th>
	<th>No Matrik</th>
	<th>Nama/No. KP</th>
	<th>Program</th>
	<th>Gambar</th>
	<th>Status Cetak</th>
	<th>Papar Kad</th>
</tr>
<?php $i=0; foreach ($users->result() as $u){ ?>
<tr>
	<td><?php echo ++$i?></td>

	<td><?php echo $u->R_NO_MATRIK_TMP?></td>	
	<td><b><?php echo $u->R_NAMA?></b><br><?php echo $u->R_NO_KP?></td>	
	<td><?php echo $u->PRG_NAMA_PROGRAM_BM?></td>	
	<td><img src="<?php echo base_url().$u->GAMBAR?>" width="80px"><br><a href="<?php echo base_url()?>index.php/photo/muatnaik/<?=$u->R_NO_MATRIK_TMP?>" target="_blank">Upload</a></td>	
	<td align="center"><?=($u->CETAK=="1") ? "YA" : "<span style='color:red'>TIDAK</span>"?></td>
	<td align="center"><a href="<?php echo base_url()?>index.php/photo/preview/<?=$u->R_NO_MATRIK_TMP?>">Papar</a></td>	

</tr>
<?php }?>
</table>

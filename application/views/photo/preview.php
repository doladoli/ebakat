
<table width="100%">
	<tr>
		<td  align="center"><h4>Muka Depan</h4>
		<img src="<?=base_url()?>index.php/photo/mukadepan/<?=$id?>" width="400">
		</td>
		<td align="center">
		<h4>Muka Belakang</h4>
		<img src="<?=base_url()?>index.php/photo/belakang/<?=$id?>" width="400">

		</td>
		
	</tr>
	<tr>
		<td colspan="2" align="center">	

			<iframe name="icetak" style="border:0px; width:1px;height:1px" id="icetak"></iframe>

			<form target="icetak" action="<?=base_url()?>index.php/photo/cetak/<?=$id?>">
			<input type="submit" value="Cetak" >
			<input type="button" value="Next" onclick="document.location.href='<?=base_url()?>index.php/photo/index'">
			</form>
		</td>
	</tr>
</table>


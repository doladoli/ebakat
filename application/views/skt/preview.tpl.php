
			  <table>
              <tr>
                <td class="label" width="40%">NAMA :</td>
                <td width="80%"> <span id="nama"><?=$u->R_NAMA?></span> </td>
              </tr>
			  <tr>
                <td class="label">NO MATRIK :</td>
                <td ><span id="xno_matrik"><?=$u->R_NO_MATRIK_TMP?></span></td>
              </tr>
			  <tr>
                <td class="label">NO K/P :</td>
                <td ><span id="xno_matrik"><?=$u->R_NO_KP?></span></td>
              </tr>
              <tr>
                <td class="label">PROGRAM :</td>
                <td ><span id="s_program"><?=$u->PRG_NAMA_PROGRAM_BM?></span></td>
              </tr>
		
			  
              
            </table>
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
			<input type="submit" value="Cetak" id="btnCetak" >
			<input type="button" value="Terbalik" id="btnCetak" onclick="tunggeng_nyor()" >
			<input type="button" value="Next" id="btnNext"onclick="document.location.href='<?=base_url()?>index.php/photo/index'">
			</form>
		</td>
	</tr>
</table>

<script>
function tunggeng_nyor()
{
	var url = "<?=base_url()?>index.php/photo/cetak/<?=$id?>/1";
	$("#icetak").attr("src",url);
}
</script>

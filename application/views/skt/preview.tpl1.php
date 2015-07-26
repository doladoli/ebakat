<h4>Muka Depan</h4>
<img src="<?=base_url()?>index.php/photo/mukadepan/<?=$id?>" width="400">

<h4>Muka Belakang</h4>
<img src="<?=base_url()?>index.php/photo/belakang/<?=$id?>" width="400">
<br>
<input type="button" value="Cetak Kad" onclick="document.location.href='<?=base_url()?>index.php/photo/cetak/<?=$id?>'"> 
<input type="button" value="Next >" onclick="document.location.href='<?=base_url()?>index.php/photo/index'"> 

<iframe id="icetak" name="icetak" style="width: 1px; height: 1px; position: absolute; border:0px; display:block"></iframe>


<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
			  <h3 class="box-title">Pilihan Kriteria</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
				  <label>Senarai Kriteria</label>
				  <select class="form-control" id="main_kriteria">
					<?php $i=0; $nextid=1; foreach($kriteria->result() as $ka){ 
						$last=$ka->KR_ID; 
						if ($ka->KR_ID == $id) { 
							$nextid = $i+1;   
						}
					?>
					<option <?=($ka->KR_ID == $id) ? "selected" : ""?> value="<?=$ka->KR_ID?>"><?=$ka->KR_KOD." - ".$ka->KR_KETERANGAN?></option>
					<?php $i++;}  ?>
				  </select>
				  <?php 
					$row = $kriteria->row_array($nextid);
				  ?>
				  <input id="id_current_kriteria" type="hidden" value="<?=$id?>">
				  <input id="id_last_kriteria" type="hidden" value="<?=$last ?>">
				  <input id="id_next_kriteria" type="hidden" value="<?=$row["KR_ID"] ?>">
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	$("#main_kriteria").change(function(){
		<?php if(!$skt) {?>
		document.location.href="<?=base_url()?>index.php/prestasi/pointo/"+$(this).val();
		<?php } else {?>
		document.location.href="<?=base_url()?>index.php/<?=$url?>/"+$(this).val();
		<?php }?>
	});
});
</script>
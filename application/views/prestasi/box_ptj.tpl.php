<?php if ($role == "") {?>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
			  <h3 class="box-title">Pilihan Ptj</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
				  <label>Senarai Ptj</label>
				  <select class="form-control" id="nama_ptj" name="nama_ptj" >
					<option value="0">All</option>
					<?php $i=0; foreach($kriteria->result() as $ka){?>
					<option <?=($ka->PTJ_KOD == $id) ? "selected" : ""?> value="<?=$ka->PTJ_KOD?>"><?=$ka->PERIHAL?></option>
					<?php }  ?>
				  </select>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } else {?>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
			  <h3 class="box-title">Ptj</h3>
			</div>
			<div class="box-body">
				<div class="form-horizontal">
				  <label>Nama Ptj</label>
				  <select class="form-control" id="nama_ptj" name="nama_ptj" >
					<?php $i=0; foreach($kriteria->result() as $ka){?>
					<option <?=($ka->PTJ_KOD == $id) ? "selected" : ""?> value="<?=$ka->PTJ_KOD?>"><?=$ka->PERIHAL?></option>
					<?php }  ?>
				  </select>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<script>
$(document).ready(function() {
	$("#main_kriteria").change(function(){
		<?php if(!$skt) {?>
		document.location.href="<?=base_url()?>index.php/prestasi/pointo/"+$(this).val();
		<?php } else {?>
		document.location.href="<?=base_url()?>index.php/sasaran/index/"+$(this).val();
		<?php }?>
	});
});
</script>
<div class="row">
	<?php 
	$nama_ppp = "Belum Ditetapkan";
	$nama_ppk = "Belum Ditetapkan";
	
	if ($pp->num_rows() > 0)
	{
		$row = $pp->row();
		$nama_ppp = $row->NAMA_PPP;
		$nama_ppk = $row->NAMA_PPK;
	}
	?>
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
			  <h3 class="box-title">Sasaran kerja akan dihantar untuk pengesahan kepada pegawai-pegawai penilai berikut : </h3>
			</div>
			<div class="box-body">
			 <form class="form-horizontal" role="form">
				<div class="form-group">
				  <label class="control-label col-sm-4" for="email">Pegawai Penilai Pertama (PPP) :</label>
				  <div class="col-sm-8">
					<p class="form-control-static"><?=$nama_ppp?></p>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="pwd">Pegawai Penilai Kedua(PPK) :</label>
				  <div class="col-sm-8">          
					<p class="form-control-static"><?=$nama_ppk?></p>
				  </div>
				</div>
				<p>Sila rujuk kepada urusetia di Pusat Pengajian untuk kemaskini maklumat PPP/PPK.
                 </p>
			</div>
		</div>
	</div>
</div>
<div class="row">
<div class="col-xs-12">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Persetujuan</h3>
		</div>
		<div class="box-body">
		 <form class="form-horizontal" role="form">
			<div class="checkbox">
			  <label><input type="checkbox" value="">Hantar kepada PPP/PPK </label>
			</div>
		</div>
		<div class="box-footer">			
			<button type="button" class="btn btn-primary" onclick="document.location.href='<?=base_url()?>index.php/sasaran/skt_pensyarah'">< Kembali Kepada Pengisian SKT</button>
			<button type="button" class="btn btn-primary pull-right" onclick="submission()" >Hantar kepada PPP/PPK ></button>
		</div>
	</div>
</div>

<script>
function submission()
{
	if(confirm('sure?'))
		$.php('<?=base_url()?>index.php/sasaran/submission');
}
</script>
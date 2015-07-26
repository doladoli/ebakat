<div class="row">
	
	<div class="col-xs-6">
		<div class="box box-primary">
			<div class="box-header">
			  <h3 class="box-title">Maklumat SKT </h3>
			</div>
			
			<div class="box-body">
			
			 <form class="form-horizontal" role="form">
				<div class="form-group">
				  <label class="control-label col-sm-4" for="email">Tahun Nilai :</label>
				  <div class="col-sm-8">
					<p class="form-control-static">2015</p>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="email">Jenis Pernilaian :</label>
				  <div class="col-sm-8">
					<p class="form-control-static">Normal</p>
				  </div>
				</div>
			</form>
			</div>
		</div>
	</div>
		<div class="col-xs-6">
		<div class="box box-primary">
			
			
			<div class="box-body">
			<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-info"></i> Makluman!</h4>
				Info alert preview. This alert is dismissable.
			  </div>
			 
			</div>
		</div>
	</div>
</div>
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
			  <h3 class="box-title">Maklumat Pegawai Penilai </h3>
			</div>
			<div class="box-body">
			
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
		  <h3 class="box-title">Status SKT Tahunan</h3>
		</div>
		<div class="box-body">
		
		<table class="table table-bordered">
    <thead>
      <tr>
        <th>Pengisian SKT</th>
        <th>Hantar SKT</th>
        <th>Pengesahan SKT</th>
      </tr>
    </thead>
    <?php
	$sah = false;
	$issubmit = ($submit->num_rows() > 0) ? true : false;
	if($submit->num_rows() > 0) 
	{
		$row = $submit->row();
		$sah = $row->ST_STATUS;
		if ($sah != "0") $sah = true;
	}
	?>
	<tbody>
	
      <tr>
        <td><?=($isi) ? "SUDAH" : "BELUM"?></td>
        <td><?=($issubmit) ? "SUDAH" : "BELUM"?></td>
        <td><?=($sah) ? "SUDAH" : "BELUM"?></td>
      </tr>
     
    </tbody>
  </table>
		 <form class="form-horizontal" method="post" role="form" action="<?=base_url()?>index.php/sasaran/skt_pensyarah">
			
		<div class="box-footer">
		<?php if ($issubmit) {?>
			<button type="button" class="btn btn-primary" >Lihat SKT</button>
		<?php } else {?>
			<button type="submit" class="btn btn-primary pull-right" >Pengisian Sasaran Kerja Tahunan ></button>
		<?php }?>
		</div>
		</form>
	</div>
</div>
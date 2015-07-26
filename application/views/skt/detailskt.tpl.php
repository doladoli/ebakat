<div class="row">
	<div class="col-xs-12">
	 
		 <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
				<?php $i=0; foreach($kriteria->result() as $k){?>
                  <li <?php ++$i; if ($i==1) {?> class="active" <?php }?>><a href="#tab_<?=$k->KR_ID?>" data-toggle="tab"><?=$k->KR_KETERANGAN?></a></li>
				<?php }  ?>
                  
                  
                 <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
                </ul>
                <div class="tab-content">
                  <?php $i=0; foreach($kriteria->result() as $k){?>
				  <div class="tab-pane <?php ++$i; if ($i==1) {?>active<?php }?>" id="tab_<?=$k->KR_ID?>">
					<?php echo_table_title($k->KR_KOD." : ".$k->KR_KETERANGAN, true, "open_modal(".$k->KR_ID.");")?>
					<?php
						$ppk = ""; $ppp = "";
						$pn = $this->pm->senarai_all_penilai(getic(), $k->KR_ID);
						if ($pn->num_rows() > 0) 
						{
							$penilai = $pn->row();
							$ppp = $penilai->NAMA_PPP;
							$ppk = $penilai->NAMA_PPK;
						}
					?>
                    <div class="box-body table-responsive no-padding">
						<table width="100%" class="table">
							<tr>
								<td width="20%">Pegawai Penilai Pertama</td>
								<td width="1%">:</td>
								<td><?=($ppp != "") ? $ppp : "Belum Ditetapkan"?></td>
							</tr>
							<tr>
								<td>Pegawai Penilai Kedua</td>
								<td>:</td>
								<td><?=($ppk != "") ? $ppk : "Belum Ditetapkan"?></td>
							</tr>
						</table>
						<br>
						<div class="box-header">
						<h3 class="box-title">Senarai Sasaran Kerja Tahunan</h3>
						</div>
						<table id="sp_list_<?=$k->KR_ID?>" width="100%" class="table table-hover table-bordered table-striped">	
						
							<thead>
							<tr>
							
								<th>Aktiviti</th>
								<th>Petunjuk Prestasi</th>
								<th>Sasaran</th>
				
							</tr>
							</thead>
							<?php $skt = $this->pm->get_sasaran_tahunan(getic(), $k->KR_ID);?>
							<tbody>
							<?php echo $this->load->view("skt/listsktppp.tpl.php", array("skt"=>$skt));?>
							</tbody>
						</table>
					</div>
                  </div><!-- /.tab-pane -->
                  <?php }  ?>
				 
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            
		
	  </div><!-- /.box -->
	
</div>
<div class="row">
	<div class="col-xs-12">	 
		 <div class="box">
				<div class="box-header">
                  <h3 class="box-title">Pengesahan</h3>
                </div>
                <div class="box-body">
                  <form role="form"> 
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"/>
                          Saya bersetuju dengan sasaran kerja yang telah diisi oleh Pegawai Yang Dinilai (PYD) ini
                        </label>
                      </div>
					
					</div>
					 <button id="btn_hantar" class="btn bg-maroon btn-flat margin pull-right">Simpan Pengesahan</button>				
					</form>
				</div>
		 </div>
	</div>
</div>
<div class="example-modal">
	<div class="modal fade" id="myModal">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Sasaran Kerja Tahunan</h4>
		  </div>
		  <div class="modal-body">
			<form role="form" id="myForm">
                <div class="form-group">
				  <label>Aktiviti</label>
				  <textarea name="aktiviti" class="form-control" rows="3" placeholder="Enter ..."></textarea>
				</div>
                <div class="form-group">
				  <label>Petunjuk Prestasi</label>
				  <textarea name="petunjuk" class="form-control" rows="3" placeholder="Enter ..."></textarea>
				</div>
                <div class="form-group">
				  <label>Sasaran</label>
				  <textarea name="sasaran" class="form-control" rows="3" placeholder="Enter ..."></textarea>
				</div>
				<input type="hidden" name="wf_id_kriteria" id="wf_id_kriteria">
			</form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary" id="btnsimpan">Simpan</button>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  </div><!-- /.example-modal -->

<input type="hidden" id="lastsync" value="<?=time()?>">
<script>
$(document).ready(function() {
	$("#btn_add1").click(function(){
		$('#myModal').modal('show')
	});
	$("#btnsimpan").click(function(){
		$.php('<?=base_url()?>index.php/skt/saveskt', $('form#myForm').formToArray(true));
	});
	$("#btn_hantar").click(function(){
		if(confirm("Anda pasti mengesahkan sasaran kerja tahun PYD ini?")) {
			$.php('<?=base_url()?>index.php/skt/submission', $('form#myForm').formToArray(true));
		}
		else
			return false;
		
	});
	
});

function open_modal(id)
{
	$("#wf_id_kriteria").val(id);
	$('#myModal').modal('show');
}
</script>
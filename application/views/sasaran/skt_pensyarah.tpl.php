

<?=$dd_k?>
<div class="row">
	<div class="col-xs-12">
		
		 <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
				<?php $i=0; foreach($sub->result() as $k){?>
                  <li <?php ++$i; if ($i==1) {?> class="active" <?php }?>><a href="#tab_<?=$k->KR_ID?>" data-toggle="tab"><?=$k->KR_KETERANGAN?></a></li>
				<?php }  ?>
                  
                  
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <?php $i=0; $prev=""; $numrows = $sub->num_rows();
					foreach($sub->result() as $k){
						$prev = $sub->row_array($i-1);
						$next = $sub->row_array($i+1); 
						
						$str_btn_next = (($i+1) == $numrows) ? "Save And Next Kriteria" : "Save And Next";
						$nextpage = (($i+1) == $numrows) ? 1 : 0;
						//$row = $sub->row_array(3); 
					  ?>
				  <div class="tab-pane <?php  if ($i==0) {?>active<?php }?>" id="tab_<?=$k->KR_ID?>">
					<?php echo_table_title($k->KR_KETERANGAN)?>
		
                    <div class="box-body table-bordered no-padding">
						<form method="post" action="<?=base_url()?>index.php/sasaran/save_skt" id="form_<?=$k->KR_ID?>">
						<table class="table table-hover table-bordered">
							<tr>
								<th width="50%">Item Sasaran</th>
								<th width="10%">Sasaran Ditetapkan</th>
								<th width="10%">Sasaran </th>
								<th width="30%">Catatan</th>								
							</tr>
							
						<?php
							//$sub = $this->pm->get_sub_kriteria($k->KR_ID);
							__jana($k->KR_ID, $this->pm, $this->util, 0, $profil);
						?>
						
						</table>
						</form>
					</div>
					<div class="box-footer">
                    <?php if($i != 0) {?>
					<button type="button" class="btn btn-primary" onclick="activaTab('<?=$prev["KR_ID"]?>','<?=$k->KR_ID?>','-1')">< Back</button>
                    <?php }?>
					<button type="button" class="btn btn-primary pull-right" onclick="activaTab('<?=$next["KR_ID"];?>', '<?=$k->KR_ID?>', '<?=$nextpage?>')"><?=$str_btn_next?> ></button>
					
                  
                  </div>
                  </div><!-- /.tab-pane -->
                  <?php $i++;}  ?>
				 
                </div><!-- /.tab-content -->
				<!--
				<div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
					
                  </a>
                  </div> -->
              </div><!-- nav-tabs-custom -->
          
		
	  </div><!-- /.box -->
	
</div>

<div class="example-modal">
	<div class="modal fade" id="myModal">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Sasaran Kerja Tahunan </h4>
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
			</form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Simpan</button>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  </div><!-- /.example-modal -->

<input type="hidden" id="lastsync" value="<?=time()?>">
<script>
$(document).ready(function() {
	$("#btn_add").click(function(){
		$('#myModal').modal('show')
	});	
});

function activaTab(tab, idform, nextpage){
	if (nextpage == "0") {
		$('.nav-tabs a[href="#tab_' + tab + '"]').tab('show');
		$.php('<?=base_url()?>index.php/sasaran/save_skt_pensyarah', $('form#form_'+idform).formToArray(true));
	}
	else if (nextpage == "-1") {
		$('.nav-tabs a[href="#tab_' + tab + '"]').tab('show');
	}
	else{
		if ($("#id_current_kriteria").val() == $("#id_last_kriteria").val())		
			document.location.href="<?=base_url()?>index.php/sasaran/summary/";
		else
			document.location.href="<?=base_url()?>index.php/sasaran/skt_pensyarah/"+$("#id_next_kriteria").val();
	}
};

</script>
<?php
function __jana($id, $conn, $lib, $l, $profil)
{ 
	$sub = $conn->get_sub_kriteria($id);
	if ($sub->num_rows() > 0) {
		
		foreach($sub->result() as $s)
		{			
			$x = $conn->get_sub_kriteria($s->KR_ID);			
			$li =  "<tr><td><span style='margin-left:".($l*20)."px'>".$s->KR_KETERANGAN."</span></td>";
			if ($x->num_rows() <= 0)
			{
				$val = $conn->get_sasaran_by_jawatan($profil->GRED, $profil->PTJ, $s->KR_ID);
				$li .= "<td>".(($val != "") ? $val : "Tiada")."</td>";
				if ($s->KR_SKT_DS != "") {
					$ds = $s->KR_SKT_DS;					
					$li .= "<td>".$lib->$ds("field_".$s->KR_ID, "field_".$s->KR_ID, $val)."</td>";					
				}
				else
				{
					//$li.="<td><input type='text'></td>";
				}
				
				$li .='<td><textarea rows="2" cols="50" name="catatan_'.$s->KR_ID.'" ></textarea></td>';
			}
			else 
			{
				$li.="<td></td>";
			}
			$li.="</tr>";
			echo $li;
			if ($x->num_rows() > 0) {
				__jana($s->KR_ID, $conn, $lib, $l+1, $profil);
			}
		}
		//echo "</table>";
	}
	
	return $l;
}

?>

<style>
.listRight {
    position: absolute; 
    right: 15px;
    top: 15px;
}

ul.subk {
    max-width: 75%;
    margin: 0 auto;
}

ul.subk li {
    position: relative;
    
    background: #f2f2f2;
    margin-bottom: 15px;
    padding: 15px;
    padding-right: 100px;
}
</style>
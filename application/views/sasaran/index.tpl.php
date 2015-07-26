<form method="post" action="<?=base_url()?>index.php/sasaran/save_skt">
<?=$this->util->box_ptj()?>
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
                  <?php $i=0; foreach($sub->result() as $k){?>
				  <div class="tab-pane <?php ++$i; if ($i==1) {?>active<?php }?>" id="tab_<?=$k->KR_ID?>">
					<?php echo_table_title($k->KR_KETERANGAN)?>
		
                    <div class="box-body table-bordered no-padding">
						<table class="table table-hover table-bordered">
							<tr>
								<th>ITEM</th>
								<?php foreach($gred->result() as $g) {?>
								<th align="center"><?=$g->KOD?></th>	
								<?php }?>
							</tr>
							
						<?php
							//$sub = $this->pm->get_sub_kriteria($k->KR_ID);
							__jana($k->KR_ID, $this->pm, $this->util, 0, $gred);
						?>
						
						</table>
					</div>
                  </div><!-- /.tab-pane -->
                  <?php }  ?>
				 
                </div><!-- /.tab-content -->
				
				<div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
					
                  </a>
                  </div>
              </div><!-- nav-tabs-custom -->
          
		
	  </div><!-- /.box -->
	
</div>
  </form>
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
</script>
<?php
function __jana($id, $conn, $lib, $l, $gred)
{ 
	$sub = $conn->get_sub_kriteria($id);
	if ($sub->num_rows() > 0) {
		
		foreach($sub->result() as $s)
		{			
			$x = $conn->get_sub_kriteria($s->KR_ID);			
			$li =  "<tr><td><span style='margin-left:".($l*20)."px'>".$s->KR_KETERANGAN."</span></td>";
			if ($x->num_rows() <= 0)
			{
				if ($s->KR_SKT_DS != "") {
					$ds = $s->KR_SKT_DS;
					foreach($gred->result() as $g) {
						$li.="<td>".$lib->$ds("field_".$s->KR_ID."_".$g->KOD, "field_".$s->KR_ID."_".$g->KOD)."</td>";
					}
				}
				else
				{
					//$li.="<td><input type='text'></td>";
				}
				
			}
			else 
			{
				$li.="<td></td>";
			}
			$li.="</tr>";
			echo $li;
			if ($x->num_rows() > 0) {
				__jana($s->KR_ID, $conn, $lib, $l+1, $gred);
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
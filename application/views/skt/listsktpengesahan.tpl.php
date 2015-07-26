<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
                  <h3 class="box-title">Senarai SKT untuk pengesahan</h3>
                  <div class="box-tools">
                   <!-- <div class="input-group">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div> -->
                  </div>
                </div>		<div class="box-body table-responsive no-padding">
			<table width="100%" class="table table-hover table-bordered table-striped">	
				<thead>
				<tr>
					<th width="5%">Bil.</th>
					<th>Nama Pensyarah</th>
					<th>Gred</th>
					<th>Pengesahan SKT</th>
					
					<th width="10%">SKT</th>
					<th width="10%">Reset</th>
				</tr>
				</thead>
				
				<tbody>
					<?php $i=0; foreach($senarai->result() as $row) {?>
					<tr>
						<td><?=++$i?></td>
						<td><b><?=$row->NAMA?></b><br><?=$row->JAWATAN?></td>
						<td><?=$row->STAF_GRED?></td>
						<td>Belum Sah</td>
						<td><a href="<?=base_url()?>index.php/skt/detailskt/<?=$row->NOKP_BARU?>">SKT</a></td>
						<td><a href="#">Reset</a></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>
</div>
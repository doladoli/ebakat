<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<?php echo_table_title('Senarai Aduan')?>
		<div class="box-body table-responsive no-padding">
			<table width="100%" class="table table-hover table-bordered table-striped">	
				<tr>
					<th>Bil.</th>
					<th>Status</th>
					<th>Tarikh Aduan</th>		
					<th>Nama</th>
					<th>Jenis Masalah</th>
					<th>Keterangan Masalah</th>
					
					<th></th>
				</tr>
			
				<tbody>
				<?php echo $this->load->view("admin/list_all_aduan.tpl.php", array("aduan"=>$aduan));?>
				</tbody>
			</table>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>
</div>

<input type="hidden" id="lastsync" value="<?=time()?>">
<script>
window.setInterval (
	function () {
		//alert('sdsd');
		php.beforeSend = function (){
			//	alert('test')
		}
		$.php('<?=base_url()?>index.php/photo/reload', {'lastsync' : $("#lastsync").val()});
	},
60000); //loop 1 stgh saat sekali
</script>
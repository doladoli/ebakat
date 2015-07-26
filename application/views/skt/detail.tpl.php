 <form method="post" action="<?=base_url()?>index.php/admin/saveaduan">
<input type="hidden" name="id" value="<?=$id?>">

<div class="row">
	<div class="col-xs-6">
	  <div class="box">
		<?php echo_table_title('Maklumat Pelajar')?>
		<div class="box-body table-responsive no-padding">
			<table width="70%" class="table">				
				<tr>
					<th width="20%">Nama  </th>
					<th width="1%">:</th>
					<td><?=$u->PEL_NAMA_PELAJAR?></td>
				</tr>
				<tr>
					<th>No Matrik  </th>
					<th>:</th>
					<td><?=$u->PEL_NO_MATRIK?></td>
				</tr>
				<tr>
					<th>Gambar  </th>
					<th>:</th>
					<td><img id="image_233" src="http://mynemo.umt.edu.my/sip/foto.php?matrik=<?php echo $u->PEL_NO_MATRIK?>" width="100" /></td>
				</tr>
				<tr>
					<th>No Telefon  </th>
					<th>:</th>
					<td><?=$u->NO_TEL_PELAJAR?></td>
				</tr>
				<tr>
					<th>Program </th>
					<th>:</th>
					<td><?=$u->PRG_NAMA_PROGRAM_BM?></td>
				</tr>
				<tr>
					<th>Tahun </th>
					<th>:</th>
					<td><?=$u->TAHUN_SEMASA?></td>
				</tr>
				
				<tr>
					<th>Status Pengajian  </th>
					<th>:</th>
					<td><?=$u->STATUS_PELAJAR?></td>
				</tr>
			</table>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>
	<div class="col-xs-6">
	  <div class="box">
		<?php echo_table_title('Maklumat Aduan')?>
		<div class="box-body table-responsive no-padding">
			<table width="70%" class="table">				
				
				<tr>
					<th>Jenis Aduan </th>
					<th>:</th>
					<td><?=$u->KETERANGAN?></td>
				</tr>
				<tr>
					<th>Serahan Barangan </th>
					<th>:</th>
					<td><?=$u->SERAHAN_BARANGAN?></td>
				</tr>
				<tr>
					<th>Model Laptop </th>
					<th>:</th>
					<td><?=$u->JENAMA_LAPTOP?></td>
				</tr>
				<tr>
					<th>Keterangan Masalah </th>
					<th>:</th>
					<td><?=$u->KETERANGAN_MASALAH?></td>
				</tr>
				<tr>
					<th>Status  </th>
					<th>:</th>
					<td><select name="status">
							<option value="">Sila pilih</option>
							<option <?=($u->STATUS=='S') ? 'selected' : '' ?> value="S">Siap</option>
							<option <?=($u->STATUS=='K') ? 'selected' : '' ?> value="K">KIV</option>
							<option <?=($u->STATUS=='B') ? 'selected' : '' ?> value="B">Batal </option>
						</select></td>
				</tr>
				<tr>
					<th>Maklumat Kerosakan </th>
					<th>:</th>
					<td><textarea name="kerosakan" rows="4" cols="50"><?=$u->KEROSAKAN?></textarea></td>
				</tr>
				<tr>
					<th>Catatan </th>
					<th>:</th>
					<td><textarea name="catatan" rows="4" cols="50"><?=$u->CATATAN?></textarea></td>
				</tr>
			</table>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>

</div>
<div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo base_url()?>index.php/admin/cetak/<?=$u->ID?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Simpan</button>
              <!--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button> -->
            </div>
          </div>    
</form>  
    

    
    
<!--/Content-->



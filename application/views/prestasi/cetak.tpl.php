  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> Pusat Pengurusan Teknologi Maklumat
              <small class="pull-right">Tarikh: <?=date('d/m/Y')?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
       
		<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<?php echo_table_title('Maklumat Aduan')?>
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
					<th>Tarikh Aduan </th>
					<th>:</th>
					<td><?=$u->TARIKH_ADUAN?></td>
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
					<th>Jenis Aduan </th>
					<th>:</th>
					<td><?=$u->KETERANGAN?></td>
				</tr>
				<tr>
					<th>Keterangan Masalah </th>
					<th>:</th>
					<td><?=nl2br($u->KETERANGAN_MASALAH)?></td>
				</tr>
				<tr>
					<th>Status  </th>
					<th>:</th>
					<td><?php
					switch($u->STATUS)
					{
						case 'S' : echo "SIAP";break;
						case 'K' : echo "KIV";break;
						case 'B' : echo "BATAL";break;
						default: echo "PENDING";
					}
					?>
					</td>
				</tr>
				<tr>
					<th>Catatan </th>
					<th>:</th>
					<td><?=nl2br($u->CATATAN)?></td>
				</tr>
				<tr>
					<th>Staf Bertugas </th>
					<th>:</th>
					<td><?=$_SESSION['nama']?></td>
				</tr>
			</table>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>
</div>

  
      </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>asset/adminlte/dist/js/app.min.js" type="text/javascript"></script>
  </body>

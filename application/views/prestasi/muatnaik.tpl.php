<!DOCTYPE html>
<html>
  <head>
    <title>cropit</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


    <style>
      .cropit-image-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 301px;
        height: 356px;
        cursor: move;
      }

      .cropit-image-background {
        opacity: .2;
        cursor: auto;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input {
        display: block;
      }

      button[type="submit"] {
        margin-top: 10px;
      }

      #result {
        margin-top: 10px;
        width: 900px;
      }

      #result-data {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-wrap: break-word;
      }
    </style>
  </head>
  <body>
    <form method="post" action="<?=base_url()?>index.php/admin/saveaduan">
		<input type="hidden" name="id" value="<?=$id?>">
	  <table>
			<tr>
                <td class="label" width="40%"></td>
                <td width="80%"> <img src="http://mynemo.umt.edu.my/sip/foto.php?matrik=<?php echo $u->PEL_NO_MATRIK?>" width="150px"> </td>
              </tr>
              <tr>
                <td class="label" width="40%">Nama :</td>
                <td width="80%"> <span id="nama"><?=$u->PEL_NAMA_PELAJAR?></span> </td>
              </tr>
			  <tr>
                <td class="label">No matrik :</td>
                <td ><span id="xno_matrik"><?=$u->PEL_NO_MATRIK?></span></td>
              </tr>
			  <tr>
                <td class="label">Program :</td>
                <td ><span id="xno_matrik"><?=$u->PRG_NAMA_PROGRAM_BM?></span></td>
              </tr>
              <tr>
                <td class="label">Tahun :</td>
                <td ><span id="s_program"><?=$u->TAHUN_SEMASA?></span></td>
              </tr>
			  <tr>
                <td class="label">Jenis Aduan:</td>
                <td ><?=$u->KETERANGAN?></td>
              </tr>
			  <tr>
                <td class="label">Keterangan Masalah :</td>
                <td>
				<?=$u->KETERANGAN_MASALAH?>
		
				
		  
			</td>
            </tr>
			

				<tr>
					<td>Status : </td>
					<td>
						<select name="status">
							<option value="">Sila pilih</option>
							<option value="S">Siap</option>
							<option value="K">KIV</option>
							<option value="B">Batal </option>
						</select>
					</td>
				</tr>
            <tr>
                <td class="label"></td>
                <td >  <button type="submit">Submit</button></td>
              </tr>  
            </table>
      
	
    </form>
	<!--
    <div id="result">
      <code>$form.serialize() =</code>
      <code id="result-data"></code>
    </div> -->

    <script>
      $(function() {
        $('.image-editor').cropit();

        $('form').submit(function() {
          // Move cropped image data to hidden input
          var imageData = $('.image-editor').cropit('export');
          $('.hidden-image-data').val(imageData);

          // Print HTTP request params
          var formValue = $(this).serialize();
          $('#result-data').text(formValue);

          // Prevent the form from actually submitting
		  
		  if($("#singkatan").val() == ""){
			alert("Sila masukkan singkatan nama");
			return false;
		}
		else if($(".hidden-image-data").val() == ""){
				alert("Sila pilih gambar yang ingin dijana");
				return false;
		}
          //return false;
        });
      });
    </script>
  </body>
</html>

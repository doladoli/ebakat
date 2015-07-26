<!DOCTYPE html>
<html>
  <head>
    <title>cropit</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.cropit.min.js"></script>

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
    <form method="post" action="<?=base_url()?>index.php/photo/savegambar" target="myframe">
      <div class="image-editor">
        <input type="file" class="cropit-image-input">
        <div class="cropit-image-preview"></div>
        <div class="image-size-label">
          Resize image
        </div>
        <input type="range" class="cropit-image-zoom-input">
        <input type="hidden" name="image-data" class="hidden-image-data" />
		
        <input type="hidden" name="nom_id" value="<?=$nom_id?>" />
        Singkatan : <input type="text" name="singkatan" value="" />
        <button type="submit">Submit</button>
      </div>
    </form>
	<iframe name="myframe" width="400px" height="280px" style="border:0px;"></iframe>
    <div id="result">
      <code>$form.serialize() =</code>
      <code id="result-data"></code>
    </div>

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
          //return false;
        });
      });
    </script>
  </body>
</html>

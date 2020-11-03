<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Upload</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4>Image Upload</h4>
          </div>
          <div class="card-body">
            <div id="alertMessage">

            </div>
            <form method="POST" id="image-upload-form" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="image" id="image" class="form-control p-1" required>
              </div>

              <div class="form-group" id="image-preview">

              </div>

              <div class="form-group">
                <input type="submit" value="Upload Image" class="btn btn-primary btn-block" id="image-upload-btn">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js'></script>
  <script>
  $(function() {
    $("#image").change(function() {
      let url = window.URL.createObjectURL(this.files[0]);
      $("#image-preview").html(`<img src="${url}" class="img-fluid img-thumbnail">`);
    });

    $("#image-upload-form").submit(function(e) {
      e.preventDefault();

      let fd = new FormData(this);
      fd.append('upload', 1);

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        success: function(res) {
          $("#alertMessage").html(res);
        }
      });
    });
  });
  </script>
</body>

</html>

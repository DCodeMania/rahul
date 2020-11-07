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
                <input type="text" name="pname" id="pname" class="form-control" placeholder="Enter product name" required>
              </div>

              <div class="form-group">
                <input type="number" name="pprice" id="pprice" class="form-control" placeholder="Enter product price" required>
              </div>

              <div class="form-group">
                <label for="image">Select Product Image</label>
                <input type="file" name="image" id="image" class="form-control p-1" required>
              </div>

              <div class="form-group" id="image-preview">

              </div>

              <div class="form-group">
                <div class="progress" style="height: 25px; display: none;">
                  <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
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

    function showMessage(type, message) {
      return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
      <strong>${message}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>`;
    }

    $("#image").change(function() {
      // Extract file extension
      let ext = $(this).val().split('.').pop().toLowerCase();

      const allowed_ext = ['jpg', 'png', 'jpeg', 'gif'];

      if ($.inArray(ext, allowed_ext) != -1) {
        if (this.files[0].size <= 1000000) {
          let url = window.URL.createObjectURL(this.files[0]);
          $("#image-preview").html(`<img src="${url}" class="img-fluid img-thumbnail">`);
          $("#image-upload-btn").prop('disabled', false);
        } else {
          $("#image-preview").html('');
          $("#image-upload-btn").prop('disabled', true);
          $("#alertMessage").html(showMessage('danger', 'File size should be less or equal to 1MB!'));
        }
      } else {
        $("#image-preview").html('');
        $("#image-upload-btn").prop('disabled', true);
        $("#alertMessage").html(showMessage('danger', 'File type not supported!'));
      }
    });

    $("#image-upload-form").submit(function(e) {
      e.preventDefault();

      let fd = new FormData(this);
      fd.append('upload', 1);

      $.ajax({
        xhr: function() {
          let xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener('progress', function(evt) {
            if (evt.lengthComputable) {
              $(".progress").show();
              let percent = Math.floor(((evt.loaded / evt.total) * 100));
              $(".progress-bar").width(percent + '%');
              $(".progress-bar").text(percent + '%');
            }
          }, false);
          return xhr;
        },
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

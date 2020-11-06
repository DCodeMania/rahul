<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
</head>

<body>
  <!-- Edit Product Modal Start -->
  <div class="modal fade " tabindex="-1" id="editProductModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="alertMessage">

          </div>
          <form method="POST" id="edit-product-form" enctype="multipart/form-data">
            <input type="hidden" name="pid" id="pid">
            <input type="hidden" name="old_image" id="old_image">
            <div class="form-group">
              <input type="text" name="pname" id="pname" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="form-group">
              <input type="number" name="pprice" id="pprice" class="form-control" placeholder="Enter product price" required>
            </div>

            <div class="form-group">
              <label for="image">Select Product Image</label>
              <input type="file" name="pimage" id="pimage" class="form-control p-1">
            </div>

            <div class="form-group" id="image-preview">

            </div>

            <div class="form-group">
              <div class="progress" style="height: 25px; display: none;">
                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="form-group">
              <input type="submit" value="Update Product" class="btn btn-danger btn-block" id="update-product-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit Product Modal End -->
  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>All Products in the database!</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover text-center">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script>
  $(function() {
    fetchAllProducts();

    function fetchAllProducts() {
      $.ajax({
        url: 'action.php',
        method: 'POST',
        data: {
          fetch_all_products: 1
        },
        success: function(res) {
          $("tbody").html(res);
        }
      });
    }

    // Fetch Single Product Details Ajax Request
    $(document).on('click', '.editBtn', function(e) {
      e.preventDefault();
      let pid = $(this).attr('id');

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          edit_product_id: pid
        },
        dataType: 'json',
        success: function(res) {
          $("#pid").val(res.id);
          $("#old_image").val(res.pimage);
          $("#pname").val(res.pname);
          $("#pprice").val(res.pprice);
          $("#image-preview").html(`<img src="${res.pimage}" class="img-fluid">`);
        }
      });
    });

    // Update product details ajax request
    function showMessage(type, message) {
      return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
      <strong>${message}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>`;
    }

    $("#pimage").change(function() {

      let ext = $(this).val().split('.').pop().toLowerCase();
      const allowed_ext = ['jpg', 'png', 'jpeg', 'gif'];

      if ($.inArray(ext, allowed_ext) != -1) {
        if (this.files[0].size <= 1000000) {
          let url = window.URL.createObjectURL(this.files[0]);
          $("#image-preview").html(`<img src="${url}" class="img-fluid img-thumbnail">`);
          $("#update-product-btn").prop('disabled', false);
        } else {
          $("#image-preview").html('');
          $("#update-product-btn").prop('disabled', true);
          $("#alertMessage").html(showMessage('danger', 'File size should be less or equal to 1MB!'));
        }
      } else {
        $("#image-preview").html('');
        $("#update-product-btn").prop('disabled', true);
        $("#alertMessage").html(showMessage('danger', 'File type not supported!'));
      }
    });



    $("#edit-product-form").submit(function(e) {
      e.preventDefault();

      let fd = new FormData(this);
      fd.append('update_product', 1);

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
          fetchAllProducts();
        }
      });
    });


  });
  </script>
</body>

</html>

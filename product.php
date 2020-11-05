<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
</head>

<body>
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

  });
  </script>
</body>

</html>

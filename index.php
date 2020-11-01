<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Application</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>
  <!-- Add New User Modal Start -->
  <div class="modal fade" tabindex="-1" data-backdrop="static" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="add-user-form" class="p-2" novalidate>
            <div class="form-group">
              <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
              <div class="invalid-feedback">First name is required!</div>
            </div>

            <div class="form-group">
              <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
              <div class="invalid-feedback">Last name is required!</div>
            </div>

            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
              <div class="invalid-feedback">E-mail is required!</div>
            </div>

            <div class="form-group">
              <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone" required>
              <div class="invalid-feedback">Phone is required!</div>
            </div>

            <div class="form-group">
              <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add New User Modal End -->
  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4>All users in database!</h4>
        </div>
        <div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewUserModal">Add New User</button>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
        <div id="showAlert">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-striped text-center table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-Mail</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="displayAllUsers">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js'></script>
  <script src="main.js"></script>
</body>

</html>

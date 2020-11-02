// jquery method
$(function () {
  // Add New User Ajax Request
  $("#add-user-form").submit(function (e) {
    let form = $(this)[0];

    if (!form.checkValidity()) {
      e.preventDefault();
      e.stopPropagation();
    } else {
      $("#add-user-btn").val("Please Wait...");
      $.ajax({
        url: "action.php",
        method: "post",
        data: $(form).serialize() + "&add_user=1",
        success: function (response) {
          $("#showAlert").html(response);
          $("#add-user-btn").val("Add User");
          $(form)[0].reset();
          $(form).removeClass("was-validated");
          $("#addNewUserModal").modal("hide");
          fetchAllUsers();
        },
      });
    }
    $(form).addClass("was-validated");
    return false;
  });

  // Fetch All Users Ajax Request
  fetchAllUsers();
  function fetchAllUsers() {
    $.ajax({
      url: "action.php",
      method: "post",
      data: { fetch_all_users: 1 },
      success: function (response) {
        $("#displayAllUsers").html(response);
      },
    });
  }

  // Edit Signle User Ajax Request
  $(document).on("click", ".editBtn", function (e) {
    e.preventDefault();
    let id = $(this).attr("id");
    $.ajax({
      url: "action.php",
      method: "post",
      data: { edit_id: id },
      success: function (response) {
        let data = JSON.parse(response);
        $("#editId").val(data.id);
        $("#fname").val(data.first_name);
        $("#lname").val(data.last_name);
        $("#email").val(data.email);
        $("#phone").val(data.phone);
      },
    });
  });

  // Update Single User Ajax Request
  $("#edit-user-form").submit(function (e) {
    let form = $(this)[0];

    if (!form.checkValidity()) {
      e.preventDefault();
      e.stopPropagation();
    } else {
      $("#edit-user-btn").val("Please Wait...");
      $.ajax({
        url: "action.php",
        method: "post",
        data: $(form).serialize() + "&update_user=1",
        success: function (response) {
          $("#showAlert").html(response);
          $("#edit-user-btn").val("Add User");
          $(form)[0].reset();
          $(form).removeClass("was-validated");
          $("#editUserModal").modal("hide");
          fetchAllUsers();
        },
      });
    }
    $(form).addClass("was-validated");
    return false;
  });
});

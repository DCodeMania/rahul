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
        },
      });
    }
    $(form).addClass("was-validated");
    return false;
  });
});

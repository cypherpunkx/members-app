$(function () {
  $(".add-member-btn").on("click", function () {
    $("#addMemberLabel").html("Add Member");
    $(".btn-action").html("Add");
    console.log("ok");
  });

  $(".update-member-btn").on("click", function () {
    $("#addMemberLabel").html("Update Member");
    $(".btn-action").html("Update");
    $(".modal-body form").attr(
      "action",
      "http://localhost/phpmvc/public/members/update"
    );

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/phpmvc/public/members/getUpdate",
      data: { id },
      method: "post",
      datatype: "json",
      success: function (results) {
        const { id, first_name, last_name, email, gender, ip_address } =
          JSON.parse(results);
        $("#id").val(id);
        $("#first_name").val(first_name);
        $("#last_name").val(last_name);
        $("#email").val(email);
        $("#gender select").val(gender);
        $("#ip_address").val(ip_address);
      },
    });

    console.log("ok");
  });
});

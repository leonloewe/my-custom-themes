$(document).ready(function () {

    /* start camera */


    $("#be_wild").click(function(){
        $("#cam_content_img").fadeOut();
        $("#cam_content").fadeIn();
        create_stream();
       
        $("#be_wild").fadeOut();
    })
    /* end camera*/

    $("#user-phone").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
                // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

/*registered users view in admin*/
$(document).ready(function(){
    $("#f-o-more").on("click", function(){
        var userName = $("#user-name").val();
        var userPhone = $("#user-phone").val();
        var userEmail = $("#user-email").val();
        if(userName != "" && userPhone != "" && userEmail != "") {
            $("#error-msg").text("");
            $.ajax({
                url: "wp-admin/admin-ajax.php",
                type: "POST",
                data: "action=save_user_data&user_name=" + userName + "&user_phone=" + userPhone + "&user_email=" + userEmail,
                success: function (data) {
                    $("#error-msg").text(data);
                    console.log(data);
                }
            })
        } else {
            $("#error-msg").text("Please, fill the all the necessary fields");
        }
    })
});
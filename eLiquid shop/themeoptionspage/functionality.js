jQuery(function ($) {
    $(window).load(function () {
        $("#loader").fadeOut();
    });
    $(".file-delete").click(function () {
        var img_cl = $(this).data("img_cl");
        $("." + img_cl + "-img").attr("src", "");
        $(this).prev().val('false');
    });
    //$('input[type=hidden]').val('yes');
    $("#tabs").tabs({
        beforeLoad: function (event, ui) {
            console.log("bef");
        }
    }).addClass("ui-tabs-vertical ui-helper-clearfix");
    $("#tabs li").removeClass("ui-corner-top").addClass("ui-corner-left");

    $('#tabs li').click(function () {
        var action = $(this).find("a").attr('href');
        window.location = action;
    });
    $('.file-uploader').click(function () {
        $(this).parent().find('input[type=file]').trigger('click');
    });
    $('.color').wpColorPicker();
});
$(document).ready(function () {
    //todo change background color of menu-item
    $(".menu-item>a").click(function (e) {
        $(".active").removeClass("active");
        $(this).parent(".menu-item").addClass("active");
    });

    //todo click show/hide row3-item
    $(".bt-floor>button").click(function (e) {
        let id = $(this).attr("id");
        $(".row3-item").addClass("dn");
        $(".row3-item").eq(id).removeClass("dn");
    });

    //todo show/hide box-button
    var check = true;
    $(".box-icon").click(function (e) {
        console.log("hahah");
        if (check == true) {
            $(this).siblings(".box-button").removeClass("hide");
            check = false;
        } else {
            $(this).siblings(".box-button").addClass("hide");
            check = true;
        }
    });
});

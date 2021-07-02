$(document).ready(function () {
    //todo change background color of menu-item
    $(".menu-item>a").click(function (e) {
        $(".active").removeClass("active");
        $(this).parent(".menu-item").addClass("active");
    });

    //todo click show/hide row3-item
    $(".bt-floor>button").click(function (e) {
        let id = parseInt($(this).attr("id") - 1);
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

    //todo show/hide pop-up
    $(".bt-book-room").click(function (e) {
        $("section.pop-up").removeClass("dn");
    });
    $(".close").click(function (e) {
        $(this).parent().addClass("dn");
    });
});
$(document).ready(function () {
    for (let index = 0; index < 25; index++) {
        var status = $(".room-status").eq(index).text();
        $(".box-icon").eq(index).addClass(status);

        if (status == "full") {
            $(".box-button>.checkout-room").eq(index).removeClass("dn");
            $(".box-button>.bt-book-room").eq(index).addClass("dn");
        }
        else{
            $(".box-button>.checkout-room").eq(index).addClass("dn");
            $(".box-button>.bt-book-room").eq(index).removeClass("dn");
        }
    }
});

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

    //todo show/hide pop-up
    $(".bt-book-room").click(function (e) {
        $("section.pop-up").removeClass("dn");
    });
    $(".close").click(function (e) {
        $("section.pop-up").addClass("dn");
    });
    //todo show/hide pop-up-info
    $(".box-icon").click(function (e) {
        $("section.pop-up-info").removeClass("dn");
    });
    $(".pop-up-info .close").click(function (e) {
        $("section.pop-up-info").addClass("dn");
    });

    //todo show/hide chart
    $(".nav>button").click(function (e) {
        var id = $(this).attr("id");

        if (id == "room") {
            $(".btn-color").removeClass("btn-color");
            $(this).addClass("btn-color");
            $(".barChart").removeClass("dn");
            $(".lineChart").addClass("dn");
        } else {
            $(".btn-color").removeClass("btn-color");
            $(this).addClass("btn-color");
            $(".barChart").addClass("dn");
            $(".lineChart").removeClass("dn");
        }
    });
});
$(document).ready(function () {
    for (let index = 0; index < 25; index++) {
        var status = $(".room-status").eq(index).text();
        $(".box-icon").eq(index).addClass(status);

        if (status == "full") {
            $(".box-button>.checkout-room").eq(index).removeClass("dn");
            $(".box-button>.bt-book-room").eq(index).addClass("dn");
        } else {
            $(".box-button>.checkout-room").eq(index).addClass("dn");
            $(".box-button>.bt-book-room").eq(index).removeClass("dn");
        }
    }
});

$(document).ready(function () {
    $(".order").click(function (e) { 
        e.preventDefault();
        let maDV = $(this).parent().parent().find("td").eq(0).text();
        $.get("xulyDV/"+maDV,
            function (data, textStatus, jqXHR) {
                Render(data);
            },
            "html"
        );
    });
});
$(document).ready(function () {
    $("#gioDV").on("click",'.xoadv', function () {
        let madv = $(this).data('madv');
        $.get("xoaDV/"+madv,
           function (data, textStatus, jqXHR) {
               Render(data);
           },
           "html"
       ); 
    });
});
function Render(response){
    $("#gioDV").empty();
    $("#gioDV").html(response);
}
// thaydoi so luong
$(document).ready(function () {
    $("#gioDV").on("click",'.qtyplus ', function (e) {
        e.preventDefault();
        var count = parseInt($(this).parent().find('input').val())
        var id = ($(this).parent().find('input').attr('id'));
        if(!isNaN(count)){
            count++;
            count =count > 100 ? 1 : count;
            $(this).parent().find('input').val(count);
            thaydoisl(id,count);
        }
        else{
            input.val(1);
        }  
    });
    $("#gioDV").on("click",'.qtyminus ', function (e) {
        e.preventDefault();
        var count = parseInt($(this).parent().find('input').val())
        var id = ($(this).parent().find('input').attr('id'));
        if(!isNaN(count)){
            count--;
            count =count < 0 ? 1 : count;
            $(this).parent().find('input').val(count);
            thaydoisl(id,count);
        }
        else{
            input.val(1);
        }  
    });
});
function thaydoisl(id,quanty){
    $.ajax({
        type: "GET",
        url: "http://localhost/CNPM/public/thaydoisl/"+id+'/'+quanty,
        data: "",
        dataType: "html",
        success: function (response) {
            Render(response);
        }
    });
 }

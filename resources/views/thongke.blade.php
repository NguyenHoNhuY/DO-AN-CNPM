<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  </head>
  <body>
    <section class='barChart'>
        <h2>Xem doanh thu phòng</h2>
        <form id='phong'>
            Từ ngày <input type="date"  name='tungay'placeholder="Từ ngày"><br>
            Đến ngày <input type="date" name='denngay'placeholder="Đến ngày">
            <input type="button" value="Xem">
            <input type="button" value="Ẩn">
        </form>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class='ketqua'></div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#phong input[type=button]').eq(0).click(function (e) { 
                    e.preventDefault();
                    let start = $('#phong input[name=tungay]').val();
                    let end = $('#phong input[name=denngay]').val();
                    $.get("http://localhost/CNPM/public/doanhthuPhong",{tungay:start,denngay:end},
                        function (data, textStatus, jqXHR) {
                            $('.ketqua').html(data);
                            $('.ketqua').show();
                            $('#phong input[name=tungay]').val('');//rset gia tri cua form
                            $('#phong input[name=denngay]').val('');
                        },
                        "html"
                    );
                });
                $('#phong input[type=button]').eq(1).click(function (e) { 
                    e.preventDefault();
                    $('.ketqua').hide();
                });
            });
        </script>
    </section>
    <section class="lineChart">
        <h2>Xem doanh thu dịch vụ</h2>
        <form id='dichvu'>
            Từ ngày <input type="date"  name='tungay'><br>
            Đến ngày <input type="date" name='denngay'>
            <input type="button" value="Xem">
            <input type="button" value="Ẩn">
        </form>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class='ketquaa'></div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#dichvu input[type=button]').eq(0).click(function (e) { 
                    e.preventDefault();
                    let start = ($('#dichvu input[name=tungay]').val());
                    let end = ($('#dichvu input[name=denngay]').val());
                    $.get("http://localhost/CNPM/public/doanhthuDV",{tungay:start,denngay:end},
                        function (data, textStatus, jqXHR) {
                            $('.ketquaa').html(data);
                            $('.ketquaa').show();
                            $('#dichvu input[name=tungay]').val('');//rset gia tri cua form
                            $('#dichvu input[name=denngay]').val('');
                        },
                        "html"
                    );
                });
                $('#dichvu input[type=button]').eq(1).click(function (e) { 
                    e.preventDefault();
                    $('.ketquaa').hide();
                });
            });
        </script>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
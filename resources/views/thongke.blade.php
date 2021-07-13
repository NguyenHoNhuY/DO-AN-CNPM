<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->


    <base href="http://localhost/CNPM/resources/">
    <!-- link css -->
    <link rel="stylesheet" href="icon/fontawesome-free-5.15.3-web/css/all.css" />
    <link rel="stylesheet" href="css/layout/index.css" />
    <link rel="stylesheet" href="css/layout/thongke.css">
    <!-- /link css  -->

    <!-- link font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />

    <!-- /link font -->

    <!-- link js  -->
    <script src="icon/fontawesome-free-5.15.3-web/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="js/layout/index.js"></script>
    <!-- /link js -->
</head>

<body>
    <header>
        <div class="content">
            <div class="logo">
                <h1>MI MI HOTEL</h1>
            </div>
            <div class="checkin-account flex">
                <div class="login flex">
                    <div class="us-avatar">
                        <a class="flex" href="#">
                            <div class="av-item icon-user m-10 flex">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="av-item img-user m-10 flex">

                            </div>
                        </a>
                    </div>
                    <div class="us-name m-10">
                        @if(Session::has('nhanvien')!=null)
                        <p>{{ Session::get('nhanvien')[0]->TenNV }}</p>
                        <p>{{ Session::get('nhanvien')[0]->chucvu }}</p>
                        @endif
                    </div>
                </div>
                <div class="logout">
                    <a href="http://localhost/CNPM/public/dangxuat"> <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    </header>
    <section class="main flex">
        <div class="sidebar">
            <header>
                <h1>MENU</h1>
            </header>
            <div class="menu">
                <ul class="main-menu">
                    <li class="menu-item ">
                        <a href="http://localhost/CNPM/public/phong">Đặt/Trả phòng</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/CNPM/public/order">Dịch vụ</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/CNPM/public/nhanvien">Quản lí nhân viên</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/CNPM/public/khachhang">Quản lí khách hàng</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/CNPM/public/thanhtoan">Quản lí hóa đơn</a>
                    </li>
                    <li class="menu-item active">
                        <a href="http://localhost/CNPM/public/thongke">Thống kê báo cáo</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">
            <header class="flex">
                <h2>Thống Kê</h2>
            </header>
            <div class="body">
                <div class="nav">
                    <button id="room" class="btn-room btn-color">Doanh thu phòng</button>
                    <button id="service" class="btn-service">Doanh thu dịch vụ</button>
                </div>
                <div class="barChart chart">
                    <h2>Doanh thu phòng</h2>
                    <form id='phong'>
                        <label for="">Từ ngày</label>
                        <input type="date" name='tungay'>
                        <label for="">Đến ngày</label>
                        <input type="date" name='denngay'>
                        <input type="button" value="Xem">
                        <input type="button" value="Ẩn">
                    </form>
                    <div class="container">
                        <div class='ketqua'></div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#phong input[type=button]').eq(0).click(function(e) {
                                e.preventDefault();
                                let start = $('#phong input[name=tungay]').val();
                                let end = $('#phong input[name=denngay]').val();
                                $.get("http://localhost/CNPM/public/doanhthuPhong", {
                                        tungay: start,
                                        denngay: end
                                    },
                                    function(data, textStatus, jqXHR) {
                                        $('.ketqua').html(data);
                                        $('.ketqua').show();
                                        $('#phong input[name=tungay]').val(''); //rset gia tri cua form
                                        $('#phong input[name=denngay]').val('');
                                    },
                                    "html"
                                );
                            });
                            $('#phong input[type=button]').eq(1).click(function(e) {
                                e.preventDefault();
                                $('.ketqua').hide();
                            });
                        });
                    </script>
                </div>
                <div class="lineChart chart dn">
                    <h2>Doanh thu dịch vụ</h2>
                    <form id='dichvu'>
                        <label for="">Từ ngày</label>
                        <input type="date" name='tungay'>
                        <label for="">Đến ngày</label>
                        <input type="date" name='denngay'>
                        <input type="button" value="Xem">
                        <input type="button" value="Ẩn">
                    </form>
                    <div class="container">
                        <div class='ketquaa'></div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#dichvu input[type=button]').eq(0).click(function(e) {
                                e.preventDefault();
                                let start = ($('#dichvu input[name=tungay]').val());
                                let end = ($('#dichvu input[name=denngay]').val());
                                $.get("http://localhost/CNPM/public/doanhthuDV", {
                                        tungay: start,
                                        denngay: end
                                    },
                                    function(data, textStatus, jqXHR) {
                                        $('.ketquaa').html(data);
                                        $('.ketquaa').show();
                                        $('#dichvu input[name=tungay]').val(''); //rset gia tri cua form
                                        $('#dichvu input[name=denngay]').val('');
                                    },
                                    "html"
                                );
                            });
                            $('#dichvu input[type=button]').eq(1).click(function(e) {
                                e.preventDefault();
                                $('.ketquaa').hide();
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
    <script src="js/layout/index.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>

</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>MIMI HOTEL</title>
        <!-- base link-->
        <base href="http://localhost/CNPM/resources/" />
        <!-- link css -->
        <link
            rel="stylesheet"
            href="icon/fontawesome-free-5.15.3-web/css/all.css"
        />
        <link rel="stylesheet" href="css/layout/index.css" />
        <link rel="stylesheet" href="css/layout/khachhang.css" />
        <!-- /link css  -->

        <!-- link font -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
            rel="stylesheet"
        />

        <!-- /link font -->

        <!-- link js  -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="icon/fontawesome-free-5.15.3-web/js/all.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script src="js/layout/index.js"></script>
        <!-- /link js -->
    </head>

    <body>
        <!-- Alert-->
        <div class="alert">
            @if(Session::has('fail_searchTT')!=null)
            <script>
                swal({
                    title: "Thất bại !!!",
                    text: "{!! Session::get('fail_searchTT') !!}",
                    icon: "error",
                    button: "Xong",
                })
            </script>
            @php
            Session::forget('fail_searchTT')
            @endphp
            @endif
        </div>
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
                                <div class="av-item img-user m-10 flex"></div>
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
                        <a href="http://localhost/CNPM/public/dangxuat">
                            <i class="fas fa-sign-out-alt"></i
                        ></a>
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
                        <li class="menu-item">
                            <a href="http://localhost/CNPM/public/phong"
                                >Đặt/Trả phòng</a
                            >
                        </li>
                        <li class="menu-item">
                            <a href="http://localhost/CNPM/public/order"
                                >Dịch vụ</a
                            >
                        </li>
                        <li class="menu-item">
                            <a href="http://localhost/CNPM/public/nhanvien"
                                >Quản lí nhân viên</a
                            >
                        </li>
                        <li class="menu-item">
                            <a href="http://localhost/CNPM/public/khachhang"
                                >Quản lí khách hàng</a
                            >
                        </li>
                        <li class="menu-item active">
                            <a href="http://localhost/CNPM/public/thanhtoan"
                                >Quản lí hóa đơn</a
                            >
                        </li>
                        <li class="menu-item">
                            <a href="http://localhost/CNPM/public/thongke"
                                >Thống kê báo cáo</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <header class="flex">
                    <h2>Quản lí hóa đơn thanh toán</h2>
                </header>
                <div class="search">
                    <label for="">Tìm kiếm</label>
                    <input type="text" id='manv' placeholder="Mã Nhân Viên">
                    <button type="button" id="search">Tìm</button>
                </div>
                <div class="table">
                    <table class="list-customer-table">
                        <thead>
                            <tr>
                                <th colspan="11">Danh sách hóa đơn thanh toán</th>
                            </tr>
                            <tr>
                                <th>Mã hóa đơn thanh toán</th>
                                <th>Mã khách hàng</th>
                                <th>Nhân viên lập</th>
                                <th>Ngày lập</th>
                                <th>Tiền phòng</th>
                                <th>Tổng tiền thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->MaTT }}</td>
                                <td>{{ $item->MaKH }}</td>
                                <td>{{ $item->MaNV }}</td>
                                <td>{{ date_format( date_create($item->NgayLap),"d/m/Y")}}</td>
                                <td>{{ number_format($item->TienPhong) }}đ</td>
                                <td>{{ number_format($item->TongTienTT) }}đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </body>
    <script>
        $(document).ready(function () {
            $(".tinhtrang").each(function () {
                if ($(this).text() === "Đang thuê") {
                    $(this).css("color", "red");
                }
            });
            $('#search').click(function (e) { 
                e.preventDefault();
                let manv =($('#manv').val());
                location.href="http://localhost/CNPM/public/thanhtoan/nhanvien/"+manv;
        });
        });
    </script>
</html>

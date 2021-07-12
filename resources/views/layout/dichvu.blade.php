<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dịch vụ</title>
    <!-- base link-->
    <base href="http://localhost/CNPM/resources/">
    <!-- link css -->
    <link rel="stylesheet" href="icon/fontawesome-free-5.15.3-web/css/all.css" />
    <link rel="stylesheet" href="css/layout/index.css" />
    <link rel="stylesheet" href="css/layout/dichvu.css" />
    <!-- link font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/giohang.js"></script>
</head>

<body>
    <!-- Alert -->
    <div class="alert">
        <!-- HDDV -->
        @if(Session::has('alert_hddv')!=null)
        <script>
            swal({
                title: "{!! Session::get('alert_hddv') !!}",
                icon: "success",
                button: "Xong",
            })
        </script>
        @php
        Session::forget('alert_hddv')
        @endphp
        @endif
        <!-- Them moi DV -->
        @if(Session::has('alert_tdv')!=null)
        <script>
            swal({
                title: "{!! Session::get('alert_tdv') !!}",
                icon: "success",
                button: "Xong",
            })
        </script>
        @php
        Session::forget('alert_tdv')
        @endphp
        @endif
        <!-- Xóa DV -->
        @if(Session::has('alert_xdv')!=null)
        <script>
            swal({
                title: "{!! Session::get('alert_xdv') !!}",
                icon: "success",
                button: "Xong",
            })
        </script>
        @php
        Session::forget('alert_xdv')
        @endphp
        @endif
         <!-- Sửa DV -->
         @if(Session::has('alert_sdv')!=null)
         <script>
             swal({
                 title: "{!! Session::get('alert_sdv') !!}",
                 icon: "success",
                 button: "Xong",
             })
         </script>
         @php
         Session::forget('alert_sdv')
         @endphp
         @endif
    </div>
    <!-- Alert -->
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
                    <li class="menu-item">
                        <a href="http://localhost/CNPM/public/phong">Đặt/Trả phòng</a>
                    </li>
                    <li class="menu-item active">
                        <a href="#">Dịch vụ</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/CNPM/public/nhanvien">Quản lí nhân viên</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/CNPM/public/khachhang">Quản lí khách hàng</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/CNPM/public/thongke">Thống kê báo cáo</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">
            <header class="flex">
                <h2>Dịch Vụ</h2>
            </header>
            <div class="add-del flex">
                <button class="add-service">Thêm</button>
                <button class="del-service">Xóa</button>
            </div>
            <table class="service-list-table">
                <thead>
                    <tr>
                        <th colspan="6" class="tittle-table">
                            DANH SÁCH DỊCH VỤ
                        </th>
                    </tr>
                    <tr>
                        <th>STT</th>
                        <th>ẢNH</th>
                        <th>MÃ DỊCH VỤ</th>
                        <th>TÊN DỊCH VỤ</th>
                        <th>ĐƠN GIÁ</th>
                        <th>CHỨC NĂNG</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count =0; @endphp
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $count}}</td>
                        @php $count++ @endphp
                        <td>
                            <div class="service-img-product">
                                <img src="img/{{ $item->HinhAnh }}" alt="{{ $item->TenDV }}" />
                            </div>
                        </td>
                        <td>{{ $item->MaDV }} </td>
                        <td>{{ $item->TenDV }}</td>
                        <td>{{ $item->Gia }}</td>
                        <td>
                            <button class="btn btn-add order">Yêu cầu</button>
                            <button class="edit-service">Sửa</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="gioDV">
                <form method="POST" action="{{ route('taoHDDV') }}">
                    @csrf
                    <table class="service-bill-table">
                        <tr>
                            @php
                            if(isset($_GET['makh']))
                            $makh = $_GET['makh'];
                            else {
                            $makh = "";
                            }
                            @endphp
                            <th colspan="6">
                                Mã Khách hàng
                                <input class="MaKh" name="makh" type="text" value="{{$makh}}" />
                            </th>
                        </tr>
                        @if(Session::has('order')!=null)
                        <tr>
                            <th colspan="6">HOÁ ĐƠN DỊCH VỤ</th>
                        </tr>
                        <tr>
                            <th>STT</th>
                            <th>Tên dịch vụ</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa dịch vụ</th>
                        </tr>
                        @php $temp =0 @endphp
                        @foreach(Session::get('order')->cacdichvu as $item)
                        <tr>
                            <td>{{ $temp }}</td>
                            @php $temp++ @endphp
                            <td>{{ $item['thongtinDV']->TenDV }}</td>
                            <td>{{ $item['thongtinDV']->Gia }}</td>
                            <td class="flex">
                                <button type="button" class="btn btn-minus flex qtyminus">-</button>
                                <input class="amount" type="text" id="{{ $item['thongtinDV']->MaDV }}" value='{{ $item['soluong'] }}' />
                                <button type="button" class="btn btn-plus flex qtyplus">+</button>
                            </td>
                            <td>{{ $item['giatien'] }}</td>
                            <td><button type="button" class="btn bt-del xoadv" data-madv="{{ $item['thongtinDV']->MaDV }}">Hủy dịch vụ</button></td>
                        </tr>
                        @endforeach
                        <tr>
                            <th>
                                Tổng số lượng dịch vụ yêu cầu : <span>{{ Session::get('order')->tongsl }}</span>
                            </th>
                            <th colspan="5" rowspan="2"></th>
                        </tr>
                        <tr>
                            <th>Tổng tiền dịch vụ : <span>{{ Session::get('order')->tongtien }}</span></th>
                        </tr>
                        @endif
                    </table>
                    <div class="flex">
                        <input class="btn btn-accept" type="submit" value="xác nhận" />
                    </div>
                </form>
            </div>
        </div>
    </section>
    </section>
    <section class="pop-up-service pop-up-add dn">
        <div class="body">
            <header class="flex">
                <h1 class="flex">Thêm dịch vụ</h1>
                <div class="close-service flex">
                    <button class="flex">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </header>
            <div class="content flex">
                <form method="POST" action="{{ route('themDV') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="text-field">
                        <label for="">Tên dịch vụ</label>
                        <input type="text" name='tendv' required />
                    </div>
                    <div class="text-field">
                        <label for="">Giá</label>
                        <input type="text" name="gia" />
                    </div>
                    <div class="text-field">
                        <label for="">Ảnh minh họa</label>
                        <input type="file" name="hinhanh" />
                    </div>
                    <div class="btn-submit">
                        <input type="submit" value="Thêm dịch vụ" />
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="pop-up-del-service dn">
        <div class="body">
            <header class="flex">
                <h1 class="flex">Xóa dịch vụ</h1>
                <div class="close-del flex">
                    <button class="flex">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </header>
            <div class="content flex">
                <form method="POST" action="{{ route('xoaDV') }}">
                    @csrf
                    <div class="text-field">
                        <label for="">Nhập mã dịch vụ</label>
                        <input type="text" name="madv"/>
                    </div>
                    <div class="btn-submit">
                        <input type="submit" value="Xóa dịch vụ" />
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="suaDV">
    </div>
</body>

<script>
    // popup-add-service
    $("button.add-service").click(function(e) {
        $(".pop-up-add").removeClass("dn");
    });
    $(".close-service").click(function(e) {
        $(".pop-up-add").addClass("dn");
    });
    // popup-del-service
    $("button.del-service").click(function(e) {
        $(".pop-up-del-service").removeClass("dn");
    });
    $(".close-del").click(function(e) {
        $(".pop-up-del-service").addClass("dn");
    });
    // popup-edit-service
    $("button.edit-service").click(function(e) {
        $madv = $(this).parent().parent().find('td').eq(2).text();
        $.get("http://localhost/CNPM/public/suaDVform/"+$madv,
            function (data, textStatus, jqXHR) {
                $('.suaDV').empty();
                $('.suaDV').html(data);
                $(".pop-up-edit").removeClass("dn");
                $(".close-edit").click(function(e) {
                    $(".pop-up-edit").addClass("dn");
                });
            },
            "html"
        );
    });
</script>
</html>
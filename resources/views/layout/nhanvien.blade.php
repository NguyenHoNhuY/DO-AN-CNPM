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
        <link rel="stylesheet" href="css/layout/nhanvien.css" />
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
        <div class="alert">
            <!-- Thêm mới NV -->
            @if(Session::has('alert_tnv')!=null)
            <script>
                swal({
                    title: "{!! Session::get('alert_tnv') !!}",
                    icon: "success",
                    button: "Xong",
                })
            </script>
            @php
            Session::forget('alert_tnv')
            @endphp
            @endif
            <!-- Xóa NV Thành Công-->
            @if(Session::has('alert_xnv')!=null)
            <script>
                swal({
                    title: "{!! Session::get('alert_xnv') !!}",
                    icon: "success",
                    button: "Xong",
                })
            </script>
            @php
            Session::forget('alert_xnv')
            @endphp
            @endif
            <!-- Xóa NV Thất Bại -->
            @if(Session::has('fail_xnv')!=null)
            <script>
                swal({
                    title: "Thất bại !!!",
                    text: "{!! Session::get('fail_xnv') !!}",
                    icon: "error",
                    button: "OK",
                })
            </script>
            @php
            Session::forget('fail_xnv')
            @endphp
            @endif
            <!-- Sửa NV -->
            @if(Session::has('alert_snv')!=null)
            <script>
                swal({
                    title: "{!! Session::get('alert_snv') !!}",
                    icon: "success",
                    button: "Xong",
                })
            </script>
            @php
            Session::forget('alert_snv')
            @endphp
            <!-- Tìm kiếm khách hàng thất bại -->
            @endif
            @if(Session::has('fail_searchNV')!=null)
            <script>
                swal({
                    title: "Thất bại !!!",
                    text: "{!! Session::get('fail_searchNV') !!}",
                    icon: "error",
                    button: "Xong",
                })
            </script>
            @php
            Session::forget('fail_searchNV')
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
                        <li class="menu-item active">
                            <a href="http://localhost/CNPM/public/nhanvien">Quản lí nhân viên</a>
                        </li>
                        <li class="menu-item">
                            <a href="http://localhost/CNPM/public/khachhang">Quản lí khách hàng</a>
                        </li>
                        <li class="menu-item">
                            <a href="http://localhost/CNPM/public/thanhtoan">Quản lí hóa đơn</a>
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
                    <h2>Quản lí nhân viên</h2>
                    Tìm kiếm <input type="text" id='tennv'>
                    <button type="button" id="search">Tìm</button>
                </header>
                <div class="table">
                    <table class="list-employ-table">
                        <thead>
                            <tr>
                                <th colspan="11">Danh sách nhân viên</th>
                            </tr>
                            <tr>
                                <th>Mã nhân viên</th>
                                <th>Tên bộ phận</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>CMND</th>
                                <th>Chức vụ</th>
                                <th>Lương</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($query as $item)
                            <tr>
                                <td>{{ $item->manv }}</td>
                                <td>{{ $item->TenBP }}</td>
                                <td>{{ $item->TenNV}}</td>
                                <td>{{date_format( date_create($item->Ngaysinh),"d/m/Y")}}</td>
                                <td>{{ $item->gioitinh }}</td>
                                <td>{{ $item->diachi }}</td>
                                <td>{{ $item->SoDienThoai }}</td>
                                <td>{{ $item->CMND }}</td>
                                <td>{{ $item->chucvu }}</td>
                                <td>{{ $item->Luong }}</td>
                                <td><button class="btn-edit">Sửa</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="btn-employ flex">
                    <button class="btn-add">Thêm nhân viên</button>
                    <button class="btn-del">Xóa nhân viên</button>
                </div>
            </div>
        </section>
        <section class="pop-up-employ pop-up-add dn">
            <div class="body">
                <header class="flex">
                    <h1 class="flex">Thêm nhân viên</h1>
                    <div class="close-employ flex">
                        <button class="flex">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </header>
                <div class="content flex">
                    <form method="POST" action="{{ route('themnhanvien') }}">
                        @csrf
                        <div class="text-field">
                            <label for="">Mã nhân viên</label>
                            <input type="text" name="manv" required />
                        </div>
                        <div class="text-field">
                            <label for="">Tên nhân viên</label>
                            <input type="text" name="tennv" required/>
                        </div>
                        <div class="text-field">
                            <label for="">Ngày sinh</label>
                            <input type="date" name="ngaysinh" required/>
                        </div>
                        <div class="text-field">
                            <label for="">Giới tính</label>
                            <input type="radio" name="gioitinh" value="Nam" checked/> Nam
                            <input type="radio" name="gioitinh" value="Nữ" /> Nữ
                        </div>
                        <div class="text-field">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="diachi" required/>
                        </div>
                        <div class="text-field">
                            <label for="">CMND</label>
                            <input type="text" name="cmnd" required/>
                        </div>
                        <div class="text-field">
                            <label for="">Số điện thoại</label>
                            <input type="text" name="sodienthoai" required/>
                        </div>
                        <div class="text-field">
                            <label for="">Password</label>
                            <input type="text" name="password" required/>
                        </div>
                        <div class="text-field">
                            <label for="">Mã bộ phận</label>
                            <select name="mabp">
                                @foreach($bophan as $item)
                                    <option value="{{ $item->MaBP }}">{{ $item->TenBP }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-field">
                            <label for="">Chức vụ</label>
                            <input type="text" name="chucvu" required/>
                        </div>
                        <div class="text-field">
                            <label for="">Lương</label>
                            <input type="text" name="luong" required/>
                        </div>
                        <div class="btn-submit">
                            <input type="submit" value="Thêm nhân viên" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="pop-up-del-employ dn">
            <div class="body">
                <header class="flex">
                    <h1 class="flex">Xóa nhân viên</h1>
                    <div class="close-del flex">
                        <button class="flex">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </header>
                <div class="content flex">
                    <form method="POST" action="{{ route('xoanhanvien') }}">
                        @csrf
                        <div class="text-field">
                            <label for="">Nhập mã nhân viên</label>
                            <input type="text" name="manv"/>
                        </div>
                        <div class="btn-submit">
                            <input type="submit" value="Xóa nhân viên" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div class="suaNV">
        </div>
    </body>
    <script>
        // popup-add-employ
        $("button.btn-add").click(function (e) {
            $(".pop-up-add").removeClass("dn");
        });
        $(".close-employ").click(function (e) {
            $(".pop-up-add").addClass("dn");
        });
        // popup-del-employ
        $("button.btn-del").click(function (e) {
            $(".pop-up-del-employ").removeClass("dn");
        });
        $(".close-del").click(function (e) {
            $(".pop-up-del-employ").addClass("dn");
        });
        // popup-edit-employ
        $("button.btn-edit").click(function (e) {
            $manv = $(this).parent().parent().find('td').eq(0).text();
            $.get("http://localhost/CNPM/public/suaNVform/"+$manv,
                function (data, textStatus, jqXHR) {
                    $('.suaNV').empty();
                    $('.suaNV').html(data);
                    $(".pop-up-edit").removeClass("dn");
                    $(".close-edit").click(function (e) {
                        $(".pop-up-edit").addClass("dn");
                    });
                },
                "html"
            );
        });
        $('#search').click(function (e) { 
                e.preventDefault();
                let tennv =($('#tennv').val());
                location.href="http://localhost/CNPM/public/nhanvien/"+tennv;
        });
    </script>
</html>

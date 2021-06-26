<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>MIMI HOTEL</title>
        <!-- base link-->
        <base href="http://localhost/CNPM/resources/">
        <!-- link css -->
        <link
            rel="stylesheet"
            href="icon/fontawesome-free-5.15.3-web/css/all.css"
        />
        <link rel="stylesheet" href="css/layout/index.css" />

        <!-- /link css  -->

        <!-- link font -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
            rel="stylesheet"
        />

        <!-- /link font -->

        <!-- link js  -->
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
                                    <img src="img/sting.jpg" alt="" />
                                </div>
                            </a>
                        </div>
                        <div class="us-name m-10">
                            <a href="#">Login</a>
                        </div>
                    </div>
                    <div class="logout">
                        <a href="#"> <i class="fas fa-sign-out-alt"></i></a>
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
                        <li class="menu-item active">
                            <a href="#">Đặt/Trả phòng</a>
                        </li>
                        <li class="menu-item"><a href="#">Dịch vụ</a></li>
                        <li class="menu-item">
                            <a href="#">Quản lí nhân viên</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Quản lí khách hàng</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Thống kê báo cáo</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <header class="flex">
                    <h2>Đặt phòng / Trả phòng</h2>
                </header>
                <div class="row1 flex">
                    <div class="col flex">
                        <span class="open"></span>
                        <p>Phòng trống : 10</p>
                    </div>
                    <div class="col flex">
                        <span class="full"></span>
                        <p>Phòng đang sử dụng : 10</p>
                    </div>
                    <div class="col flex">
                        <span class="wait"></span>
                        <p>Phòng đặt trước : 10</p>
                    </div>
                    <div class="col flex">
                        <p>Tổng : 30</p>
                    </div>
                </div>
                <!-- danh sach cac tang -->
                <div class="row2 flex">
                    <div class="bt-floor">
                        <button id="1">Tầng 1</button>
                    </div>
                    <div class="bt-floor">
                        <button id="2">Tầng 2</button>
                    </div>
                    <div class="bt-floor">
                        <button id="3">Tầng 3</button>
                    </div>
                    <div class="bt-floor">
                        <button id="4">Tầng 4</button>
                    </div>
                </div>
                <!-- danh sach cac phong -->
                <div class="row3">
                    <div id="{{ $phongs[0]->tang }}" class="row3-item">
                          <div class="number flex">
                            <h1 class="flex">Tầng 1</h1>
                        </div>
                        <div class="body">
                            @foreach ($phongs as $item)
                                @if($item->tang == 1)    
                                    <div class="box">
                                        <div class="box-icon flex">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <div class="box-content">
                                            <div class="ct-item room-code">
                                                <p>Mã phòng :&ensp;</p>
                                                <span>{{ $item->MaPhong }}</span>
                                            </div>
                                            <div class="ct-item room-price">
                                                <p>Giá : &ensp;</p>
                                                <span>{{ number_format($item->Gia) }}</span>
                                            </div>
                                            <div class="ct-item kind-of-room">
                                                <p>Loại : &ensp;</p>
                                                <span>{{ $item->LoaiPhong }}</span>
                                            </div>
                                            <p class="room-status dn">{{ $item->TinhTrang }}</p>
                                        </div>
                                        <div class="box-button flex hide">
                                            <button class="bt-book-room" >Đặt phòng</button>
                                            <button>Trả phòng</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @for($i = 2 ; $i<5 ; $i++)
                    <div id="{{ $i }}" class="row3-item dn">
                        <div class="number flex">
                            <h1 class="flex">Tầng {{ $i }}</h1>
                        </div>
                        <div class="body">
                            @foreach ($phongs as $item)
                            @if($item->tang == $i)
                            <div class="box">
                                <div class="box-icon flex">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="box-content">
                                    <div class="ct-item room-code">
                                        <p>Mã phòng :&ensp;</p>
                                        <span>{{ $item->MaPhong }}</span>
                                    </div>
                                    <div class="ct-item room-price">
                                        <p>Giá : &ensp;</p>
                                        <span>{{number_format($item->Gia) }}</span>
                                    </div>
                                    <div class="ct-item kind-of-room">
                                        <p>Loại : &ensp;</p>
                                        <span>{{ $item->LoaiPhong }}</span>
                                    </div>
                                    <p class="room-status dn">{{ $item->TinhTrang }}</p>
                                </div>
                                <div class="box-button flex hide">
                                     <button class="bt-book-room" >Đặt phòng</button>
                                    <button>Trả phòng</button>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>
        <section class="pop-up dn">
            <div class="close">
                <button class="flex"><i class="fas fa-times"></i></button>
            </div>
            <div class="body">
                <header class="flex">
                    <h1>Nhận phòng - 01</h1>
                </header>
                <div class="content">
                    <div class="customer-info">
                        <form action="">
                            <header class="form-header flex">
                                <h2>Thông tin khách hàng</h2>
                            </header>
                            <div class="form-content">
                                <div class="form-left">
                                    <div class="txt-field">
                                        <label for="">Tên khách hàng : </label>
                                        <input type="text" required/>
                                    </div>
                                    <div class="txt-field">
                                        <label for="">CMND/Passport : </label>
                                        <input type="text" required/>
                                    </div>
                                    <div class="txt-field checkbox">
                                        <label for="" class="form-check">
                                            <input
                                                type="radio"
                                                name="gioitiinh"
                                                id="gioitinh"
                                                value="nam"
                                                checked
                                            />
                                            Nam
                                        </label>
                                        <label for="" class="form-check">
                                            <input
                                                type="radio"
                                                name="gioitiinh"
                                                id="gioitinh"
                                                value="nu"
                                            />
                                            Nữ
                                        </label>
                                    </div>
                                </div>
                                <div class="form-right">
                                    <div class="txt-field">
                                        <label for="">Địa chỉ : </label>
                                        <input type="text" required/>
                                    </div>
                                    <div class="txt-field">
                                        <label for="">Điện thoại : </label>
                                        <input type="text" required/>
                                    </div>
                                    <div class="txt-field">
                                        <label for="">Ghi chú : </label>
                                        <input type="text" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="bt-submit flex">
                                <input type="submit" value="Thêm khách hàng" />
                            </div>
                        </form>
                    </div>
                    <div class="receipts">
                        <form action="">
                            <header class="form-header flex">
                                <h2>Thông tin phiếu thuê</h2>
                            </header>
                            <div class="form-content">
                                <div class="form-left">
                                    <div class="txt-field">
                                        <label for="">Mã khách hàng : </label>
                                        <input type="text" required/>
                                    </div>
                                    <div class="txt-field">
                                        <label for=""
                                            >Tên khách hàng :</label
                                        >
                                        <input type="text" required/>
                                    </div>
                                    <div class="txt-field">
                                        <label for="">Mã phòng : </label>
                                        <input type="text" required/>
                                    </div>
                                    <div class="txt-field">
                                        <label for="">Mã nhân viên : </label>
                                        <input type="text" required/>
                                    </div>
                                </div>
                                <div class="form-right">
                                    <div class="txt-field">
                                        <label for="">Trả trước : </label>
                                        <input type="text" required/>
                                    </div>
                                    <div class="txt-field">
                                        <label for="">Ngày lập : </label>
                                        <input type="date" required/>
                                    </div>
                                    <div class="txt-field note">
                                        <label for="">Ghi chú : </label>
                                        <input type="text" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="bt-submit flex">
                                <input type="submit" value="Thêm phiếu thu" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>

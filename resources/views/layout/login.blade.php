<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Đăng Nhập</title>
        <base href="http://localhost/CNPM/resources/">
        <link rel="stylesheet" href="css/layout/login.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
            rel="stylesheet"
        />
        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    </head>
    <body>
        @if(Session::has('alert_dn') != null)
            <script>
                swal({
                    title :"{!! Session::get('alert_dn') !!}",
                    button : "OK"
                }).then(function(){
                    if("{!! Session::get('alert_dn') !!}"==="Đăng nhập thành công")
                        window.location ="http://localhost/CNPM/public/phong";
                    else{
                        window.location = "http://localhost/CNPM/public/dangnhap";
                    }
                })
            </script>
        @endif
        <section class="form-login">
            <div class="center flex">
                <div class="tittle">
                    <h1>MI MI HOTEL</h1>
                </div>
                <form action="{{ route('kiemtra') }}" method="POST">
                    @csrf
                    <div class="txt-field">
                        <input type="text" name='taikhoan' required />
                        <label>ID</label>
                    </div>
                    <div class="txt-field">
                        <input type="password" name='matkhau'required />
                        <label>Password</label>
                    </div>
                    <div class="bt-submit flex">
                        <input type="submit" value="Login" />
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>

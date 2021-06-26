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
    </head>
    <body>
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

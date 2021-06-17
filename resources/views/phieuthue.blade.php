<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>

       
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 offset-4">
          @if(Session::has('thanhcong_pt') !=null)
            <div class="alert alert-success" role="alert">
              {{ Session::get('thanhcong_pt') }}
            </div>
            @endif
          <h4>Phiếu thuê</h4>
          <form method="POST" action="{{ route('themPT') }}">
            @csrf
            <div class="form-group">
              <label for="">Mã Khách Hàng</label>
              <input type="text" name="makh" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ Session::get('khachhang')[0] }}" readonly>
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Tên Khách Hàng</label>
              <input type="text" name="tenkh" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ Session::get('khachhang')[1] }}" readonly>
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Mã Phòng</label>
              <input type="text" name="maphong" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Mã Nhân Viên</label>
              @if(Session::has('nhanvien'))
              <input type="text" name="manv" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ Session::get('nhanvien')[0]->manv }}" readonly>
              @else
              <input type="text" name="manv" id="" class="form-control" placeholder="Nhập mã nhân viên" aria-describedby="helpId" >
              <small id="helpId" class="text-muted">Help text</small>
              @endif
            </div>
            <div class="form-group">
              <label for="">Số tiền trả trước</label>
              <input type="text" name="tientt" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Ngày Lập</label>
              <input type="date" name="ngaylap" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Ghi Chú Khách Hàng</label>
              <input type="text" name="ghichu" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <input type="submit" value="Đặt phòng" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
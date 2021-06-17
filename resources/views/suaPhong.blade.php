<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="http://localhost/CNPM/public/">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-4 offset-4">
                @if(Session::has('thanhcong_sp') !=null)
                  <div class="alert alert-success" role="alert">
                      {{ Session::get('thanhcong_sp') }}
                  </div>
                @endif
                <form method="POST" action="{{ route('suaPhong') }}">
                    @csrf
                    <p>SỬA THÔNG TIN PHÒNG {{ $data[0]->MaPhong }}</p>
                    <div class="form-group">
                      <label for="">Mã Phòng</label>
                      <input type="text" name="maphong" id="maphong" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $data[0]->MaPhong }}" readonly>
                      <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Loại Phòng</label>
                        <input type="text" name="loaiphong" id="loaiphong" class="form-control" placeholder="Loại Phòng" aria-describedby="helpId" value="{{ $data[0]->LoaiPhong }}">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Đơn giá</label>
                        <input type="text" name="gia" id="gia" class="form-control" placeholder="Giá Phòng" aria-describedby="helpId" value="{{ $data[0]->Gia }}">
                        <small id="helpId" class="text-muted">Help text</small>
                      </div>
                      <div class="form-group">
                        <label for="">Tình Trạng</label>
                        <input type="text" name="tinhtrang" id="tinhtrang" class="form-control" placeholder="Giá Phòng" aria-describedby="helpId" value="{{ $data[0]->Tinhtrang }}">
                        <small id="helpId" class="text-muted">Help text</small>
                      </div>
                    <input type="submit" class="btn btn-primary" value="Sửa Phòng">
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
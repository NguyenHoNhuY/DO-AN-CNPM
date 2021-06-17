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
                @if(Session::has('thanhcong_p') !=null)
                <div class="alert alert-success" role="alert">
                {{ Session::get('thanhcong_p') }}
                </div>
                @endif
                @if(Session::has('xoaPhong') !=null)
                <div class="alert alert-danger" role="alert">
                {{ Session::get('xoaPhong') }}
                </div>
                @endif
                <form method="POST" action="{{ route('themPhong') }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Loại Phòng</label>
                        <input type="text" name="loaiphong" id="loaiphong" class="form-control" placeholder="Loại Phòng" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Đơn giá</label>
                        <input type="text" name="gia" id="gia" class="form-control" placeholder="Giá Phòng" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                        </div>
                    <div class="form-group">
                      <label for="">Tầng</label>
                      <select class="form-control" name="tang" id="">
                        <option value="1">Tầng 1</option>
                        <option value="2">Tầng 2</option>
                        <option value="3">Tầng 3 </option>
                        <option value="4">Tầng 4 </option>
                      </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Thêm Phòng">
                </form>
              </div>
          </div>
          <div class="row">
              <div class="col-md-4-offset-4">
                    Danh sách các phòng
                  <table class="table">
                      <thead>
                          <tr>
                              <th>Mã Phòng</th>
                              <th>Loại Phòng</th>
                              <th>Giá</th>
                              <th>Tình trạng</th>
                              <th>Tầng</th>
                              <th colspan="2">Thao tác</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($data as $item)
                          <tr>
                              <td scope="row">{{ $item->MaPhong }}</td>
                              <td>{{ $item->LoaiPhong }}</td>
                              <td>{{ $item->Gia }}</td>
                              <td>{{ $item->Tinhtrang }}</td>
                              <td>{{ $item->tang }}</td>
                              <td><a href="xoaPhong/{{ $item->MaPhong }}"><button class="btn btn-primary">Xóa</button></a></td>
                              <td><a href="suaPhong/{{ $item->MaPhong }}"><button class="btn btn-success">Chỉnh sửa</button></td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
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
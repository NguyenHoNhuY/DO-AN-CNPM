<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="POST" action="{{ route('themnhanvien') }}">
                  @csrf
                    <div class="form-group">
                        <label for="">MaNV</label>
                        <input type="text" name="manv" id="manv" class="form-control" placeholder="Mã Nhân Viên" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                      <label for="">Mã Bộ Phân</label>
                      <select class="form-control" name="mabp" id="mabp">
                          @foreach($bophan as $item)
                        <option value="{{ $item->MaBP }}">{{ $item->TenBP }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên Nhân Viên</label>
                        <input type="text" name="tennv" id="tennv" class="form-control" placeholder=" Tên Nhân Viên" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                      <label for="">Ngày Sinh</label>
                      <input type="date" name="ngaysinh" id="ngaysinh" class="form-control" placeholder="Ngày sinh" aria-describedby="helpId">
                      <small id="helpId" class="text-muted">Help text</small>
                  </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gioitinh" id="gioitinh" value="Nam"checked>
                        Nam
                      </label><br>
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gioitinh" id="gioitinh" value="Nữ" >
                        Nữ
                      </label>
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="diachi" id="diachi" class="form-control" placeholder="Địa chỉ" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="sodienthoai" id="sodienthoai" class="form-control" placeholder="Địa chỉ" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">CMND</label>
                        <input type="text" name="cmnd" id="cmnd" class="form-control" placeholder="Chứng minh nhân dân" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Chức vụ</label>
                        <input type="text" name="chucvu" id="chucvu" class="form-control" placeholder="Chức vụ" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Lương</label>
                        <input type="text" name="luong" id="luong" class="form-control" placeholder="Lương nhân viên" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Thêm">
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
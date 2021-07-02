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
    <form method="POST" action="{{ route('themTT') }}">
      @csrf
      Mã Khách Hàng <input type="text" name="makh" value="{{ $phieuthue[0]->MaKH }}" readonly><br>
      Tên Khách Hàng <input type="text" name="" value="{{ $phieuthue[0]->TenKH }}" readonly><br>
      Ngày Lập <input type="date" name="" value="{{ $phieuthue[0]->NgayLap }}" readonly><br>
      Giá phòng <input type="text" name="" value="{{ $phieuthue[0]->Gia }}" readonly><br>
      Trả trước <input type="text" name="" value="{{ $phieuthue[0]->TraTruoc}}" readonly><br>
      Ngày ra <input type="date" name='ngaylap' value="{{ date('Y-m-d') }}" readonly><br>
      Mã NV  <input type="text" name='manv' value="{{ $phieuthue[0]->MaNV }}" readonly><br>
      @php
        $ngayvao = $phieuthue[0]->NgayLap;
        $ngayra = date('Y-m-d');
        $diff = abs(strtotime($ngayvao) - strtotime($ngayra));
        $songaythue = floor($diff / (60*60*24));
        echo "Thời gian ở "."<b>$songaythue</b>"."<br>";
        $tongtienthue = $songaythue * $phieuthue[0]->Gia -$phieuthue[0]->TraTruoc;
        echo "Tổng tiền thuê phòng ". number_format($tongtienthue)."vnd <br>";
        echo "<input type='text' name='tienphong' value='$tongtienthue' readonly hidden><br>";
      @endphp
      @if(isset($hoadon) && $hoadon!=null)
        @foreach ($hoadon as $item)
          <input type="text" name="" value="{{ $item->MaHDDV }}" readonly>
          <input type="text" name="" value="{{ $item->NgayLap }}" readonly><br>
            @foreach($dichvu as $key)
              @if($key->MaHDDV == $item->MaHDDV)
                <input type="text" name="" value="{{ $key->MaDV }}" readonly>
                <input type="text" name="" value="{{ $key->TenDV }}" readonly>
                <input type="text" name="" value="{{ $key->SoLuong }}" readonly>
                <input type="text" name="" value="{{ $key->Gia }}" readonly><br>
              @endif
            @endforeach
          Tổng tiền dịch vụ: <input type="text" name="" value="{{ $item->TongTienDV }}">
          <br><br>
        @endforeach
      @else 
        <p>Khach hang khong su dung dich vu</p>
      @endif
      @php
        $tongtienTT = 0;
        if(isset($hoadon) && $hoadon !=null)
          foreach ($hoadon as $value ) {
            $tongtienTT += $value->TongTienDV;
          }
        $tongtienTT +=$tongtienthue;
      echo "<h3>Tổng tiền thanh toán</h3>"."<h3 style='color:red'>".number_format($tongtienTT)."vnd</h3>";
      echo "<input type='text' name='tongtientt' value='$tongtienTT' hidden>"
      @endphp
      <input type="submit" class="btn btn-primary" value="Thanh Toán">
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>
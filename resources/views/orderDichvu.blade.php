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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/giohang.js')}}"></script>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-6 offset-3">
                  <table class="table">
                      <thead>
                          <tr>
                              <th>MaDV</th>
                              <th>TenDV</th>
                              <th>Gia</th>
                              <th>Order</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($data as $item)
                          <tr>
                              <td scope="row">{{ $item->MaDV }}</td>
                              <td>{{ $item->TenDV }}</td>
                              <td>{{ $item->Gia }}</td>
                              <td><button class="btn btn-primary order">Order</button></td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                  <form  method="POST" action="{{ route('taoHDDV') }}" >
                    @csrf
                      <div class="form-group">
                        <label for="">Ma Khach Hang</label>
                        <input type="text" name="makh" id="" class="form-control" placeholder="Nhap ma Khach hang" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                      </div>
                      <input type="submit" class="btn btn-success" value="Xac nhan">
                  </form>
              </div>
          </div>
          <div id="gioDV">
            @if(Session::has('order')!=null)
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Dịch vụ</th>
                                <th>Tiền</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Session::get('order')->cacdichvu as $item)
                            <tr>
                                <td scope="row">{{ $item['thongtinDV']->TenDV }}</td>
                                <td>{{ $item['thongtinDV']->Gia }}</td>
                                <td>
                                    <button type="button" class="qtyminus btn btn-danger" >-</button>
                                    <input type='text'name='quanty' id="{{ $item['thongtinDV']->MaDV }}"value='{{ $item['soluong'] }}' style="width:40px"/>
                                    <button type="button" class="qtyplus btn btn-success" >+</button> 
                                </td>
                                <td>{{ $item['giatien'] }}</td>
                                <td><button class="btn btn-danger xoadv" data-madv="{{ $item['thongtinDV']->MaDV }}">Hủy dịch vụ</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    Tổng số lượng dịch vụ yêu cầu:<h3>{{ Session::get('order')->tongsl }}</h3>
                    Tổng tiền dịch vụ<h3>{{ Session::get('order')->tongtien }}</h3>
                </div>
            </div>
            @endif
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>
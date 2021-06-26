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

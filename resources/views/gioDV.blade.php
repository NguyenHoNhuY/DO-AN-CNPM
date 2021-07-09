@if(Session::has('order')!=null)
<form method="POST" action="{{ route('taoHDDV') }}">
    <table class="service-bill-table">
        <tr>
            <th colspan="6">
                Mã Khách hàng
                <input class="MaKh" type="text" />
            </th>
        </tr>
        @if(Session::has('order')!=null)
        <tr>
            <th colspan="6">HOÁ ĐƠN DỊCH VỤ</th>
        </tr>
        <tr>
            <th>STT</th>
            <th>Tên dịch vụ</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xóa dịch vụ</th>
        </tr>
        @foreach(Session::get('order')->cacdichvu as $item)
        <tr>
            <td>1</td>
            <td>{{ $item['thongtinDV']->TenDV }}</td>
            <td>{{ $item['thongtinDV']->Gia }}</td>
            <td class="flex">
                <button type="button" class="btn btn-minus flex qtyminus">-</button>
                <input class="amount" name='quanty' type="text" id="{{ $item['thongtinDV']->MaDV }}"value='{{ $item['soluong'] }}' />
                <button type="button"class="btn btn-plus flex qtyplus" >+</button>
            </td>
            <td>{{ $item['giatien'] }}</td>
            <td><button type="button" class="btn bt-del xoadv" data-madv="{{ $item['thongtinDV']->MaDV }}">Hủy dịch vụ</button></td>
        </tr>
        @endforeach
        <tr>
            <th>
                Tổng số lượng dịch vụ yêu cầu : <span>{{ Session::get('order')->tongsl }}</span>
            </th>
            <th colspan="5" rowspan="2"></th>
        </tr>
        <tr>
            <th>Tổng tiền dịch vụ : <span>{{ Session::get('order')->tongtien }}</span></th>
        </tr>
        @endif
    </table>
    <div class="flex">
        <input
            class="btn btn-accept"
            type="submit"
            value="xác nhận"
        />
    </div>
</form>
@endif 

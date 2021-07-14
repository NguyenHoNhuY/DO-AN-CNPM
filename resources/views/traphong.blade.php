<section class="pop-up-pay dn">
    <div class="body">
        <header class="flex">
            <h1>Thanh toán phòng - {{ $phieuthue[0]->MaPhong }}</h1>
            <div class="close-pay">
                <button class="flex"><i class="fas fa-times"></i></button>
            </div>
        </header>
        <div class="content">
            <form method="POST" action="{{ route('themTT') }}">
                <div class="customer-info">
                    @csrf
                    <header class="form-header flex">
                        <h2>Thông tin khách hàng</h2>
                    </header>
                    <div class="form-content">
                        <div class="form-left">
                            <div class="txt-field">
                                <label for="">Mã khách hàng : </label>
                                <input type="text" name="makh" value="{{ $phieuthue[0]->MaKH }}" readonly />
                            </div>
                            <div class="txt-field">
                                <label for="">Tên khách hàng : </label>
                                <input type="text" value="{{ $phieuthue[0]->TenKH }}" readonly />
                            </div>
                            <div class="txt-field">
                                <label for="">Mã nhân viên : </label>
                                <input type="text" name='manv' value="{{ $phieuthue[0]->MaNV }}" readonly />
                            </div>
                            <div class="txt-field">
                                <label for="">Ngày Lập : </label>
                                <input type="date" name="ngaylap" value="{{ date('Y-m-d') }}" readonly />
                            </div>
                        </div>
                        <div class="form-right">
                            <div class="txt-field">
                                <label for="">Giá phòng: </label>
                                <input type="text" value="{{ $phieuthue[0]->Gia }}" readonly />
                            </div>
                            <div class="txt-field">
                                <label for="">Trả trước : </label>
                                <input type="number" value="{{ $phieuthue[0]->TraTruoc }}" readonly />
                            </div>
                            <div class="txt-field">
                                <label for="">Ngày vào : </label>
                                <input type="date" value="{{ $phieuthue[0]->NgayLap }}" readonly />
                            </div>
                            <div class="txt-field">
                                <label for="">Ngày ra : </label>
                                <input type="date" value="{{ date('Y-m-d') }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        @php
                        $ngayvao = $phieuthue[0]->NgayLap;
                        $ngayra = date('Y-m-d');
                        $diff = abs(strtotime($ngayvao) - strtotime($ngayra));
                        if($diff ===0){
                        $songaythue =1;
                        }else{
                        $songaythue = floor($diff / (60*60*24));
                        }
                        $tongtienthue = $songaythue * $phieuthue[0]->Gia -$phieuthue[0]->TraTruoc;
                        echo "<p class='time'>Thời gian ở : <span> $songaythue ngày </span></p>";
                        echo "<p class='total-money'>Tổng tiền thuê phòng : <span>".number_format($tongtienthue)."đ</span></p>";
                        echo "<input type='text' name='tienphong' value='$tongtienthue' readonly hidden>";
                        @endphp
                    </div>
                </div>
                <br>
                <div class="service">
                    <header class="form-header flex">
                        <h2>Thông tin dịch vụ</h2>
                    </header>
                    <div class="form-content">
                        @if(isset($hoadon) && $hoadon!=null)
                        @foreach($hoadon as $item)
                        <div class="box-service">
                            <div class="box-item">
                                <p>Mã HĐDV : <span> {{ $item->MaHDDV }}</span></p>
                                <p>Ngày lập : <span>{{ date_format( date_create($item->NgayLap),"d/m/Y") }}</span></p>
                            </div>
                            <div class="box-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="6">Danh sách hóa đơn dịch vụ</th>
                                        </tr>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Mã dịch vụ</th>
                                            <th>Tên dịch vụ</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dichvu as $key)
                                        @if($key->MaHDDV == $item->MaHDDV)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $key->MaDV }}</td>
                                            <td>{{ $key->TenDV }}</td>
                                            <td>{{ number_format($key->Gia) }}đ</td>
                                            <td>{{ $key->SoLuong }}</td>
                                            <td>{{ number_format($key->SoLuong * $key->Gia) }}đ</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="total-service">
                                    <p class="total-money">Tổng tiền dịch vụ : <span>{{ number_format($item->TongTienDV) }}đ</span></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h2 style="text-align: center;position: relative;top:50%">Khách hàng không sử dụng dịch vụ</h2>
                        @endif
                    </div>
                    <div class="total">
                        @php
                        $tongtienTT = 0;
                        if(isset($hoadon) && $hoadon !=null)
                        foreach ($hoadon as $value ) {
                        $tongtienTT += $value->TongTienDV;
                        }
                        $tongtienTT +=$tongtienthue;
                        echo "<p class='total-money'>Tổng tiền thanh toán : <span>".number_format($tongtienTT)."đ</span></p>";
                        echo "<input type='text' name='tongtientt' value='$tongtienTT' hidden>";
                        @endphp
                    </div>
                    <div class="submit">
                        <input type="submit" value="Thanh Toán">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
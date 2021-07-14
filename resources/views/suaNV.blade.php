<section class="pop-up-employ pop-up-edit dn">
    <div class="body">
        <header class="flex">
            <h1 class="flex">Sửa thông tin nhân viên</h1>
            <div class="close-edit flex">
                <button class="flex">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </header>
        <div class="content flex">
            <form method="POST" action="{{ route('suaNV')}}">
                @csrf
                <div class="text-field">
                    <label for="">Mã nhân viên</label>
                    <input type="text" name="manv" value="{{ $nhanvien->manv }}" readonly/>
                </div>
                <div class="text-field">
                    <label for="">Tên nhân viên</label>
                    <input type="text" name="tennv" value="{{ $nhanvien->TenNV }}" />
                </div>
                <div class="text-field">
                    <label for="">Ngày sinh</label>
                    <input type="date" name="ngaysinh" value="{{ ($nhanvien->Ngaysinh) }}"/>
                </div>
                <div class="text-field">
                    <label for="">Giới tính</label>
                    <input type="radio" name="gioitinh" value="Nam" checked/> Nam
                    <input type="radio" name="gioitinh" value="Nữ" /> Nữ
                </div>
                <div class="text-field">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="diachi" value="{{ $nhanvien->diachi }}" />
                </div>
                <div class="text-field">
                    <label for="">CMND</label>
                    <input type="text" name="cmnd" value="{{ $nhanvien->CMND }}" />
                </div>
                <div class="text-field">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="sdt" value="{{ $nhanvien->SoDienThoai }}" />
                </div>
                <div class="text-field">
                    <label for="">Password</label>
                    <input type="text" name="password" value="{{  $nhanvien->password }}" />
                </div>
                <div class="text-field">
                    <label for="">Mã bộ phận</label>
                    <select name="mabp">
                    @foreach($bophan as $item)
                        <option value="{{ $item->MaBP }}">{{ $item->TenBP }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="text-field">
                    <label for="">Chức vụ</label>
                    <input type="text" name="chucvu" value="{{ $nhanvien->chucvu }}" />
                </div>
                <div class="text-field">
                    <label for="">Lương</label>
                    <input type="number" name="luong" value="{{ $nhanvien->Luong }}" />
                </div>
                <div class="btn-submit">
                    <input type="submit" value="Sửa" />
                </div>
            </form>
        </div>
    </div>
</section>
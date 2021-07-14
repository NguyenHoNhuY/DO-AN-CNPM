<section class="pop-up-info dn">
    <header>
        <h1 class="flex"> Thông Tin Khách Hàng</h1>
        <div class="close flex">
            <button class="flex"><i class="fas fa-times"></i></button>
        </div>
    </header>
    <div class="body">
        <form action="">
            <div class="text-field dn">
                <input type="hidden" name="Mã khách hàng" value="{{ $query[0]->MaKH }}" readonly>
            </div>
            <div class="text-field">
                <label for="">Tên khách hàng</label>
                <input type="text" value="{{ $query[0]->TenKH }}" readonly>
            </div>
            <div class="text-field">
                <label for="">CMND</label>
                <input type="text" value="{{ $query[0]->CMND }}" readonly>
            </div>
            <div class="text-field">
                <label for="">Địa chỉ</label>
                <input type="text" value="{{ $query[0]->Diachi }}" readonly>
            </div>
            <div class="text-field">
                <label for="">Giới tính</label>
                <input type="text" value="{{ $query[0]->Gioitinh }}" readonly>
            </div>
            <div class="text-field">
                <label for="">Số điện thoại</label>
                <input type="text" value="{{ $query[0]->SoDienThoai }}" readonly >
            </div>
            <div class="text-field dn">
                <input type="hidden" name="Tình trạng" readonly>
            </div>
            <div class="text-field">
                <label for=""> Trả trước</label>
                <input type="text" value="{{ $query[0]->TraTruoc }}" readonly>
            </div>
            <div class="text-field">
                <label for="">Ghi chú</label>
                <input type="text" value="{{ $query[0]->GhiChu }}" readonly>
            </div>
            <div class="btn-submit flex ">
                <a href="http://localhost/CNPM/public/order?makh={{ $query[0]->MaKH }}">Thêm dịch vụ</a>
            </div>
        </form>
    </div>
</section>
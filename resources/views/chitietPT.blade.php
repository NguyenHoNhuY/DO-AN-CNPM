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
                <input type="hidden" name="Mã khách hàng" value="{{ $query[0]->MaKH }}">
            </div>
            <div class="text-field">
                <label for="">Tên khách hàng</label>
                <input type="text" value="{{ $query[0]->TenKH }}">
            </div>
            <div class="text-field">
                <label for="">CMND</label>
                <input type="text" value="{{ $query[0]->CMND }}">
            </div>
            <div class="text-field">
                <label for="">Địa chỉ</label>
                <input type="text" value="{{ $query[0]->Diachi }}">
            </div>
            <div class="text-field">
                <label for="">Giới tính</label>
                <input type="text" value="{{ $query[0]->Gioitinh }}">
            </div>
            <div class="text-field">
                <label for="">Số điện thoại</label>
                <input type="text" value="{{ $query[0]->SoDienThoai }}">
            </div>
            <div class="text-field dn">
                <input type="hidden" name="Tình trạng">
            </div>
            <div class="text-field">
                <label for=""> Trả trước</label>
                <input type="text" value="{{ $query[0]->TraTruoc }}">
            </div>
            <div class="text-field">
                <label for="">Ghi chú</label>
                <input type="text" value="{{ $query[0]->GhiChu }}">
            </div>
            <div class="btn-submit flex ">
                <a href="http://localhost/CNPM/public/order?makh={{ $query[0]->MaKH }}">Thêm dịch vụ</a>
            </div>
        </form>
    </div>
</section>
<section class="pop-up-service pop-up-edit dn">
    <div class="body">
        <header class="flex">
            <h1 class="flex">Sửa dịch vụ</h1>
            <div class="close-edit flex">
                <button class="flex">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </header>
        <div class="content flex">
            <form method="POST" action="{{ route('suaDV') }}" enctype="multipart/form-data">
                @csrf
                <div class="text-field">
                    <label for="">Mã dịch vụ</label>
                    <input type="text" name="madv" value="{{ $dichvu->MaDV }}" readonly/>
                </div>
                <div class="text-field">
                    <label for="">Tên dịch vụ</label>
                    <input type="text" name="tendv" value="{{ $dichvu->TenDV }}" />
                </div>
                <div class="text-field">
                    <label for="">Giá</label>
                    <input type="text" name="gia" value="{{ $dichvu->Gia }}"/>
                </div>
                <div class="text-field">
                    <label for="">Ảnh cũ</label>
                    <img src="img/{{ $dichvu->HinhAnh }}" alt="{{ $dichvu->TenDV }}"/> 
                    <input type="text" name="hinhanhcu" value="{{ $dichvu->HinhAnh }}" hidden/>
                </div>
                <div class="text-field">
                    <label for="">Ảnh mới</label>
                    <input type="file" name='hinhanhmoi' value="{{ $dichvu->HinhAnh }}"/>
                </div>
                <div class="btn-submit">
                    <input type="submit" value="Sửa dịch vụ" />
                </div>
            </form>
        </div>
    </div>
</section>
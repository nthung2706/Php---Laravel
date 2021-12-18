<div class="row">
    <div class="proerty-th">
    @foreach ($sanpham as $value)
                    @php $giagiam = 0; @endphp

        <div class="col-sm-6 col-md-3 p0">
            <div class="box-two proerty-item">
                <div class="item-thumb">
                    <a href="property-2.html" ><img src="public/garo/assets/img/demo/property-2.jpg"></a>
                </div>
                <div class="item-entry overflow">
                    <h5><a href="property-2.html" >{{ $value->TenSanPham }} </a></h5>
                    <div class="dot-hr"></div>
                   
                    <span class="pull-left"><b>Giảm :</b> {{ $value->GiamGia }}% </span>
                    <span class="proerty-price pull-right">{{ number_format($value->GiaBan) }}đ</span>
                </div>
            </div>
        </div>

        @endforeach 
        {{ $sanpham->links() }}



    </div>
</div>
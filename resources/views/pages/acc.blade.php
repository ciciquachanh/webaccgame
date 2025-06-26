@extends('layout')
@section('content')
<div class="c-layout-page">
         <!-- BEGIN: PAGE CONTENT -->
         <div class="c-content-box c-size-md c-bg-white">
            <div class="container">
               <div class="row">
                  <div class="alert alert-info" role="alert">
                     <h2 class="alert-heading">Account {{$category->title}} </h2>
                     <p></p>
                     <p><span style="color:#e74c3c"><strong>{{$category->title}} </strong></span>{{$category->description}}</p>
                     <p></p>
                  </div>
               <div class="row  hidden-xs hidden-sm" style="margin-bottom: 15px">
               <div class="m-l-10 m-r-10">
                  <form class="form-inline m-b-10" role="form" method="get" data-hs-cf-bound="true">
                     <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Tìm kiếm</span>
                           <input type="text" class="form-control c-square" value="" placeholder="Tìm kiếm" name="find">
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Mã số</span>
                           <input type="text" class="form-control c-square" value="" placeholder="Mã số" name="id">
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Giá tiền</span>
                           <select style="" class="form-control c-square" name="price">
                              <option value="">Chọn giá tiền</option>
                              <option value="duoi-50k">Dưới 50K</option>
                              <option value="tu-50k-200k">Từ 50K - 200K</option>
                              <option value="tu-200k-500k">Từ 200K - 500K</option>
                              <option value="tu-500k-1-trieu">Từ 500K - 1 Triệu</option>
                              <option value="tren-1-trieu">Trên 1 Triệu</option>
                              <option value="tren-5-trieu">Trên 5 Triệu</option>
                              <option value="tren-10-trieu">Trên 10 Triệu</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Trạng thái</span>
                           <select style="" class="form-control c-square" name="status">
                              <option value="1" selected="">Chưa bán</option>
                              <option value="0">Đã bán</option>
                              <option value="3">Đã đặt cọc</option>
                              <option value="-999">Tất cả</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Rank</span>
                           <select name="attribute_id_593" class="form-control c-square" title="-- Không chọn --">
                              <option value="">-- Không chọn --</option>
                              <option value="596">Đồng</option>
                              <option value="597">Bạc</option>
                              <option value="598">Vàng</option>
                              <option value="599">Bạch Kim</option>
                              <option value="600">Kim Cương</option>
                              <option value="601">Cao Thủ</option>
                              <option value="602">Thách Đấu</option>
                              <option value="981">Tinh Anh</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Ngọc 90</span>
                           <select name="attribute_id_657" class="form-control c-square" title="-- Không chọn --">
                              <option value="">-- Không chọn --</option>
                              <option value="658">Không</option>
                              <option value="659">Có</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Nick có tướng trong đá quý</span>
                           <select name="attribute_id_1173" class="form-control c-square" title="-- Không chọn --">
                              <option value="">-- Không chọn --</option>
                              <option value="1175">Không</option>
                              <option value="1176">Có</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Nick có trang phục trong đá quý</span>
                           <select name="attribute_id_1174" class="form-control c-square" title="-- Không chọn --">
                              <option value="">-- Không chọn --</option>
                              <option value="1177">Không</option>
                              <option value="1178">Có</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 p-5 no-radius">
                        <button type="submit" class="btn c-square c-theme c-btn-green">Tìm kiếm</button>
                        <a class="btn c-square m-l-0 btn-danger" href="https://nick.vn/garena/lien-quan">Tất cả</a>
                     </div>
                  </form>
               </div>
            </div>
               </div>
               <!-- Begin: Testimonals 1 component -->
               <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
                  <!-- Begin: Title 1 component -->
                  <div class="c-content-title-1">
                     <h3 class="c-center c-font-uppercase c-font-bold">Danh mục {{$category->title}}</h3>
                     <div class="c-line-center c-theme-bg"></div>
                  </div>
                  <div class="row row-flex item-list">
                     @foreach($nicks as $key => $nick)
                <div class="item-box">

                  <div class="classWithPad">
                     <div class="image">
                        <a href="/acc/#">
                    
                         <img  src="{{asset('/uploads/nick/'.$nick->image)}}"  alt="png-image" 
     style="max-width: 100%; width: auto; height: 180px; border-radius: 8px;">

                           <span class="ms">MS: #{{$nick->ms}}</span>
                        </a>
                     </div>
                     <div class="description">
                        {{$nick->title}}

                     </div>
                   <div class="attribute_info">
    <div class="row">
        @php
            $attribute = json_decode($nick->attribute, true);
        @endphp
        @if(is_array($attribute))

            @foreach($attribute as $attr)
                @php
                    [$name, $value] = array_pad(explode(':', $attr, 2), 2, '');
                @endphp
         <div class="col-xs-6 a_att d-flex">
    <span class="att-name">{{ trim($name) }}:</span>
    <span class="att-value">{{ trim($value) }}</span>
</div>

            @endforeach
        @else
            <div class="col-xs-6 a_att">
                Không có thuộc tính
            </div>
        @endif
    </div>
</div>

                     <div class="a-more">
                        <div class="row">
                           <div class="col-xs-6">
                              <div class="price_item">
                               {{number_format($nick->price,0,',','.')}}
                              </div>
                           </div>
                           <div class="col-xs-6 ">
                              <div class="view">
<a href="{{ route('acc.detail.simple', ['ms' => $nick->ms]) }}">Chi tiết</a>

                                 <!-- <a href="/acc/518480">Chi tiết</a> -->
                               </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endforeach
                     <!-- End-->
                  </div>
                  <!-- End-->
               </div>
            </div>
           <style>
.item-list {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin: 0 -7.5px; /* Fix khoảng cách âm do padding */
}

.item-list .item-box {
    width: calc(25% - 15px); /* 4 cột đều nhau */
    display: flex;
    padding: 0 7.5px;
    box-sizing: border-box;
}

/* Khung acc */
.classWithPad {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 440px;
    box-sizing: border-box;
}

/* Ảnh acc */
.image {
    position: relative;
}

.image img {
    width: 100%;
    height: 180px;
    object-fit: contain;
    border-radius: 8px;
}

.image .ms {
    position: absolute;
    bottom: 5px;
    left: 5px;
    background: rgba(0,0,0,0.6);
    color: #fff;
    padding: 3px 8px;
    border-radius: 5px;
    font-size: 12px;
}

/* Tên acc */
.description {
    margin-top: 10px;
    font-weight: bold;
    text-align: center;
    min-height: 40px;
    line-height: 1.4;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Thuộc tính acc */
.attribute_info {
    margin-top: 10px;
    font-size: 14px;
    line-height: 1.4;
    max-height: 72px;
    overflow: hidden;
}

.a_att {
    margin-bottom: 4px;
}

/* Phần giá và nút chi tiết */
.a-more {
    margin-top: auto;
    padding-top: 10px;
    border-top: 1px solid #eee;
}

.a-more .row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0;
}

.price_item {
    font-size: 18px;
    font-weight: bold;
    color: #e74c3c;
    background: #fff;
    border: 2px solid #e74c3c;
    border-radius: 6px;
    padding: 6px 12px;
    height: 40px;
    line-height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    white-space: nowrap;
}

/* Chi tiết */
.view a {
    font-size: 18px;
    font-weight: bold;
    color: #ffffff;
    background: #4FC3F7; /* Màu xanh da trời tươi */
    border: 2px solid #4FC3F7;
    border-radius: 6px;
    padding: 6px 12px;
    white-space: nowrap;
    display: inline-block;
    text-decoration: none;
    transition: all 0.3s ease;
}

.view a:hover {
    color: #21618c;
    text-decoration: underline;
}

/* Mobile responsive */
@media (max-width: 1024px) {
    .item-list .item-box {
        width: calc(33.333% - 15px); /* 3 cột */
    }
}

@media (max-width: 768px) {
    .item-list .item-box {
        width: calc(50% - 15px); /* 2 cột */
    }

    .price_item,
    .view a {
        font-size: 16px;
        text-align: center;
    }

    .a-more .row {
        flex-direction: column;
        gap: 8px;
    }
}

@media (max-width: 500px) {
    .item-list .item-box {
        width: 100%; /* 1 cột */
    }
}
</style>

            <!-- END: PAGE CONTENT -->
         </div>
         <div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif"
                  style="width: 50px;height: 50px;display: none"></div>
               <div class="modal-content">
               </div>
            </div>
         </div>
      </div>
@endsection

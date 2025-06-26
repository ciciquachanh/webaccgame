@extends('layout')

@section('content')
 <div class="c-content-box c-size-md c-bg-white">
            <div class="container">
               <!-- Begin: Testimonals 1 component -->
               <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
                  <!-- Begin: Title 1 component -->
                  <div class="c-content-title-1">
                     <h3 class="c-center c-font-uppercase c-font-bold">Dịch vụ nổi bật</h3>
                     <div class="c-line-center c-theme-bg"></div>
                  </div>
                  <div class="owl-carousel owl-theme c-theme owl-bordered1 c-owl-nav-center" data-items="6" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-items="2" data-slide-speed="5000" data-rtl="false">
                     <div class="item">
                        <a href="{{route('dichvu')}}" ><img src="{{asset('frontend/images/vHPm7XyQah_1623147701.jpg')}}" alt="Trang cá nhân nickvn"/></a>
                     </div>
                     <div class="item">
                       <a href="{{route('dichvu')}}" ><img src="{{asset('frontend/images/vHPm7XyQah_1623147701.jpg')}}" alt="Trang cá nhân nickvn"/></a>
                     </div>
                     <div class="item">
                       <a href="{{route('dichvu')}}" ><img src="{{asset('frontend/images/vHPm7XyQah_1623147701.jpg')}}" alt="Trang cá nhân nickvn"/></a>
                     </div>
                     <div class="item">
                        <a href="{{route('dichvu')}}" ><img src="{{asset('frontend/images/vHPm7XyQah_1623147701.jpg')}}" alt="Trang cá nhân nickvn"/></a>
                     </div>
                  </div>
                  <!-- End-->
               </div>
               <!-- End-->
            </div>
         </div>

         <div class="c-content-box c-size-md c-bg-white">
            <div class="container">
               <!-- Begin: Testimonals 1 component -->
               <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
                  <!-- Begin: Title 1 component -->
                  <div class="c-content-title-1">
                     <h3 class="c-center c-font-uppercase c-font-bold">Danh mục game</h3>
                     <div class="c-line-center c-theme-bg"></div>
                  </div>
                  <div class="row row-flex-safari game-list">
                     @foreach($category as $key => $cate)
                     <div class="col-sm-3 col-xs-6 p-5">
                        <div class="classWithPad">
                           <div class="news_image">
                              <img style="position: absolute;max-width: 79px;height: auto;top: -5px;right: -6px;z-index: 1122;" src="{{asset('frontend/images/giam.png')}}"/>
                              <a href="{{route('danhmucgame',[$cate->slug])}}" title="{{$cate->title}}" class="">
                              <img src="{{asset('/uploads/category/'.$cate->image)}}" alt="{{$cate->title}}"></a>
                           </div>
                           <div class="news_title">
                              <h2>
                                 <a href="{{route('danhmucgame',[$cate->slug])}}" title="{{$cate->title}}">{{$cate->title}}</a>
                              </h2>
                           </div>
                           <div class="news_description">
                              <p>
                                 Số tài khoản: 23,763
                              </p>
                              <!-- <p>
                                 Đã bán: 198
                                 </p> -->
                           </div>
                           <div class="a-more">
                              <div class="row">
                                 <div class="col-xs-12">
                                    <div class="custom72 view">
                                       <a href="#" class="" title="{{$cate->title}}">
                                          &nbsp;
                                       
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                   
                    
                  
                     <!-- End-->
                  </div>

            </div>
            <style type="text/css">
               .news_image {
    width: 100%;
    height: 160px; /* bạn có thể điều chỉnh: 140px, 180px tùy nhu cầu */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #fff;
    border-radius: 8px;
    padding: 5px;
    box-sizing: border-box;
    position: relative;
}

.news_image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* ⚠️ Giữ tỉ lệ và không cắt ảnh */
}
            </style>
            <!-- END: PAGE CONTENT -->
@endsection
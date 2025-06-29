@extends('layout')
@section('content')
<div class="c-layout-page">
         <!-- BEGIN: PAGE CONTENT -->
         <div class="c-content-box c-size-md c-bg-white">
            <div class="container">
               <div class="row">
                  <div class="alert alert-info" role="alert">
                     <h2 class="alert-heading">{{$category->title}}</h2>
                     <p></p>
                     <p><span style="color:#e74c3c"><strong>Danh mục game: </strong></span><strong>{{$category->description}}</strong></p>
                  </div>
                  
               <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
                  <!-- Begin: Title 1 component -->
                  <div class="c-content-title-1">
                     <h3 class="c-center c-font-uppercase c-font-bold">{{$category->title}}</h3>
                     <div class="c-line-center c-theme-bg"></div>
                  </div>
                  <div class="row row-flex-safari game-list">
                     <div class="col-sm-3 col-xs-6 p-5">
                        <div class="classWithPad">
                           <div class="news_image">
                              <img style="position: absolute;max-width: 79px;height: auto;top: -5px;right: -6px;z-index: 1122;" src="{{asset('frontend/images/giam.png')}}"/>
                              <a href="{{route('danhmuccon',[$category->slug])}}" title="{{$category->title}}" class="">
                              <img src="{{asset('uploads/category/'.$category->image)}}" alt="{{$category->title}}"></a>
                           </div>
                           <div class="news_title">
                              <h2>
                                 <a href="{{route('danhmuccon',[$category->slug])}}" title="{{$category->title}}">{{$category->title}}</a>
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
                                       <a href="{{route('danhmuccon',[$category->slug])}}" class="" title="{{$category->title}}">
                                          &nbsp;
                                          <style type="text/css">
                                             .custom72{
                                             border: none!important;
                                             padding: 0;
                                             }
                                             .custom72 a{
                                             background-size: 136px 35px;
                                             background-repeat: no-repeat;
                                             border: none;
                                             margin: 0 auto;
                                             width: 136px;
                                             height: 35px;
                                             background: url(img/danhmuc.gif);
                                             }
                                             .custom72 a:hover{
                                             background-size: 136px 35px;
                                             background-repeat: no-repeat;
                                             border: none;
                                             margin: 0 auto;
                                             width: 136px;
                                             height: 35px;
                                             background: url(img/danhmuc.gif);
                                             filter: saturate(2);
                                             filter: brightness(130%);
                                             }
                                          </style>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                <!--         <div class="classWithPad">
                           <div class="news_image">
                              <img style="position: absolute;max-width: 79px;height: auto;top: -5px;right: -6px;z-index: 1122;" src="img/giam.png"/>
                              <a href="/danh-muc/danh-muc-game-free-fire" title="Danh Mục Game Free Fire" class="">
                              <img src="img/danhmuc.gif" alt="Danh Mục Game Free Fire"></a>
                           </div>
                           <div class="news_title">
                              <h2>
                                 <a href="/danh-muc/danh-muc-game-roblox" title="Danh Mục Game Roblox">Danh Mục Game Roblox</a>
                              </h2>
                           </div>
                           <div class="news_description">
                              <p>
                                 Số tài khoản: 299
                              </p>
                              <!-- <p>
                                 Đã bán: 198
                                 </p> -->
                           </div>
                           <div class="a-more">
                              <div class="row">
                                 <div class="col-xs-12">
                                    <div class="custom207 view">
                                       <a href="/danh-muc/danh-muc-game-roblox" class="" title="{{$category->title}}">
                                          &nbsp;
                                          <style type="text/css">
                                             .custom207{
                                             border: none!important;
                                             padding: 0;
                                             }
                                             .custom207 a{
                                             background-size: 136px 35px;
                                             background-repeat: no-repeat;
                                             border: none;
                                             margin: 0 auto;
                                             width: 136px;
                                             height: 35px;
                                             background: url(/storage/images/9cRiwF0dTi_1625905876.jpg);
                                             }
                                             .custom207 a:hover{
                                             background-size: 136px 35px;
                                             background-repeat: no-repeat;
                                             border: none;
                                             margin: 0 auto;
                                             width: 136px;
                                             height: 35px;
                                             background: url(/storage/images/9cRiwF0dTi_1625905876.jpg);
                                             filter: saturate(2);
                                             filter: brightness(130%);
                                             }
                                          </style>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> -->
                     <!-- End-->
                  </div>
                  <!-- End-->
               </div>
            </div>
            <style type="text/css">
               .news_image, .image, .news_title, .a-more, .news_description {
               position: relative;
               z-index: 200;
               }
               span.sale {
               position: absolute;
               z-index: 1000;
               right: -1px;
               top:-1px;
               background: rgba(255, 212, 36, .9);
               padding: 5px;
               text-align: center;
               color: #ee4d2d;
               width: 50px;
               font-weight: 700;
               font-size: 15px;
               }
               .sale:after {
               content: "";
               width: 0;
               height: 0;
               left: 0;
               bottom: -4px;
               position: absolute;
               border-color: transparent rgba(255, 212, 36, .9);
               border-style: solid;
               border-width: 0 25px 4px;
               }
               .outPrice {
               padding-top: 20px;
               text-align: center;
               width: 100px;
               margin: 0 auto;
               margin-top: 10px;
               display: flex;
               justify-content: center;
               }
               .oldPrice {
               text-decoration: line-through;
               color: #3f0;
               border: 2px solid;
               padding: 5px 15px;
               border-radius: 5px;
               font-size: 14px;
               font-weight: bold;
               }
               .newPrice {
               border: 2px solid red;
               padding: 5px 15px;
               color: red;
               display: inline;
               border-radius: 5px;
               margin-left: 10px;
               font-size: 14px;
               font-weight: bold;
               margin-bottom: 10px;
               }
               .game-list .a-more .view{
               margin-top: 20px;
               }
               @media (max-width: 550px) {
               .outPrice {
               flex-direction: column;
               }
               .newPrice {
               margin-left: 0;
               margin-top: 10px;
               margin-bottom: 10px;
               }
               }
            </style>
            <!-- END: PAGE CONTENT -->
         </div>
        <!--  <div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif"
                  style="width: 50px;height: 50px;display: none"></div>
               <div class="modal-content">
               </div>
            </div>
         </div> -->
      </div>
@endsection

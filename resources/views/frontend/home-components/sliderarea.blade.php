   <!-- slider_area_start -->
   <div class="slider_area">
       <!-- Swiper Container -->
       <div class="swiper-container">
           <div class="swiper-wrapper">
               <!-- Slide 1 -->
               <div class="swiper-slide single_slider d-flex align-items-center slider_bg_1">
                   <div class="container">
                       <div class="row align-items-center justify-content-center">
                           <div class="col-xl-8">
                               <div class="slider_text text-center animate__animated animate__fadeInLeft">
                                   <p>{{ $settingpage->head_slide1 }}</p>
                                   <h3>{{ $settingpage->desc_slide1 }}</h3>
                                   <a class="boxed-btn3" href="{{ $settingpage->link_slide1 }}">{{ $settingpage->name_slide1 }}</a>
                               </div>

                           </div>
                       </div>
                   </div>
               </div>
               <!-- Slide 2 -->
               <div class="swiper-slide single_slider d-flex align-items-center slider_bg_2">
                   <div class="container">
                       <div class="row align-items-center justify-content-center">
                           <div class="col-xl-8">
                               <div class="slider_text text-center">
                                <p>{{ $settingpage->head_slide2 }}</p>
                                <h3>{{ $settingpage->desc_slide2 }}</h3>
                                <a class="boxed-btn3" href="{{ $settingpage->link_slide2 }}">{{ $settingpage->name_slide2 }}</a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Swiper Pagination -->
           <div class="swiper-pagination"></div>
       </div>
   </div>
   <!-- slider_area_end -->

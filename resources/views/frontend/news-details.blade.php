{{-- @extends('frontend.layouts.master')

<!-- Setting metas -->
@section('title', $news->title)
@section('meta_description', $news->meta_description)
@section('meta_og_title', $news->meta_title)
@section('meta_og_description', $news->meta_description)
@section('meta_og_image', asset($news->image))
@section('meta_tw_title', $news->meta_title)
@section('meta_tw_description', $news->meta_description)
@section('meta_tw_image', asset($news->image))
<!-- End Setting metas -->

@section('content')


    <!-- bradcam_area -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Our Product</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area -->

    <!-- service_details_start -->
    <div class="service_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="service_details_left">
                        <h3>Market Sector</h3>
                        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach ($categories as $category)
                                <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                    id="v-pills-{{ $category->slug }}-tab" data-toggle="pill"
                                    href="#v-pills-{{ $category->slug }}" role="tab"
                                    aria-controls="v-pills-{{ $category->slug }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($categories as $category)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                id="v-pills-{{ $category->slug }}" role="tabpanel"
                                aria-labelledby="v-pills-{{ $category->slug }}-tab">
                                <div class="service_details_info">
                                    <h3>{{ $category->name }}</h3>
                                    @foreach ($category->news as $news)
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="single_service">
                                                <div class="thumb">
                                                    <img src="{{ $news->image ? asset($news->image) : asset('default-image.jpg') }}"
                                                        alt="{{ $news->title }}" class="img-fluid" />
                                                </div>
                                                <div class="service_info">
                                                    <p style="font-weight: 500"><a
                                                            href="{{ route('product-details', $news->slug) }}">{{ $news->title }}</a>
                                                    </p>
                                                    <p>{!! Str::limit($news->content, 200, '...') !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if ($category->news->isEmpty())
                                        <div class="col-12">
                                            <p class="text-center">Product Not Found.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="wrap__article-detail">
                        <div class="wrap__article-detail-title">
                            <h1>{!! $news->title !!}</h1>
                        </div>
                        <hr>
                        <div class="wrap__article-detail-info">
                            <ul class="list-inline d-flex flex-wrap justify-content-start">
                                <li class="list-inline-item">
                                    {{ __('frontend.By') }}
                                    <a href="#">{{ $news->auther->name }}</a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        {{ date('M D, Y', strtotime($news->created_at)) }}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize">
                                        {{ __('frontend.in') }}
                                    </span>
                                    <a href="#">{{ $news->category->name }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="wrap__article-detail-image mt-4">
                            <div class="feature-img">
                                <img src="{{ asset($news->image) }}" alt="" class="img-fluid">
                             </div>

                        </div>
                        <div class="wrap__article-detail-content">
                            <div class="total-views">
                                <div class="total-views-read">
                                    {{ convertToKFormat($news->views) }}
                                    <span>{{ __('frontend.views') }}</span>
                                </div>

                                <ul class="list-inline">
                                    <span class="share">{{ __('frontend.share on:') }}</span>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                            target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>{{ __('frontend.facebook') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o twitter"
                                            href="https://twitter.com/intent/tweet?text={{ $news->title }}&url={{ url()->current() }}"
                                            target="_blank">
                                            <i class="fab fa-twitter"></i>
                                            <span>{{ __('frontend.twitter') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o whatsapp"
                                            href="https://wa.me/?text={{ $news->title }}%20{{ url()->current() }}"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                            <span>{{ __('frontend.whatsapp') }}</span>
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o telegram"
                                            href="https://t.me/share/url?url={{ url()->current() }}&text={{ $news->title }}"
                                            target="_blank">
                                            <i class="fab fa-telegram"></i>
                                            <span>{{ __('frontend.telegram') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-linkedin-o linkedin"
                                            href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $news->title }}"
                                            target="_blank">
                                            <i class="fab fa-linkedin"></i>
                                            <span>{{ __('frontend.linkedin') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <p class="has-drop-cap-fluid">{!! $news->content !!}</p>
                        </div>
                    </div>
                    <!-- end content article detail -->
                </div>
            </div>
        </div>
    </div>
    <!-- service_details_end -->

@endsection --}}


@extends('frontend.layouts.master')

<!-- Setting metas -->
@section('title', $news->title)
@section('meta_description', $news->meta_description)
@section('meta_og_title', $news->meta_title)
@section('meta_og_description', $news->meta_description)
@section('meta_og_image', asset($news->image))
@section('meta_tw_title', $news->meta_title)
@section('meta_tw_description', $news->meta_description)
@section('meta_tw_image', asset($news->image))
<!-- End Setting metas -->

@section('content')



    <!-- bradcam_area -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Our Product</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset($news->image) }}" alt="">
                </div>
                <div class="blog_details">
                   <h2>{!! $news->title !!}
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                    <li class="list-inline-item">
                        {{ __('frontend.By') }}
                        <a href="#">{{ $news->auther->name }}</a>
                    </li>
                    <li class="list-inline-item">
                        <span class="text-dark text-capitalize ml-1">
                            {{ date('M D, Y', strtotime($news->created_at)) }}
                        </span>
                    </li>
                    <li class="list-inline-item">
                        <span class="text-dark text-capitalize">
                            {{ __('frontend.in') }}
                        </span>
                        <a href="#">{{ $news->category->name }}</a>
                    </li>
                   </ul>
                   <div class="wrap__article-detail-content">
                    <div class="total-views">
                        <div class="total-views-read">
                            {{ convertToKFormat($news->views) }}
                            <span>{{ __('frontend.views') }}</span>
                        </div>

                        <ul class="list-inline">
                            <span class="share">{{ __('frontend.share on:') }}</span>
                            <li class="list-inline-item">
                                <a class="btn btn-social-o facebook"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                    target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>{{ __('frontend.facebook') }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-social-o twitter"
                                    href="https://twitter.com/intent/tweet?text={{ $news->title }}&url={{ url()->current() }}"
                                    target="_blank">
                                    <i class="fab fa-twitter"></i>
                                    <span>{{ __('frontend.twitter') }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-social-o whatsapp"
                                    href="https://wa.me/?text={{ $news->title }}%20{{ url()->current() }}"
                                    target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>{{ __('frontend.whatsapp') }}</span>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a class="btn btn-social-o telegram"
                                    href="https://t.me/share/url?url={{ url()->current() }}&text={{ $news->title }}"
                                    target="_blank">
                                    <i class="fab fa-telegram"></i>
                                    <span>{{ __('frontend.telegram') }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-linkedin-o linkedin"
                                    href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $news->title }}"
                                    target="_blank">
                                    <i class="fab fa-linkedin"></i>
                                    <span>{{ __('frontend.linkedin') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                   <p class="excert">
                    {!! $news->content !!}
                   </p>
                </div>
             </div>
             <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                   <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                      people like this</p>
                   <div class="col-sm-4 text-center my-2 my-sm-0">
                      <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                   </div>
                   <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                   </ul>
                </div>
                <div class="navigation-area">
                   <div class="row">
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                         <div class="thumb">
                            <a href="#">
                               <img class="img-fluid" src="img/post/preview.png" alt="">
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="#">
                               <span class="lnr text-white ti-arrow-left"></span>
                            </a>
                         </div>
                         <div class="detials">
                            <p>Prev Post</p>
                            <a href="#">
                               <h4>Space The Final Frontier</h4>
                            </a>
                         </div>
                      </div>
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                         <div class="detials">
                            <p>Next Post</p>
                            <a href="#">
                               <h4>Telescopes 101</h4>
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="#">
                               <span class="lnr text-white ti-arrow-right"></span>
                            </a>
                         </div>
                         <div class="thumb">
                            <a href="#">
                               <img class="img-fluid" src="img/post/next.png" alt="">
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="blog-author">
                <div class="media align-items-center">
                   <img src="img/blog/author.png" alt="">
                   <div class="media-body">
                      <a href="#">
                         <h4>Harvard milan</h4>
                      </a>
                      <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                         our dominion twon Second divided from</p>
                   </div>
                </div>
             </div>
             {{-- <div class="comments-area">
                <h4>05 Comments</h4>
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="img/comment/comment_1.png" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                               Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                               Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                            </p>
                            <div class="d-flex justify-content-between">
                               <div class="d-flex align-items-center">
                                  <h5>
                                     <a href="#">Emilly Blunt</a>
                                  </h5>
                                  <p class="date">December 4, 2017 at 3:12 pm </p>
                               </div>
                               <div class="reply-btn">
                                  <a href="#" class="btn-reply text-uppercase">reply</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="img/comment/comment_2.png" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                               Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                               Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                            </p>
                            <div class="d-flex justify-content-between">
                               <div class="d-flex align-items-center">
                                  <h5>
                                     <a href="#">Emilly Blunt</a>
                                  </h5>
                                  <p class="date">December 4, 2017 at 3:12 pm </p>
                               </div>
                               <div class="reply-btn">
                                  <a href="#" class="btn-reply text-uppercase">reply</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="img/comment/comment_3.png" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                               Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                               Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                            </p>
                            <div class="d-flex justify-content-between">
                               <div class="d-flex align-items-center">
                                  <h5>
                                     <a href="#">Emilly Blunt</a>
                                  </h5>
                                  <p class="date">December 4, 2017 at 3:12 pm </p>
                               </div>
                               <div class="reply-btn">
                                  <a href="#" class="btn-reply text-uppercase">reply</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div> --}}
             <div class="comment-form">
                <h4>Leave a Reply</h4>
                <form action="{{ route('product-comment') }}" method="POST" class="comment-form">
                    @csrf
                    <p class="comment-notes">

                    </p>
                    <p class="comment-form-comment">
                        <label for="comment">{{ __('frontend.Comment') }}</label>
                        <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525"
                            required="required"></textarea>
                        <input type="hidden" name="news_id" value="{{ $news->id }}">
                        <input type="hidden" name="parent_id" value="">

                        @error('comment')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </p>

                    <p class="form-submit mb-0">
                        <input type="submit" name="submit" id="submit" class="submit" value="Post Comment">
                    </p>
                </form>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="blog_right_sidebar">
                <aside class="single_sidebar_widget search_widget">
                   <form action="#">
                      <div class="form-group">
                         <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder='Search Keyword'
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                            <div class="input-group-append">
                               <button class="btn" type="button"><i class="ti-search"></i></button>
                            </div>
                         </div>
                      </div>
                      <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                         type="submit">Search</button>
                   </form>
                </aside>
                <aside class="single_sidebar_widget post_category_widget">
                   <h4 class="widget_title">Category</h4>
                   <ul class="list cat-list">
                      <li>
                         <a href="#" class="d-flex">
                            <p>Resaurant food</p>
                            <p>(37)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Travel news</p>
                            <p>(10)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Modern technology</p>
                            <p>(03)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Product</p>
                            <p>(11)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Inspiration</p>
                            <p>(21)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Health Care</p>
                            <p>(21)</p>
                         </a>
                      </li>
                   </ul>
                </aside>

             </div>
          </div>
       </div>
    </div>
 </section>
 <!--================ Blog Area end =================-->
 @endsection

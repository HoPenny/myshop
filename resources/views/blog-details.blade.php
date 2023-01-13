@extends('Layouts.master')
@section('title')

@section('content')
  <!-- Hero Area Start-->
      <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
               <div class="container">
                  <div class="row">
                        <div class="col-xl-12">
                           <div class="hero-cap text-center">
                              <h2>膜拜主子處</h2>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
      </div>

      <!--================Blog Area =================-->
      <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">
              @php
                  Carbon\Carbon::setlocale(config('app.locale'));
              @endphp
               <div class="col-lg-8 posts-list">
                  <div class="single-post">
                     <div class="feature-img">
                        <img class="img-fluid" src="{{ Voyager::image($article->pic)}}" alt="">
                     </div>
                     <div class="blog_details">
                        <h2>{{$article->title}} </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                           <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                           <li><a href="#"><i class="fa fa-comments"></i> {{
                                $article->updated_at->diffForHumans()}}</a></li>
                        </ul>
                        <p class="excert">
                           {{$article->content_small}}
                        </p>
                        <p>
                           {{$article->content}}
                        </p>
                        <div class="quote-wrapper">
                           <div class="quotes">
                              MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                              should have to spend money on boot camp when you can get the MCSE study materials yourself at
                              a fraction of the camp price. However, who has the willpower to actually sit through a
                              self-imposed MCSE training.
                           </div>
                        </div>
                        <p>
                           MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                           should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                           fraction of the camp price. However, who has the willpower
                        </p>
                        <p>
                           MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                           should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                           fraction of the camp price. However, who has the willpower to actually sit through a
                           self-imposed MCSE training. who has the willpower to actually
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
                           <li><a href="{{ setting('site.fb_url') }}">
                            <i class="fab fa-facebook-f"></i></a></li>
                           <li><a href="{{ setting('site.ig_url') }}">
                            <i class="fab fa-instagram"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                           <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                     </div>
                     <div class="navigation-area">
                        <div class="row">
                           <div
                              class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                              <div class="thumb">
                                 <a href="#">
                                    <img class="img-fluid" src="{{Voyager::image($prev->pic)}}" style="width:65px;height:50px" alt="">
                                 </a>
                              </div>
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-left"></span>
                                 </a>
                              </div>
                              <div class="detials">
                                 <p>上則貼文</p>
                                 <a href="{{url('/blog-details/' . $prev->id)}}">
                                    <h4>{{$prev->title}}</h4>
                                 </a>
                              </div>
                           </div>
                           <div
                              class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                              <div class="detials">
                                 <p>下則貼文</p>
                                 <a href="{{url('/blog-details/' . $next->id)}}">
                                    <h4>{{$next->title}}</h4>
                                 </a>
                              </div>
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-right"></span>
                                 </a>
                              </div>
                              <div class="thumb">
                                 <a href="#">
                                    <img class="img-fluid" src="{{Voyager::image($next->pic)}}" style="width:65px;height:50px" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="blog-author">
                     <div class="media align-items-center">
                        <img src="{{asset('/img/blog/author.png')}}" alt="">
                        <div class="media-body">
                           <a href="#">
                              <h4>Harvard milan</h4>
                           </a>
                           <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                              our dominion twon Second divided from</p>
                        </div>
                     </div>
                  </div>
                  <div class="comments-area">
                     <h4>{{$count}} {{__('Comments')}}</h4>
                      @foreach ($comments as $item)
                        <div class="comment-list">
                          <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">

                                  @if(!empty($item->user->avatar))
                                  <img src="{{Voyager::image($item->user->avatar)}}" alt="avatar">
                                  @else
                                    <img src="{{asset('/comment/comment_1.png')}}" alt="">
                                  @endif

                                </div>
                                <div class="desc">
                                  <p class="comment">
                                      {{$item->content}}
                                  </p>
                                  <div class="d-flex justify-content-between">
                                      <div class="d-flex align-items-center">
                                        <h5>
                                            <a href="#">{{$item->name}}</a>
                                        </h5>
                                        <p class="date">{{$item->created_at->Format('M d , Y m:s a')}}</p>
                                      </div>
                                      <div class="reply-btn">
                                        <a href="#" class="btn-reply text-uppercase">{{__('reply')}}</a>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
                  <div class="comment-form">
                     <h4>{{__('Leave a Reply')}}</h4>
                     <form class="form-contact comment_form" action="{{url('/blogs'  )}}"  method="post" id="" novalidate="novalidate">
                      {{csrf_field()}}
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9"
                                    placeholder="Write Comment"></textarea>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-group">
                                 <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                              </div>
                           </div>
                           <input class="form-control" name="article_id" id="article_id" type="hidden" value={{$article->id}}>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="button button-contactForm btn_1 boxed-btn">{{__('Send Message')}}</button>
                        </div>
                     </form>
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="blog_right_sidebar">
                    @include('includes._search');
                     {{-- <aside class="single_sidebar_widget search_widget">
                        <form action="{{url('/search')}}"  method="post">
                           <div class="form-group">
                            {{csrf_field()}}
                              <div class="input-group mb-3">
                                 <input type="text" class="form-control" placeholder='Search Keyword'
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" name='search'>
                                    <input class="form-control" name="article_id" id="article_id" type="hidden" value={{$article->id}}>
                                 <div class="input-group-append">
                                    <button class="btns" type="button"><i class="ti-search"></i></button>
                                 </div>
                              </div>
                           </div>
                           <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                              type="submit">{{__('Search')}}</button>
                        </form>
                     </aside> --}}
                     {{-- <aside class="single_sidebar_widget post_category_widget">
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
                     </aside> --}}
                     @include('includes._category');
                     @include('includes._recent');
                     {{-- <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        <div class="media post_item">
                           <img src="{{asset('/img/post/post_1.png')}}" alt="post">
                           <div class="media-body">
                              <a href="single-blog.html">
                                 <h3>From life was you fish...</h3>
                              </a>
                              <p>January 12, 2019</p>
                           </div>
                        </div>
                        <div class="media post_item">
                           <img src="{{asset('/img/post/post_2.png')}}" alt="post">
                           <div class="media-body">
                              <a href="single-blog.html">
                                 <h3>The Amazing Hubble</h3>
                              </a>
                              <p>02 Hours ago</p>
                           </div>
                        </div>
                        <div class="media post_item">
                           <img src="{{asset('/img/post/post_3.png')}}" alt="post">
                           <div class="media-body">
                              <a href="single-blog.html">
                                 <h3>Astronomy Or Astrology</h3>
                              </a>
                              <p>03 Hours ago</p>
                           </div>
                        </div>
                        <div class="media post_item">
                           <img src="{{asset('/img/post/post_4.png')}}" alt="post">
                           <div class="media-body">
                              <a href="single-blog.html">
                                 <h3>Asteroids telescope</h3>
                              </a>
                              <p>01 Hours ago</p>
                           </div>
                        </div>
                     </aside> --}}
                     <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                           <li>
                              <a href="#">project</a>
                           </li>
                           <li>
                              <a href="#">love</a>
                           </li>
                           <li>
                              <a href="#">technology</a>
                           </li>
                           <li>
                              <a href="#">travel</a>
                           </li>
                           <li>
                              <a href="#">restaurant</a>
                           </li>
                           <li>
                              <a href="#">life style</a>
                           </li>
                           <li>
                              <a href="#">design</a>
                           </li>
                           <li>
                              <a href="#">illustration</a>
                           </li>
                        </ul>
                     </aside>
                     <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                          @foreach ($igs as $item)
                           <li>
                              <a href="#">
                                 <img class="img-fluid" src="{{Voyager::image($item->pic)}}" style="width:100px;height:80px" alt="">
                              </a>
                           </li>
                           @endforeach
                        </ul>
                     </aside>
                     <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">{{__('Newsletter')}}</h4>
                        <form action="#">
                           <div class="form-group">
                              <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                 onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                           </div>
                           <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                              type="submit">{{__('Subscribe')}}</button>
                        </form>
                     </aside>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--================ Blog Area end =================-->
@endsection

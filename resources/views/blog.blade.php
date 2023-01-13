@extends('layouts.master')

@section('content')
<!--? Hero Area Start-->

<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--? Hero Area End-->
<!--================Blog Area =================-->
@include('flash::message')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                  @php
                  Carbon\Carbon::setlocale(config('app.locale'));
                  @endphp
                  @foreach ($article_news as $article)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{ Voyager::image($article->pic)}}" alt="{{$article->title}}">
                            <a href="#" class="blog_item_date">
                                <h3>{{$article->created_at->day}}</h3>
                                <p>{{$article->created_at->month}}</p>
                            </a>
                        </div>

                         <div class="blog_details">
                            <a class="d-inline-block" href="{{url('blog-details/'.$article->id)}}">
                                <h2>{!!$article->title!!}</h2>
                            </a>
                            <p>{!!$article->content_small!!}</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i>{{
                                $article->updated_at->diffForHumans()}}</a></li>
                            </ul>
                        </div>
                    </article>
                  @endforeach
                  {{$article_news->links()}}

                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            {{-- <li class="page-item disabled">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                  @include('includes._search');
                    {{-- <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">搜尋</button>
                        </form>
                    </aside> --}}

                    {{-- <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">分類</h4>
                        <ul class="list cat-list">
                          @foreach ($cgies as $cgy )
                            <li>
                                <a href="#" class="d-flex">
                                    <p>{{$cgy->title}}</p>
                                    <p>{{$cgy->articles()->count()}}</p>
                                </a>
                            </li>
                          @endforeach

                            {{-- <li>
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
                                    <p>21</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Health Care (21)</p>
                                    <p>09</p>
                                </a>
                            </li>
                        </ul>
                    </aside> --}}
                    @include('includes._category');
                    @include('includes._recent');
                    {{-- <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">最新貼文</h3>
                        @foreach ($recents as $recent)
                          <div class="media post_item">
                            <img src="{{Voyager::image( $recent->pic)}}" alt="post" style="width:60px; height:50px;">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>{{$recent->title}}</h3>
                                </a>
                                <p>{{$recent->created_at->Format('M d , Y')}}</p>
                            </div>
                        </div>
                        @endforeach
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
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </aside>


                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>

                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Subscribe</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection

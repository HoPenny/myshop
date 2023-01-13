{{-- for blog & blog-details  --}}
<aside class="single_sidebar_widget popular_post_widget">
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
  </aside>

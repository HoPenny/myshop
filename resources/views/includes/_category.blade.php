{{-- for blog & blog-details  --}}
<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">分類</h4>
    <ul class="list cat-list">
      @foreach ($cgies as $cgy )
        <li>
            <a href="{{asset('/blog/' . $cgy->id)}}" class="d-flex">
                <p>{{$cgy->title}}</p>
                <p>{{$cgy->articles()->count()}}</p>
            </a>
        </li>
      @endforeach
</aside>

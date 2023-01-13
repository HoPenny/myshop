{{-- for index & about  --}}
<!--? Shop Method Start-->
<div class="shop-method-area" >
  <div class="container">
    <div class="method-wrapper" style="background: #f7366; ">
      <div class="row d-flex justify-content-between">
        @foreach ($shop_method as $item)
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="single-method mb-40">
            <i class="ti-package"></i>
            <h6>{{$item->title}}></h6>
            <div>
              <img src="{{ Voyager::image($item->pic) }}" style="width: 150px;hiethg:60px" alt="">
            </div>
            <p>{{$item->content}}</p>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
<!-- Shop Method End-->

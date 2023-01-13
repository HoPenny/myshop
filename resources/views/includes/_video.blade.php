 {{-- for about & index --}}
 <!--? Video Area Start -->
  <div class="video-area">
      <div class="container-fluid">
          <div class="row align-items-center">
              <div class="col-lg-12">
              <div class="video-wrap">
                  <div class="play-btn "><a class="popup-video" href={{$video->video}}><i class="fas fa-play"></i></a></div>
              </div>
              </div>
          </div>
          <!-- Arrow -->
          <div class="thumb-content-box">
              <div class="thumb-content">
                  <h3>{{ $video->title }}</h3>
                  <a href="{{$video->url}}"> <i class="flaticon-arrow"></i></a>
              </div>
          </div>
      </div>
  </div>

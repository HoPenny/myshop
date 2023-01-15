 @csrf
 <aside class="single_sidebar_widget search_widget">
    <form action="{{url('/search')}}"  method="post">
        <div class="form-group">

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
  </aside>


    {{-- The best athlete wants his opponent at his best. --}}
    {{-- 在livewire不要放多餘的<div> --}}
        <tr>
          <td>
            {{-- <div class="media">
              <div class="d-flex"> --}}
                <img src="{{Voyager::image($pic)}}" alt="" />
              {{-- </div> --}}
              {{-- <div class="media-body"> --}}
                <p>{!!$title!!}</p>
              {{-- </div> --}}
            {{-- </div> --}}
          </td>
          <td>
            <h5>{{$price}}</h5>
          </td>
          <td>
              {{-- <div class="product_count"> --}}
                <button wire:click="minus">-</button>
                <input class=""  type="text" value="{{$quantity}}"  min="0" max="10">
                <button wire:click="plus">+</button>
              {{-- </div> --}}
          </td>
          <td>
            <h5>{{$total}}</h5>
          </td>
        </tr>



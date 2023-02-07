@extends('Layouts.master')

@section('title','購物車')
@section('content')
  <!-- Hero Area Start-->
      <div class="slider-area ">
          <div class="single-slider slider-height2 d-flex align-items-center">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="hero-cap text-center">
                              <h2>{{__('Cart List')}}</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    {{-- {{ menu('cart_section','my_cart') }} --}}
                    <th scope="col">{{__('Product')}}</th>
                    <th scope="col">{{__('Price')}}</th>
                    <th scope="col">{{__('Quantity')}}</th>
                    <th scope="col">{{__('Total')}}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $item)
                      @livewire('cart-item', ['item'=>$item],key($item->id));
                    @endforeach

                  <tr class="bottom_button">
                     <td>
                      <a class="btn_1" href="{{url('/clearcart' )}}">{{__('Clear Cart')}}</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                      <div class="cupon_text float-right">
                        <a class="btn_1" href="{{url('/cart')}}">{{__('Close Coupon')}}</a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>{{__('Subtotal')}}</h5>
                    </td>
                    @livewire('cart-totle')
                  </tr>
                  <tr class="shipping_area">
                    <td></td>
                    <td></td>

                </tbody>
              </table>
              <div class="checkout_btn_inner float-right">
                <a class="btn_1" href="{{url('/shop')}}">{{__('Continue Shopping')}}</a>
                <a class="btn_1 checkout_btn_1" href="{{url('/checkout')}}">{{__('Proceed To Checkout')}}</a>
              </div>
            </div>
          </div>
      </section>
      <!--================End Cart Area =================-->
@endsection

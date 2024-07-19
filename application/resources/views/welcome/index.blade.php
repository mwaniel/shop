<!-- fashion section start -->
<div class="fashion_section">
   <div id="main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               @include('alert.alert')
               <!-- <h1 class="fashion_taital">Category assending</h1> -->
               <div class="fashion_section_2">
                  <div class="row">
                  @if(count($result['product']) > 0)
                  @foreach($result['product'] as $item)
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <div class="tshirt_img"><img src="/storage/pictures/{{$item['picture']}}"></div>
                            <h4 class="shirt_text">{{$item['name']}}</h4>
                           <p class="price_text">Price  <span style="color: #262626;">shs {{number_format($item['price'], 2)}}</span></p>
                           <div class="btn_main">
                              <div class="buy_bt">
                                 <form id="{{$item->id}}" action="{{route('cart-store', $item->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" form="{{$item->id}}" class="btn btn-outline-danger">Add to cart</button>
                                 </form>
                              </div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  @endforeach
                  @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
      <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
      <i class="fa fa-angle-right"></i>
      </a>
   </div>
</div>
<!-- fashion section end -->
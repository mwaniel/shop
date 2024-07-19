<!-- banner bg main start -->
<div class="banner_bg_main">
   <!-- header top section start -->
   <div class="container">
      <div class="header_section_top">
         <div class="row">
            <div class="col-sm-12">
               <div class="custom_menu">
                  <ul>
                     <li><a href="/">JOMAKA HORIZONS KENYA</a></li>
                     <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="padding_10">Cart</span></a></li>
                     <li><a href="/login/"><i class="fa fa-user" aria-hidden="true"></i><span class="padding_10"> Login</span></a></li>
                     <li><a href="/register/"><i class="fa fa-user" aria-hidden="true"></i><span class="padding_10"> Register</span></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- header top section start -->
   <!-- logo section start -->
   <div class="logo_section">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="logo"><a href="/"><img src="{{asset('/storage/theme/favicon.jpeg')}}" style="height: 48px; width: 48px; border-radius: 8px;"></a></div>
            </div>
         </div>style
      </div>
   </div>
   <!-- logo section end -->
   <!-- header section start -->
   <div class="header_section">
      <div class="container">
         <div class="containt_main">
            <div id="mySidenav" class="sidenav">
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               <a href="/">Home</a>
               <a href="#/about-us/">About Us</a>
               <a href="#/services/">Services</a>
               <a href="{{route('cart')}}">Cart</a>
               <a href="{{route('login')}}">Login</a>
               <a href="{{route('register')}}">Register</a>
            </div>
            <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png" style="background-color: black;"></span>
            <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @if(count($result['category']) > 0)
                  @foreach($result['category'] as $item)
                  <a class="dropdown-item" href="{{$item->id}}">{{$item->name}}</a>
                  @endforeach
                  @endif
               </div>
            </div>
            <div class="main">
               <!-- Another variation with a button -->
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search this blog">
                  <div class="input-group-append">
                     <button class="btn btn-secondary" type="button" style="background-color: blue; border-color:#f26522 ">
                     <i class="fa fa-search"></i>
                     </button>
                  </div>
               </div>
            </div>
            <div class="header_box">
               <div class="lang_box ">
                  <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                  <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> Currency <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                  </a>
                  <div class="dropdown-menu ">
                     <a href="#" class="dropdown-item">
                     <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> Kenya shs
                     </a>
                  </div>
               </div>
               <div class="login_menu">
                  <ul>
                     <li><a href="#">
                        </a>
                     </li>
                     <li><a href="#">
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- header section end -->
</div>
<!-- banner bg main end -->
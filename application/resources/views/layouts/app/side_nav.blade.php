<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="/dashboard/" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary text-sm"><img class="rounded-circle" src="{{asset('/storage/theme/favicon.jpeg')}}" style="height: 20px; width: 20px; border-radius: 8px;"> Welcome</h3>
        </a>
        <div class="navbar-nav w-100">
            @if(count($result['admin']) > 0)
            <a href="{{route('category')}}" class="nav-item nav-link active"><i class="fa fa-tags me-2"></i>Category</a>
            <a href="{{route('product')}}" class="nav-item nav-link"><i class="fa fa-box-open me-2"></i>Products</a>
            <a href="{{route('order')}}" class="nav-item nav-link"><i class="fa fa-shopping-cart me-2"></i>Orders</a>
            <a href="{{route('sale')}}" class="nav-item nav-link"><i class="fa fa-chart-line me-2"></i>Sales</a>
            <a href="{{route('transaction')}}" class="nav-item nav-link"><i class="fa fa-exchange-alt me-2"></i>Transactions</a>
            @else
            <a href="{{route('my-order')}}" class="nav-item nav-link"><i class="fa fa-exchange-alt me-2"></i>My Orders</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="nav-item nav-link" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="fa fa-sign-out-alt me-2"></i> Logout</a>
            </form>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
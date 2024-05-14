<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
        <div class="nav-profile-image">
        <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="profile">
        <span class="login-status online"></span>
        <!--change to offline or busy as needed-->
        </div>
        
        <div class="nav-profile-text d-flex flex-column">
        @if (Auth::guard('web')->check())
        
        <span class="font-weight-bold mb-2">{{Auth::guard('web')->user()->name}}</span>
        <span class="text-secondary text-small">Project Manager</span>
        @endif
        </div>
        
        
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{route('offers')}}">
        <span class="menu-title">Offers</span>
        <i class="mdi mdi-home menu-icon"></i>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('items')}}">
        <span class="menu-title">Items</span>
        <i class="mdi mdi-home menu-icon"></i>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Setup</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('clients')}}">Clients</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('suppliers')}}">Suppliers</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('currencies')}}">Currencies</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('categories')}}">Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('products')}}">Products</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('shipments')}}">Shipments</a></li>
          </ul>
        </div>
      </li>
    
   
    
    {{-- <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
    <span class="menu-title">Setup</span>
    <i class="menu-arrow"></i>
    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
    </a>
    <div class="collapse" id="ui-basic">
    <ul class="nav flex-column sub-menu">
    
    <li class="nav-item"> <a class="nav-link" href="{{route('parameter')}}"></a></li>

    </ul>
    </div>
    </li> --}}
    
    
    </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
    <div class="content-wrapper">
    @yield("content")
    </div>
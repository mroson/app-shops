<!-- ...::: Header Section Start :::... -->
<header
        class="section-header site-header fixed top-0 z-30 w-full bg-colorTextTitle/80 py-2"
      >
        <!-- Section Container -->
        <div class="container">
          <!-- Header Area -->
          <div class="flex items-center justify-between">
            <!-- Header Left Block -->
            <div>
              <!-- Header Logo -->
<a href="{{ url('/') }}" class="h-auto w-auto">
  <img
    src="{{ asset('img/fullmojo-logo.png') }}"
    alt="logo"
    width="200"
    height="80"
  />
</a>
<!-- Header Logo -->
            </div>
            <!-- Header Left Block -->

            <!-- Header Navigation -->
            <div class="menu-block-wrapper">
              <div class="menu-overlay"></div>
              <nav class="menu-block" id="append-menu-header">
                <div class="mobile-menu-head">
                  <div class="go-back">
                    <i class="ri-arrow-left-s-fill"></i>
                  </div>
                  <div class="current-menu-title"></div>
                  <div class="mobile-menu-close">&times;</div>
                </div>
                <ul class="site-menu-main">
                  
                  <li class="nav-item nav-item-has-children">
                    <a class="nav-link-item text-white" href="{{ route('businesses.index') }}"
                      >Businesses <i class="ri-arrow-down-s-fill"></i></a>
                    <ul class="sub-menu shape-none" id="submenu-9">
                          <li class="sub-menu--item">
                            <a href="{{ route('businesses.create') }}">Create Businness</a>
                          </li>
                    </ul>      
                  </li>   
                  
                  <li class="nav-item nav-item-has-children">
                    <a class="nav-link-item text-white" href="{{ route('offers.index') }}"
                      >Offer <i class="ri-arrow-down-s-fill"></i></a>
                    <ul class="sub-menu shape-none" id="submenu-9">
                          <li class="sub-menu--item">
                            <a href="{{ route('offers.create') }}">Create Offer</a>
                          </li>
                    </ul>      
                  </li>   
                  
                </ul>
              </nav>
            </div>
            <!-- Header Navigation -->

            <!-- Header Right Block -->
            <div class="flex items-center gap-x-6">

            
              

              @if (Auth::check())
    <!-- Si el usuario está autenticado, muestra su nombre y logout -->
    <a href="{{ route('profile.profile') }}" class="btn btn-outline-whites relative hidden min-w-0 px-[30px] py-[10px] sm:inline-flex">
      <span>{{ Auth::user()->name }}</span>
      <span>{{ Auth::user()->name }}</span>  
    </a>
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-primary relative hidden min-w-0 px-[30px] py-[10px] sm:inline-flex">
        <span>Logout</span>
        <span>Logout</span> 
        </button>
    </form>
@else
    <!-- Si no está autenticado, muestra el botón de Sign In -->
    <a href="{{ route('login') }}" class="btn btn-primary relative hidden min-w-0 px-[30px] py-[10px] sm:inline-flex">
    <span>Sign In</span>
        <span>Sign In</span>   
    </a>
@endif


              <!-- Responsive Offcanvas Menu Button -->
              <div class="block lg:hidden">
                <button id="openBtn" class="hamburger-menu mobile-menu-trigger">
                  <span class="bg-white before:bg-white after:bg-white"></span>
                </button>
              </div>
            </div>
            <!-- Header Right Block -->
          </div>
          <!-- Header Area -->
        </div>
        <!-- Section Container -->
      </header>
      <!-- ...::: Header Section End :::... -->






<!DOCTYPE html>
<html lang="en">

<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
                                    <a title="logo" href="{{ route('home') }}" ><img src="{{asset('assets/images/download.png') }}">
                                    </a>
								</li>
							</ul>
                        </div>
                        <div class="wrap-search center-section">
                                <div class="wrap-search-form">
                                    <form action="#" id="form-search-top" name="form-search-top">
                                        <input type="text" name="search" value="" placeholder="Search here...">
                                        <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
						<div class="topbar-menu right-menu">
							<ul>
                                @if(Route::has('login'))
                                    @auth
                                        @if(Auth::user()->user_type === "ADMIN")
                                        <li class="menu-item menu-item-has-children parent" >
                                            <a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency" >
                                                <li class="menu-item" >
                                                    <a title="Dashboard" href="{{route('admin.dashbaord')}}">Dashboard</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                </li>
                                                <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                        @else
                                        <li class="menu-item menu-item-has-children parent" >
                                            <img class="w3-circle" src="{{ asset('assets/images/men.png') }}" alt="men">
                                            <a title="My Account" href="#">{{Auth::user()->name}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency" >
                                                {{-- <li class="menu-item" >
                                                    <a title="Dashboard" href="{{route('user.dashbaord')}}">Dashboard</a>
                                                </li> --}}
                                                <li class="menu-item" >
                                                    <a title="setting" href="{{route('profile.show')}}">Settings</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                </li>
                                                <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                        @endif
                                    @else
                                    <li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
                                    <li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
                                    @endif

                                @endif
							</ul>
						</div>
					</div>
				</div>

			

				
			</div>
		</div>
	</header>




	

</body>
</html>
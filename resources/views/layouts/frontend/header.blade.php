
<!DOCTYPE html>
<html lang="en">

<body class="home-page home-01 ">

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu right-menu">
							<ul>
                                @if(Route::has('login'))
                                    @auth
                                    @else
                                    <li class="menu-item" style="margin-left: 740px;" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
                                    <li class="menu-item" style="margin-left: 740px;"><a title="Register or Login" href="{{route('register')}}">Register</a></li>
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
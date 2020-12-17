<div class="header">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="header-contacts"> <span class="header-contacts__item"><i class="icon fa fa-phone"></i>+
                            987
                            654 3210</span> <a class="header-contacts__item" href="mailto:autoz@zone.com"><i
                                class="icon fa fa-envelope"></i>autoz (at) zone.com</a> </div>
                    <ul class="social-links list-inline">
                        <li><a class="icon fa fa-facebook" href="javascript:void(0);"></a></li>
                        <li><a class="icon fa fa-twitter" href="javascript:void(0);"></a></li>
                        <li><a class="icon fa fa-youtube-play" href="javascript:void(0);"></a></li>
                        <li><a class="icon fa fa-instagram" href="javascript:void(0);"></a></li>
                        <li><a class="icon fa fa-google-plus" href="javascript:void(0);"></a></li>
                    </ul>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end top-header -->

    <div class="header__inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12"> 
                    <a href="{{route('home')}}" class="logo"> 
                    @php
                        $settings=DB::table('settings')->get();
                    @endphp  
                    @foreach($settings as $data)    
                        <img
                            class="logo__img img-responsive" src="{{url('storage/settings/'.$data->logo)}}" height="50"
                            width="111" alt="Logo"> 
                    @endforeach
                    </a>
                    <div class="navbar yamm">
                        <div class="navbar-header hidden-md hidden-lg hidden-sm">
                            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1"
                                class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span
                                    class="icon-bar"></span></button>
                            <a href="javascript:void(0);" class="navbar-brand"></a> </div>
                        <div id="navbar-collapse-1" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="{{route('home')}}">HOME</a></li>
                                <li><a href="{{route('car-grids')}}">Liste des vehicules</a></li>
                                <li><a href="{{route('about-us')}}">A propos de nous</a> </li>
                                <li><a href="car-details.html">Contact</a></li>
                                <li class="dropdown"><a href="#"><i class="fa fa-user mr-2"></i> </a>
                                  <ul role="menu" class="dropdown-menu">
                                    @auth
                                    @if(Auth::user()->role=='admin')
                                    <li ><a href="{{route('admin')}}"
                                            target="_blank"><i class="fa fa-user mr-2"></i> Tableu de bord</a></li>
                                    @else
                                    <li > <a 
                                            href="{{route('user')}}"
                                            target="_blank"><i class="fa fa-user mr-2"></i> Tableu dee bord</a></li>
                                    @endif
                                    <li> <a href="{{route('user.logout')}}"> <i class="fa fa-power-off mr-2" ></i> se deconnecter</a>
                                    </li>
    
                                    @else
                                    <li > <a 
                                            href="{{route('login.form')}}"><i class="fa fa-user mr-2"></i> s'identifier</a>
                                    </li>
                                    <li > <a 
                                        href="{{route('login.form')}}"><i class="fa fa-user mr-2"></i> s'enregister</a>
                                    </li>
                                    @endauth
                                  </ul>
                              </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end header__inner -->
</div>

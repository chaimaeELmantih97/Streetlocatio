
<style>
::-webkit-scrollbar {
  width: 8px;
}

/* Track */
::-webkit-scrollbar-track {

}
 
/* Handle */
::-webkit-scrollbar-thumb {
 background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(253,65,45,0.8832575266434699) 100%);
 height:200px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: gray; 
 
}
</style>
@php
$settings=DB::table('settings')->get();
@endphp  

{{-- <div id="dark-overlay-1" class="modal-wrap">
    <div id="modal-view-1" class="cstm-modal cstm-large-modal">
      <span id="modal-close-1" onclick="closemodall()" class="modal-close">&times;</span>
      <div id="modal-content-generalized-1" style="width: 100%;height: 100%;" class="d-flex justify-content-center align-items-center"></div>
    </div>
</div>  --}}
<div class="header">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @foreach($settings as $data)    
                   
                    <div class="header-contacts"> <span class="header-contacts__item"><i class="icon fa fa-phone"></i>
                        {{$data->phone}}</span> <a class="header-contacts__item" href="mailto:autoz@zone.com"><i
                                class="icon fa fa-envelope"></i>{{$data->email}}</a> </div>
                    <ul class="social-links list-inline">
                        <li><a class="icon fa fa-facebook" href="javascript:void(0);"></a></li>
                        <li><a class="icon fa fa-twitter" href="javascript:void(0);"></a></li>
                        <li><a class="icon fa fa-youtube-play" href="javascript:void(0);"></a></li>
                        <li><a class="icon fa fa-instagram" href="javascript:void(0);"></a></li>
                        <li><a class="icon fa fa-google-plus" href="javascript:void(0);"></a></li>
                    </ul>
                    @endforeach
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
                                <li><a href="{{route('home')}}">Accueil </a></li>
                                <li><a href="{{route('car-grids')}}">Nos Gammes</a></li>
                                {{-- <li><a href="{{route('about-us')}}">A propos de nous</a> </li> --}}
                                <li><a href="{{route('contact-us')}}">Contact</a></li>
                                <li class="dropdown"><a href="#"><i class="fa fa-user mr-2"></i> </a>
                                  <ul role="menu" class="dropdown-menu">
                                    @auth
                                    @if(Auth::user()->role=='admin')
                                    <li ><a href="{{route('admin')}}"
                                            target="_blank"><i class="fa fa-user mr-2"></i> Tableau de bord</a></li>
                                    @else
                                    <li > <a 
                                            href="{{route('user')}}"
                                            target="_blank"><i class="fa fa-user mr-2"></i> Tableau de bord</a></li>
                                    @endif
                                    <li> <a href="{{route('user.logout')}}"> <i class="fa fa-power-off mr-2" ></i> se déconnecter</a>
                                    </li>
    
                                    @else
                                    <li > <a 
                                            href="{{route('login.form')}}"><i class="fa fa-user mr-2"></i> s'identifier</a>
                                    </li>
                                    <li > <a   href="{{route('register.form')}}" ><i class="fa fa-user mr-2"></i> s'enregister</a>
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

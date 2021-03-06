@extends('frontend.layouts.master')
@section('title','E-SHOP || HOME PAGE')
@section('main-content')

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="{{url('modal/modal.css')}}">


<div id="sliderpro1" class="slider-pro main-slider">
    <div class="sp-slides">
        @foreach($banners as $key=>$banner)
        <div class="sp-slide">
            <img class="sp-image" src="{{url('storage/banners/'.$banner->photo)}}"
                data-src="{{url('storage/banners/'.$banner->photo)}}"
                data-retina="{{url('storage/banners/'.$banner->photo)}}" alt="img" />

            <div class="item-wrap sp-layer  sp-padding" data-horizontal="100" data-vertical="300"
                data-show-transition="left" data-hide-transition="up" data-show-delay="400" data-hide-delay="200">
                <div class="main-slider__inner text-left col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="custom-caption">
                        <div class="custom-caption">
                            <div class="decor-1"></div>
                            <div class="main-slider__text">découvrez nos véhicules</div>
                            <div> <span class="main-slider__price">en savoir plus</span> <a class="main-slider__link"
                                    href="{{route('car-grids')}}"><i class="icon fa fa-caret-right"></i></a> </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        @endforeach

    </div>
</div>

<style>
    .ap-input-icon svg {
        fill: #DC2D13;
    }

</style>
<section class="form-section container">
    <div class="card card-1 ">
        <div class="card-body">
            <h2 class="title">TROUVEZ LA VOITURE IDÉALE</h2>
            <form method="POST" style="padding-top: 20px" action="{{route('AvailableCars')}}">
                @csrf
                <div class="row" style="height: 100%">
                    <div class="col-md-3 col-sm-3 col-xs-12" style="height: 100%;">
                        <div class="input-group" style="width: 100%;margin-top:20px;">
                            <input class="input--style-1" autocomplete="off" id="ville_input_1"
                                style="border-top: none;border-left: none;border-right: none;" type="text"
                                placeholder="Ville" name="ville">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="input-group " style="width:100%; height:100%;margin-top:20px;">
                            <input class="input--style-1  js-datepicker" autocomplete="off" id="js-datepicker"
                                type="text" placeholder="jj/mm/aaaa" name="from">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar" id="js-btn-calendar"></i>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="input-group " style="width:100%; height:100%;margin-top:20px;">
                            <input class="input--style-1  js-datepicker" autocomplete="off" id="js-datepicker2"
                                type="text" placeholder="jj/mm/aaaa" name="to">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar" id="js-btn-calendar2"></i>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="text-center" style="width:100%; height:100%;margin-top:20px;">
                            <button class="btn btn--radius btn--green"
                                style="border:0 0 2px 0;border-bottom: 2px solid #D42B12; height: 40px"
                                type="submit">Rechercher</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>


<!-- end main-slider -->
<section class="section_mod-a section-bg-2" style=" margin-top: 105px;">
    <div class="bg-inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="main-block text-center wow bounceInUp" data-wow-duration="2s">
                        <div class="main-block__label">BIENVENUE À</div>
                        <div class="decor-1 center-block"></div>
                        <h1 class="main-block__title" style="color:#A01010 ">StreetLocation</h1>
                        <div class="decor-2"><i class="icon fa fa-caret-down"></i></div>
                    </div>
                    <div class="wrap-link-img">
                        <ul class="link-img link-img_mod-a list-inline wow bounceInLeft" data-wow-duration="2s">
                            <li class="link-img__item"> <a class="link-img__link" href="javascript:void(0);"><img
                                        class="img-responsive" src="{{url('assets2/img/images .jpg')}}" height="250"
                                        width="170" alt="l'image de vehicule">
                                    <div class="link-img__wrap-title"><span class="link-img__title">toutes les
                                            marques</span></div>
                                </a> </li>
                            <li class="link-img__item"> <a class="link-img__link" href="javascript:void(0);"><img
                                        class="img-responsive" src="{{url('assets2/img/image 3.jpg')}}" height="250"
                                        width="170" alt="l'image de vehicule">
                                    <div class="link-img__wrap-title"><span class="link-img__title">SOUTIEN
                                            GRATUIT</span></div>
                                </a> </li>
                        </ul>
                        <ul class="link-img link-img_mod-b list-inline wow bounceInRight" data-wow-duration="2s">
                            <li class="link-img__item"> <a class="link-img__link" href="javascript:void(0);"><img
                                        class="img-responsive" src="{{url('assets2/img/image 1.jpg')}}" height="250"
                                        width="170" alt="l'image de vehicule">
                                    <div class="link-img__wrap-title"><span class="link-img__title">DEALERSHIP</span>
                                    </div>
                                </a> </li>
                            <li class="link-img__item"> <a class="link-img__link" href="javascript:void(0);"><img
                                        class="img-responsive" src="{{url('assets2/img/image 2.jpg')}}" height="250"
                                        width="170" alt="l'image de vehicule">
                                    <div class="link-img__wrap-title"><span class="link-img__title">AFFORABLE</span>
                                    </div>
                                </a> </li>
                        </ul>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-6 wow bounceInLeft" data-wow-duration="2s" data-wow-delay="1s">
                    
                    <p>Faites de vraies économies avec STREETLOCATION93 !
                        Louez votre voiture à prix avantageux & nous vous garantissons un large choix de voitures de location et véhicules utilitaires.
                        </p>
                    <p>Pour un confort et une expérience agréable, optez pour STREETLOCATION93 !</p>
                        <p>
                            <span>STREETLOCATION93</span>
                             vous offre un service de haute qualité et vous propose différentes gammes de voitures à louer sur Meknès en réponse à tous vos besoins.
                        </p>
                        <p>
                            <span>STREETLOCATION93</span> c’est le meilleur rapport qualité/prix. Plus besoin de se déplacer pour louer une voiture, c’est désormais en ligne.
                        </p>
                </div>
                <!-- end col -->
                <div class="col-sm-6 wow bounceInRight" data-wow-duration="2s" data-wow-delay="1s">
                    <h2 class="ui-title-inner">PRINCIPALES CARACTÉRISTIQUES</h2>
                    <div class="decor-1"></div>
                    <ul class="list-mark list-unstyled">
                        <li> <i class="decor-3 fa fa-caret-right"></i>Services optimisés. </li>
                        <li> <i class="decor-3 fa fa-caret-right"></i>Assistance 24h/24 et 7j/7.</li>
                        <li> <i class="decor-3 fa fa-caret-right"></i>Conseils et informations techniques . </li>
                        <li> <i class="decor-3 fa fa-caret-right"></i>Facturation claire et technique. </li>
                    </ul>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xs-12"> <a class="brand-link text-center wow bounceInUp" data-wow-duration="2s"
                        data-wow-delay="1s" href="{{route('car-grids')}}"><i class="icon fa fa-caret-right"></i>Découvrez nos véhicules<i class="icon fa fa-caret-left"></i><span class="br"></span>
                        <div class="decor-1 decor-1_mod-b"></div>
                    </a> </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
</section>
<!-- end section_mod-a -->

<div class="wrap-section-border wow bounceInUp" data-wow-duration="2s">
    <section class="section_mod-b section-bg section-bg_primary">
        <div class="bg-inner border-section-top border-section-top_mod-a">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="ui-title-block ui-title-block_mod-a text-center">pourquoi nous choisir </h2>
                        <div class="ui-subtitle-block_mod-a">nous offrons des services de véhicules 24 heures sur 24, 7 jours sur 7</div>
                        <div class="slider-services owl-carousel owl-theme owl-theme_mod-a enable-owl-carousel"
                            data-min480="2" data-min768="3" data-min992="4" data-min1200="4" data-pagination="true"
                            data-navigation="false" data-auto-play="4000" data-stop-on-hover="true">
                            <div class="list-services"> <i class="icon fa fa-bookmark"></i>
                                <div class="decor-1"></div>
                                <div class="list-services__inner">
                                    <h3 class="list-services__title">Réservation en ligne</h3>
                                    {{-- <div class="list-services__description">Wliquam sit amet urna sed vel nullam semper
                                        aibers
                                        vestibulum fringilla</div> --}}
                                </div>
                            </div>
                            <!-- end list-services -->
                            <div class="list-services"> <i class="icon fa fa-tachometer"></i>
                                <div class="decor-1"></div>
                                <div class="list-services__inner">
                                    <h3 class="list-services__title">Simplicité, rapidité<strong></strong></h3>
                                    {{-- <div class="list-services__description">Wliquam sit amet urna sed vel nullam semper
                                        aibers
                                        vestibulum fringilla</div> --}}
                                </div>
                            </div>
                            <!-- end list-services -->
                            <div class="list-services"> <i class="icon fa fa-check-circle"></i>
                                <div class="decor-1"></div>
                                <div class="list-services__inner">
                                    <h3 class="list-services__title">Qualité et expérience<strong></strong></h3>
                                    {{-- <div class="list-services__description">Wliquam sit amet urna sed vel nullam semper
                                        aibers
                                        vestibulum fringilla</div> --}}
                                </div>
                            </div>
                            <!-- end list-services -->
                            <div class="list-services"> <i class="icon fa fa-money"></i>
                                <div class="decor-1"></div>
                                <div class="list-services__inner">
                                    <h3 class="list-services__title">Meilleur prix <strong></strong></h3>
                                    {{-- <div class="list-services__description">Wliquam sit amet urna sed vel nullam semper
                                        aibers
                                        vestibulum fringilla</div> --}}
                                </div>
                            </div>
                            <!-- end list-services -->
                            <div class="list-services"> <i class="icon fa fa-tag"></i>
                                <div class="decor-1"></div>
                                <div class="list-services__inner">
                                    <h3 class="list-services__title">Diversité de choix<strong></strong></h3>
                                    {{-- <div class="list-services__description">Wliquam sit amet urna sed vel nullam semper
                                        aibers
                                        vestibulum fringilla</div> --}}
                                </div>
                            </div>
                            <!-- end list-services -->

                        </div>
                        <!-- end slider-services -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="border-section-bottom"></div>
            </div>
            <!-- end container -->
        </div>
        <!-- end bg-inner -->
    </section>
    <!-- end section_mod-b -->
</div>
<!-- end wrap-section-border -->

<section class="section_default wow bounceInUp" data-wow-duration="2s">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="ui-title-block">Ldernières offres</h2>
                <div class="ui-subtitle-block_mod-b">découvrez nos nouvelles offres.</div>
                <div class="slider-grid owl-carousel owl-theme owl-theme_mod-c enable-owl-carousel"
                    data-pagination="true" data-single-item="true" data-auto-play="7000" data-transition-style="fade"
                    data-main-text-animation="true" data-after-init-delay="3000" data-after-move-delay="1000"
                    data-stop-on-hover="true">
                    <div class="slider-grid__item">
                        <div class="row">

                            @foreach ($featured as $key=>$car)
                            @if($key==0)
                            <div class="col-md-5 col-sm-12">
                                <div class="slider-grid__inner slider-grid__inner_mod-a">
                                    <img class="img-responsive" src="{{url('storage/cars/'.$car->photo)}}"
                                        style="object-fit: cover" height="392" width="470" alt="l'image de vehicule"> <a
                                        class="slider-grid__btn btn btn-default btn-effect"
                                        href="javascript:void(0);"><span class="btn-inner">FEATURED</span></a>
                                    <div class="slider-grid__wrap-name">
                                        <span class="slider-grid__name">
                                            <a href="{{route('car-detail',$car->slug)}}"
                                                style="text-decoration: none; color:white">
                                                {{$car->title}}
                                            </a>
                                        </span>
                                        <span class="slider-grid__price">{{$car->prix_location}} MAD</span> </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            <div class="col-md-7">
                                <div class="row">
                                    @foreach ($featured as $key=>$car)
                                    @if($key==1 || $key==2)
                                    <div class="col-sm-6">
                                        <div class="slider-grid__inner slider-grid__inner_mod-b">
                                            <img class="img-responsiv<e" style="object-fit: cover"
                                                src="{{url('storage/cars/'.$car->photo)}}" height="181" width="320"
                                                alt="l'image de vehicule">
                                            <div class="slider-grid__wrap-name">
                                                <span class="slider-grid__name">
                                                    <a href="{{route('car-detail',$car->slug)}}"
                                                        style="text-decoration: none; color:white">
                                                        {{$car->title}}
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="slider-grid__hover"> <span
                                                    class="slider-grid__price">{{$car->prix_location}} MAD</span>
                                                <ul class="slider-grid__info list-unstyled">
                                                    <li><i class="icon icon-speedometer"></i>{{$car->boite_vitesses}}</li>
                                                    <li><i class="icon icon-paper-plane"></i>{{$car->annee_modele}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach ($featured as $key=>$car)
                                    @if($key==3 || $key==4)
                                    <div class="col-sm-6">
                                        <div class="slider-grid__inner slider-grid__inner_mod-b">
                                            <img class="img-responsive" style="object-fit: cover"
                                                src="{{url('storage/cars/'.$car->photo)}}" height="181" width="320"
                                                alt="l'image de vehicule">
                                            <div class="slider-grid__wrap-name">
                                                <span class="slider-grid__name">
                                                    <a href="{{route('car-detail',$car->slug)}}"
                                                        style="text-decoration: none; color:white">
                                                        {{$car->title}}
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="slider-grid__hover"> <span
                                                    class="slider-grid__price">{{$car->prix_location}} MAD</span>
                                                <ul class="slider-grid__info list-unstyled">
                                                    <li><i class="icon icon-speedometer"></i>{{$car->boite_vitesses}}</li>
                                                    <li><i class="icon icon-paper-plane"></i>{{$car->annee_modele}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end slider-services -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end section_default -->

<div class="wrap-section-border wow bounceInUp" data-wow-duration="2s">
    <section class="section_mod-c section-bg section-bg_second">
        <div class="bg-inner border-section-top border-section-top_mod-b">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="ui-title-block ui-title-block_mod-a text-center">Faits réels</h2>
                        <div class="ui-subtitle-block_mod-a">nous avons ici de superbes faits</div>
                        <script src="{{url('assets2/plugins/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js')}}">
                        </script>
                        <ul class="list-progress list-unstyled">
                            <li class="list-progress__item"> <i class="icon flaticon-transport391"></i>
                                <div class="list-progress__inner"> <span class="chart" data-percent="10"><span
                                            class="percent"></span>+</span> <span class="list-progress__name">PAYS ATTEINTS  </span>
                                </div>
                            </li>
                            <li class="list-progress__item"> <i class="icon flaticon-automobile8"></i>
                                <div class="list-progress__inner"> <span class="chart" data-percent="1000"><span
                                            class="percent"></span>+</span> <span class="list-progress__name">clients atteints</span>
                                </div>
                            </li>
                            <li class="list-progress__item"> <i class="icon flaticon-bus6"></i>
                                <div class="list-progress__inner"> <span class="chart" data-percent="352"><span
                                            class="percent"></span>+</span> <span class="list-progress__name">réservations effectuées </span>
                                </div>
                            </li>
                        </ul>
                        <!-- end list-progress -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="border-section-bottom"></div>
            </div>
            <!-- end container -->
        </div>
        <!-- end bg-inner -->
    </section>
    <!-- end section_mod-b -->
</div>
<!-- end wrap-section-border -->

<div class="section_default section_mod-e section-bg-2 wow bounceInRight" data-wow-duration="2s">
    <section class="section_mod-d">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="ui-title-block">À PROPOS DE NOUS</h2>
                    <div class="ui-subtitle-block_mod-b">
                        Leader marocain de la location de voitures !
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-md-5">
                    <h3 class="ui-title-inner"><i class="decor-3 fa fa-caret-right"></i>UN NOM DE CONFIANCE DANS LE MONDE DE L'AUTOMOBILE</h3>
                    <div class="decor-1 decor-1_mod-c"></div>
                    <div class="ui-description">
                        <p>Nous vous offre un service de haute qualité et vous propose différentes gammes de voitures à louer sur Meknès en réponse à tous vos besoins.                            
                        </p>
                    </div>
                    <p> STREETLOCATION c’est le meilleur rapport qualité/prix. Plus besoin de se déplacer pour louer une voiture, c’est désormais en ligne.
                    </p>
                    <a class="link" href="javascript:void(0);">Réservation en ligne</a>
                    <div class="decor-1"></div>
                    <a class="link" href="javascript:void(0);">Simplicité, rapidité</a>
                    <div class="decor-1"></div>
                    <a class="link" href="javascript:void(0);">Meilleur prix</a>
                    <div class="decor-1"></div>
                    <a class="link" href="javascript:void(0);">Diversité de choix</a>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end section_mod-d -->

    {{-- <section class="section_brands text-center wow bounceInUp" data-wow-duration="2s">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="decor-2"><i class="icon fa fa-caret-down"></i></div>
                    <h2 class="ui-title-inner ui-title-inner_mod-a">OUR BRANDS</h2>
                    <div class="decor-1 decor-1_mod-b"></div>
                    <ul class="list-brands list-inline">
                        <li class="list-brands__item">
                            <div class="list-brands__inner"><img class="list-brands__img img-responsive"
                                    src="{{url('assets2/media/brands/brand-8.jpg')}}" height="57" width="250"
                                    alt="Brand"></div>
                        </li>
                        <li class="list-brands__item">
                            <div class="list-brands__inner"><img class="list-brands__img img-responsive"
                                    src="{{url('assets2/media/brands/brand-4.jpg')}}" height="57" width="250"
                                    alt="Brand"></div>
                        </li>
                        <li class="list-brands__item">
                            <div class="list-brands__inner"><img class="list-brands__img img-responsive"
                                    src="{{url('assets2/media/brands/brand-7.jpg')}}" height="57" width="250"
                                    alt="Brand"></div>
                        </li>
                        <li class="list-brands__item">
                            <div class="list-brands__inner"><img class="list-brands__img img-responsive"
                                    src="{{url('assets2/media/brands/brand-1.jpg')}}" height="57" width="250"
                                    alt="Brand"></div>
                        </li>
                        <li class="list-brands__item">
                            <div class="list-brands__inner"><img class="list-brands__img img-responsive"
                                    src="{{url('assets2/media/brands/brand-5.jpg')}}" height="57" width="250"
                                    alt="Brand"></div>
                        </li>
                    </ul>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section> --}}
    <!-- end section-area -->
</div>
<!-- end section_default -->

<div class="wrap-section-border wow bounceInUp" data-wow-duration="2s">
    <section class="section_mod-e section-bg section-bg_second">
        <div class="bg-inner border-section-top border-section-top_mod-b">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="ui-title-block ui-title-block_mod-a text-center">Types de véhicules</h2>
                        <div class="ui-subtitle-block_mod-a">que nous traitons actuellement</div>
                        <ul class="list-type">
                            <li class="list-type__item"> 
                                <a class="list-type__link" data-cat="motorcycles" onclick="CatFilter('motorcycles')" href="javascript:void(0);">
                                    <div class="list-type__inner"> <i class="icon auto12"></i>
                                        <div class="decor-1 center-block"></div>
                                        <div class="list-type__name">moto</div>
                                        <div class="list-type__info">moto</div>
                                    </div>
                                </a> </li>
                            <li class="list-type__item"> <a class="list-type__link" onclick="CatFilter('voitures de luxe')" data-cat="voitures de luxe" href="javascript:void(0);">
                                    <div class="list-type__inner"> <i class="icon auto15"></i>
                                        <div class="decor-1 center-block"></div>
                                        <div class="list-type__name">VOITURES DE LUXE</div>
                                        <div class="list-type__info">VOITURES DE LUXE</div>
                                    </div>
                                </a> </li>
                            <li class="list-type__item"> <a class="list-type__link" onclick="CatFilter('voitures sportives')" data-cat="voitures sportives" href="javascript:void(0);">
                                    <div class="list-type__inner"> <i class="icon auto13"></i>
                                        <div class="decor-1 center-block"></div>
                                        <div class="list-type__name">SPORTS</div>
                                        <div class="list-type__info">SPORTS</div>
                                    </div>
                                </a> </li>
                            <li class="list-type__item"> <a class="list-type__link" onclick="CatFilter('voitures suvs')" data-cat="voitures suvs" href="javascript:void(0);">
                                    <div class="list-type__inner"> <i class="icon auto13"></i>
                                        <div class="decor-1 center-block"></div>
                                        <div class="list-type__name">SUVS</div>
                                        <div class="list-type__info">SUVS</div>
                                    </div>
                                </a> </li>
                            <li class="list-type__item"> <a class="list-type__link" onclick="CatFilter('camions')" data-cat="camions" href="javascript:void(0);">
                                    <div class="list-type__inner"> <i class="icon auto14"></i>
                                        <div class="decor-1 center-block"></div>
                                        <div class="list-type__name">camion</div>
                                        <div class="list-type__info">camion</div>
                                    </div>
                                </a> </li>
                            <li class="list-type__item"> <a class="list-type__link" onclick="CatFilter('camionnettes')"  data-cat="camionnettes" href="javascript:void(0);">
                                    <div class="list-type__inner"> <i class="icon auto16"></i>
                                        <div class="decor-1 center-block"></div>
                                        <div class="list-type__name">FOURGONNETTES</div>
                                        <div class="list-type__info">FOURGONNETTES </div>
                                    </div>
                                </a> </li>
                        </ul>
                        <form action="{{route('filterCategories2')}}"  method="GET" id="catform">
                        @csrf
                        <input type="hidden" name="cat" id="catName">
                        </form>
                        <script>
                            function CatFilter(cat){
                                document.getElementById("catName").value=cat;
                                document.getElementById("catform").submit();
                            }
                        </script>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="border-section-bottom"></div>
            </div>
            <!-- end container -->
        </div>
        <!-- end bg-inner -->
    </section>
    <!-- end section_mod-b -->
</div>
<!-- end wrap-section-border -->

<section class="section_mod-i wow bounceInRight" data-wow-duration="2s">
    {{-- <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="ui-title-block">NOTRE ÉQUIPE</h2>
                <ul class="list-staff list-unstyled">
                    <li class="list-staff__item clearfix">
                        <div class="list-staff__media"> <img class="img-responsive"
                                src="{{url('assets2/media/staff/1.jpg')}}" height="280" width="280"
                                alt="l'image de vehicule">
                            <ul class="list-staff__social list-inline">
                                <li><a class="icon fa fa-facebook" href="javascript:void(0);"></a></li>
                                <li><a class="icon fa fa-twitter" href="javascript:void(0);"></a></li>
                                <li><a class="icon fa fa-google-plus" href="javascript:void(0);"></a></li>
                            </ul>
                        </div>
                        <div class="list-staff__inner">
                            <div class="list-staff__info">
                                <div class="list-staff__wrap_name">
                                    <div class="list-staff__name">ALEX LEEMAN</div>
                                    <div class="list-staff__categories">OWNER & CEO</div>
                                </div>
                                <div class="decor-1"></div>
                                <div class="list-staff__description">
                                    <p>Integer tor bibendum estnu faucibus gravida aliquam nu lectus lacina</p>
                                </div>
                            </div>
                            <div class="staff-progress">
                                <div class="staff-progress__title"><i class="decor-3 fa fa-caret-right"></i>SKILL LEVEL
                                </div>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 45%"> <span class="sr-only">45%
                                            Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-staff__item clearfix">
                        <div class="list-staff__media"> <img class="img-responsive"
                                src="{{url('assets2/media/staff/3.jpg')}}" height="280" width="280"
                                alt="l'image de vehicule">
                            <ul class="list-staff__social list-inline">
                                <li><a class="icon fa fa-facebook" href="javascript:void(0);"></a></li>
                                <li><a class="icon fa fa-twitter" href="javascript:void(0);"></a></li>
                                <li><a class="icon fa fa-google-plus" href="javascript:void(0);"></a></li>
                            </ul>
                        </div>

                        <div class="list-staff__inner">
                            <div class="list-staff__info">
                                <div class="list-staff__wrap_name">
                                    <div class="list-staff__name">Diago johnson</div>
                                    <div class="list-staff__categories">Co-founder</div>
                                </div>
                                <div class="decor-1"></div>
                                <div class="list-staff__description">
                                    <p>Integer tor bibendum estnu faucibus gravida aliquam nu lectus lacina</p>
                                </div>
                            </div>
                            <div class="staff-progress">
                                <div class="staff-progress__title"><i class="decor-3 fa fa-caret-right"></i>SKILL LEVEL
                                </div>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 75%"> <span class="sr-only">45%
                                            Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-staff__item clearfix">
                        <div class="list-staff__media"> <img class="img-responsive"
                                src="{{url('assets2/media/staff/2.jpg')}}" height="280" width="280"
                                alt="l'image de vehicule">
                            <ul class="list-staff__social list-inline">
                                <li><a class="icon fa fa-facebook" href="javascript:void(0);"></a></li>
                                <li><a class="icon fa fa-twitter" href="javascript:void(0);"></a></li>
                                <li><a class="icon fa fa-google-plus" href="javascript:void(0);"></a></li>
                            </ul>
                        </div>

                        <div class="list-staff__inner">
                            <div class="list-staff__info">
                                <div class="list-staff__wrap_name">
                                    <div class="list-staff__name">william henry</div>
                                    <div class="list-staff__categories">marketing</div>
                                </div>
                                <div class="decor-1"></div>
                                <div class="list-staff__description">
                                    <p>Integer tor bibendum estnu faucibus gravida aliquam nu lectus lacina</p>
                                </div>
                            </div>
                            <div class="staff-progress">
                                <div class="staff-progress__title"><i class="decor-3 fa fa-caret-right"></i>SKILL LEVEL
                                </div>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 90%"> <span class="sr-only">45%
                                            Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-staff__item clearfix">
                        <div class="list-staff__media"> <img class="img-responsive"
                                src="{{url('assets2/media/staff/4.jpg')}}" height="280" width="280"
                                alt="l'image de vehicule">
                            <ul class="list-staff__social list-inline">
                                <li><a class="icon fa fa-facebook" href="javascript:void(0);"></a></li>
                                <li><a class="icon fa fa-twitter" href="javascript:void(0);"></a></li>
                                <li><a class="icon fa fa-google-plus" href="javascript:void(0);"></a></li>
                            </ul>
                        </div>

                        <div class="list-staff__inner">
                            <div class="list-staff__info">
                                <div class="list-staff__wrap_name">
                                    <div class="list-staff__name">kyle joseph</div>
                                    <div class="list-staff__categories">auto dealer</div>
                                </div>
                                <div class="decor-1"></div>
                                <div class="list-staff__description">
                                    <p>Integer tor bibendum estnu faucibus gravida aliquam nu lectus lacina</p>
                                </div>
                            </div>
                            <div class="staff-progress">
                                <div class="staff-progress__title"><i class="decor-3 fa fa-caret-right"></i>SKILL LEVEL
                                </div>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 40%"> <span class="sr-only">40%
                                            Complete</span> </div>
                                </div>
                            </div>
                        </div> 
                    </li> 
                </ul> 
            </div> 
        </div>
    </div> --}}
</section>

<div class="wrap-section-border wow bounceInUp" data-wow-duration="2s">
    <section class="section_mod-f section-bg section-bg_second">
        <div class="bg-inner border-section-top border-section-top_mod-b">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="ui-title-block ui-title-block_mod-a text-center">dernières galeries</h2>
                        <div class="ui-subtitle-block_mod-a">consultez les images et vidéos géniales</div>
                        <div class="slider-gallery owl-carousel owl-theme owl-theme_mod-a enable-owl-carousel"
                            data-min480="2" data-min768="3" data-min992="4" data-min1200="4" data-pagination="true"
                            data-navigation="false" data-stop-on-hover="true">
                            @php
                            $cars=App\Models\Car::all();
                            @endphp
                            @foreach ($cars as $car)
                            <div class="slider-gallery__item"> <a class="slider-gallery__link"
                                    href="{{url('storage/cars/'.$car->photo)}}" rel="prettyPhoto"> <img class=""
                                        src="{{url('storage/cars/'.$car->photo)}}" height="177" width="280"
                                        alt="l'image de vehicule">
                                    <div class="slider-gallery__hover"> <i class="icon icon-magnifier-add"></i>
                                        <div class="slider-gallery__title">{{$car->title}}</div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- end slider-gallery -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="border-section-bottom"></div>
            </div>
            <!-- end container -->
        </div>
        <!-- end bg-inner -->
    </section>
    <!-- end section_mod-b -->
</div>
<!-- end wrap-section-border -->

<section class="section_list-post wow bounceInLeft" data-wow-duration="2s">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="clearfix">
                    <div class="pull-left">
                        <h2 class="ui-title-block">Publications</h2>
                        <div class="ui-subtitle-block_mod-b">découvrez nos nouveautés et nos articles 
                        </div>
                    </div>
                    <a class="btn btn-success btn-effect pull-right" href="{{route('blog')}}"><span
                            class="btn-inner">voir tous les publications</span></a>
                </div>
                @if($posts)
                @foreach($posts as $post)
                <article class="post post_mod-a clearfix">
                    <div class="entry-media modal-open-v2" data-id="1" data-type="image" data-target="{{url('storage/posts/'.$post->photo)}}"> <a href="{{url('storage/posts/'.$post->photo)}}" rel="prettyPhoto"> 
                        <img
                                class="img-responsive" src="{{url('storage/posts/'.$post->photo)}}" width="470"
                                height="280" alt="l'image de vehicule" />
                            {{-- <div class="post-hover helper"><i class="icon icon-magnifier-add"></i></div> --}}
                        </a> </div>
                    <div class="entry-main entry-main_mod-a">
                        <div class="entry-main__inner entry-main__inner_mod-a">
                            <h3 class="entry-title"><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a>
                            </h3>
                            <div class="entry-meta"> <span class="entry-meta__item">By:: <a class="entry-meta__link"
                                        href="javascript:void(0);">{{$post->author_info['name']}}</a></span> <span
                                    class="entry-meta__item">COMMENTS ::
                                    <a class="entry-meta__link"
                                        href="javascript:void(0);">{{$post->allComments->count()}}</a></span> </div>
                        </div>
                        <div class="decor-1"></div>
                        <div class="entry-date"><span class="entry-date__inner"><span
                                    class="entry-date__number">{{$post->created_at->format('d')}}</span><br>
                                {{$post->created_at->format('M')}}</span></div>
                        <div class="entry-content">
                            <p>{!!$post->summary!!}</p>
                        </div>
                    </div>
                </article>
                @endforeach
                @endif
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end section_default -->

<!-- end wrap-section-border -->

<section class="section_map section-bg-2 wow bounceInUp" data-wow-duration="2s">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="ui-title-block">Contactez nous</h2>
                <div class="ui-subtitle-block_mod-b">envoyez-nous vos suggestions, questions ou idées </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    <div class="map">
        <!--<img class="img-responsive" src="{{url('assets2/img/map.jpg')}}" height="520" width="1600"-->
        <!--    alt="map">-->
            <iframe class="img-responsive"  style="width: 100vw;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52998.93727731773!2d-5.5807659725383125!3d33.87848565722895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9cfda525a68813d8!2sAssurances%20El%20Menzeh!5e0!3m2!1sfr!2sma!4v1608729895725!5m2!1sfr!2sma" height="520" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          
            </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-xs-12">
                <div class="decor-2"><i class="icon fa fa-caret-down"></i></div>
                <h2 class="ui-title-inner">n'hésitez pas à nous envoyer un message <br>
                  ou demandez un devis GRATUIT</h2>
                <div class="decor-1 center-block"></div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <form class="form-contact" method="post" action="{{route('contact.store')}}" id="contactForm"
                    novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control" type="text" required placeholder="Nom" required name="name">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" required name="phone" placeholder="Tel" required>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control" type="email" required name="email" placeholder="Email" required>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-control" type="text" required name="subject" placeholder="Sujet" required>
                        </div>
                        <!-- end col -->

                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <textarea class="form-control" name="message" placeholder="Message ....." required
                                rows="7" required></textarea>
                            <div class="btn">
                                <div class="wrap__btn-skew-r">
                                    <button class="btn-skew-r btn-effect " type="submit"><span
                                            class="btn-skew-r__inner">Envoyer Le messafe</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </form>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    <!--HOME SLIDER-->
    <script src="{{url('assets2/plugins/sliderpro/js/jquery.sliderPro.min.js')}}"></script>
    <script src="{{url('assets2/NV/datepicker/moment.min.js')}}"></script>
    <script src="{{url('assets2/NV/datepicker/daterangepicker.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

    <script type="text/javascript">
        //ALGOLIA PLACES API BEGIN
        const reconfigurableOptions = {
            // language: 'fr',  //Receives results in German
            countries: ['ma'], // Search in the United States of America and in the Russian Federation
            type: 'city', // Search only for cities names
            // aroundLatLngViaIP: false // disable the extra search/boost around the source IP
        };

        if (document.getElementById('ville_input_1')) {
            places({
                appId: 'plGRTB7YMDRN',
                apiKey: '367398e98504ee87362ce203506dbae1',
                container: document.querySelector('#ville_input_1'),
            }).configure(reconfigurableOptions);
        }

        //ALGOLIA PLACES API END

    </script>
    <script>
        (function ($) {
            'use strict';
            /*==================================================================
                [ Daterangepicker ]*/
            try {
                $('#js-datepicker').daterangepicker({
                    "singleDatePicker": true,
                    "showDropdowns": true,
                    "autoUpdateInput": false,
                    locale: {
                        format: 'DD/MM/YYYY'
                    },
                });
                $('#js-datepicker2').daterangepicker({
                    "singleDatePicker": true,
                    "showDropdowns": true,
                    "autoUpdateInput": false,
                    locale: {
                        format: 'DD/MM/YYYY'
                    },
                });


                var myCalendar = $('#js-datepicker');
                var isClick = 0;

                $(window).on('click', function () {
                    isClick = 0;
                });

                $(myCalendar).on('apply.daterangepicker', function (ev, picker) {
                    isClick = 0;
                    $(this).val(picker.startDate.format('DD/MM/YYYY'));

                });

                $('#js-btn-calendar').on('click', function (e) {
                    e.stopPropagation();

                    if (isClick === 1) isClick = 0;
                    else if (isClick === 0) isClick = 1;

                    if (isClick === 1) {
                        myCalendar.focus();
                    }
                });

                $(myCalendar).on('click', function (e) {
                    e.stopPropagation();
                    isClick = 1;
                });

                $('#daterangepicker').on('click', function (e) {
                    e.stopPropagation();
                });


                var myCalendar2 = $('#js-datepicker2');
                var isClick = 0;

                $(window).on('click', function () {
                    isClick = 0;
                });

                $(myCalendar2).on('apply.daterangepicker', function (ev, picker) {
                    isClick = 0;
                    $(this).val(picker.startDate.format('DD/MM/YYYY'));

                });

                $('#js-btn-calendar2').on('click', function (e) {
                    e.stopPropagation();

                    if (isClick === 1) isClick = 0;
                    else if (isClick === 0) isClick = 1;

                    if (isClick === 1) {
                        myCalendar2.focus();
                    }
                });

                $(myCalendar2).on('click', function (e) {
                    e.stopPropagation();
                    isClick = 1;
                });

                $('#daterangepicker2').on('click', function (e) {
                    e.stopPropagation();
                });


            } catch (er) {
                console.log(er);
            }


        })(jQuery);

    </script>
</section>
<!-- end section_default -->
<script src="{{url('modal/modall.js')}}"></script>
@endsection

@push('styles')
<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&Car=inline-share-buttons'
    async='async'></script>
<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&Car=inline-share-buttons'
    async='async'></script>
<style>
    /* Banner Sliding */
    #Gslider .carousel-inner {
        background: #000000;
        color: black;
    }

    #Gslider .carousel-inner {
        height: 550px;
    }

    #Gslider .carousel-inner img {
        width: 100% !important;
        opacity: .8;
    }

    #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
    }

    #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #F7941D;
    }

    #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
    }

    #Gslider .carousel-indicators {
        bottom: 70px;
    }

</style>
@endpush

@push('scripts')



@endpush

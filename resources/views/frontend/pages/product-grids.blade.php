@extends('frontend.layouts.master')

@section('title','E-SHOP || Car PAGE')

@section('main-content')
    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">

<!-- CSS Implementing Plugins -->
{{-- <link rel="stylesheet" href="{{url('travel/assets/vendor/font-awesome/css/fontawesome-all.min.css')}}"> --}}
<link rel="stylesheet" href="{{url('travel/assets/vendor/animate.css/animate.min.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/css/font-mytravel.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/vendor/hs-megamenu/src/hs.megamenu.css')}}">
<link rel="stylesheet"
    href="{{url('travel/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/vendor/fancybox/jquery.fancybox.css')}}">
<link rel="stylesheet" href="{{url('travel/documentation/assets/vendor/jquery-ui/themes/base/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{url('travel/documentation/assets/vendor/prism/prism.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/vendor/slick-carousel/slick/slick.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/vendor/flatpickr/dist/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/vendor/dzsparallaxer/dzsparallaxer.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/vendor/ion-rangeslider/css/ion.rangeSlider.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/vendor/custombox/dist/custombox.min.css')}}">
<link rel="stylesheet" href="{{url('travel/assets/vendor/animate.css')}}">
<!-- CSS MyTravel Template -->
<link rel="stylesheet" href="{{url('travel/assets/css/theme.css')}}">

<!-- Breadcrumbs -->
<div class="block-title">
    <div class="block-title__inner section-bg section-bg_second">
        <div class="bg-inner">
            <h1 class="ui-title-page">Liste des vehicules</h1>
            <div class="decor-1 center-block"></div>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">HOME</a></li>
                <li class="active">Liste des vehicules</li>
            </ol>
        </div><!-- end bg-inner -->
    </div><!-- end block-title__inner -->
</div>

<main id="content" role="main" class="pt-6 pt-xl-10">
    <div class="container">
        <div class="row mb-8">
            <div class="col-lg-4 col-xl-3 order-lg-1 width-md-50">
                <div class="navbar-expand-lg navbar-expand-lg-collapse-block">
                    <button class="btn d-lg-none mt-3 mb-4 p-0 collapsed" type="button" data-toggle="collapse"
                        data-target="#sidebar" aria-controls="sidebar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="far fa-caret-square-down text-primary font-size-20 card-btn-arrow ml-0"></i>
                        <span class="text-primary ml-2">Sidebar</span>
                    </button>
                    <div id="sidebar" class="collapse navbar-collapse">
                        <div class="mb-6 w-100">
                            <div class="pb-4 mb-2">
                                <div class="sidebar border rounded">
                                    <div class="p-4 m-1">
                                       
                                        <form method="POST" style="padding-top: 20px"  action="{{route('AvailableCars')}}" id="available">
                                            @csrf
                                             <!-- Input -->
                                        <span class="d-block text-gray-1  font-weight-normal mb-0 text-left">La ville</span>
                                        <div class="mb-4">
                                            <div class="input-group border-bottom border-width-2 border-color-1">
                                                <i
                                                    class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                                                <input type="text" name="ville"
                                                    class="form-control font-size-16 shadow-none hero-form font-weight-bold border-0 p-0"
                                                    placeholder="ville" autocomplete="off">
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <!-- Input -->
                                            <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Date de prise ..</span>
                                        <div class="mb-4">
                                            <div class="border-bottom border-width-2 border-color-1">
                                                <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="d-flex align-items-center mr-3 font-size-21">
                                                            <i
                                                                class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                        </span>
                                                    </div>
                                                    <input
                                                        class="js-range-datepicker font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0"
                                                        type="text" name="from" placeholder="jj/mm/aaaa" aria-label="jj/mm/aaaa"
                                                        data-rp-wrapper="#datepickerWrapperPick"
                                                        data-rp-date-format="d/m/Y" autocomplete="off">
                                                </div>
                                                <!-- End Datepicker -->
                                            </div>
                                        </div>
                                        <!-- End Input -->
                                        <!-- Input -->
                                        <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Date de Retour</span>
                                        <div class="mb-4 pb-1">
                                            <div class="border-bottom border-width-2 border-color-1">
                                                <div id="datepickerWrapperReturn" class="u-datepicker input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="d-flex align-items-center mr-3 font-size-21">
                                                            <i
                                                                class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                        </span>
                                                    </div>
                                                    <input
                                                        class="js-range-datepicker font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0"
                                                        type="text" name='to' placeholder="jj/mm/aaaa" aria-label="jj/mm/aaaa"
                                                         data-rp-wrapper="#datepickerWrapperReturn" data-rp-date-format="d/m/Y" autocomplete="off">
                                                </div>
                                                <!-- End Datepicker -->
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-3 mb-3">
                                                    <button type="button"  onclick="document.getElementById('available').submit()" class="btn btn-block bg-danger text-white" style="cursor:pointer;" > chercher vehicules disponibles </button>
                                                
                                            </div>
                                        
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Checkboxes -->
                            <div class="sidenav border rounded">
                                <!-- Accordiaon -->
                                <div id="shopCartAccordion" class="accordion rounded shadow-none">
                                    <div class="border-0">
                                        <div class="card-collapse" id="shopCardHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button"
                                                    class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed"
                                                    data-toggle="collapse" data-target="#shopCardOne"
                                                    aria-expanded="false" aria-controls="shopCardOne">
                                                    <span class="row align-items-center">
                                                        <span class="col-9">
                                                            <span
                                                                class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Intervalle de prix</span>
                                                        </span>
                                                        <span class="col-3 text-right">
                                                            <span class="card-btn-arrow">
                                                                <span class="fas fa-chevron-down small"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="shopCardOne" class="collapse show" aria-labelledby="shopCardHeadingOne"
                                            data-parent="#shopCartAccordion">
                                            <div class="card-body pt-0 px-5">
                                                <div class="pb-3 mb-1 d-flex text-lh-1">
                                                    
                                                    <span id="rangeSliderExample3MinResult" class=""></span>
                                                    <span>MAD</span>
                                                    <span class="mx-0dot5"> — </span>
                                                    <span id="rangeSliderExample3MaxResult" class="" ></span>
                                                    <span>MAD</span>
                                                </div>
                                                <input class="js-range-slider" type="text" name="price"
                                                    data-extra-classes="u-range-slider height-35" data-type="double"
                                                    data-grid="false" data-hide-from-to="true" data-min="0"
                                                    data-max="3456" data-from="200" data-to="3456" data-prefix="$"
                                                    data-result-min="#rangeSliderExample3MinResult"
                                                    data-result-max="#rangeSliderExample3MaxResult">
                                            </div>
                                              <div class="col-12 text-center mt-3 mb-3">
                                            <form action="{{route('shop.filter')}}" method="POST" id="filterf">
		                                        @csrf
                                                    <input type="hidden" name="price1" id="price1">
                                                    <input type="hidden" name="price2" id="price2">
                                                    <button type="button" class="btn btn-block bg-danger text-white" style="cursor:pointer;" onclick="priceRange()"> Filtrer par prix</button>
                                                
                                            </form>
                                            </div>
                                            <script>
                                                function priceRange(){
                                                    var p1=document.getElementById('rangeSliderExample3MinResult').innerHTML;
                                                    var p2=document.getElementById('rangeSliderExample3MaxResult').innerHTML;
                                                    document.getElementById('price1').value=p1;
                                                    document.getElementById('price2').value=p2;
                                                    document.getElementById('filterf').submit();
                                                }
                                            </script>
                                        
                                            
                                        </div>
                                    </div>
                                </div>
                                <div id="shopCategoryAccordion" class="accordion rounded-0 shadow-none border-top">
                                    <div class="border-0">
                                        <div class="card-collapse" id="shopCategoryHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button"
                                                    class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3">
                                                    <span class="row align-items-center">
                                                        <span class="col-9">
                                                            <span
                                                                class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Categories</span>
                                                        </span>
                                                        <span class="col-3 text-right">
                                                            <span class="card-btn-arrow">
                                                                <span class="fas fa-chevron-down small"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div> 
                                        <form action="{{route('filter')}}" method="POST" id="filterCat">
                                            @csrf
                                        <div id="shopCategoryOne"
                                            aria-labelledby="shopCategoryHeadingOne"
                                            data-parent="#shopCategoryAccordion">
                                            <div class="card-body pt-0 mt-1 px-5">
                                           
                                                <!-- Checkboxes -->
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="Luxe" value="voitures de luxe" class="custom-control-input"
                                                            id="brandAdidas">
                                                        <label class="custom-control-label text-color-1"
                                                            for="brandAdidas">voitures de luxe</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="motorcycles" value="motorcycles" class="custom-control-input"
                                                            id="brandNewBalance">
                                                        <label class="custom-control-label text-color-1"
                                                            for="brandNewBalance">motorcycles</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="voitures sportives" value="voitures sportives" class="custom-control-input"
                                                            id="brandNike">
                                                        <label class="custom-control-label text-color-1"
                                                            for="brandNike">voitures sportives</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="voitures suvs" value="voitures suvs" class="custom-control-input"
                                                            id="brandFredPerry">
                                                        <label class="custom-control-label text-color-1"
                                                            for="brandFredPerry">voitures suvs</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="camionnettes" value="camionnettes" class="custom-control-input"
                                                            id="brandGucci">
                                                        <label class="custom-control-label text-color-1"
                                                            for="brandGucci">camionnettes</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="camions" value="camions" class="custom-control-input"
                                                                id="brandMango">
                                                            <label class="custom-control-label text-color-1"
                                                                for="brandMango">camions</label>
                                                        </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    {{-- <div class="col-md-12 text-center mt-3 mb-3"> --}}
                                                        <button type="button" onclick="document.getElementById('filterCat').submit()" class="btn btn-block bg-danger text-white" style="cursor:pointer;" > Filtrer par Categorie</button>
                                                    {{-- </div> --}}
                                                </div>     
                                            </div>
                                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Accordion -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9 order-md-1 order-lg-2 pb-5 pb-lg-0">
                <!-- Shop-control-bar Title -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1">{{count($cars)}} véhicules</h3>
                    {{-- <ul class="nav tab-nav-shop" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-size-22 p-0 ml-2 active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    <i class="fa fa-th"></i>
                                </div>
                            </a>
                        </li>
                    </ul> --}}
                </div>
                <!-- End shop-control-bar Title -->

                <!-- Slick Tab carousel -->
                <div class="u-slick__tab">

                    <!-- Tab Content -->
                    <div class="tab-content " id="pills-tabContent">

                        {{-- <div class="tab-pane fade mb-5 mb-xl-0 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups"> --}}
                        <div class="row">
                            @foreach ($cars as $car)
                            <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                <div class="card transition-3d-hover shadow-hover-2">
                                    <div class="position-relative">
                                        <a href="{{route('car-detail',$car->slug)}}"
                                            class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" style="max-height:200px; min-height:200px; object-fit:cover;"
                                                src="{{url('storage/cars/'.$car->photo)}}">
                                        </a>
                                        <div class="position-absolute top-0 right-0 pt-5 pr-3">
                                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Save for later">
                                                <span class="flaticon-heart-1 font-size-20"></span>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-3 pb-2">
                                                <a href="{{route('car-detail',$car->slug)}}">
                                                    <span class="text-white font-weight-bold font-size-17">{{$car->title}}</span>
                                                </a>
                                                <div class="text-white my-2">
                                                    {{-- <span class="mr-1 font-size-14">From</span> --}}
                                                    <span class="font-weight-bold font-size-19">{{$car->prix_location}} MAD</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                        <a href="{{route('car-detail',$car->slug)}}">
                                            <span
                                                class="badge badge-pill bg-white text-primary px-3 py-2 font-size-14 font-weight-normal">Featured</span>
                                        </a>
                                    </div>
                                    <div class="card-body px-4 py-3 border-bottom">
                                        <a href="{{route('car-detail',$car->slug)}}" class="d-block">
                                            <div class="d-flex align-items-center font-size-14 text-gray-1">
                                                <i class="icon flaticon-browser-1 mr-2 font-size-20"></i> Modele: {{$car->modele}} / category: {{$car->categorie}}
                                            </div>
                                        </a>
                                        {{-- <div class="mt-1">
                                            <span
                                                class="py-1 font-size-14 border-radius-3 font-weight-normal pagination-v2-arrow-color">2.5/5
                                                Excellant</span>
                                            <span class="font-size-14 text-gray-1 ml-2">48 reviews</span>
                                        </div> --}}
                                    </div>
                                    <div class="px-4 pt-3 pb-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="media mb-2 text-gray-1 align-items-center">
                                                        <small class="mr-2">
                                                            <small class="flaticon-meter font-size-16"></small>
                                                        </small>
                                                        <div class="media-body font-size-1">
                                                            {{$car->boite_vitesses}}
                                                        </div>
                                                    </li>
                                                    <li class="media mb-2 text-gray-1 align-items-center">
                                                        <small class="mr-2">
                                                            <small
                                                                class="flaticon-user font-size-16"></small>
                                                        </small>
                                                        <div class="media-body font-size-1">
                                                            {{$car->passagers}}
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="media mb-2 text-gray-1 align-items-center">
                                                        <small class="mr-2">
                                                            <small class="flaticon-fuel font-size-16"></small>
                                                        </small>
                                                        <div class="media-body font-size-1">
                                                           {{$car->carburant}}
                                                        </div>
                                                    </li>
                                                    <li class="media mb-2 text-gray-1 align-items-center">
                                                        <small class="mr-2">
                                                            <small class="flaticon-event font-size-16"></small>
                                                        </small>
                                                        <div class="media-body font-size-1">
                                                            {{$car->annee_modele}}
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- <div class="text-center text-md-left font-size-14 mb-3 text-lh-1">Showing 1–15</div>
                        <nav aria-label="Page navigation">
                            {{ $cars->links() }}
                        
                        </nav> --}}
                    </div>
                    {{-- </div> --}}
                    <!-- End Tab Content -->
                </div>
                <!-- Slick Tab carousel -->
            </div>
        </div>
    </div>
</main>
<!-- JS Implementing Plugins -->
<script src="{{url('travel/assets/vendor/hs-megamenu/src/hs.megamenu.js')}}"></script>
<script src="{{url('travel/assets/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{url('travel/assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="{{url('travel/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{url('travel/assets/vendor/slick-carousel/slick/slick.js')}}"></script>
<script src="{{url('travel/assets/vendor/gmaps/gmaps.min.js')}}"></script>
<script src="{{url('travel/assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{url('travel/assets/vendor/custombox/dist/custombox.min.js')}}"></script>
<script src="{{url('travel/assets/vendor/custombox/dist/custombox.legacy.min.js')}}"></script>
<script src="{{url('travel/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}">
</script>

<!-- JS MyTravel -->
<script src="{{url('travel/assets/js/hs.core.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.header.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.unfold.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.validation.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.show-animation.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.range-datepicker.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.selectpicker.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.range-slider.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.go-to.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.slick-carousel.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.quantity-counter.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.g-map.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.modal-window.js')}}"></script>
<script src="{{url('travel/assets/js/components/hs.malihu-scrollbar.js')}}"></script>

<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function () {
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 1199.98,
            hideTimeOut: 0
        });

        // Page preloader
        setTimeout(function () {
            $('#jsPreloader').fadeOut(500)
        }, 800);
    });

    $(document).on('ready', function () {

        // initialization of datepicker
        $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

        // initialization of forms
        $.HSCore.components.HSRangeSlider.init('.js-range-slider');

        // initialization of select
        $.HSCore.components.HSSelectPicker.init('.js-select');

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of quantity counter
        $.HSCore.components.HSQantityCounter.init('.js-quantity');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
    });

</script>

@endsection
@push ('styles')

@endpush
@push('scripts')


@endpush

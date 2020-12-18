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
    <link rel="stylesheet" href="{{url('travel/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
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
            <h1 class="ui-title-page">Details de vehicule</h1>
            <div class="decor-1 center-block"></div>
            <ol class="breadcrumb">
                <li><a href="#">HOME</a></li>
                <li class="active">Details de vehicule</li>
            </ol>
        </div><!-- end bg-inner -->
    </div><!-- end block-title__inner -->
</div>

  <!-- ========== MAIN CONTENT ========== -->
        <main id="content" class="bg-gray space-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                         <div class="mb-5 shadow-soft bg-white rounded-sm">
                            <div class="py-6 px-5 border-bottom">
                                <div class="flex-horizontal-center">
                                    <div class="height-50 width-50 flex-shrink-0 flex-content-center bg-primary rounded-circle">
                                        <i class="flaticon-tick text-white font-size-24"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                                            Merci. Votre demande de réservation est terminée.
                                        </h3>
                                        <p class="mb-0">nous vous contacterons après la validation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4 pb-5 px-5 border-bottom">
                                <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-2">
                                    Information de client
                                </h5>
                                <!-- Fact List -->
                                <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Demande numero</span>
                                        <span class="text-secondary text-right">{{$numero}}</span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Prénom</span>
                                        <span class="text-secondary text-right">{{$prenom}}</span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Nom</span>
                                        <span class="text-secondary text-right">{{$nom}}</span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Email</span>
                                        <span class="text-secondary text-right">I{{$email}}</span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Ville</span>
                                        <span class="text-secondary text-right">{{$ville}}</span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Vehicule</span>
                                        <span class="text-secondary text-right">{{$car->title}}</span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Prix par jour</span>
                                        <span class="text-secondary text-right">{{$car->prix_location}} MAD</span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Total de Demande</span>
                                        <span class="text-secondary text-right">{{$total}} MAD</span>
                                    </li>
                                </ul>
                                <!-- End Fact List -->
                            </div>
                            <div class="pt-4 pb-5 px-5">
                                <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-3">
                                    View Booking Details
                                </h5>
                                <p class="">
                                    Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna,  posuere ut dictum quis.
                                </p>

                                <a href="#" class="text-underline text-primary">https://www.mytravel.com/booking-details/?=f4acb19f-9542-4a5c-b8ee</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="shadow-soft bg-white rounded-sm">
                            <div class="py-5 px-5 border-bottom">
                                <a href="#" class="d-block mb-3">
                                    <img class="img-fluid rounded-sm" src="{{url('storage/cars/'.$car->photo)}}"
                                        alt="Image-Description">
                                </a>
                                <a href="#" class="text-dark font-weight-bold mb-1">{{$car->title}}</a>
                                <div class="mb-1 flex-horizontal-center text-gray-1">
                                    <i class="icon flaticon-browser-1 mr-2 font-size-15"></i> Modele: {{$car->modele}} /
                                    category: {{$car->categorie}}
                                </div>
                            </div>
                            <!-- Basics Accordion -->
                            <div id="basicsAccordion">
                                <!-- Card -->
                                <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                                    <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button type="button"
                                                class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-20 font-weight-bold text-dark">
                                                Details de reseravtion
                                            </button>
                                        </h5>
                                    </div>
                                    <div>
                                        <div class="card-body px-4 pt-0">
                                            <!-- Fact List -->
                                            <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Modele</span>
                                                    <span class="text-secondary">{{$car->modele}}</span>
                                                </li>
        
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">categorie</span>
                                                    <span class="text-secondary">{{$car->categorie}}</span>
                                                </li>
        
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">nombre de porte</span>
                                                    <span class="text-secondary">{{$car->portes}}</span>
                                                </li>
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Passagers</span>
                                                    <span class="text-secondary">{{$car->passagers}}</span>
                                                </li>
        
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Vitesse</span>
                                                    <span class="text-secondary">{{$car->boite_vitesses}}</span>
                                                </li>
                                            </ul>
                                            <!-- End Fact List -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Card -->
        
        
        
        
        
                                <!-- Card -->
                                <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                                    <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingFour"
                                        style="margin-top: -30px;">
                                        <h5 class="mb-0">
                                            <button type="button"
                                                class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-20 font-weight-bold text-dark">
                                                paiement
                                            </button>
                                        </h5>
                                    </div>
                                    <div>
                                        <div class="card-body px-4 pt-0">
                                            <!-- Fact List -->
                                            <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Prix par jour</span>
                                                    <span class="text-secondary">{{$car->prix_location}} MAD</span>
                                                </li>
        
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Nombre de jours</span>
                                                    @php
                                                    $date1 = $from;
                                                    $date2 = $to;
                                                    $diff = strtotime($date2) - strtotime($date1);
                                                    $diff=round($diff / 86400);
                                                    $price=$diff*$car->prix_location
                                                    @endphp
        
                                                    <span class="text-secondary">{{$diff}}</span>
                                                </li>
        
                                                <li class="d-flex justify-content-between py-2 font-size-17 font-weight-bold">
                                                    <span class="font-weight-bold">Total</span>
                                                    <span class="">{{$price}} MAD</span>
                                                </li>
                                            </ul>
                                            <!-- End Fact List -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                            <!-- End Basics Accordion -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->
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
<script src="{{url('travel/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

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
        setTimeout(function() {
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

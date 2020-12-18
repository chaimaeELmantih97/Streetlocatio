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
            <h1 class="ui-title-page">Reservation</h1>
            <div class="decor-1 center-block"></div>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">HOME</a></li>
                <li class="active">Reservation Etape1</li>
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
                    <div class="py-3 px-4 px-xl-12 border-bottom">
                        <ul
                            class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div
                                    class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                    1
                                </div>
                                <div class="text-primary">Informations de client</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div
                                    class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    2
                                </div>
                                <div class="text-gray-1">Documents</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                <div
                                    class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    3
                                </div>
                                <div class="text-gray-1">confirmation de la réservation!</div>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                            Faites-nous savoir qui vous êtes
                        </h5>
                        <!-- Contacts Form -->
                        <form class="js-validate" method="POST" action="{{route('bookingStep2')}}">
                            @csrf
                            <div class="row">
                                @if (Auth::check())
                                <!-- Input -->
                                @php
                                $nomC=explode (' ' ,Auth::user()->name);
                                $nom=$nomC[0];
                                $prenom=$nomC[1];
                                @endphp
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Prénom
                                        </label>
                                        <input type="text" class="form-control" name="prenom" placeholder="prénom"
                                            aria-label="prenom" required data-msg="Please enter your first name."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            value="{{$nom}}">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Nom
                                        </label>

                                        <input type="text" class="form-control" name="nom" placeholder="Nom"
                                            aria-label="Nom" required data-msg="Please enter your last name."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            value="{{$prenom}}">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Email
                                        </label>

                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            aria-label="creativelayers088@gmail.com" required
                                            data-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <!-- End Input -->

                                @else
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Prénom
                                        </label>
                                        <input type="text" class="form-control" name="prenom" placeholder="prénom"
                                            aria-label="prenom" required data-msg="Please enter your first name."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            >
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Nom
                                        </label>

                                        <input type="text" class="form-control" name="nom" placeholder="Nom"
                                            aria-label="Nom" required data-msg="Please enter your last name."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Email
                                        </label>

                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            aria-label="creativelayers088@gmail.com" required
                                            data-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->


                                @endif
                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Tel
                                        </label>

                                        <input type="number" class="form-control" name="tel" placeholder="Tel"
                                            aria-label="+90 (254) 458 96 32" required
                                            data-msg="Please enter a valid phone number." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->
                                <div class="w-100"></div>
                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Ville
                                        </label>
                                        <input type="text" class="form-control" name="ville" id="ville_input_1"
                                            placeholder="ville" aria-label="creativelayers088@gmail.com" required
                                            data-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                </div>


                                <div class="col-sm-6 mb-4">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Exigences particulières
                                        </label>

                                        <div class="input-group">
                                            <textarea class="form-control" rows="4" name="text" placeholder=""
                                                aria-label="" required data-msg="Please enter a reason."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success"></textarea>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                </div>
                                @php
                                $date1 = $from;
                                $date2 = $to;
                                $diff = strtotime($date2) - strtotime($date1);
                                $diff=round($diff / 86400);
                                $price=$diff*$car->prix_location
                                @endphp

                                <input type="hidden" name="from" value={{$from}}>
                                <input type="hidden" name="to" value={{$to}}>
                                <input type="hidden" name="id" value={{$car->id}}>
                                <input type="hidden" name="total" value="{{$price}}">
                                <div class="w-100"></div>


                                <!-- End Input -->

                                <div class="col-md-12 float-left">
                                    <button type="submit"
                                        class="btn btn-wide  float-left rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3"
                                        style="background-color: #D42B12; color:white; border-bottom:2px solid rgb(77, 77, 77)"
                                        type="submit">page suivante <i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                        <!-- End Contacts Form -->
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
<style>
    .ap-input-icon {
        margin-top: -18px;
    }

</style>
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
@endsection
@push ('styles')

@endpush
@push('scripts')


@endpush

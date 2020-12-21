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
<link rel="stylesheet" href="{{url('assets2/pic-repeater/pic-repeater.css')}}">
<style>
    .file-upload {
        background-color: #ffffff;
        width: 100%;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #D42B12;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #D42B12;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #D42B12;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #D42B12;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #c0544341;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #D42B12;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }

</style>

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
                    <div class="py-3 px-4 px-xl-12 border-bottom">
                        <ul
                            class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div
                                    class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    1
                                </div>
                                <div class="text-gray-1">Informations du client</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div
                                    class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                    2
                                </div>
                                <div class="text-primary">Documents</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                <div
                                    class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    3
                                </div>
                                <div class="text-gray-1">confirmation de la réservation</div>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                            SVP enregister votre Carte d'Identité et Permis de Conduire
                        </h5>
                        <!-- Contacts Form -->
                        <form class="js-validate" method="POST" action="{{route('bookingStep3')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" class="form-control" name="prenom" value="{{$prenom}}">
                                <input type="hidden" class="form-control" name="nom" value="{{$nom}}">

                                <input type="hidden" class="form-control" name="email"  value="{{$email}}">
                                <input type="hidden" class="form-control" name="tel" value="{{$tel}}">
                                <input type="hidden" class="form-control" name="ville" value="{{$ville}}">
                                <textarea hidden>{{$text}}</textarea>
                                <input type="hidden" name="from" value={{$from}}>
                                <input type="hidden" name="to" value={{$to}}>
                                <input type="hidden" name="id" value={{$car->id}}>
                                <input type="hidden" name="total" value="{{$total}}">

                                {{-- <div  id="pic1" style="margin-top:20px;">
                                                
                                            </div>
                                            <div class="col-sm-6 align-self-end" id="pic2" style="margin-top:20px;">
                                                
                                            </div> --}}
                                <div class="col-sm-6 align-self-end text-center" style="margin-top:20px">
                                    <label for=""> CIN</label>
                                    <div class="file-upload" id="file-upload1">
                                        <button class="file-upload-btn" id="file-upload-btn1" type="button"
                                            onclick="$('#file-upload-input1').trigger( 'click' )">Ajouter une image</button>

                                        <div class="image-upload-wrap" id="image-upload-wrap1">
                                            <input class="file-upload-input" id="file-upload-input1" required type='file'
                                                name="cin" onchange="readURL1(this);" accept="image/*" />
                                            <div class="drag-text">
                                                <h3>Glisser-déposer un fichier ou sélectionner et Ajouter une image</h3>
                                            </div>
                                        </div>
                                        <div class="file-upload-content" id="file-upload-content1">
                                            <img class="file-upload-image" id="file-upload-image1" required src="#"
                                                alt="your image" />
                                            <div class="image-title-wrap" id="image-title-wrap1">
                                                <button type="button" onclick="removeUpload1()" class="remove-image"
                                                    id="remove-image1">Supprimer <span class="image-title"
                                                        id="image-title1">Image téléchargée</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 align-self-end text-center" style="margin-top:20px">
                                    <label for=""> Permit de Conduire</label>
                                    <div class="file-upload" id="file-upload2">
                                        <button class="file-upload-btn" id="file-upload-btn2" type="button"
                                            onclick="$('#file-upload-input2').trigger( 'click' )">Ajouter une Image</button>

                                        <div class="image-upload-wrap" id="image-upload-wrap2">
                                            <input class="file-upload-input" id="file-upload-input2" type='file'
                                                name="permis" onchange="readURL2(this);" accept="image/*" />
                                            <div class="drag-text">
                                                <h3>Glisser-déposer un fichier ou sélectionner et Ajouter une image</h3>
                                            </div>
                                        </div>
                                        <div class="file-upload-content" id="file-upload-content2">
                                            <img class="file-upload-image" id="file-upload-image2" src="#"
                                                alt="your image" />
                                            <div class="image-title-wrap" id="image-title-wrap2">
                                                <button type="button" onclick="removeUpload2()" class="remove-image"
                                                    id="remove-image2">Supprimer <span class="image-title"
                                                        id="image-title2">Image téléchargée</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <div class="row" style="margin-top:20px">
                                        <div class="col-md-6 ">
                                            <a href="javascript:history.back()"
                                                class="btn float-right bg-secondary  btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3" style="color:white; border-bottom:2px solid rgb(247, 56, 56)"><i class="fa fa-arrow-left mr-2"></i>page précédente</a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit"
                                                class="btn btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3" style="background-color: #D42B12; color:white; border-bottom:2px solid rgb(77, 77, 77)">page suivante <i class="fa fa-arrow-right"></i></button>
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
<script src="{{url('assets2/pic-repeater/pic-repeater.js')}}"></script>

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
<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-upload-wrap1').hide();

                $('#file-upload-image1').attr('src', e.target.result);
                $('#file-upload-content1').show();

                $('#image-title1').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload1();
        }
    }

    function removeUpload1() {
        $('#file-upload-input1').replaceWith($('.file-upload-input').clone());
        $('#file-upload-content1').hide();
        $('#image-upload-wrap1').show();
    }
    $('#image-upload-wrap1').bind('dragover', function () {
        $('#image-upload-wrap1').addClass('image-dropping');
    });
    $('#image-upload-wrap1').bind('dragleave', function () {
        $('#image-upload-wrap1').removeClass('image-dropping');
    });

    function readURL2(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-upload-wrap2').hide();

                $('#file-upload-image2').attr('src', e.target.result);
                $('#file-upload-content2').show();

                $('#image-title2').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload2();
        }
    }

    function removeUpload2() {
        $('#file-upload-input2').replaceWith($('.file-upload-input').clone());
        $('#file-upload-content2').hide();
        $('#image-upload-wrap2').show();
    }
    $('#image-upload-wrap2').bind('dragover', function () {
        $('#image-upload-wrap2').addClass('image-dropping');
    });
    $('#image-upload-wrap2').bind('dragleave', function () {
        $('#image-upload-wrap2').removeClass('image-dropping');
    });

</script>

@endsection
@push ('styles')

@endpush
@push('scripts')


@endpush

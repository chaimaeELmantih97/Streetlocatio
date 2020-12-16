@extends('frontend.layouts.master')

@section('title','E-SHOP || Car PAGE')

@section('main-content')
    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">

<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="{{url('travel/assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
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
            <h1 class="ui-title-page">vehicules disponible</h1>
            <div class="decor-1 center-block"></div>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">HOME</a></li>
                <li class="active">Details de vehicule</li>
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
                                        <!-- Input -->
                                        <span class="d-block text-gray-1  font-weight-normal mb-0 text-left">Pick-up
                                            From</span>
                                        <div class="mb-4">
                                            <div class="input-group border-bottom border-width-2 border-color-1">
                                                <i
                                                    class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                                                <input type="text"
                                                    class="form-control font-size-16 shadow-none hero-form font-weight-bold border-0 p-0"
                                                    value="{{$ville}}">
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <!-- Input -->
                                        <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Pick Up
                                            Date</span>
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
                                                        type="text" placeholder="{{$from}}" aria-label="{{$from}}"
                                                        data-rp-wrapper="#datepickerWrapperPick"
                                                        data-rp-date-format="M d /Y">
                                                </div>
                                                <!-- End Datepicker -->
                                            </div>
                                        </div>
                                        <!-- End Input -->
                                        <!-- Input -->
                                        <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Return
                                            Time</span>
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
                                                        type="text" placeholder="{{$to}}" aria-label="{{$to}}
                                                         data-rp-wrapper=" #datepickerWrapperReturn"
                                                        data-rp-date-format="M d /Y">
                                                </div>
                                                <!-- End Datepicker -->
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        {{-- <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-primary height-60 w-100 font-weight-bold mb-xl-0 mb-lg-1 transition-3d-hover"><i
                                                    class="flaticon-magnifying-glass mr-2"></i>Search</button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <a href="#ontargetModal" class="d-block border rounded"
                                    data-modal-target="#ontargetModal" data-modal-effect="fadein">
                                    <img src="{{url('travel/assets/img/map-markers/map.jpg')}}" alt="" width="100%">
                                </a>
                                <!-- On Target Modal -->
                                <div id="ontargetModal"
                                    class="js-modal-window u-modal-window max-height-100vh width-100vw overflow-hidden"
                                    data-modal-type="ontarget" data-open-effect="zoomIn" data-close-effect="zoomOut"
                                    data-speed="500">
                                    <div class="bg-white">
                                        <div class="border-bottom py-xl-2">
                                            <div class="row d-block d-md-flex flex-horizontal-center mx-0">
                                                <div class="col-xl">
                                                    <!-- Nav Links -->
                                                    <ul class="row nav align-items-center py-xl-1 px-0 mb-3 mb-xl-0 border-bottom border-xl-bottom-0"
                                                        role="tablist">
                                                        <li
                                                            class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1">
                                                            <select
                                                                class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                <option value="one" selected>City</option>
                                                                <option value="two">Two</option>
                                                                <option value="three">Three</option>
                                                                <option value="four">Four</option>
                                                            </select>
                                                        </li>
                                                        <li
                                                            class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                            <select
                                                                class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                <option value="one" selected>Price</option>
                                                                <option value="two">Two</option>
                                                                <option value="three">Three</option>
                                                                <option value="four">Four</option>
                                                            </select>
                                                        </li>
                                                        <li
                                                            class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                            <select
                                                                class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                <option value="one" selected>Stars</option>
                                                                <option value="two">Two</option>
                                                                <option value="three">Three</option>
                                                                <option value="four">Four</option>
                                                            </select>
                                                        </li>
                                                        <li
                                                            class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                            <select
                                                                class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                <option value="one" selected>Guest Rating</option>
                                                                <option value="two">Two</option>
                                                                <option value="three">Three</option>
                                                                <option value="four">Four</option>
                                                            </select>
                                                        </li>
                                                        <li
                                                            class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                            <select
                                                                class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                <option value="one" selected>Meals</option>
                                                                <option value="two">Two</option>
                                                                <option value="three">Three</option>
                                                                <option value="four">Four</option>
                                                            </select>
                                                        </li>
                                                        <li
                                                            class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                            <select
                                                                class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                <option value="one" selected>Facilities</option>
                                                                <option value="two">Two</option>
                                                                <option value="three">Three</option>
                                                                <option value="four">Four</option>
                                                            </select>
                                                        </li>
                                                        <li
                                                            class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                            <select
                                                                class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                <option value="one" selected>Property Type</option>
                                                                <option value="two">Two</option>
                                                                <option value="three">Three</option>
                                                                <option value="four">Four</option>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                    <!-- End Nav Links -->
                                                </div>
                                                <div class="col-xl-auto">
                                                    <div class="d-flex justify-content-center justify-content-xl-start">
                                                        <button type="button"
                                                            class="btn btn-wide btn-blue-1 font-weight-normal font-size-14 rounded-xs mb-3 mb-xl-0"
                                                            aria-label="Close" onclick="Custombox.modal.close();">
                                                            <span aria-hidden="true">Back to hotel list</span>
                                                            <i class="fas fa-times font-size-15 ml-3"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="height-100vh-72">
                                            <div class="row no-gutters">
                                                <div class="col-lg-5 col-xl-4 col-wd-3gdot5 order-1 order-lg-0">
                                                    <div class="pt-4 px-4 px-xl-5">
                                                        <div class="mb-4">
                                                            <div class="mb-2 text-gray-1">
                                                                50 of 3771 hotels shown
                                                            </div>
                                                            <select
                                                                class="form-control js-select selectpicker dropdown-select"
                                                                required="" data-msg="Please select option."
                                                                data-error-class="u-has-error"
                                                                data-success-class="u-has-success"
                                                                data-style="form-control font-size-14 border-width-2 border-gray font-weight-normal">
                                                                <option value="One" selected>Recommended</option>
                                                                <option value="Two">Low to High</option>
                                                                <option value="Three">High to Low</option>
                                                                <option value="Four">Popular</option>
                                                            </select>
                                                        </div>
                                                        <div class="js-scrollbar height-100vh-72">
                                                            <ul class="d-block list-unstyled">
                                                                <li class="card mb-4 overflow-hidden">
                                                                    <div class="product-item__outer w-100">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="product-item__header">
                                                                                    <div class="position-relative">
                                                                                        <a href="#"
                                                                                            class="d-block gradient-overlay-half-bg-gradient-v5"><img
                                                                                                class="img-fluid min-height-150 card-img-top"
                                                                                                src="{{url('travel/assets/img/300x230/img58.jpg')}}"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute top-0 left-0 pt-3 pl-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-icon text-white rounded-circle"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title=""
                                                                                            data-original-title="Save for later">
                                                                                            <span
                                                                                                class="flaticon-valentine-heart"></span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 left-0 right-0">
                                                                                        <div class="px-4 pb-3">
                                                                                            <a href="#" class="d-block">
                                                                                                <div
                                                                                                    class="d-flex align-items-center font-size-14 text-white">
                                                                                                    <i
                                                                                                        class="icon flaticon-pin-1 mr-2 font-size-20"></i>
                                                                                                    Greater London
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 flex-horizontal-center">
                                                                                <div
                                                                                    class="w-100 position-relative m-4 m-md-0">
                                                                                    <div class="mb-1 pb-1">
                                                                                        <span
                                                                                            class="green-lighter ml-2">
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                        </span>
                                                                                    </div>
                                                                                    <a href="#">
                                                                                        <span
                                                                                            class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire
                                                                                            Prestige Causeway Bay
                                                                                        </span>
                                                                                    </a>
                                                                                    <div class="card-body p-0">
                                                                                        <div class="my-2">
                                                                                            <span
                                                                                                class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1 ml-2">(166
                                                                                                reviews)</span>
                                                                                        </div>
                                                                                        <div class="mb-0">
                                                                                            <span
                                                                                                class="mr-1 font-size-14 text-gray-1">From</span>
                                                                                            <span
                                                                                                class="font-weight-bold">£350.00</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1">
                                                                                                / night</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="card mb-4 overflow-hidden">
                                                                    <div class="product-item__outer w-100">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="product-item__header">
                                                                                    <div class="position-relative">
                                                                                        <a href="#"
                                                                                            class="d-block gradient-overlay-half-bg-gradient-v5">
                                                                                            <img class="img-fluid min-height-150 card-img-top"
                                                                                                src="{{url('travel/assets/img/300x230/img59.jpg')}}"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute top-0 left-0 pt-3 pl-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-icon text-white rounded-circle"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title=""
                                                                                            data-original-title="Save for later">
                                                                                            <span
                                                                                                class="flaticon-valentine-heart"></span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 left-0 right-0">
                                                                                        <div class="px-4 pb-3">
                                                                                            <a href="#" class="d-block">
                                                                                                <div
                                                                                                    class="d-flex align-items-center font-size-14 text-white">
                                                                                                    <i
                                                                                                        class="icon flaticon-pin-1 mr-2 font-size-20"></i>
                                                                                                    Greater London
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 flex-horizontal-center">
                                                                                <div
                                                                                    class="w-100 position-relative m-4 m-md-0">
                                                                                    <div class="mb-1 pb-1">
                                                                                        <span
                                                                                            class="green-lighter ml-2">
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                        </span>
                                                                                    </div>
                                                                                    <a href="#">
                                                                                        <span
                                                                                            class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire
                                                                                            Prestige Causeway Bay
                                                                                        </span>
                                                                                    </a>
                                                                                    <div class="card-body p-0">
                                                                                        <div class="my-2">
                                                                                            <span
                                                                                                class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1 ml-2">(166
                                                                                                reviews)</span>
                                                                                        </div>
                                                                                        <div class="mb-0">
                                                                                            <span
                                                                                                class="mr-1 font-size-14 text-gray-1">From</span>
                                                                                            <span
                                                                                                class="font-weight-bold">£350.00</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1">
                                                                                                / night</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="card mb-4 overflow-hidden">
                                                                    <div class="product-item__outer w-100">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="product-item__header">
                                                                                    <div class="position-relative">
                                                                                        <a href="#"
                                                                                            class="d-block gradient-overlay-half-bg-gradient-v5"><img
                                                                                                class="img-fluid min-height-150 card-img-top"
                                                                                                src="{{url('travel/assets/img/300x230/img60.jpg')}}"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute top-0 left-0 pt-3 pl-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-icon text-white rounded-circle"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title=""
                                                                                            data-original-title="Save for later">
                                                                                            <span
                                                                                                class="flaticon-valentine-heart"></span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 left-0 right-0">
                                                                                        <div class="px-4 pb-3">
                                                                                            <a href="#" class="d-block">
                                                                                                <div
                                                                                                    class="d-flex align-items-center font-size-14 text-white">
                                                                                                    <i
                                                                                                        class="icon flaticon-pin-1 mr-2 font-size-20"></i>
                                                                                                    Greater London
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 flex-horizontal-center">
                                                                                <div
                                                                                    class="w-100 position-relative m-4 m-md-0">
                                                                                    <div class="mb-1 pb-1">
                                                                                        <span
                                                                                            class="green-lighter ml-2">
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                        </span>
                                                                                    </div>
                                                                                    <a href="#">
                                                                                        <span
                                                                                            class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire
                                                                                            Prestige Causeway Bay
                                                                                        </span>
                                                                                    </a>
                                                                                    <div class="card-body p-0">
                                                                                        <div class="my-2">
                                                                                            <span
                                                                                                class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1 ml-2">(166
                                                                                                reviews)</span>
                                                                                        </div>
                                                                                        <div class="mb-0">
                                                                                            <span
                                                                                                class="mr-1 font-size-14 text-gray-1">From</span>
                                                                                            <span
                                                                                                class="font-weight-bold">£350.00</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1">
                                                                                                / night</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="card mb-4 overflow-hidden">
                                                                    <div class="product-item__outer w-100">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="product-item__header">
                                                                                    <div class="position-relative">
                                                                                        <a href="#"
                                                                                            class="d-block gradient-overlay-half-bg-gradient-v5"><img
                                                                                                class="img-fluid min-height-150 card-img-top"
                                                                                                src="{{url('travel/assets/img/300x230/img3.jpg')}}"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute top-0 left-0 pt-3 pl-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-icon text-white rounded-circle"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title=""
                                                                                            data-original-title="Save for later">
                                                                                            <span
                                                                                                class="flaticon-valentine-heart"></span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 left-0 right-0">
                                                                                        <div class="px-4 pb-3">
                                                                                            <a href="#" class="d-block">
                                                                                                <div
                                                                                                    class="d-flex align-items-center font-size-14 text-white">
                                                                                                    <i
                                                                                                        class="icon flaticon-pin-1 mr-2 font-size-20"></i>
                                                                                                    Greater London
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 flex-horizontal-center">
                                                                                <div
                                                                                    class="w-100 position-relative m-4 m-md-0">
                                                                                    <div class="mb-1 pb-1">
                                                                                        <span
                                                                                            class="green-lighter ml-2">
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                        </span>
                                                                                    </div>
                                                                                    <a href="#">
                                                                                        <span
                                                                                            class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire
                                                                                            Prestige Causeway Bay
                                                                                        </span>
                                                                                    </a>
                                                                                    <div class="card-body p-0">
                                                                                        <div class="my-2">
                                                                                            <span
                                                                                                class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1 ml-2">(166
                                                                                                reviews)</span>
                                                                                        </div>
                                                                                        <div class="mb-0">
                                                                                            <span
                                                                                                class="mr-1 font-size-14 text-gray-1">From</span>
                                                                                            <span
                                                                                                class="font-weight-bold">£350.00</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1">
                                                                                                / night</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="card mb-4 overflow-hidden">
                                                                    <div class="product-item__outer w-100">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="product-item__header">
                                                                                    <div class="position-relative">
                                                                                        <a href="#"
                                                                                            class="d-block gradient-overlay-half-bg-gradient-v5"><img
                                                                                                class="img-fluid min-height-150 card-img-top"
                                                                                                src="{{url('travel/assets/img/300x230/img61.jpg')}}"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute top-0 left-0 pt-3 pl-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-icon text-white rounded-circle"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title=""
                                                                                            data-original-title="Save for later">
                                                                                            <span
                                                                                                class="flaticon-valentine-heart"></span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 left-0 right-0">
                                                                                        <div class="px-4 pb-3">
                                                                                            <a href="#" class="d-block">
                                                                                                <div
                                                                                                    class="d-flex align-items-center font-size-14 text-white">
                                                                                                    <i
                                                                                                        class="icon flaticon-pin-1 mr-2 font-size-20"></i>
                                                                                                    Greater London
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 flex-horizontal-center">
                                                                                <div
                                                                                    class="w-100 position-relative m-4 m-md-0">
                                                                                    <div class="mb-1 pb-1">
                                                                                        <span
                                                                                            class="green-lighter ml-2">
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                        </span>
                                                                                    </div>
                                                                                    <a href="#">
                                                                                        <span
                                                                                            class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire
                                                                                            Prestige Causeway Bay
                                                                                        </span>
                                                                                    </a>
                                                                                    <div class="card-body p-0">
                                                                                        <div class="my-2">
                                                                                            <span
                                                                                                class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1 ml-2">(166
                                                                                                reviews)</span>
                                                                                        </div>
                                                                                        <div class="mb-0">
                                                                                            <span
                                                                                                class="mr-1 font-size-14 text-gray-1">From</span>
                                                                                            <span
                                                                                                class="font-weight-bold">£350.00</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1">
                                                                                                / night</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="card mb-4 overflow-hidden">
                                                                    <div class="product-item__outer w-100">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="product-item__header">
                                                                                    <div class="position-relative">
                                                                                        <a href="#"
                                                                                            class="d-block gradient-overlay-half-bg-gradient-v5"><img
                                                                                                class="img-fluid min-height-150 card-img-top"
                                                                                                src="{{url('travel/assets/img/300x230/img62.jpg')}}"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute top-0 left-0 pt-3 pl-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-icon text-white rounded-circle"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title=""
                                                                                            data-original-title="Save for later">
                                                                                            <span
                                                                                                class="flaticon-valentine-heart"></span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 left-0 right-0">
                                                                                        <div class="px-4 pb-3">
                                                                                            <a href="#" class="d-block">
                                                                                                <div
                                                                                                    class="d-flex align-items-center font-size-14 text-white">
                                                                                                    <i
                                                                                                        class="icon flaticon-pin-1 mr-2 font-size-20"></i>
                                                                                                    Greater London
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 flex-horizontal-center">
                                                                                <div
                                                                                    class="w-100 position-relative m-4 m-md-0">
                                                                                    <div class="mb-1 pb-1">
                                                                                        <span
                                                                                            class="green-lighter ml-2">
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                        </span>
                                                                                    </div>
                                                                                    <a href="#">
                                                                                        <span
                                                                                            class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire
                                                                                            Prestige Causeway Bay
                                                                                        </span>
                                                                                    </a>
                                                                                    <div class="card-body p-0">
                                                                                        <div class="my-2">
                                                                                            <span
                                                                                                class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1 ml-2">(166
                                                                                                reviews)</span>
                                                                                        </div>
                                                                                        <div class="mb-0">
                                                                                            <span
                                                                                                class="mr-1 font-size-14 text-gray-1">From</span>
                                                                                            <span
                                                                                                class="font-weight-bold">£350.00</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1">
                                                                                                / night</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="card mb-4 overflow-hidden">
                                                                    <div class="product-item__outer w-100">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="product-item__header">
                                                                                    <div class="position-relative">
                                                                                        <a href="#"
                                                                                            class="d-block gradient-overlay-half-bg-gradient-v5"><img
                                                                                                class="img-fluid min-height-150 card-img-top"
                                                                                                src="{{url('travel/assets/img/300x230/img63.jpg')}}"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute top-0 left-0 pt-3 pl-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-icon text-white rounded-circle"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title=""
                                                                                            data-original-title="Save for later">
                                                                                            <span
                                                                                                class="flaticon-valentine-heart"></span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 left-0 right-0">
                                                                                        <div class="px-4 pb-3">
                                                                                            <a href="#" class="d-block">
                                                                                                <div
                                                                                                    class="d-flex align-items-center font-size-14 text-white">
                                                                                                    <i
                                                                                                        class="icon flaticon-pin-1 mr-2 font-size-20"></i>
                                                                                                    Greater London
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 flex-horizontal-center">
                                                                                <div
                                                                                    class="w-100 position-relative m-4 m-md-0">
                                                                                    <div class="mb-1 pb-1">
                                                                                        <span
                                                                                            class="green-lighter ml-2">
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                        </span>
                                                                                    </div>
                                                                                    <a href="#">
                                                                                        <span
                                                                                            class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire
                                                                                            Prestige Causeway Bay
                                                                                        </span>
                                                                                    </a>
                                                                                    <div class="card-body p-0">
                                                                                        <div class="my-2">
                                                                                            <span
                                                                                                class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1 ml-2">(166
                                                                                                reviews)</span>
                                                                                        </div>
                                                                                        <div class="mb-0">
                                                                                            <span
                                                                                                class="mr-1 font-size-14 text-gray-1">From</span>
                                                                                            <span
                                                                                                class="font-weight-bold">£350.00</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1">
                                                                                                / night</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="card mb-4 overflow-hidden">
                                                                    <div class="product-item__outer w-100">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="product-item__header">
                                                                                    <div class="position-relative">
                                                                                        <a href="#"
                                                                                            class="d-block gradient-overlay-half-bg-gradient-v5"><img
                                                                                                class="img-fluid min-height-150 card-img-top"
                                                                                                src="{{url('travel/assets/img/300x230/img9.jpg')}}"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute top-0 left-0 pt-3 pl-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-icon text-white rounded-circle"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title=""
                                                                                            data-original-title="Save for later">
                                                                                            <span
                                                                                                class="flaticon-valentine-heart"></span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 left-0 right-0">
                                                                                        <div class="px-4 pb-3">
                                                                                            <a href="#" class="d-block">
                                                                                                <div
                                                                                                    class="d-flex align-items-center font-size-14 text-white">
                                                                                                    <i
                                                                                                        class="icon flaticon-pin-1 mr-2 font-size-20"></i>
                                                                                                    Greater London
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 flex-horizontal-center">
                                                                                <div
                                                                                    class="w-100 position-relative m-4 m-md-0">
                                                                                    <div class="mb-1 pb-1">
                                                                                        <span
                                                                                            class="green-lighter ml-2">
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                        </span>
                                                                                    </div>
                                                                                    <a href="#">
                                                                                        <span
                                                                                            class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire
                                                                                            Prestige Causeway Bay
                                                                                        </span>
                                                                                    </a>
                                                                                    <div class="card-body p-0">
                                                                                        <div class="my-2">
                                                                                            <span
                                                                                                class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1 ml-2">(166
                                                                                                reviews)</span>
                                                                                        </div>
                                                                                        <div class="mb-0">
                                                                                            <span
                                                                                                class="mr-1 font-size-14 text-gray-1">From</span>
                                                                                            <span
                                                                                                class="font-weight-bold">£350.00</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1">
                                                                                                / night</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="card mb-4 overflow-hidden">
                                                                    <div class="product-item__outer w-100">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="product-item__header">
                                                                                    <div class="position-relative">
                                                                                        <a href="#"
                                                                                            class="d-block gradient-overlay-half-bg-gradient-v5"><img
                                                                                                class="img-fluid min-height-150 card-img-top"
                                                                                                src="{{url('travel/assets/img/300x230/img10.jpg')}}"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute top-0 left-0 pt-3 pl-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-icon text-white rounded-circle"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title=""
                                                                                            data-original-title="Save for later">
                                                                                            <span
                                                                                                class="flaticon-valentine-heart"></span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 left-0 right-0">
                                                                                        <div class="px-4 pb-3">
                                                                                            <a href="#" class="d-block">
                                                                                                <div
                                                                                                    class="d-flex align-items-center font-size-14 text-white">
                                                                                                    <i
                                                                                                        class="icon flaticon-pin-1 mr-2 font-size-20"></i>
                                                                                                    Greater London
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 flex-horizontal-center">
                                                                                <div
                                                                                    class="w-100 position-relative m-4 m-md-0">
                                                                                    <div class="mb-1 pb-1">
                                                                                        <span
                                                                                            class="green-lighter ml-2">
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                            <small
                                                                                                class="fas fa-star font-size-10"></small>
                                                                                        </span>
                                                                                    </div>
                                                                                    <a href="#">
                                                                                        <span
                                                                                            class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire
                                                                                            Prestige Causeway Bay
                                                                                        </span>
                                                                                    </a>
                                                                                    <div class="card-body p-0">
                                                                                        <div class="my-2">
                                                                                            <span
                                                                                                class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1 ml-2">(166
                                                                                                reviews)</span>
                                                                                        </div>
                                                                                        <div class="mb-0">
                                                                                            <span
                                                                                                class="mr-1 font-size-14 text-gray-1">From</span>
                                                                                            <span
                                                                                                class="font-weight-bold">£350.00</span>
                                                                                            <span
                                                                                                class="font-size-14 text-gray-1">
                                                                                                / night</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-xl-8 col-wd-8gdot5">
                                                    <iframe
                                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15544.315136188916!2d80.28787859999998!3d13.09419335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7f6b00bf787831af!2sApollo%20City%20Centre%20Hospital%20Sowcarpet!5e0!3m2!1sen!2sin!4v1580992215999!5m2!1sen!2sin"
                                                        width="100%" height="100%" frameborder="0" style="border:0;"
                                                        allowfullscreen=""></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End On Target Modal -->
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
                                                                class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Price
                                                                Range ($)</span>
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
                                                    <span>£</span>
                                                    <span id="rangeSliderExample3MinResult" class=""></span>
                                                    <span class="mx-0dot5"> — </span>
                                                    <span>£</span>
                                                    <span id="rangeSliderExample3MaxResult" class=""></span>
                                                </div>
                                                <input class="js-range-slider" type="text"
                                                    data-extra-classes="u-range-slider height-35" data-type="double"
                                                    data-grid="false" data-hide-from-to="true" data-min="0"
                                                    data-max="3456" data-from="200" data-to="3456" data-prefix="$"
                                                    data-result-min="#rangeSliderExample3MinResult"
                                                    data-result-max="#rangeSliderExample3MaxResult">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="shopCategoryAccordion" class="accordion rounded-0 shadow-none border-top">
                                    <div class="border-0">
                                        <div class="card-collapse" id="shopCategoryHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button"
                                                    class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed"
                                                    data-toggle="collapse" data-target="#shopCategoryOne"
                                                    aria-expanded="false" aria-controls="shopCategoryOne">
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
                                        <div id="shopCategoryOne" class="collapse show"
                                            aria-labelledby="shopCategoryHeadingOne"
                                            data-parent="#shopCategoryAccordion">
                                            <div class="card-body pt-0 mt-1 px-5">
                                                <!-- Checkboxes -->
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="brandAdidas">
                                                        <label class="custom-control-label text-color-1"
                                                            for="brandAdidas">Convertibles</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="brandNewBalance">
                                                        <label class="custom-control-label text-color-1"
                                                            for="brandNewBalance">Coupes</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="brandNike">
                                                        <label class="custom-control-label text-color-1"
                                                            for="brandNike">Sedan</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="brandFredPerry">
                                                        <label class="custom-control-label text-color-1"
                                                            for="brandFredPerry">SUV</label>
                                                    </div>
                                                </div>
                                                <!-- End Checkboxes -->

                                                <!-- View More - Collapse -->
                                                <div class="collapse" id="collapseBrand">
                                                    <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="brandGucci">
                                                            <label class="custom-control-label text-color-1"
                                                                for="brandGucci">Gucci</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="brandMango">
                                                            <label class="custom-control-label text-color-1"
                                                                for="brandMango">Mango</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End View More - Collapse -->
                                            </div>
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
                                        <a href="../cars/cars-single-v1.html">
                                            <span
                                                class="badge badge-pill bg-white text-primary px-3 py-2 font-size-14 font-weight-normal">Featured</span>
                                        </a>
                                    </div>
                                    <div class="card-body px-4 py-3 border-bottom">
                                        <a href="../cars/cars-single-v1.html" class="d-block">
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
                                            <div class="col-12 text-center mt-3">
                                                <form action="bookingStep1" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{$car->id}}" name="id">
                                                    <input type="hidden" name="from" id="" value="{{$from}}">
                                                    <input type="hidden" name="to" value="{{$to}}">
                                                    <button class="btn" type="submit" style="background-color:#DC2D13;cursor:pointer; font-size:14px; color:#fdfdfd; "><i class="fa fa-bookmark" aria-hidden="true"></i> Réserver</button>
                                                    
                                                </form>
                                                
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

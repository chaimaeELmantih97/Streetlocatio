@extends('frontend.layouts.master')
@section('title','AlaOR|| Car DETAIL')
@section('main-content')
<style>
    ul {
        list-style-type: none;
    }

</style>
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
</div><!-- end block-title -->

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <main class="main-content">
                <article class="car-details">
                    <div class="car-details__wrap-title clearfix">
                        <h2 class="car-details__title">{{$car->title}}</h2>
                        <div class="car-details__wrap-price"><span class="car-details__price"><span
                                    class="car-details__price-inner">{{$car->prix_location}} MAD</span></span></div>

                    </div>

                    <div id="slider-product" class="flexslider slider-product">
                        <ul class="slides">
                            <li>
                                <a href="{{url('storage/cars/'.$car->photo)}}">
                                    <img style="object-fit:cover;" src="{{url('storage/cars/'.$car->photo)}}"
                                        height="430" width="770" alt="l'image de vehicule">
                                </a>
                            </li>

                            @foreach ($car->images as $item)
                            <li>
                                <a href="{{url('storage/cars/'.$item->image)}}">
                                    <img style="object-fit:cover;" src="{{url('storage/cars/'.$item->image)}}"
                                        height="430" width="770" alt="l'image de vehicule">
                                </a>
                            </li>

                            @endforeach

                        </ul>
                    </div>
                    <div id="carousel-product" class="flexslider carousel-product">
                        <ul class="slides">
                            <li>
                                <a href="{{url('storage/cars/'.$car->photo)}}">
                                    <img style="object-fit:cover;" src="{{url('storage/cars/'.$car->photo)}}"
                                        height="75" width="95" alt="l'image de vehicule">
                                </a>
                            </li>

                            @foreach ($car->images as $item)
                            <li>
                                <a href="{{url('storage/cars/'.$item->image)}}">
                                    <img style="object-fit:cover;" src="{{url('storage/cars/'.$item->image)}}"
                                        height="75" width="95" alt="l'image de vehicule">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Nav tabs -->
                    <div class="wrap-nav-tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Description de vehicule</a>
                            </li>
                            {{-- <li><a href="#tab2" data-toggle="tab">caractéristiques</a></li> --}}
                            {{-- <li><a href="#tab3" data-toggle="tab">enquête</a></li> --}}
                        </ul>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <h3 class="ui-title-inner">{{$car->title}}</h3>
                            <div class="decor-1"></div>
                            <p>{!!$car->summary!!}</p>
                            <p>{!!$car->description!!}</p>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <h3 class="ui-title-inner">{{$car->title}}</h3>
                            <div class="decor-1"></div>
                            <br>
                            <p>{!!$car->summary!!}</p>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <ul style="color:#D42B12; ">
                                        <li>
                                            <i class="icon icon-speedometer" ></i> Modele: <span
                                                style="color: #373C46"><i>{{$car->modele}}</i></span>
                            </li>
                            <li>
                                <i class="icon icon-speedometer"></i> annee modele: <span
                                    style="color: #373C46"><i>{{$car->annee_modele}}</i></span>
                            </li>
                            <li>
                                categorie:<span style="color: #373C46">{{$car->categorie}}<i></i></span>
                            </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul style="color:#D42B12; ">
                                <li>
                                    Modele: <span style="color: #373C46"><i>{{$car->modele}}</i></span>
                                </li>
                                <li>
                                    annee modele: <span style="color: #373C46"><i>{{$car->annee_modele}}</i></span>
                                </li>
                                <li>
                                    categorie:<span style="color: #373C46">{{$car->categorie}}<i></i></span>
                                </li>
                            </ul>
                        </div>


                    </div> --}}
        </div>
        <div class="tab-pane" id="tab3">
            {{-- <h3 class="ui-title-inner">Sit amet consectetur</h3>
                                        <div class="decor-1"></div>
                                        <p>Aiber vestiblum fringilla orem ipsum dolor sit amet consectetur adipisc ing
                                            elit sed don eiusmod tempor incididunt ut labore et dolore magna aliquaa
                                            enimd ads minim veniam quis nostrud Lorem ipsum dolor sit amet consectetur
                                            adipis cing elit sed do eiusmod tempor. Lorem ipsum dolor sit amet
                                            consectetur adipisicing.</p>
                                        <p>Elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                            enim ad minim veniam quis nostru dare exercitation ullamco laboris nisi
                                            aliquip ex ea commodo consequat. Duis aute irue dolor in reprehenderit in
                                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> --}}
        </div>
    </div>
    </article>
    <div class="row  text-center " style="margin-top:15px;">
        <div class="col-xs-6 col-xs-offset-3" style="float: none !important">
            @if($url=='/AvailableCars')
            <form action="{{route('bookingStep1')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$car->id}}" name="id">
                <input type="hidden" name="from" id="" value="{{session('from')}}">
                <input type="hidden" name="to" value="{{session('to')}}">
                <button class="btn" type="submit"
                style="background-color:#DC2D13;cursor:pointer; font-size:14px; color:#fdfdfd; "><i
                    class="fa fa-bookmark" aria-hidden="true"></i> Réserver cettre vehicule</button>
                
            </form>
            

            @else
            <button class="btn" type="submit"
                style="background-color:#DC2D13;cursor:pointer; font-size:14px; color:#fdfdfd;" data-toggle="modal"
                data-target="#exampleModal"><i class="fa fa-bookmark" aria-hidden="true"></i> Réserver cettre
                vehicule</button>
            @endif

        </div>
    </div>




    </main><!-- end main-content -->
</div><!-- end col -->


<div class="col-md-4">
    <aside class="sidebar">
        <section class="widget">
            <h3 class="widget-title">Specifications</h3>
            <div class="decor-1"></div>
            <div class="widget-content">
                <dl class="list-descriptions list-unstyled">
                    <dt>Modele:</dt>
                    <dd>{{$car->modele}}</dd>
                    <dt>Année</dt>
                    <dd>{{$car->annee_modele}}</dd>
                    <dt>Type de vehicule:</dt>
                    <dd>{{$car->categorie}}</dd>
                    <dt>carburant:</dt>
                    <dd>{{$car->carburant}}</dd>
                    <dt>boite de vitesse:</dt>
                    <dd>{{$car->boite_vitesses}}
                    </dd>
                    <dt>nombre de passagers:</dt>
                    <dd>{{$car->passagers}}</dd>
                    <dt>immatriculation:</dt>
                    <dd>{{$car->immatriculation}}</dd>
                    <dt>Postes:</dt>
                    <dd>{{$car->potes}}</dd>
                </dl>
            </div>
        </section>

        {{-- <section class="widget widget-banner">
                    <h3 class="widget-title">car video</h3>
                    <div class="decor-1"></div>
                    <div class="widget-content">
                        <div class="widget-slider owl-carousel owl-theme owl-theme_mod-d enable-owl-carousel"
                            data-pagination="true" data-single-item="true" data-auto-play="7000"
                            data-transition-style="fade" data-main-text-animation="true" data-after-init-delay="3000"
                            data-after-move-delay="1000" data-stop-on-hover="true">

                            <div class="widget-slider__item"><a href="https://www.youtube.com/watch?v=neS5h_VSvb8"
                                    rel="prettyPhoto"><img class="img-responsive"
                                        src="{{url('assets2/media/banners/1.jpg')}}" height="250" width="306"
        alt="banner"></a>
</div>
<div class="widget-slider__item"><a href="https://www.youtube.com/watch?v=neS5h_VSvb8" rel="prettyPhoto"><img
            class="img-responsive" src="{{url('assets2/media/banners/1.jpg')}}" height="250" width="306"
            alt="banner"></a></div>
<div class="widget-slider__item"><a href="https://www.youtube.com/watch?v=neS5h_VSvb8" rel="prettyPhoto"><img
            class="img-responsive" src="{{url('assets2/media/banners/1.jpg')}}" height="250" width="306"
            alt="banner"></a></div>
<div class="widget-slider__item"><a href="https://www.youtube.com/watch?v=neS5h_VSvb8" rel="prettyPhoto"><img
            class="img-responsive" src="{{url('assets2/media/banners/1.jpg')}}" height="250" width="306"
            alt="banner"></a></div>
</div>
</div>
</section> --}}

<section class="widget">
    <h3 class="widget-title">Vehicules associés</h3>
    @php
    $cars=App\Models\Car::where('id','!=',$car->id)->limit(3)->get();;
    @endphp
    <div class="decor-1"></div>
    <div class="widget-content">
        @foreach ($cars as $item)
        <section class="widget-post1 clearfix">
            <div class="widget-post1__img">
                <a href="{{route('car-detail',$item->slug)}}">
                    <img class="img-responsive" src="{{url('storage/cars/'.$item->photo)}}" height="75" width="75"
                        alt="l'image de vehicule"></a>

            </div>
            <div class="widget-post1__inner">
                <h3 class="widget-post1__title">{{$item->title}}</h3>
                <div class="widget-post1__price">Prix: {{$item->prix_location}}</div>
            </div>
        </section>
        @endforeach

    </div>
</section>

{{-- <div class="widget widget_mod-b">
                    <div class="wrap-social-block wrap-social-block_mod-a">
                        <div class="social-block ">
                            <div class="social-block__inner">
                                <span class="social-block__title">SHARE THIS</span>
                                <ul class="social-block__list list-inline">
                                    <li><a class="icon fa fa-facebook" href="javascript:void(0);"></a></li>
                                    <li><a class="icon fa fa-twitter" href="javascript:void(0);"></a></li>
                                    <li><a class="icon fa fa-google-plus" href="javascript:void(0);"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
</aside>
</div><!-- end col -->
</div><!-- end row -->
</div><!-- end container -->

<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:20vh">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reserver une vehicule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" style="padding-top: 20px" action="{{route('isAvailable')}}">
                    @csrf
                    <div class="row text-center" style="height: 100%">
                        {{-- <div class="col-xs-8 col-xs-offset-2" style="height: 100%;">
                            <div class="input-group" style="width: 100%;margin-top:20px;">
                                <input class="input--style-1" id="ville_input_1"
                                    style="border-top: none;border-left: none;border-right: none;" type="text"
                                    placeholder="Ville" name="ville">
                            </div>
                        </div> --}}
                        <input type="hidden" name="id" value="{{$car->id}}">
                        <div class="col-xs-8 col-xs-offset-2">
                            <div class="input-group " style="width:100%; height:100%;margin-top:20px;">
                                <input class="input--style-1 js-datepicker" id="js-datepicker" type="text"
                                    placeholder="jj/mm/aaaa" name="from">
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar" id="js-btn-calendar"></i>
                            </div>
                        </div>
                        <div class="col-xs-8 col-xs-offset-2">
                            <div class="input-group " style="width:100%; height:100%;margin-top:20px;">
                                <input class="input--style-1 js-datepicker" id="js-datepicker2" type="text"
                                    placeholder="jj/mm/aaaa" name="to">
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar" id="js-btn-calendar2"></i>
                            </div>
                        </div>
                        <div class="col-xs-8 col-xs-offset-2">
                            <div class="text-center" style="width:100%; height:100%;margin-top:20px;">
                                <button class="btn btn--radius btn-primary btn--green"
                                    style="border:0 0 2px 0;border-bottom: 2px solid #D42B12; height: 40px"
                                    type="submit">Reserver</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{url('assets2/plugins/nouislider/jquery.nouislider.all.min.js')}}"></script>
<script src="{{url('assets2/plugins/flexslider/jquery.flexslider.js')}}"></script>
<script src="{{url('assets2/NV/datepicker/moment.min.js')}}"></script>
<script src="{{url('assets2/NV/datepicker/daterangepicker.js')}}"></script>

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
@endsection
@push('styles')

@endpush
@push('scripts')

@endpush

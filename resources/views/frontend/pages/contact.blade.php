@extends('frontend.layouts.master')

@section('main-content')
<div class="block-title">
    <div class="block-title__inner section-bg section-bg_second">
        <div class="bg-inner">
            <h1 class="ui-title-page">Contactez nous</h1>
            <div class="decor-1 center-block"></div>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">HOME</a></li>
                <li class="active">Contactez nous</li>
            </ol>
        </div><!-- end bg-inner -->
    </div><!-- end block-title__inner -->
</div>
  


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
                                            class="btn-skew-r__inner">Envoyer Le message</span></button>
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
	<!-- end section_default -->
@endsection

@push('styles')
<style>
	.modal-dialog .modal-content .modal-header{
		position:initial;
		padding: 10px 20px;
		border-bottom: 1px solid #e9ecef;
	}
	.modal-dialog .modal-content .modal-body{
		height:100px;
		padding:10px 20px;
	}
	.modal-dialog .modal-content {
		width: 50%;
		border-radius: 0;
		margin: auto;
	}
</style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
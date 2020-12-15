@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')

<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">checkout</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<div class="checkout-page-wrapper section-padding">
    <div class="container">
        <form class="form" method="POST" action="{{route('cart.order')}}">
            @csrf
            <div class="row">
                <!-- Checkout Billing Details -->
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap">
                        <h5 class="checkout-title"> {{__('messages.Billing_Details',[],Session::get('locale'))}}</h5>
                        <div class="billing-form-wrap">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="f_name" class="required">@if (Session::get('locale')=='en')First Name 	@else Prénom @endif</label>
                                            <input type="text" id="f_name" name="first_name" required
                                                placeholder="firstName" value="{{old('first_name')}}">
                                            @error('first_name')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="l_name" class="required">@if (Session::get('locale')=='en')Last Name 	@else Nom @endif</label>
                                            <input type="text" name="last_name" value="{{old('lat_name')}}" id="l_name"
                                                placeholder="Last Name" required>
                                            @error('last_name')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="email" class="required">@if (Session::get('locale')=='en')Email Address 	@else Email @endif</label>
                                    <input type="email" class="paypal-check" name="email" id="email"
                                        placeholder="Email Address" required value="{{old('email')}}">
                                    @error('email')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="single-input-item">
                                    <label for="com-name">@if (Session::get('locale')=='en')Phone Number 	@else Numéro du Telephone @endif</label>
                                    <input type="number" class="paypal-check" name="phone" id="phone" placeholder=""
                                        required value="{{old('phone')}}">
                                    @error('phone')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="single-input-item">
                                    @php
                                    $cities = ['Casablanca', 'Fez', 'Tangier', 'Marrakesh', 'Salé', 'Meknes', 'Rabat',
                                    'Oujda', 'Kenitra', 'Agadir',
                                    'Tetouan', 'Temara', 'Safi', 'Mohammedia', 'Khouribga', 'El Jadida', 'Beni Mellal',
                                    'Aït Melloul', 'Nador', 'Dar
                                    Bouazza', 'Taza', 'Settat', 'Berrechid', 'Khemisset', 'Inezgane', 'Ksar El Kebir',
                                    'Larache', 'Guelmim',
                                    'Khenifra', 'Berkane', 'Taourirt', 'Bouskoura', 'Fquih Ben Salah', 'Dcheira El
                                    Jihadia', 'Oued Zem', 'El Kelaa
                                    Des Sraghna', 'Sidi Slimane', 'Errachidia', 'Guercif', 'Oulad Teima', 'Ben Guerir',
                                    'Tifelt', 'Lqliaa',
                                    'Taroudant', 'Sefrou', 'Essaouira', 'Fnideq', 'Sidi Kacem', 'Tiznit', 'Tan-Tan',
                                    'Ouarzazate', 'Souk El Arbaa',
                                    'Youssoufia', 'Lahraouyine', 'Martil', 'Ain Harrouda', 'Suq as-Sabt Awlad an-Nama',
                                    'Skhirat', 'Ouazzane',
                                    'Benslimane', 'Al Hoceima', 'Beni Ansar', 'M\'diq' ,'Sidi Bennour' ,'Midelt'
                                    ,'Azrou' ,'Drargua' ,'Laayoune'
                                    ,'Boujdour' ,'Dakhla'];
                                    @endphp
                                    <label for="country" class="required">@if (Session::get('locale')=='en')City 	@else Ville @endif</label>
                                    <select name="country" class="paypal-check" class="nice-select" id="country">
                                        <option value="" disabled selected>@if (Session::get('locale')=='en') Choose... 	@else Choisir... @endif</option>
                                        @foreach ($cities as $c)
                                        <option value="{{ $c }}">{{$c }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="single-input-item">
                                    <label for="street-address" class="required mt-20"> @if (Session::get('locale')=='en')First Address	@else Adresse N°:1 @endif</label>
                                    <input type="text" class="paypal-check" name="address1" id="address1" required
                                        placeholder="" value="{{old('address1')}}">
                                    @error('address1')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="single-input-item">
                                    <label for="street-address" class="required mt-20">@if (Session::get('locale')=='en')Second Address	@else Adresse N°:2 @endif </label>
                                    <input type="text" class="paypal-check" name="address2" id="address2"
                                        placeholder="Street address Line 2 (Optional)" value="{{old('address2')}}">
                                    @error('address2')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="single-input-item">
                                    <label for="town" class="required">@if (Session::get('locale')=='en')Postal Code	@else Code ZIP @endif</label>
                                    <input type="text" class="paypal-check" id="town" name="post_code" placeholder=""
                                        value="{{old('post_code')}}" required>
                                    @error('post_code')
                                    <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>

                                {{-- <div class="single-input-item">
                                        <label for="state">State / Divition</label>
                                        <input type="text" id="state" placeholder="State / Divition" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="postcode" class="required">Postcode / ZIP</label>
                                        <input type="text" id="postcode" placeholder="Postcode / ZIP" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" placeholder="Phone" />
                                    </div> --}}

                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Details -->
                <div class="col-lg-6">
                    <div class="order-summary-details">
                        <h5 class="checkout-title">{{__('messages.Your_Order_Summary',[],Session::get('locale'))}}</h5>
                        <div class="order-summary-content">
                            <!-- Order Summary Table -->
                            <div class="order-summary-table table-responsive text-center"
                                style="overflow-y:visible !important; ">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>@if (Session::get('locale')=='en')cars	@else Produits @endif</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(Helper::getAllProductFromCart())
                                        @foreach(Helper::getAllProductFromCart() as $key=>$cart)
                                        <tr>
                                            <td><a href="Car-details.html">
                                                @if (Session::get('locale')=='en') {{$cart->Car['titleEN']}} @else {{$cart->Car['title']}} @endif<strong> ×
                                                        {{$cart->quantity}}</strong></a>
                                            </td>
                                            <td>{{$cart->Car['price']}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td><strong id="">{{number_format(Helper::totalCartPrice(),2)}}</strong>
                                            </td>
                                        </tr>
                                        @if(session('coupon'))
                                        <tr>
                                            <td>@if (Session::get('locale')=='en')You Save @else Vous économisez @endif
                                            </td>
                                            <td><strong>{{number_format(session('coupon')['value'],2)}}</strong>
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>Total </td>
                                            @php
                                            $total_amount=Helper::totalCartPrice();
                                            if(session('coupon')){
                                            $total_amount=$total_amount-session('coupon')['value'];
                                            }
                                            @endphp
                                            <td><strong>{{number_format($total_amount,2)}}</strong>
                                                <input type="text" name="totaldd2" hidden id="totaldd2"
                                                    value="{{number_format($total_amount,2)}}">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Order Payment Method -->
                            <div class="order-payment-method">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" name="payment_method" value="cod"
                                                class="payment_radio custom-control-input" checked />
                                            <label class="custom-control-label"
                                                for="cashon">{{__('messages.Cash_On_Delivery',[],Session::get('locale'))}}</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="cash">
                                        <p>{{__('messages.Pay_with_cash_upon_delivery',[],Session::get('locale'))}}</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="paypalpayment" name="payment_method" value="paypal"
                                                class="payment_radio custom-control-input" />
                                            <label class="custom-control-label"
                                                for="paypalpayment">{{__('messages.Enline_Payment',[],Session::get('locale'))}}
                                                <img src="assets/img/paypal-card.jpg" class="img-fluid paypal-card"
                                                    alt="Paypal" /></label>


                                        </div>
                                        <div id="paypal-alert" class="alert alert-primary d-none" role="alert">
                                            @if (Session::get('locale')=='en') You must complete the form! @else Vous
                                            devez remplir le formulaire! @endif
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="paypal">
                                        <p>{{__('messages.ppp',[],Session::get('locale'))}}</p>
                                    </div>
                                    <script
                                        src="https://www.paypal.com/sdk/js?client-id=AcaZu0-uFTIOCOdXs3MWnMwtLVW652qO025f0j6k1KyzyxklgHvCm_Ciz7XuZmYWqT-jmEBgUUMMx6f_">
                                    </script>

                                    <div class="col-md-12 mt-5" style="display:none;" id="paypaldiv">
                                        <div id="paypal-button-container" class="float-center" style="display: block">

                                        </div>
                                    </div>
                                    <form id="store2" method="POST" action="{{route('cart.order2')}}" hidden>
                                        @csrf
                                        <input type="hidden" name="first_name" value="" id="fn2">
                                        <input type="hidden" name="last_name" value="" id="ln2">
                                        <input type="hidden" name="email" value="" id="email2">
                                        <input type="hidden" name="phone" value="" id="phone2">
                                        <input type="hidden" name="country" value="MA" id="country2">
                                        <input type="hidden" name="address1" value="" id="ad2">
                                        <input type="hidden" name="address2" value="" id="ad22">
                                        <input type="hidden" name="post_code" value="" id="pc2">
                                    </form>
                                    <script>
                                        $('.paypal-check').on('change', function () {
                                            if (!$('#l_name').val() || !$('#f_name').val() || !$('#email')
                                            .val() || !$('#phone').val() || !$('#town').val() || !$('#address1')
                                                .val() || !$('#address2').val() || !$('#country').val()) {
                                                if (!$('#paypalpayment').prop('checked')) {
                                                    $('#paypal-alert').addClass('d-none');
                                                    $('#checkout-button').removeClass('d-none');
                                                    $('#paypal-button-container').addClass('d-none');
                                                } else {
                                                    $('#paypal-alert').removeClass('d-none');
                                                    $('#checkout-button').addClass('d-none');
                                                    $('#paypal-button-container').addClass('d-none');
                                                }
                                            } else {
                                                if (!$('#paypalpayment').prop('checked')) {
                                                    $('#paypal-alert').addClass('d-none');
                                                    $('#checkout-button').removeClass('d-none');
                                                    $('#paypal-button-container').addClass('d-none');
                                                } else {
                                                    $('#paypal-alert').addClass('d-none');
                                                    $('#checkout-button').addClass('d-none');
                                                    $('#paypal-button-container').removeClass('d-none');
                                                }
                                            }
                                        })
                                        $('.payment_radio').on('change', function () {
                                            if ($("#paypalpayment").prop("checked")) {
                                                if (!$('#l_name').val() || !$('#f_name').val() || !$('#email')
                                                    .val() || !$('#phone').val() || !$('#town').val() || !$(
                                                        '#address1').val() || !$('#address2').val() || !$(
                                                        '#country').val()) {
                                                    $('#paypal-alert').removeClass('d-none');
                                                    $('#checkout-button').addClass('d-none');
                                                    $('#paypal-button-container').addClass('d-none');
                                                } else {
                                                    $('#paypal-alert').addClass('d-none');
                                                    $('#checkout-button').addClass('d-none');
                                                    $('#paypal-button-container').removeClass('d-none');
                                                }
                                            } else {
                                                $('#paypal-button-container').addClass('d-none');

                                                $('#paypal-alert').addClass('d-none');
                                                $('#checkout-button').removeClass('d-none');
                                            }
                                        });

                                    </script>
                                    <script>
                                        $('body').on('change', '#l_name', function () {
                                            let l_name = $('#l_name').val();
                                            $('#ln2').val(l_name);
                                        });
                                        $('body').on('change', '#f_name', function () {
                                            let f_name = $('#f_name').val();
                                            $('#fn2').val(f_name);
                                        });
                                        $('body').on('change', '#email', function () {
                                            let email = $('#email').val();
                                            $('#email2').val(email);
                                        });
                                        $('body').on('change', '#phone', function () {
                                            let phone = $('#phone').val();
                                            $('#phone2').val(phone);
                                        });
                                        $('body').on('change', '#town', function () {
                                            let town = $('#town').val();
                                            $('#pc2').val(town);
                                        });
                                        $('body').on('change', '#address1', function () {
                                            let address1 = $('#address1').val();
                                            $('#ad2').val(address1);
                                        });
                                        $('body').on('change', '#address2', function () {
                                            let address2 = $('#address2').val();
                                            $('#ad22').val(address2);
                                        });

                                        $('body').on('change', '#country', function () {
                                            let country = $('#country').val();
                                            // alert('aaaaaaaaaa '+country);
                                            $('#country2').val(country);
                                        });
                                        console.log("ddd" + document.getElementById('totaldd2').value)

                                    </script>
                                    <input type="text" id="totaldd3" hidden>
                                    <script>
                                        (async function () {
                                            amount = document.getElementById('totaldd2').value;
                                            console.log(amount);
                                            base = 'MAD';
                                            target = 'USD';
                                            let res = await fetch(
                                                "https://api.coinbase.com/v2/exchange-rates?currency=MAD");
                                            let ress = await res.json();
                                            console.log(ress);
                                            let rate = ress.data.rates['USD'];
                                            let amount2 = amount.replace(',', '');
                                            let d = amount2 * rate;
                                            let dd = d.toFixed(2);
                                            console.log("dddddddddddd  " + d);
                                            document.getElementById('totaldd3').value = dd;

                                        })();

                                    </script>
                                    <script>
                                        $('#paypalpayment').click(function () {
                                            console.log('ajdkjzakjz');
                                            $('#paypaldiv').css("display", "block");
                                        });
                                        $('#cashon').click(function () {
                                            console.log('jhduheuh 22222');
                                            $('#paypaldiv').css("display", "none");
                                        });

                                    </script>
                                    <script>
                                        paypal.Buttons({
                                            createOrder: function (data, actions) {
                                                // This function sets up the details of the transaction, including the amount and line item details.
                                                return actions.order.create({
                                                    purchase_units: [{
                                                        amount: {
                                                            value: document.getElementById(
                                                                'totaldd3').value
                                                        }
                                                    }]
                                                });
                                            },
                                            onApprove: function (data, actions) {
                                                // This function captures the funds from the transaction.
                                                return actions.order.capture().then(function (details) {
                                                    // This function shows a transaction success message to your buyer.
                                                    document.getElementById('store2').submit();

                                                });
                                            }
                                        }).render('#paypal-button-container');
                                        //This function displays Smart Payment Buttons on your web page.

                                    </script>
                                </div>
                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-20">
                                        <!--<input type="checkbox" class="custom-control-input" id="terms" required />-->
                                        <!--<label class="custom-control-label" for="terms">I have read and agree to-->
                                        <!--    the website terms and conditions.</label>-->
                                    </div>
                                    <button type="submit" class="btn btn-sqr"
                                        id="checkout-button">{{__('messages.TTT',[],Session::get('locale'))}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- service policy area start -->
<div class="service-policy section-padding">
    <div class="container">
        <div class="row mtn-30">
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-plane"></i>
                    </div>
                    <div class="policy-content">
                        <h6>{{__('messages.FS1',[],Session::get('locale'))}}</h6>
                        <p>{{__('messages.FS2',[],Session::get('locale'))}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-help2"></i>
                    </div>
                    <div class="policy-content">
                        <h6>{{__('messages.Sp1',[],Session::get('locale'))}}</h6>
                        <p>{{__('messages.SP2',[],Session::get('locale'))}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-back"></i>
                    </div>
                    <div class="policy-content">
                        <h6>{{__('messages.MR1',[],Session::get('locale'))}}</h6>
                        <p>{{__('messages.MR2',[],Session::get('locale'))}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-credit"></i>
                    </div>
                    <div class="policy-content">
                        <h6>{{__('messages.100P',[],Session::get('locale'))}}</h6>
                        <p>{{__('messages.100P2',[],Session::get('locale'))}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service policy area end -->

@endsection
@push('styles')
<style>
    li.shipping {
        display: inline-flex;
        width: 100%;
        font-size: 14px;
    }

    li.shipping .input-group-icon {
        width: 100%;
        margin-left: 10px;
    }

    .input-group-icon .icon {
        position: absolute;
        left: 20px;
        top: 0;
        line-height: 40px;
        z-index: 3;
    }

    .form-select {
        height: 30px;
        width: 100%;
    }

    .form-select .nice-select {
        border: none;
        border-radius: 0px;
        height: 40px;
        background: #f6f6f6 !important;
        padding-left: 45px;
        padding-right: 40px;
        width: 100%;
    }

    .list li {
        margin-bottom: 0 !important;
    }

    .list li:hover {
        background: #F7941D !important;
        color: white !important;
    }

    .form-select .nice-select::after {
        top: 14px;
    }

</style>
@endpush
@push('scripts')

<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("select.select2").select2();
    });
    $('select.nice-select').niceSelect();

</script>
<script>
    function showMe(box) {
        var checkbox = document.getElementById('shipping').style.display;
        // alert(checkbox);
        var vis = 'none';
        if (checkbox == "none") {
            vis = 'block';
        }
        if (checkbox == "block") {
            vis = "none";
        }
        document.getElementById(box).style.display = vis;
    }

</script>
<script>
    $(document).ready(function () {
        $('.shipping select[name=shipping]').change(function () {
            let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
            let subtotal = parseFloat($('.order_subtotal').data('price'));
            let coupon = parseFloat($('.coupon_price').data('price')) || 0;
            // alert(coupon);
            $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));
        });

    });

</script>

@endpush

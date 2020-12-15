@extends('frontend.layouts.master')
@section('title','Cart Page')
@section('main-content')
	
	 <!-- breadcrumb area start -->
	 <div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-wrap">
						<nav aria-label="breadcrumb">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{('home')}}" ><i class="fa fa-home"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">cart</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb area end -->
	@php
		$total=0;
	@endphp
	 <!-- cart main wrapper start -->
	 <div class="cart-main-wrapper section-padding">
		<div class="container">
			<div class="section-bg-color">
				<div class="row">
					<div class="col-lg-12">
						<!-- Cart Table Area -->
						<div class="cart-table table-responsive">
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="pro-thumbnail">{{__('messages.Thumbnail',[],Session::get('locale'))}}</th>
										<th class="pro-title">{{__('messages.Car',[],Session::get('locale'))}}</th>
										<th class="pro-title">{{__('messages.Size',[],Session::get('locale'))}}</th>
										<th class="pro-price">{{__('messages.PRICE',[],Session::get('locale'))}}</th>
										<th class="pro-quantity">{{__('messages.QUANTITY',[],Session::get('locale'))}}</th>
										<th class="pro-subtotal">{{__('messages.TOTAL',[],Session::get('locale'))}}</th> 
										<th class="pro-remove">{{__('messages.Remove',[],Session::get('locale'))}}</th>
									</tr>
								</thead>
								<tbody>
									
										@if(Auth::check())
											@if(Helper::getAllProductFromCart())
												@foreach(Helper::getAllProductFromCart() as $key=>$cart)
												<tr>
													<td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{url('storage/cars/'.$cart->Car['photo'])}}" alt="Car" /></a></td>
													<td class="pro-title"><a href="{{route('Car-detail',$cart->Car['slug'])}}">{{$cart->Car['title']}}</a></td>
													<td class="pro-title">{{$cart['size']}}</td>
													<td class="pro-price"><span>{{$cart['price']}}</span></td>
													<td class="MYqty" data-title="Qty"><!-- Input Order -->
														<div class="input-group">
															<div class="button minus">
															<button type="button" class="btn btn-primary btn-number btn-minus" data-target="#qte{{$key}}"
															data-quantity="plus" data-type="minus" data-field="quant[{{$key}}]" >
																	<i class="fa fa-minus"></i>
																</button>
															</div>
															<input type="text" name="quant[{{$key}}]"  class="input-number" min="1" value="{{$cart->quantity}}" id="qte{{$key}}">
															<input type="hidden" name="qty_id[]" value="{{$cart->id}}">
															<div class="button plus">
																<button type="button" class="btn btn-primary btn-number btn-plus" data-quantity="minus" data-target="#qte{{$key}}"
																data-type="plus" data-field="quant[{{$key}}]" >
																	<i class="fa fa-plus"></i>
																</button>
															</div>
														</div>
														
														<!--/ End Input Order -->
													</td>
													<td class="pro-subtotal"><span>{{$cart['amount']}}</span></td>
													<td class="pro-remove"><a href="{{route('cart-delete',$cart->id)}}"><i class="fa fa-trash"></i></a></td>
												</tr>
												@endforeach
											@else 
												<tr>
													<td class="text-center">
														{{__('messages.Ncart',[],Session::get('locale'))}} <a href="{{route('Car-grids')}}" style="color:blue;">{{__('messages.Cshoppin',[],Session::get('locale'))}}</a>
		
													</td>
												</tr>
											@endif
										@else 
											@if(session('cart'))
											
												@foreach((array) session('cart') as $id => $details)
													<?php $total += $details['price'] * $details['quantity'] ?>
												@endforeach
												@foreach(session('cart') as $id => $details)
												<tr>
													<td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{url('storage/cars/'.$details['photo'])}}" alt="Car" /></a></td>
													<td class="pro-title"><a href="{{route('Car-detail',$details['slug'])}}">{{$details['name']}}</a></td>
													<td class="pro-price"><span>{{$details['size']}}</span></td>
													<td class="pro-price"><span>{{$details['price']}}</span></td>
													<td class="MYqty" data-title="Qty"><!-- Input Order -->
														<div class="input-group">
															<div class="button minus">
															<button type="button" class="btn btn-primary btn-number btn-minus" data-target="#qte{{$id}}"
															data-quantity="plus" data-type="minus" data-field="quant[{{$id}}]" >
																	<i class="fa fa-minus"></i>
																</button>
															</div>
															<input type="text" name="quant[{{$id}}]"  class="input-number" min="1" value="{{$details['quantity']}}" id="qte{{$id}}">
															<input type="hidden" name="qty_id[]" value="{{$id}}">
														<input type="text" hidden value="{{$id}}" name="product_id">
															<div class="button plus">
																<button type="button" class="btn btn-primary btn-number btn-plus" data-quantity="minus" data-target="#qte{{$id}}"
																data-type="plus" data-field="quant[{{$id}}]" >
																	<i class="fa fa-plus"></i>
																</button>
															</div>
														</div>
														
														<!--/ End Input Order -->
													</td>
													<td class="pro-subtotal"><span>{{number_format(($details['price']*$details['quantity']),2)}}</span></td>
													<td class="pro-remove"><a href="{{route('cart-delete',$id)}}"><i class="fa fa-trash"></i></a></td>
												</tr>
												@endforeach
											@endif
										@endif

									
								</tbody>
							</table>
						</div>
						<!-- Cart Update Option -->
						<div class="cart-update-option d-block d-md-flex justify-content-between">
							
							<div class="cart-update">
								<button type="submit" class="btn btn-sqr">{{__('messages.Update_Cart',[],Session::get('locale'))}}</button>
							</div>
						</form>
						@auth
						@if(!session('coupon'))
						<div class="apply-coupon-wrapper">
							<form id="couponForm" action="{{route('coupon-store')}}" method="POST" class=" d-block d-md-flex" >
								@csrf
								<input  name="code" type="text" placeholder="Enter Your Coupon Code" required />
								<button class="btn btn-sqr" type="submiy" onclick="submitCoupon();">
									@if (Session::get('locale')=='en')Apply Coupon	@else Appliquer Coupon @endif
						        </button>
							</form>
						</div>
						@endif
						@endauth
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5 ml-auto">
						<!-- Cart Calculation Area -->
						<div class="cart-calculator-wrapper">
							<div class="cart-calculate-items">
								<h6>{{__('messages.Cart_Totals',[],Session::get('locale'))}}</h6>
								<div class="table-responsive">
									<table class="table">
										<tr>
											<td>Sub Total</td>
											<td>
												@if (Auth::check())
												{{number_format(Helper::totalCartPrice(),2)}}
												@else
													{{$total}}
												@endif
											</td>
										</tr>
										@auth
										@if(session()->has('coupon'))
										<tr class="total">
											<td>
								       	@if (Session::get('locale')=='en')You Save	@else Vous économisez @endif

											</td>
											<td class="total-amount">
												{{number_format(Session::get('coupon')['value'],2)}}
										</tr>
										@endif
										@endauth
										<tr class="total">
											<td>Total</td>
											<td class="total-amount">
												@if (Auth::check())
												@php
												$total_amount=Helper::totalCartPrice();
												if(session()->has('coupon')){
													$total_amount=$total_amount-Session::get('coupon')['value'];
												}
												@endphp
												{{number_format($total_amount,2)}}
												@else
													{{$total}}
												@endif</td>
										</tr>
									</table>
								</div>
							</div>
							<a href="{{route('checkout')}}" class="btn btn-sqr d-block">{{__('messages.Proceed_Checkout',[],Session::get('locale'))}}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- cart main wrapper end -->

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
<script>
	const couponForm = document.getElementById('couponForm');
	console.log(couponForm);
	function submitCoupon(){
		couponForm.submit();
	}

	</script>		
<!-- service policy area end -->

	
	<!-- Start Shop Newsletter  -->
	{{-- @include('frontend.layouts.newsletter') --}}
	<!-- End Shop Newsletter -->
	
	

	
@endsection
@push('styles')
	<style>
		li.shipping{
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
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
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
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});


	</script>

@endpush
@extends('frontend.layouts.master')
@section('title','Wishlist Page')
@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-wrap">
						<nav aria-label="breadcrumb">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
								{{-- <li class="breadcrumb-item"><a href="shop.html">shop</a></li> --}}
								<li class="breadcrumb-item active" aria-current="page">wishlist</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	<div class="wishlist-main-wrapper section-padding">
		<div class="container">
			<!-- Wishlist Page Content Start -->
			<div class="section-bg-color">
				<div class="row">
					<div class="col-lg-12">
						<!-- Wishlist Table Area -->
						<div class="cart-table table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="pro-thumbnail">{{__('messages.Thumbnail',[],Session::get('locale'))}}</th>
										<th class="pro-title">{{__('messages.Car',[],Session::get('locale'))}}</th>
										<th class="pro-price">{{__('messages.PRICE',[],Session::get('locale'))}}</th>
										<th class="pro-title">Stock</th>
										<th class="pro-quantity">{{__('messages.ATC',[],Session::get('locale'))}}</th>
										<th class="pro-remove">{{__('messages.Remove',[],Session::get('locale'))}}</th>
									</tr>
								</thead>
								<tbody>
									@if (Auth::check())
										@if(Helper::getAllProductFromWishlist())
										@foreach(Helper::getAllProductFromWishlist() as $key=>$wishlist)
										<tr>
											<td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{url('storage/cars/'.$wishlist->Car['photo'])}}" alt="Car" /></a></td>
											@if (Session::get('locale')=='en')
											<td class="pro-title"><a href="{{route('Car-detail',$wishlist->Car['slug'])}}">{{$wishlist->Car['titleEN']}}</a></td>
											@else 
											<td class="pro-title"><a href="{{route('Car-detail',$wishlist->Car['slug'])}}">{{$wishlist->Car['title']}}</a></td>
											@endif
											<td class="pro-price"><span>{{$wishlist['amount']}}</span></td>
											<td class="pro-quantity"><span class="text-success">
												@if ($wishlist->Car['stock']>0)
													In stock
												@else
													Out of stock
												@endif
											</span></td>
											<td class="pro-subtotal"><a href="{{route('add-to-cart',$wishlist->Car['slug'])}}" class="btn btn-sqr">										<th class="pro-quantity">{{__('messages.ATC',[],Session::get('locale'))}}</th>
											</a></td>
											<td class="pro-remove"><a href="{{route('wishlist-delete',$wishlist->id)}}"><i class="fa fa-trash-o"></i></a></td>
										</tr>
										@endforeach
										@endif
									@else
									    @if(session('wishlist'))
										@foreach(session('wishlist') as $key=>$wishlist)
										<tr>
											<td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{url('storage/cars/'.$wishlist['photo'])}}" alt="Car" /></a></td>
											<td class="pro-title"><a href="{{route('Car-detail',$wishlist['slug'])}}">{{$wishlist['name']}}</a></td>
											<td class="pro-price"><span>{{$wishlist['price']}}</span></td>
											<td class="pro-quantity"><span class="text-success">
												@if ($wishlist['stock']>0)
													In stock
												@else
													Out of stock
												@endif
											</span></td>
											<td class="pro-subtotal"><a href="{{route('add-to-cart',$wishlist['slug'])}}" class="btn btn-sqr">										<th class="pro-quantity">{{__('messages.ATC',[],Session::get('locale'))}}</th>
											</a></td>
											<td class="pro-remove"><a href="{{route('wishlist-delete',$wishlist['prod_id'])}}"><i class="fa fa-trash-o"></i></a></td>
										</tr>
										@endforeach
										@endif
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Wishlist Page Content End -->
		</div>
	</div>
	<!-- Shopping Cart -->
	
	<!--/ End Shopping Cart -->
			
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

	
	{{-- @include('frontend.layouts.newsletter') --}}
	
	
	
	
	
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush
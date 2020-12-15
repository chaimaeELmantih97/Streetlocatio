@extends('frontend.layouts.master')
@section('title','AlaOR|| Promos')
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
                            <li class="breadcrumb-item active" aria-current="page">Promotions</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- featured Car area start -->
<section class="feature-Car section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">@if (Session::get('locale')=='en')
                        Daily Deals 
                        @else 
                        Promos du Jour
                        @endif
                    </h2>
                    {{-- <p class="sub-title">Add featured cars to weekly lineup</p> --}}
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
                    @foreach($cars as $key=>$Car)
                    <div class="col-md-4 col-lg-3 col-sm-12 mt-5">
                    @if (Session::get('locale')=='en')
                    <!-- Car item start -->
                    <div class="Car-item">
                        <figure class="Car-thumb">
                            <a href="{{route('Car-detail',$Car->slug)}}">
                                <img class="pri-img" src="{{url('storage/cars/'.$Car->photo)}}"
                                    alt="Car">
                                <img class="sec-img" src="{{url('storage/cars/'.$Car->photo)}}"
                                    alt="Car">
                            </a>

                            <div class="Car-badge">
                                @if($Car->stock<=0) <div class="Car-label discount">
                                    <span>Out Of stock</span>
                            </div>
                            @elseif($Car->condition=='new')
                            <div class="Car-label new">
                                <span>New</span>
                            </div>
                            @elseif($Car->condition=='hot')
                            <div class="Car-label new">
                                <span>Hot</span>
                            </div>
                            @else
                            <div class="Car-label discount">
                                <span>{{$Car->discount}}% Off</span>
                            </div>
                            @endif
                            <div class="button-group">
                                <a href="{{route('add-to-wishlist',$Car->slug)}}" data-toggle="tooltip"
                                    data-placement="left" title="{{__('messages.ATW',[],Session::get('locale'))}}"><i
                                        class="pe-7s-like"></i></a>
                                <a href="#" data-toggle="modal" data-target="#modal2{{$Car->id}}"><span
                                        data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                            class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <a title="{{__('messages.ATC',[],Session::get('locale'))}}" class="btn btn-cart"
                                    href="{{route('add-to-cart',$Car->slug)}}">{{__('messages.ATC',[],Session::get('locale'))}}</a>
                            </div>
                        </figure>
                        <div class="Car-caption text-center">
                            <div class="Car-identity">
                                <p class="manufacturer-name"><a href="{{route('Car-detail',$Car->slug)}}">Gold</a></p>
                            </div>
                            {{-- <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul> --}}
                            <h6 class="Car-name">
                                <a
                                    href="{{route('Car-detail',$Car->slug)}}">{{$Car->titleEN}}</a>
                            </h6>
                            <div class="price-box">
                                @php
                                $after_discount=($Car->price-($Car->price*$Car->discount)/100);
                                @endphp
                                <span class="price-regular">{{number_format($after_discount,2)}}</span>
                                <span
                                    class="price-old"><del>{{number_format($Car->price,2)}}</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- Car item end -->
                    @else
                    <!-- Car item start -->
                    <div class="Car-item">
                        <figure class="Car-thumb">
                            <a href="{{route('Car-detail',$Car->slug)}}">
                                <img class="pri-img" src="{{url('storage/cars/'.$Car->photo)}}"
                                    alt="Car">
                                <img class="sec-img" src="{{url('storage/cars/'.$Car->photo)}}"
                                    alt="Car">
                            </a>

                            <div class="Car-badge">
                                @if($Car->stock<=0) <div class="Car-label discount">
                                    <span>Out Of stock</span>
                            </div>
                            @elseif($Car->condition=='new')
                            <div class="Car-label new">
                                <span>New</span>
                            </div>
                            @elseif($Car->condition=='hot')
                            <div class="Car-label new">
                                <span>Hot</span>
                            </div>
                            @else
                            <div class="Car-label discount">
                                <span>{{$Car->discount}}% Off</span>
                            </div>
                            @endif
                            <div class="button-group">
                                <a href="{{route('add-to-wishlist',$Car->slug)}}" data-toggle="tooltip"
                                    data-placement="left" title="{{__('messages.ATW',[],Session::get('locale'))}}"><i
                                        class="pe-7s-like"></i></a>
                                <a href="#" data-toggle="modal" data-target="#modal2{{$Car->id}}"><span
                                        data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                            class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <a title="{{__('messages.ATC',[],Session::get('locale'))}}" class="btn btn-cart"
                                    href="{{route('add-to-cart',$Car->slug)}}">{{__('messages.ATC',[],Session::get('locale'))}}</a>
                            </div>
                        </figure>
                        <div class="Car-caption text-center">
                            <div class="Car-identity">
                                {{-- <p class="manufacturer-name"><a href="Car-details.html">Gold</a></p> --}}
                            </div>
                            {{-- <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul> --}}
                            <h6 class="Car-name">
                                <a href="{{route('Car-detail',$Car->slug)}}">{{$Car->title}}</a>
                            </h6>
                            <div class="price-box">
                                @php
                                $after_discount=($Car->price-($Car->price*$Car->discount)/100);
                                @endphp
                                <span class="price-regular">{{number_format($after_discount,2)}}</span>
                                <span
                                    class="price-old"><del>{{number_format($Car->price,2)}}</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- Car item end -->
                    @endif
                    </div>
                    @endforeach   
        </div>
    </div>
</section>
<!-- featured Car area end -->
@if($cars)
@foreach($cars as $key=>$Car)
<div class="modal" id="modal2{{$Car->id}}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body customC">
                <!-- Car details inner end -->
                <div class="Car-details-inner">
                    @if (Session::get('locale')=='en')
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="Car-large-slider">
                                <div class="pro-large-img img-zoom">
                                    <img src="{{url('storage/cars/'.$Car->photo)}}" alt="Car-details" />
                                </div>
                                @foreach ($Car->images as $img)
                                <div class="pro-large-img img-zoom">
                                    <img src="{{url('storage/cars/'.$img->image)}}" alt="Car-details" />
                                </div>
                                @endforeach
                            </div>
                            <div class="pro-nav slick-row-10 slick-arrow-style">
                                <div class="pro-nav-thumb">
                                    <img src="{{url('storage/cars/'.$Car->photo)}}" alt="Car-details" />
                                </div>
                                @foreach ($Car->images as $img)
                                <div class="pro-nav-thumb">
                                    <img src="{{url('storage/cars/'.$img->image)}}" alt="Car-details" />
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="Car-details-des">
                                <div class="manufacturer-name">
                                    <a href="{{route('Car-detail',$Car->slug)}}">{{$Car->slug}}</a>
                                </div>
                                <h3 class="Car-name">{{$Car->titleEN}}</h3>
                                @php
                                $rate=DB::table('product_reviews')->where('product_id',$Car->id)->avg('rate');
                                $rate_count=DB::table('product_reviews')->where('product_id',$Car->id)->count();
                                @endphp
                                <div class="ratings d-flex">
                                    @for($i=1; $i<=5; $i++) @if($rate>=$i)
                                        <span><i class="fa fa-star-o text-worning"></i></span>
                                        @else
                                        <span><i class="fa fa-star-o"></i></span>
                                        @endif
                                        @endfor
                                        <div class="pro-review">
                                            <span>{{$rate_count}}</span>
                                        </div>
                                </div>
                                <div class="price-box">
                                    @php
                                    $after_discount=($Car->price-($Car->price*$Car->discount)/100);
                                    @endphp
                                    <span class="price-regular" id="p1{{$Car->id}}">{{number_format($after_discount,2)}}</span>
                                    <span class="price-old" id="p2{{$Car->id}}"><del>{{number_format($Car->price,2)}}</del></span>
                                </div>
                                <div class="availability">
                                    @if($Car->stock >0)
                                    <i class="fa fa-check-circle"></i>
                                    <span>{{$Car->stock}} in stock</span>
                                    @else
                                    <i class="fa fa-check-circle text-danger"></i>
                                    <span>Car Out of Stock</span>
                                    @endif
                                </div>
                                <p class="pro-desc">{!! html_entity_decode($Car->summaryEN) !!}</p>
                                {{-- @if (Auth::check()) --}}
                                    <form action="{{route('single-add-to-cart')}}" method="POST">
                                    <input type="text" hidden  name="price" id="price{{$Car->id}}" value="{{number_format($Car->price,2)}}">
                                    <input type="text" hidden  name="size" id="size{{$Car->id}}" value="{{$Car->size}}">
                                    @csrf 
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        @if(count($Car->sizes)>=1)
                                        <label class="mr-2">{{__('messages.taille',[],Session::get('locale'))}}</label>
                                        <select name="sizes" class="sizes" class="sizes nice-select">
                                            @foreach($Car->sizes as $key => $productsize)
                                                <option value="{{ $productsize->id }}#{{ $Car->id }}">  {{ $productsize->sizeEN }} /  {{ $productsize->price }}</option>
                                            @endforeach
                                        </select>
                                       
                                        @endif
                                    </div>
                                        <input type="hidden" name="slug" value="{{$Car->slug}}">
                                        
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1" id="quantity">
                                                </div>
                                            </div>
                                            <div class="action_link">
                                                <button type="submit" class="btn btn-cart2" id="testlkhmiss">{{__('messages.ATC',[],Session::get('locale'))}}</button>
                                            </div>
                                        </div>
                                     </form>
                            {{-- @else
                                 <a href="{{route('add-to-cart',$Car->slug)}}" class="btn btn-cart2" id="testlkhmiss">Add to
                            cart</a>
                            @endif --}}
                                <div class="useful-links">

                                    <a href="{{route('add-to-wishlist',$Car->slug)}}" data-toggle="tooltip"
                                        title="Wishlist"><i class="pe-7s-like"></i>wishlist</a>
                                </div>
                                <div class="default-social">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="Car-large-slider">
                                <div class="pro-large-img img-zoom">
                                    <img src="{{url('storage/cars/'.$Car->photo)}}" alt="Car-details" />
                                </div>
                                @foreach ($Car->images as $img)
                                <div class="pro-large-img img-zoom">
                                    <img src="{{url('storage/cars/'.$img->image)}}" alt="Car-details" />
                                </div>
                                @endforeach
                            </div>
                            <div class="pro-nav slick-row-10 slick-arrow-style">
                                <div class="pro-nav-thumb">
                                    <img src="{{url('storage/cars/'.$Car->photo)}}" alt="Car-details" />
                                </div>
                                @foreach ($Car->images as $img)
                                <div class="pro-nav-thumb">
                                    <img src="{{url('storage/cars/'.$img->image)}}" alt="Car-details" />
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="Car-details-des">
                                <div class="manufacturer-name">
                                    <a href="{{route('Car-detail',$Car->slug)}}">{{$Car->slug}}</a>
                                </div>
                                <h3 class="Car-name">{{$Car->title}}</h3>
                                @php
                                $rate=DB::table('product_reviews')->where('product_id',$Car->id)->avg('rate');
                                $rate_count=DB::table('product_reviews')->where('product_id',$Car->id)->count();
                                @endphp
                                <div class="ratings d-flex">
                                    @for($i=1; $i<=5; $i++) @if($rate>=$i)
                                        <span><i class="fa fa-star-o text-worning"></i></span>
                                        @else
                                        <span><i class="fa fa-star-o"></i></span>
                                        @endif
                                        @endfor
                                        <div class="pro-review">
                                            <span>{{$rate_count}} Reviews</span>
                                        </div>
                                </div>
                                <div class="price-box">
                                    @php
                                    $after_discount=($Car->price-($Car->price*$Car->discount)/100);
                                    @endphp
                                    <span class="price-regular" id="p1{{$Car->id}}">{{number_format($after_discount,2)}}</span>
                                    <span class="price-old" id="p2{{$Car->id}}"><del>{{number_format($Car->price,2)}}</del></span>
                                </div>
                                <div class="availability">
                                    @if($Car->stock >0)
                                    <i class="fa fa-check-circle"></i>
                                    <span>{{$Car->stock}} in stock</span>
                                    @else
                                    <i class="fa fa-check-circle text-danger"></i>
                                    <span>Car Out of Stock</span>
                                    @endif
                                </div>
                                <p class="pro-desc">{!! html_entity_decode($Car->summary) !!}</p>
                                
                                    <form action="{{route('single-add-to-cart')}}" method="POST">
                                    <input type="text" hidden  name="price" id="price{{$Car->id}}" value="{{number_format($Car->price,2)}}">
                                    <input type="text" hidden  name="size" id="size{{$Car->id}}" value="{{$Car->size}}">
                                    @csrf 
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        @if(count($Car->sizes)>=1)
                                        <label class="mr-2">Taille</label>
                                    <select name="sizes" class="sizes" class="sizes nice-select">
                                            @foreach($Car->sizes as $key => $productsize)
                                                <option value="{{ $productsize->id }}#{{ $Car->id }}">  {{ $productsize->size }} /  {{ $productsize->price }}</option>
                                            @endforeach
                                        </select>
                                       
                                        @endif
                                    </div>
                                        <input type="hidden" name="slug" value="{{$Car->slug}}">
                                        
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1" id="quantity">
                                                </div>
                                            </div>
                                            <div class="action_link">
                                                <button type="submit" class="btn btn-cart2" id="testlkhmiss">{{__('messages.ATC',[],Session::get('locale'))}}</button>
                                            </div>
                                        </div>
                                     </form>
                            {{-- @else
                                 <a href="{{route('add-to-cart',$Car->slug)}}" class="btn btn-cart2" id="testlkhmiss">Add to
                            cart</a>
                            @endif --}}
                                
                              
                                <div class="useful-links">

                                    <a href="{{route('add-to-wishlist',$Car->slug)}}" data-toggle="tooltip"
                                        title="Wishlist"><i class="pe-7s-like"></i>wishlist</a>
                                </div>
                                <div class="default-social">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div> <!-- Car details inner end -->
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection
@extends('frontend.layouts.master')

@section('title','E-SHOP || Car PAGE')

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
                            <li class="breadcrumb-item active" aria-current="page">Shop List</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<form action="{{route('shop.filter')}}" method="POST">
    @csrf
    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="sidebar-wrapper">
                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">categories</h5>
                            <div class="sidebar-body">
                                <ul class="shop-categories">
                                    @php
                                        // $category = new Category();
                                        $menu=App\Models\Category::getAllParentWithChild();
									@endphp
                                    @if($menu)
                                    @foreach($menu as $cat_info)
                                        {{-- @if ($cat_info->isparent==1) --}}
                                        <li class="mt-2 "><a href="{{route('Car-cat',$cat_info->slug)}}" class="{{ (request()->segment(2) == $cat_info->slug) ? 'active' : '' }}"  style="font-size: 26px;"> 
                                            @if (Session::get('locale')=='en')
                                            {{$cat_info->titleEN}}
                                            @else 
                                            {{$cat_info->title}}
                                            @endif
                                        </a></li>
                                        {{-- @endif --}}
                                        @if($cat_info->child_cat->count()>0)
                                            <li class="mt-2">
                                                @foreach($cat_info->child_cat as $sub_menu)
                                                    <li><a  style="font-size: 20px; margin-left:14px;" class="{{ (request()->segment(3) == $cat_info->slug) ? 'active' : '' }}" href="{{route('Car-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">  <i ></i>
                                                        @if (Session::get('locale')=='en')
                                                        {{$sub_menu->titleEN}}
                                                        @else 
                                                        {{$sub_menu->title}}
                                                        @endif
                                                    </a></li>
                                                @endforeach
                                            </li>
                                       @endif
                                     @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- single sidebar end -->

                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">price</h5>
                            <div class="sidebar-body">
                                <div class="price-range-wrap">
                                    @php
                                    $max=DB::table('cars')->max('price');
                                    // dd($max);
                                    @endphp
                                    <div class="price-range" data-min="1" data-max="{{$max}}"></div>
                                    <div class="range-slider">
                                        {{-- <form action="#" class="d-flex align-items-center justify-content-between"> --}}
                                            <div class="price-input">
                                                <label for="amount">Price: </label>
                                                <input type="text" id="amount" value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif" name="price_range">
                                            </div>
                                            <button class="filter-btn" type="submit">filter</button>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single sidebar end -->

                        <!-- single sidebar start -->
                        {{-- <div class="sidebar-banner">
                            <div class="img-container">
                                <a href="#">
                                    <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                                </a>
                            </div>
                        </div> --}}
                        <!-- single sidebar end -->
                    </aside>
                </div>
                <!-- sidebar area end -->

                <!-- shop main wrapper start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-Car-wrapper">
                        <!-- shop Car top wrap start -->
                        <div class="shop-top-bar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                    <div class="top-bar-left">
                                        <div class="Car-view-mode">
                                            <a class="active" href="#" data-target="grid-view" data-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                            <a href="#" data-target="list-view" data-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                        </div>
                                        <div class="Car-amount">
                                            <select class="show" name="show" onchange="this.form.submit();">
                                                <option value="">show</option>
                                                <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9' )
                                                    selected @endif>09</option>
                                                <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15' )
                                                    selected @endif>15</option>
                                                <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21' )
                                                    selected @endif>21</option>
                                                <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30' )
                                                    selected @endif>30</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                    <div class="top-bar-right">
                                        <div class="Car-short">
                                            <p>Sort By : </p>
                                            <select class="nice-select" name='sortBy' onchange="this.form.submit();">
                                                <option value="">Default</option>
                                                <option value="title" @if(!empty($_GET['sortBy']) &&
                                                    $_GET['sortBy']=='title' ) selected @endif>Name</option>
                                                <option value="price" @if(!empty($_GET['sortBy']) &&
                                                    $_GET['sortBy']=='price' ) selected @endif>Price</option>
                                                <option value="category" @if(!empty($_GET['sortBy']) &&
                                                    $_GET['sortBy']=='category' ) selected @endif>Category</option>
                                                {{-- <option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>Brand</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop Car top wrap start -->

                        <!-- Car item list wrapper start -->
                        <div class="shop-Car-wrap list-view row mbn-30">
                            @if(count($cars))
                                @foreach($cars as $Car)
                                <!-- Car single item start -->
                                <div class="col-md-4 col-sm-6">
                                    <!-- Car grid start -->
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
                                                    data-placement="left" title="Add to wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#modal2{{$Car->id}}"><span
                                                        data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                                            class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <a title="Add to cart" class="btn btn-cart"
                                                    href="{{route('add-to-cart',$Car->slug)}}">Add to cart</a>
                                            </div>
                                        </figure>
                                        <div class="Car-caption text-center">
                                            <ul class="color-categories">
                                            </ul>
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
                                    <!-- Car grid end -->

                                    <!-- Car list item end -->
                                    <div class="Car-list-item">
                                        <figure class="Car-thumb">
                                            <a href="{{route('Car-detail',$Car->slug)}}">
                                                <img class="pri-img" src="{{url('storage/cars/'.$Car->photo)}}" alt="Car">
                                                <img class="sec-img" src="{{url('storage/cars/'.$Car->photo)}}" alt="Car">
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
                                                    data-placement="left" title="Add to wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#modal2{{$Car->id}}"><span
                                                        data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                                            class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <a  href="{{route('add-to-cart',$Car->slug)}}" class="btn btn-cart">add to cart</a >
                                                    
                                            </div>
                                        </figure>
                                        <div class="Car-content-list">
                                            <div class="manufacturer-name">
                                                <a href="{{route('Car-detail',$Car->slug)}}">{{$Car->slug}}</a>
                                            </div>
                                            <h5 class="Car-name"><a href="{{route('Car-detail',$Car->slug)}}">{{$Car->title}}</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">{{number_format($after_discount,2)}}</span>
                                                <span class="price-old"><del>{{number_format($Car->price,2)}}</del></span>
                                            </div>
                                            <p>{!!($Car->summary)!!}</p>
                                        </div>
                                    </div>
                                    <!-- Car list item end -->
                                </div>
                                @endforeach
                                
                                @else 
                                <div class="d-flex justify-content-center align-items-center text-center" style="width: 100%; height:100%;">
                                    <img src="storage/out-of-stock.png" alt="">
                                    {{-- <p></p> --}}
                               </div>
                                 @endif
                            <!-- Car single item start -->
                        </div>
                        <!-- Car item list wrapper end -->

                        <!-- start pagination area -->
                        <!-- end pagination area -->
                    </div>
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
</form>
<!-- Modal -->
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
                                    <span class="price-old"><del id="p2{{$Car->id}}">{{number_format($Car->price,2)}}</del></span>
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
                                                <button type="submit" class="btn btn-cart2" id="testlkhmiss">Add to cart</button>
                                            </div>
                                        </div>
                                     </form>
                                <div class="useful-links mt-2">

                                    <a href="{{route('add-to-wishlist',$Car->slug)}}" data-toggle="tooltip"
                                        title="Wishlist"><i class="pe-7s-like"></i>wishlist</a>
                                </div>
                                <div class="default-social mt-2">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Car details inner end -->
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
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

<!-- Modal end -->
<script>
    var cars=@json($Car);
    console.log(cars);
    // var productsizes = @json($Car->sizes);
    
    $('.sizes').on('change', function() {
        var arr = $(this).val().split('#');
        var size_id = arr[0];
        // console.log(size_id);
        var price = null;
        var size = null;
        var discount= null;
        var Car=cars.find(x => (x.id== arr[1]));
        // console.log(Car);
        for(const element of Car.sizes) {
            discount=Car.discount;
            console.table(element);
            if(element.id == size_id) {
                console.log('true');
                price = element.price;
                console.log('price '+price);
                size = element.size;
            }
        }

        $('#p2'+Car.id).html(`${price.toFixed(2)}`);
        let Pafter=(price-(price*discount)/100);
        // alert(Pafter);
        $('#p1'+Car.id).html(`${Pafter.toFixed(2)}`);
        $('#price'+Car.id).val(Pafter.toFixed(2));
        $('#size'+Car.id).val(size_id);

        
    });
</script>
@endsection
@push ('styles')
<style>
    .pagination {
        display: inline-flex;
    }

    .filter_button {
        /* height:20px; */
        text-align: center;
        background: #F7941D;
        padding: 8px 16px;
        margin-top: 10px;
        color: white;
    }

</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

{{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
type:"POST",
data:{
_token:"{{csrf_token()}}",
quantity:quantity,
pro_id:pro_id
},
success:function(response){
console.log(response);
if(typeof(response)!='object'){
response=$.parseJSON(response);
}
if(response.status){
swal('success',response.msg,'success').then(function(){
document.location.href=document.location.href;
});
}
else{
swal('error',response.msg,'error').then(function(){
// document.location.href=document.location.href;
});
}
}
})
});
</script> --}}
<script>
    $(document).ready(function () {
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt($("#slider-range").data('max')) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value + '-' + max_value;
            if ($("#price_range").length > 0 && $("#price_range").val()) {
                price_range = $("#price_range").val().trim();
            }

            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  " + currency + ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
        }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  " + m_currency + $("#slider-range").slider("values", 1));
        }
    })

</script>

@endpush

<!DOCTYPE html>
<html>
<head>
  <title>demande @if($demande)- {{$demande->demande_numero}} @endif</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

@if($demande)
<style type="text/css">
  .invoice-header {
    padding: 10px 20px 10px 20px;
    border-bottom: 1px solid gray;
  }
  .site-logo {
    margin-top: 20px;
  }
  .invoice-right-top h3 {
    padding-right: 20px;
    margin-top: 20px;
    color: rgb(0, 0, 0);
    font-size: 30px!important;
    font-family: serif;
  }
  .invoice-left-top {
    border-left: 4px solid rgba(168, 157, 1, 0.808);
    padding-left: 20px;
    padding-top: 20px;
  }
  .invoice-left-top p {
    margin: 0;
    line-height: 20px;
    font-size: 16px;
    margin-bottom: 3px;
  }
  thead {
    background:  rgb(255, 255, 255);
    color: rgb(0, 0, 0);
  }
  .authority h5 {
    margin-top: -10px;
    color:  rgb(0, 0, 0);
  }
  .thanks h4 {
    color:  rgb(0, 0, 0);
    font-size: 25px;
    font-weight: normal;
    font-family: serif;
    margin-top: 20px;
  }
  .site-address p {
    line-height: 6px;
    font-weight: 300;
  }
  .table tfoot .empty {
    border: none;
  }
  .table-bordered {
    border: none;
  }
  .table-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
  }
  .table td, .table th {
    padding: .30rem;
  }
</style>
  <div class="invoice-header">
    <div class="float-left site-logo">
     @php
           $settings=DB::table('settings')->get();
    @endphp  
 @foreach($settings as $data)
      <img src="{{url('storage/settings/'.$data->logo)}}" alt="">
    </div>
    <div class="float-right site-address">
      <h4>StreetLocation </h4>
          <p>{{$data->address}}</p>
      <p>Tel: <a style="color:black; text-decoration:none" href="tel:{{$data->phone}}">{{$data->phone}}</a></p>
      <p>Email: <a style="color:black; text-decoration:none" href="mailto:{{$data->email}}">{{$data->email}}</a></p>
        
      
    </div>  
@endforeach
    <div class="clearfix"></div>
  </div>
  <div class="invoice-description">
    <div class="invoice-left-top float-left">
      <h6>Facture à</h6>
       <h3>{{$demande->prenom}} {{$demande->nom}}</h3>
       <div class="address">
        <p>
          <strong>ville: </strong>
          {{$demande->ville}}
        </p>
         <p><strong>Phone:</strong> {{ $demande->tel }}</p>
         <p><strong>Email:</strong> {{ $demande->email }}</p>
       </div>
    </div>
    <div class="invoice-right-top float-right" class="text-right">
      <h3>Facture #{{$demande->demande_numero}}</h3>
      <p>{{ $demande->created_at->format('d/m/Y') }}</p>
      {{-- <img class="img-responsive" src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(150)->generate(route('admin.product.order.show', $order->id )))}}"> --}}
    </div>
    <div class="clearfix"></div>
  </div>
  <section class="order_details pt-3">
    <div class="table-header">
      <h5>Details de la demande</h5>
    </div>
    <table class="table table-bordered table-stripe">
      <thead>
        <tr>
          <th scope="col" class="col-6">Voiture</th>
          <th scope="col" class="col-3">Prix par jour </th>
          <th scope="col" class="col-3">Total</th>
        </tr>
      </thead>
      <tbody>
      @php 
        $car=App\Models\Car::find($demande->car_id);
      @endphp
        <tr>
          <td><span>
                {{$car->title}}
            </span></td>
          <td>{{$car->prix_location}}</td>
          <td><span>{{number_format($demande->total,2)}}</span></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Total de la reservation:</th>
          <th scope="col"> <span>{{number_format($demande->total,2)}}</span></th>
        </tr>
      {{-- @if(!empty($order->coupon))
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Discount:</th>
          <th scope="col"><span>-{{$order->coupon->discount(Helper::orderPrice($order->id, $order->user->id))}}{{Helper::base_currency()}}</span></th>
        </tr>
      @endif --}}
        {{-- <tr>
          <th scope="col" class="empty"></th>
          @php
            $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
          @endphp
          <th scope="col" class="text-right ">Shipping:</th>
          <th><span>${{number_format($shipping_charge[0],2)}}</span></th>
        </tr> --}}
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Total:</th>
          <th>
            <span>
                {{number_format($demande->total,2)}}
            </span>
          </th>
        </tr>
      </tfoot>
    </table>
  </section>
  <div class="thanks mt-3">
    <h4>Merci</h4>
  </div>
  <div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5> Signature:</h5>
  </div>
  <div class="clearfix"></div>
@else
  <h5 class="text-danger">Invalid</h5>
@endif
</body>
</html>
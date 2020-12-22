@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">Demande de reservation       <a href="{{route('demande.pdf',$demande->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generer un PDF</a>
  </h5>
  <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="Car-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Numero</th>
              <th>Nom/Prenom</th>
              <th>Email</th>
              <th>Tel</th>
              <th>Ville</th>
              <th>date_Debut</th>
              <th>date_Fin</th>
              <th>Voiture</th>
              <th>Prix/jour</th>
              <th>Total</th>
              <th>Cin</th>
              <th>Permis</th>
              <th>status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
                     @php
                        $car=App\Models\Car::find($demande->car_id);
                     @endphp  
                <tr>
                    <td>{{$demande->id}}</td>
                    <td>{{$demande->demande_numero}}</td>
                    <td>{{$demande->nom}} {{$demande->prenom}} </td>
                    <td>{{$demande->email}}</td>
                    <td>{{$demande->tel}}</td>
                    <td>{{$demande->ville}}</td>
                    <td>{{$demande->from}}</td>
                    <td>{{$demande->to}}</td>
                   
                    <td>{{$car->title}}</td>
                    <td>{{$car->prix_location}}</td>
                    <td>{{$demande->total}}</td>
                    <td>
                        @if($demande->cin)
                            <img src="{{url('storage/demandes/'.$demande->cin)}}" class="img-fluid" style="max-width:80px" alt="CIN">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                        @endif
                    </td>
                    <td>
                        @if($demande->permis)
                            <img src="{{url('storage/demandes/'.$demande->permis)}}" class="img-fluid" style="max-width:80px" alt="Permit">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                        @endif
                    </td>
                    <td>
                        @if($demande->status=='nouvel')
                            <span class="badge badge-warning">{{$demande->status}}</span>
                        @elseif($demande->status=='annulée')
                            <span class="badge badge-danger">{{$demande->status}}</span>
                        @elseif($demande->status=='validée')
                            <span class="badge badge-success">{{$demande->status}}</span>
                        @endif
                    </td>
                    <td style="width:200px">
                    @if ($demande->status=='nouvel')
                        <form method="post" action="{{route('demandes.update',$demande->id)}}" enctype="multipart/form-data">
                          @csrf 
                          @method('PATCH')
                          <input type="hidden" value="{{$demande->from}}" name="from">
                          <input type="hidden" value="{{$demande->to}}" name="to">
                          <input type="hidden" value="{{$demande->car_id}}" name="car_id">
                            <button type="submit" class="btn btn-primary btn-sm float-left mr-1"  data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-check"></i>Valider </button>
                            </form>
                    @endif
                    @php
                        $date = date('d/m/Y', time());
                    @endphp
                    @if($date>=$demande->from)
                    <form method="POST" action="{{route('demandes.destroy',[$demande->id])}}">
                      @csrf 
                      @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" disabled data-id={{$demande->id}}  data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-window-close"></i>Annuler </button>
                        </form>
                    @else
                    <form method="POST" action="{{route('demandes.destroy',[$demande->id])}}">
                      @csrf 
                      @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$demande->id}}  data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-window-close"></i>Annuler </button>
                        </form>
                    @endif
                    </td>
                </tr>  
          </tbody>
        </table>
      </div>
      <section class="confirmation_part section_padding" style="margin-top:20px">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">Information de la demande</h4>
              <table class="table">
                    <tr class="">
                        <td>Numero de la demande</td>
                        <td> : {{$demande->demande_numero}}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td> : {{$demande->created_at->format('d/m/Y')}}  </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td> : {{$demande->status}}</td>
                    </tr>
                    <tr>
                        <td>Voiture</td>
                        <td> : {{$car->title}}</td>
                    </tr>
                    <tr>
                        <td>Prix par jour</td>
                        <td> : {{$car->prix_location}}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td> : {{number_format($demande->total,2)}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">Information de Client</h4>
              <table class="table">
                    <tr class="">
                        <td>Nom-Prénom</td>
                        <td> : {{$demande->nom}} {{$demande->prenom}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$demande->email}}</td>
                    </tr>
                    <tr>
                        <td>Tel</td>
                        <td> : {{$demande->tel}}</td>
                    </tr>
                    <tr>
                        <td>CIN</td>
                        <td> : <a target="_blanck" href="{{url('storage/demandes/'.$demande->cin)}}">voir la photo</a></td>
                    </tr>
                    <tr>
                        <td>Permis</td>
                        <td> : <a target="_blanck" href="{{url('storage/demandes/'.$demande->permis)}}">voir la photo</a></td>
                    </tr>
                    <tr>
                        <td>Ville</td>
                        <td> : {{$demande->ville}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
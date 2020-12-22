@extends('backend.layouts.master')

@section('main-content')

<style>
    /* .imgZ:hover{
        width: 300px;
        object-fit: cover;
    } */
</style>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Liste des demandes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($demandes)>0)
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
                    @foreach($demandes as $demande)
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
                            {{-- @if($demande->cin)
                            <img src="{{url('storage/demandes/'.$demande->cin)}}" class="img-fluid imgZ"
                                style="max-width:80px" alt="CIN">
                            @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid"
                                style="max-width:80px" alt="avatar.png">
                            @endif --}}
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#cin{{$demande->id}}">
                                <i class="fa fa-id-card"></i>
                              </button>
                        </td>
                        <td>
                            {{-- @if($demande->permis)
                            <img src="{{url('storage/demandes/'.$demande->permis)}}" class="img-fluid imgZ"
                                style="max-width:80px" alt="Permit">
                            @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid"
                                style="max-width:80px" alt="avatar.png">
                            @endif --}}
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#permit{{$demande->id}}">
                                <i class="fa fa-id-card"></i>
                              </button>
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
                        <td colspan="2" style="width:200px">
                            <a href="{{route('demandes.show',$demande->id)}}"
                                class="btn btn-dark btn-sm float-left mr-1"
                                style="height:30px" data-toggle="tooltip" title="view"
                                data-placement="bottom"><i class="fas fa-eye"></i></a>
                            @if ($demande->status=='nouvel')
                            <form method="post" action="{{route('demandes.update',$demande->id)}}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" value="{{$demande->from}}" name="from">
                                <input type="hidden" value="{{$demande->to}}" name="to">
                                <input type="hidden" value="{{$demande->car_id}}" name="car_id">
                                <button type="submit" class="btn btn-primary btn-sm float-left mr-1"
                                    data-toggle="tooltip" title="edit" data-placement="bottom"><i
                                        class="fas fa-check"></i></button>
                            </form>
                            @endif
                            @php
                            $date = date('d/m/Y', time());
                            @endphp
                            @if($date>=$demande->from && $demande->status=='validée' )
                            <form method="POST" action="{{route('demandes.destroy',[$demande->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" disabled data-id={{$demande->id}}
                                    data-toggle="tooltip" data-placement="bottom" title="Delete"><i
                                        class="fas fa-window-close"></i> </button>
                            </form>
                            @else
                            <form method="POST" action="{{route('demandes.destroy',[$demande->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$demande->id}}
                                    data-toggle="tooltip" data-placement="bottom" title="Delete"><i
                                        class="fas fa-window-close"></i> </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade  bd-example-modal-lg" id="cin{{$demande->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">L'image de cin</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body d-flex align-items-center justify-content-center">
                                <img src="{{url('storage/demandes/'.$demande->cin)}}" class="img-fluid imgZ"
                                style="max-width:800px" alt="CIN">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade  bd-example-modal-lg" id="permit{{$demande->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">L'image de permis</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body d-flex align-items-center justify-content-center">
                                <img src="{{url('storage/demandes/'.$demande->permis)}}" class="img-fluid imgZ"
                                style="max-width:800px" alt="Permis">
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                </tbody>
            </table>
            {{-- <span style="float:right">{{$demandes->links()}}</span> --}}
            @else
            <h6 class="text-center">Il n'y a pas de demandes</h6>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<style>
    div.dataTables_wrapper div.dataTables_paginate {
        display: none;
    }

    .zoom {
        transition: transform .2s;
        /* Animation */
    }

    .zoom:hover {
        transform: scale(5);
    }

</style>
@endpush

@push('scripts')

<!-- Page level plugins -->
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
  <!-- Page level custom scripts -->

  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#Car-dataTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'csv','pdf',
            ]
            } );
    //  $('#order-dataTable').DataTable({
    //      "responsive":true,
    //      "buttons":["copy","csv","excel","pdf"]
    //  });

  </script>
<script>

    function deleteData(id) {

    }

</script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e) {
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            // alert(dataID);
            e.preventDefault();
            swal({
                    title: "Etes-vous sûr ?",
                    text: "l'Annulation de cette demande entraînera la suppression de celle-ci et les fichiers qui s'y rapportent",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    } else {
                        swal("Vos données sont en sécurité !");
                    }
                });
        })
    })

</script>
@endpush

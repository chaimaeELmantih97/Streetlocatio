@extends('backend.layouts.master')

@section('main-content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Liste des voitures</h6>
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
                            @if($demande->cin)
                            <img src="{{url('storage/demandes/'.$demande->cin)}}" class="img-fluid"
                                style="max-width:80px" alt="CIN">
                            @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid"
                                style="max-width:80px" alt="avatar.png">
                            @endif
                        </td>
                        <td>
                            @if($demande->permis)
                            <img src="{{url('storage/demandes/'.$demande->permis)}}" class="img-fluid"
                                style="max-width:80px" alt="Permit">
                            @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid"
                                style="max-width:80px" alt="avatar.png">
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
                            <a href="{{route('demandes.show',$demande->id)}}"
                                class="btn btn-warning btn-sm float-left mr-1"
                                style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view"
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
                                        class="fas fa-check"></i>Valider </button>
                            </form>
                            @endif
                            @php
                            $date = date('d/m/Y', time());
                            @endphp
                            @if($date>=$demande->from)
                            <form method="POST" action="{{route('demandes.destroy',[$demande->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" disabled data-id={{$demande->id}}
                                    data-toggle="tooltip" data-placement="bottom" title="Delete"><i
                                        class="fas fa-window-close"></i>Annuler </button>
                            </form>
                            @else
                            <form method="POST" action="{{route('demandes.destroy',[$demande->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$demande->id}}
                                    data-toggle="tooltip" data-placement="bottom" title="Delete"><i
                                        class="fas fa-window-close"></i>Annuler </button>
                            </form>
                            @endif
                        </td>
                    </tr>
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

<!-- Page level custom scripts -->
<script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
<script>
    $('#Car-dataTable').DataTable({
        "scrollX": false "columnDefs": [{
            "orderable": false,
            "targets": [10, 11, 12]
        }]
    });

    // Sweet alert

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

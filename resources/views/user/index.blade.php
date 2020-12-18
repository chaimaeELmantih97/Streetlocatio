@extends('frontend.layouts.master')

@section('title','ALaOr || User Dashboard')

@section('main-content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .snippet{
        border:none;
        background: #F5F5F5;
    }
    body{
        background: #F5F5F5;
    }
</style>
<!-- Breadcrumbs -->
<div class="block-title">
    <div class="block-title__inner section-bg section-bg_second">
        <div class="bg-inner">
            <h1 class="ui-title-page">Mon Profil</h1>
            <div class="decor-1 center-block"></div>
            {{-- <ol class="breadcrumb">
                <li><a href="{{route('home')}}">HOME</a></li>
            <li class="active">Profil</li>
            </ol> --}}
        </div><!-- end bg-inner -->
    </div><!-- end block-title__inner -->
</div>
@php
$profile=Auth()->user();
@endphp


<div class="container bootstrap snippet">
    <form class=" px-4 pt-2 pb-3" method="POST"  action="{{route('user-profile-update',$profile->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        {{-- <form class="border px-4 pt-2 pb-3" method="POST" action="{{route('user-profile-update',$profile->id)}}" enctype="multipart/form-data"> --}}
        <div class="col-sm-3">
            <!--left col-->
            <div class="text-center">
                @if(Auth::user()->photo)
                <img src="{{url('storage/users/'.Auth::user()->photo)}}" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                @else 
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                @endif
                
                <h6 style="margin-top: 30px; margin-bottom: 30px">Modifier votre photo de profil...</h6>
                <input type="file" class="text-center center-block file-upload" name="photo">
            </div>
            </hr><br>
        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                {{-- <li class="nav-item active"><a class="nav-link" data-toggle="tab" href="#home"> Tableau de bord </a></li> --}}
                <li class="nav-item active"><a class="nav-link" data-toggle="tab" href="#messages">Profil</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Demandes/Reséeravtions</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="messages" style="background: #F5F5F5">

                    <h2></h2>

                    <hr>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>Nom Complet</h4>
                                </label>
                                <input type="text" class="form-control" name="name"placeholder="Nom" value="{{$profile->name}}"
                                     title="Entrez votre Nom">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email2" disabled 
                                value="{{Auth::user()->email}}">
                                <input type="hidden" class="form-control" name="email"
                                value="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Ancien Mot de Passe</h4>
                                </label>
                                <input type="password" class="form-control" name="current_password" id="password"
                                    placeholder="Ancien mot de passe" title="enter your password.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Nouveau Mot de Passe</h4>
                                </label>
                                <input type="password" class="form-control" name="new_password" id="password2"
                                    placeholder="nouveau mot de passe" title="enter your password2.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn " style="background-color: red; color:white; border-bottom:2Px solid gray" type="submit"><i
                                        class="fa fa-check mr-2"></i> Save</button>
                                {{-- <button class="btn " style="background-color: gray; color:white; border-bottom:2Px solid red" type="reset"><i class="fa fa-repeat"></i>
                                    Reset</button> --}}
                            </div>
                        </div>
                    {{-- </form> --}}

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="settings" style="background: #F5F5F5">
                    @php
                    $demandes=DB::table('demande_reservations')->where('email',Auth::user()->email)->paginate(10);
                    @endphp
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>Numero de demande</th>
                                <th> Nom
                                </th>
                                <th>Email</th>
                                <th>TEL </th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(count($demandes)>0)
                            @foreach($demandes as $demande)
                            <tr>
                                <td>{{$demande->id}}</td>
                                <td>{{$demande->demande_numero}}</td>
                                <td>{{$demande->nom}} {{$demande->prenom}}</td>
                                <td>{{$demande->email}}</td>
                                <td>{{$demande->tel}}</td>
                                <td>{{number_format($demande->total,2)}}</td>
                                <td>
                                    @if($demande->status=='nouvel')
                                    <span
                                        class="badge badge-danger">{{$demande->status}}</span>
                                    @elseif($demande->status=='validée')
                                    <span
                                        class="badge badge-danger">{{$demande->status}}</span>
                                    @elseif($demande->status=='annulée')
                                    <span
                                        class="badge badge-danger">{{$demande->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('demande.pdf',$demande->id)}}" class=" btn btn-sm  shadow-sm float-right text-danger"><i class="fa fa-download fa-sm text-danger"></i> Generer un PDF</a>   
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <td colspan="8" class="text-center">
                                <h4 class="my-4">
                                    Vous n'avez pas encore de demande !! 
                                </h4>
                            </td>
                            @endif

                        </tbody>
                    </table>
                    {{$demandes->links()}}
                   
                   
                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
</form>
    <!--/col-9-->
</div>

<script>
    $(document).ready(function () {


        var readURL = function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function () {
            readURL(this);
        });
    });

</script>



</div>
@endsection

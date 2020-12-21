<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RECU</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap');
    </style>
    <style>
        * {
            font-family: 'Ubuntu', sans-serif;
        }
        @font-face {
            font-family: 'Ubuntu', sans-serif;
            src: url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap");
        }
    </style>
</head>
<body>
    <table style="width: 100%;">
        <tr style="width: 100%;">
            <td colspan="3" style="text-align: center;">
                {{-- <img src="{{url('/storage/no-car.png')}}" width="100" alt=""> --}}
                <h1> <strong>S<em>treetLocation<em></strong></h1>
            </td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr style="width: 100%;">
            <td colspan="3" style="text-align: center;">
                <h3>MERCI POUR VOTRE RESERVATION</h3>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; border-bottom: 1px solid #A01010;">
                <h3 style="margin-top: -10px;">NUMÉRO DE RESERVATION: <span style="color: #A01010">#{{ $demande->demande_numero }}</span></h3>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr style="width: 100%;">
            <td style="width: 100%;">
                <table style="width: 100%;">
                    <tr style="width: 100%;">
                        <td colspan="2" style="border-bottom: 1px solid #A01010;">
                            <h4>Voiture</h4>
                        </td>
                    </tr>
                    @php 
                    $car=App\Models\Car::find($demande->car_id);
                  @endphp
                    <tr style="width: 100%;">
                        <td >
                            <p>Titre:</p>
                        </td>
                        <td style="float: right">
                          <p>{{ $car->title }}</p>
                      </td>
                         
                        <td >
                          <p>Prix par jour: </p>
                      </td>
                       <td style="float: right">
                              <p>{{ $car->prix_location }} MAD</p>
                          </td>
                    </tr>
                    <tr style="width: 100%;height:50px;">
                     
                    </tr>
                </table>
            </td>
            
        </tr>
                    <tr style="width: 100%; margin-top:200px;margin-top:100px;">
                        <td  style="border-bottom: 1px solid #A01010;">
                          Categories
                        </td>
                        <td style="border-bottom: 1px solid #A01010;">
                          Modele/Année:
                         </td>
                    </tr>
                    <tr style="width: 100%;">
                        <td style="width: 100%;">
                            <p>{{ $car->categorie }}</p>
                        </td>
                        <td style="float: right; width: 100%;">
                            <p>{{ $car->modele }} / {{ $car->annee_modele }}</p>
                        </td>
                    </tr>
                    {{-- <tr style="width: 100%;">
                        <td style="width: 100%;">
                            <p>Lieu de dépose: </p>
                        </td>
                        <td style="float: right; width: 100%;">
                            <p>{{ $demande->to }}</p>
                        </td>
                    </tr> --}}
                
    </table>
    {{-- <table style="width: 100%;">
        <tr style="100%">
            <td colspan="6" style="border-bottom: 1px solid #A01010; width: 100%;">
                <h4>Catégorie réservée</h4>
            </td>
        </tr>
        <tr style="width: 100%;">
            <td colspan="3" style="width: 100%;">
                <p>{{ $demande->name }}</p>
            </td>
            <td colspan="3" style="width: 100%;">
                <p>{{ $demande->vantype }}</p>
            </td>
            <td style="width: 100%;">
                <p>{{ $demande->description }}</span></p>
            </td>
        </tr>
    </table> --}}
    <table style="width: 100%">
        <tr style="width: 100%;">
            <td colspan="4" style="border-bottom: 1px solid #A01010; width: 100%;">
                <h4>Informations sur le client</h4>
            </td>
        </tr>
        <tr style="width: 100%;">
            <td colspan="3" style="width: 100%;">
                <p>Nom et Prénom :  <span>{{ $demande->nom }} {{ $demande->prenom }}</span></p>
            </td>
            <td style="width: 100%;">
                <p>Ville: <span>{{ $demande->ville }}</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 100%;">
                <p>Tel:  <span>{{ $demande->tel }}</span></p>
            </td>
            <td style="width: 100%;">
                <p>Email:  <span>{{ $demande->email }}</span></p>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr style="100%">
            <td colspan="4" style="border-bottom: 1px solid #A01010; width: 100%;">
                <h4>TOTAL</h4>
            </td>
        </tr>
        <tr style="width: 100%;">
            <td colspan="3" style="width: 100%;">
                <p>Paiement à l'arrivée</p>
            </td>
            <td style="float: right; width: 100%;">
                <p>{{number_format($demande->total,2)}} MAD</span></p>
            </td>
        </tr>
    </table>
    <table style="width: 100%; margin-top: 10px;">
        <tr>
            <td style="border-bottom: 1px solid #A01010;">
                <h4>CONDITIONS DE REGLEMENT</h4>
            </td>
        </tr>
        <tr>
            <td>
                <p style="text-align: justify; text-justify: inter-word;">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore dolorem magni nisi fuga ut maxime aperiam aliquid molestias odit, neque quasi sit quidem quam earum modi cupiditate esse illum quae!
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
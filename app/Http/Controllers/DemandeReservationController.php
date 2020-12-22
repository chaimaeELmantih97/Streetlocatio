<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use File;
use PDF;
use App\Models\CarImage;
use App\Models\ProductSize;
use App\Models\Unavailable;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\DemandeReservation;
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Mail;
use DB;
use Auth;
class DemandeReservationController extends Controller
{
    public function index()
    {
        if(Auth::user()->role!='admin'){
            toastr()->success("vous n'avez pas le droit d'accéder à cette page ");
            return redirect()->route('home');
        }else{
        $demandereservations=DemandeReservation::orderBy('created_at', 'desc')->get();
        // return $cars;
        return view('backend.demandes.index')->with('demandes',$demandereservations);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //     $brand=Brand::get();
    //     $category=Category::where('is_parent',1)->get();
        // return $category;
        return view('backend.Car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $demande=DemandeReservation::find($id);
        return view('backend.demandes.show')->with('demande',$demande);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $demande=DemandeReservation::findOrFail($id);
        return view('backend.demandes.edit')->with('demande',$demandes);
    }


        // PDF generate
        public function pdf(Request $request){
            
            $demande=DemandeReservation::find($request->id);
            // return $order;
            $file_name=$demande->demande_numero.'-'.$demande->prenom.'.pdf';
            // return $file_name;
            $pdf=PDF::loadview('backend.demandes.pdf',compact('demande'));
            return $pdf->download($file_name);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $unavailable=Unavailable::create($data); 
        $demande=DemandeReservation::findOrFail($id);        
         // validation d'une demande 
        $demande->update(['status' => 'validée']);
        $nom=$demande->nom.' '.$demande->prenom;
        $body="Salut ".$nom." nous avons traité votre commande et elle a été validée. Assurez-vous de vous présenter à notre agence à la date d'enlèvement. \n\n
        Le total est de  ".$demande->total ."MAD.";
        Mail::to($demande->email)->send(new NotificationEmail($body,null,null));

        if($demande){
            request()->session()->flash('success','Demande Validée');
        }
        else{
            request()->session()->flash('error','Opps Erreur!!');
        }
        return redirect()->route('demandes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demande=DemandeReservation::findOrFail($id);
        DB::table('unavailables')->where('car_id', $demande->car_id)->where('from', $demande->from)->where('to', $demande->to)->delete();
        $nom=$demande->nom.' '.$demande->prenom;
        $body="Salut ".$nom." Bonjour Rayane, nous avons traité votre commande et elle a été annulée pour les raisons suivantes : \n
        le manque d'informations / de documents et certaines raisons de sécurité. \n\n
        n'oubliez pas de revérifier notre site web et d'essayer de passer une nouvelle demande";
        Mail::to($demande->email)->send(new NotificationEmail($body,null,null));
        $status=$demande->delete();
        if($status){
            request()->session()->flash('success','Demande Annuléé');
        }
        else{
            request()->session()->flash('error','Opps Erreur');
        }
        return redirect()->route('demandes.index');
    }

}

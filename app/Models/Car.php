<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
class Car extends Model
{
    protected $fillable=['title', 'slug', 'summary', 'description', 'photo', 'status', 'is_featured', 'modele', 'annee_modele', 'categorie', 'carburant', 'boite_vitesses', 'passagers', 'portes', 'prix_location', 'immatriculation', 'disponible' ];

    
    public static function getAllProduct(){
        return Car::where('status','active')->paginate(10);
    }
   
    public function getReview(){
        return $this->hasMany('App\Models\ProductReview','product_id','id')->with('user_info')->where('status','active')->orderBy('id','DESC');
    }
    public static function getProductBySlug($slug){
        return Car::with(['getReview'])->where('slug',$slug)->first();
    }
    public static function countActiveProduct(){
        $data=Car::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

     public function images()
    {
        return $this->hasMany(CarImage::class);
    }
    
}

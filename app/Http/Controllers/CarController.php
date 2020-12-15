<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use File;
use App\Models\CarImage;
use App\Models\ProductSize;
use App\Models\Unavailable;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Car::getAllProduct();
        // return $cars;
        return view('backend.Car.index')->with('cars',$cars);
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
       

        $data=$request->all();
        
        $path = "storage/cars/"; 
        if($request->hasfile('photo')){
            $img=Image::make($request->photo)
            ->resize(320, 181)
            ->save('storage/cars/'.$request->photo->hashName());
            $data['photo']=$request->photo->hashName();
        } 
        
        $slug=Str::slug($request->title);
        $count=Car::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['is_featured']=$request->input('is_featured',0);
        $data['disponible']=1;
        // dd($data);
        $status=Car::create($data); 
        
        if($request->hasfile('images'))
            {
                foreach($request->file('images') as $file)
                {
                    $img=Image::make($file)
                    ->save('storage/cars/' . $file->hashName());
                    $image= CarImage::create([
                    'car_id'=>$status->id,
                    'image'=>$file->hashName(),
                    ]);
                }
            }//end of if
       
        if($status){

            
            request()->session()->flash('success','vaoiture ajouté avec succes');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('cars.index');

    }

    public function AvailableCars(Request $request){
        $from=explode("/",$request->from)[2].'-'.explode("/",$request->from)[1].'-'.explode("/",$request->from)[0];
        $to=explode("/",$request->to)[2].'-'.explode("/",$request->to)[1].'-'.explode("/",$request->to)[0];
        $unavailables=Unavailable::where('from','=',$from)->where('to','=',$to)->get();
        // $unavailables2=Unavailable::all();
        // dd($unavailables,$from,$to);
        $cars=Car::all();
        $cars2=$cars->toArray();
        $AvailableCars=[];
        
        foreach($cars as $key=>$car){
            foreach($unavailables as $un){
                if($car->id!=$un->car_id){
                    $AvailableCars[$key]=$car;
                }
            }
        }
        if(count($unavailables)<=0){
            $AvailableCars=$cars;
        }
        $AvailableCars=$this->paginate($AvailableCars);
        return view('frontend.pages.product-lists')->with('cars',$AvailableCars)->with('from',$from)->with('to',$to)->with('ville',$request->ville);
    }

    public function paginate($items, $perPage = 9, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function booking1(Request $request){
        $car=Car::find($request->id);
        return view('frontend.pages.booking1')->with('car',$car)->with('from',$request->car)->with('to',$request->to);
    }
    public function booking2(Request $request){
        return view('frontend.pages.booking2');
        //  return view('frontend.pages.Car-grids')->with('cars',$cars)->with('recent_products',$recent_products);;
    }
    public function booking3(Request $request){
        return view('frontend.pages.booking3');
        //  return view('frontend.pages.Car-grids')->with('cars',$cars)->with('recent_products',$recent_products);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $voiture=Car::findOrFail($id);
       
        $items=Car::where('id',$id)->get();
        // return $items;
        return view('backend.Car.edit')->with('voiture',$voiture)->with('items',$items);
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
        $Car=Car::findOrFail($id);
        $product_sizes = [];
        
        
        $data=$request->all();
        $images=$Car->images;
        if($request->hasfile('images'))
        {
           foreach($request->file('images') as $file)
           {
            $img=Image::make($file)
            ->save('storage/cars/' . $file->hashName());
            $image= CarImage::create([
            'car_id'=>$Car->id,
            'image'=>$file->hashName(),
            ]);
               
           }
           foreach ($images as $key => $img) {
              File::delete('storage/cars/' . $img->image);
              $img->delete();
              
           }
        }//end of if
        $path = "storage/cars/"; 
        $i=$Car->photo;
        if($request->hasfile('photo')){
            File::delete("storage/cars/".$Car->photo);
            $img=Image::make($request->photo)
            ->resize(320, 181)
            ->save('storage/cars/'.$request->photo->hashName());
            $i=$request->photo->hashName();
           } 
        $data['photo']=$i;
        $data['is_featured']=$request->input('is_featured',0);
        

        $status=$Car->fill($data)->save();
        


        if($status){
            request()->session()->flash('success','Voiture modifié avec succes');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Car=Car::findOrFail($id);
        $status=$Car->delete();
        
        if($status){
            request()->session()->flash('success','Car successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Car');
        }
        return redirect()->route('cars.index');
    }


    
}

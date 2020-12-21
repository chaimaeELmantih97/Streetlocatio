<?php

namespace App\Http\Controllers;
use App\Models\SubscribeEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Banner;
use App\Models\Car;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Brand;
use App\User;
use Auth;
use Session;
use Newsletter;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Redirect;   

class FrontendController extends Controller
{
   
    public function index(Request $request){
        // dd(Auth::user());
        return redirect()->route(Auth::user()->role);
    }

    public function home(){
       
        if(session()->get('locale')==null){
             Session::put('locale', 'fr');
        }
        
        $featured=Car::where('status','active')->where('is_featured',1)->limit(5)->get();
        $posts=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $banners=Banner::where('status','active')->limit(3)->orderBy('id','DESC')->get();
        // return $banner;
        $cars=Car::where('status','active')->orderBy('id','DESC')->limit(8)->get();
        // $category=Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();
        // return $category;
        return view('frontend.index')
                ->with('featured',$featured)
                ->with('posts',$posts)
                ->with('banners',$banners)
                ->with('product_lists',$cars);
    }   

    public function aboutUs(){
        return view('frontend.pages.about-us');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function carDetail($slug){
        $url=str_replace(url('/'), '', url()->previous());
        ///AvailableCars
        $car= Car::getProductBySlug($slug);
        // $cars=Car::where('id','!=',$car->id)->limit(3)->get();
        // dd($cars->count());
        $images=$car->images;
        // foreach($images as $img){
        //     dd($img->image);
        // }
        // dd($images->count(),$images);
        $from = session()->get('from');
        $to = session()->get('to');
        return view('frontend.pages.product_detail')
            ->with('car',$car)
            ->with('countimages',$images->count())
            ->with('images',$images)
            ->with('from',$from)
            ->with('to',$to)
            ->with('url',$url);
    }

    public function carGrids(){
        $cars=Car::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $cars->whereIn('cat_id',$cat_ids);
            // return $cars;
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $cars->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $cars=$cars->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $cars=$cars->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));
            
            $cars->whereBetween('price',$price);
        }

        $recent_products=Car::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $cars=$cars->where('status','active')->paginate($_GET['show']);
        }
        else{
            $cars=$cars->where('status','active')->paginate(9);
        }
        // Sort by name , price, category

      
        return view('frontend.pages.product-grids')->with('cars',$cars)->with('recent_products',$recent_products);
    }
    public function carLists(){
        $cars=Car::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $cars->whereIn('cat_id',$cat_ids)->paginate;
            // return $cars;
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $cars->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $cars=$cars->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $cars=$cars->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));
            
            $cars->whereBetween('price',$price);
        }

        $recent_products=Car::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $cars=$cars->where('status','active')->paginate($_GET['show']);
        }
        else{
            $cars=$cars->where('status','active')->paginate(6);
        }
        // Sort by name , price, category

      
        return view('frontend.pages.product-lists')->with('cars',$cars)->with('recent_products',$recent_products);
    }

   
    public function carFilter(Request $request){

            $data= $request->all();
            $cars=Car::where('status', 'active')
            ->whereBetween('prix_location', [$request->price1, $request->price2])
            ->get();
            return view('frontend.pages.product-grids')->with('cars',$cars);
    }
    public function carFilter2(Request $request){
        // "Luxe" => "voitures de luxe"
        // "motorcycles" => "motorcycles"
        // "voitures_sportives" => "voitures sportives"
        // "voitures_suvs" => "voitures suvs"
        // "camionnettes" => "camionnettes"
        // "camions" => "camions"
        $cars=null;
        $data= $request->all();
        if($request->Luxe!=null){
            $cars=Car::where('categorie', $request->Luxe)
            ->get();
        }

        if($request->motorcycles!=null){
            $cars2=Car::where('categorie',$request->motorcycles)
            ->get();
            if($cars!=null){
                $cars= $cars->concat($cars2);
            }else{
                $cars=$cars2;
            } 
        }
        if($request->voitures_sportives!=null){
            $cars3=Car::where('categorie',$request->voitures_sportives)
            ->get();
            if($cars!=null){
            $cars= $cars->concat($cars3);
            }else{
                $cars=$cars3;
            }
        }

        if($request->voitures_suvs!=null){
            $cars4=Car::where('categorie',$request->voitures_suvs)
            ->get();
            if($cars!=null){
                 $cars= $cars->concat($cars4);
            }else{
                $cars=$cars4;
            }
        }
        if($request->camionnettes!=null){
            $cars5=Car::where('categorie',$request->camionnettes)
            ->get();
            if($cars!=null){
                $cars= $cars->concat($cars5);
           }else{
               $cars=$cars5;
           }
        }
        if($request->camions!=null){
            $cars6=Car::where('categorie',$request->camions)
            ->get();
            if($cars!=null){
                $cars= $cars->concat($cars6);
           }else{
               $cars=$cars6;
           }
        }
        return view('frontend.pages.product-grids')->with('cars',$cars);
}

public function carFilter3(Request $request){
        $cars=Car::where('categorie', $request->cat)
        ->get();
    return view('frontend.pages.product-grids')->with('cars',$cars);
}

    public function CarSearch(Request $request){
        $recent_products=Car::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $cars=Car::orwhere('title','like','%'.$request->search.'%')
                    ->orwhere('slug','like','%'.$request->search.'%')
                    ->orwhere('description','like','%'.$request->search.'%')
                    ->orwhere('summary','like','%'.$request->search.'%')
                    ->orwhere('price','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->paginate('9');
        return view('frontend.pages.Car-grids')->with('cars',$cars)->with('recent_products',$recent_products);
    }

    public function CarBrand(Request $request){
        $cars=Brand::getProductByBrand($request->slug);
        $recent_products=Car::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        if(request()->is('e-shop.loc/Car-grids')){
            return view('frontend.pages.Car-grids')->with('cars',$cars->cars)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.Car-lists')->with('cars',$cars->cars)->with('recent_products',$recent_products);
        }

    }
    public function CarCat(Request $request){
        $cars=Category::getProductByCat($request->slug);
        // return $request->slug;
        $recent_products=Car::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/Car-grids')){
            return view('frontend.pages.Car-grids')->with('cars',$cars->cars)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.Car-lists')->with('cars',$cars->cars)->with('recent_products',$recent_products);
        }

    }
    public function productSubCat(Request $request){
        $cars=Category::getProductBySubCat($request->sub_slug);
        // return $cars;
        $recent_products=Car::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/Car-grids')){
            return view('frontend.pages.Car-grids')->with('cars',$cars->sub_products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.Car-lists')->with('cars',$cars->sub_products)->with('recent_products',$recent_products);
        }

    }

    public function blog(){
        $post=Post::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=PostCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $post->whereIn('post_cat_id',$cat_ids);
            // return $post;
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            // dd($slug);
            $tag_ids=PostTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // return $tag_ids;
            $post->where('post_tag_id',$tag_ids);
            // return $post;
        }

        if(!empty($_GET['show'])){
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate(9);
        }
        // $post=Post::where('status','active')->paginate(8);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogDetail($slug){
        $post=Post::getPostBySlug($slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // return $post;
        return view('frontend.pages.blog-detail')->with('post',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogSearch(Request $request){
        // return $request->all();
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $posts=Post::orwhere('title','like','%'.$request->search.'%')
            ->orwhere('quote','like','%'.$request->search.'%')
            ->orwhere('summary','like','%'.$request->search.'%')
            ->orwhere('description','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%')
            ->orderBy('id','DESC')
            ->paginate(8);
        return view('frontend.pages.blog')->with('posts',$posts)->with('recent_posts',$rcnt_post);
    }

    public function blogFilter(Request $request){
        $data=$request->all();
        // return $data;
        $catURL="";
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catURL)){
                    $catURL .='&category='.$category;
                }
                else{
                    $catURL .=','.$category;
                }
            }
        }

        $tagURL="";
        if(!empty($data['tag'])){
            foreach($data['tag'] as $tag){
                if(empty($tagURL)){
                    $tagURL .='&tag='.$tag;
                }
                else{
                    $tagURL .=','.$tag;
                }
            }
        }
        // return $tagURL;
            // return $catURL;
        return redirect()->route('blog',$catURL.$tagURL);
    }

    public function blogByCategory(Request $request){
        $post=PostCategory::getBlogByCategory($request->slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post->post)->with('recent_posts',$rcnt_post);
    }

    public function blogByTag(Request $request){
        // dd($request->slug);
        $post=Post::getBlogByTag($request->slug);
        // return $post;
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    // Login
    public function login(){
        return view('frontend.pages.login');
    }
    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
            $cartsession = session()->get('cart'); 
            if(Auth::check()){
                if($cartsession){
                    $carts = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->get();
                    foreach ($carts as $key => $cart_bd) {
                        if($cart_bd != null){
                            $cart_bd->delete();
                        }
                    }
                    foreach(session('cart') as $details){
                        $Car=Car::find($details['id']);
                        $cart = new Cart;
                        $cart->user_id = auth()->user()->id;
                        $cart->product_id = $Car->id;
                        $cart->price =$details['price'];
                        $cart->quantity = $details['quantity'];
                        $cart->size = $details['size'];
                        $cart->amount=($Car->price * $details['quantity']);
                        // return $cart;
                        $cart->save();
                            // dd('cart created ',$cart);
                    }
                    
                }
            }
            Session::put('user',$data['email']);
            toastr()->success("Connexion réussie");
            // request()->session()->flash('success','Connexion réussie');
            // return redirect()->route('home');
             return Redirect::intended();
            // return redirect()->intended('defaultpage');
        }
        else{
            // request()->session()->flash('error','Courriel ou mot de passe invalides : essayez encore !');
            toastr()->warning("Courriel ou mot de passe invalides : essayez encore !");
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        // request()->session()->flash('success','Logout successfully');
        toastr()->success("Déconnexion réussie");
        return back();
    }

    public function register(){
        return view('frontend.pages.register');
    }
    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:6',
        ]);
        $data=$request->all();
        // dd($data);
        $check=$this->create($data);
        Session::put('user',$data['email']);
        if($check){
            // request()->session()->flash('success','Successfully registered');
            toastr()->success("Inscription réussie");
            return redirect()->route('home');
        }
        else{
            // request()->session()->flash('error','Please try again!');
           toastr()->error("Un erreur est survenu");

            return back();
        }
    }
    public function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'status'=>'active'
            ]);
    }
    // Reset password
    // Reset password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }
    public function showResetForm2(Request $request, $token = null)
    {   
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function updatepassword(Request $request)
    {   
        $user=User::where('email',$request->email)->get();
        // dd($request->email);
        $user[0]->update(
        [
            'password'=> Hash::make($request->password)
        ]);
        // dd($user[0]->password,Hash::make($request->password));
        return redirect()->route('home')->with('success','Password successfully changed');
    }
    public function subscribe(Request $request){

        Mail::to($request->email)->send(new SubscribeEmail());
        return json_encode(['message' => $request->email]);

    }
    
}

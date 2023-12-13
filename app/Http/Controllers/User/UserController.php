<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;

class UserController extends Controller
{
    public function index(){
        return view("layouts.inc.user");
    }

    public function categories(){
        $categories = Category::where('status','0')->get();
        return view("user.collections.category.index", compact("categories"));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category){

            $products = $category->products()->get();
            return view('user.collections.products.index', compact('products', 'category'));
        }
        else{
            return redirect()->back();
        }
    }

    public function searchProducts(Request $request){
        if($request->search){
            $searchProducts = Product::where('name','LIKE','%'.$request->search.'')->latest()->paginate(10);
            return view('user.pages.search', compact('searchProducts'));
        }
        else{
            return redirect()->back()->with('message','No Food matched with your search');
        }
    }

    public function wishlistProducts(Request $request){
        if(auth()->check()){
            $wishlistProducts = Wishlist::where('user_id', auth()->user()->id)->latest()->paginate(10);
            return view('user.pages.wishlist', compact('wishlistProducts'));
        } else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login');
        }
    }

    public function finish(int $id){
        $wishlist = Wishlist::findOrfail($id);

        $wishlist->delete();
        return redirect()->back()->with('message','Product Deleted with all Images of it');
    }

    public function popularProducts(){
        $popularProducts = Product::where('popular','1')->latest()->get();
        return view('user.pages.popular-products', compact('popularProducts'));
    }

    public function productView(string $category_slug, string $product_slug){
        $category = Category::where('slug', $category_slug)->first();
        if ($category){
            $products = $category->products()->where('slug', $product_slug)->where('status','0')->first();
            if ($products){
                return view('user.collections.products.index', compact('product','category'));
            }
            else{
                return redirect()->back();
            }
        }
        
        else{
            return redirect()->back();
        }
    }


    

}

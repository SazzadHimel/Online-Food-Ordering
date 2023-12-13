<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\File;



class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        return view("admin.products.index", compact("products"));
    }

    public function create(){

        $categories = Category::all();
        return view("admin.products.create", compact("categories"));
    }

    public function store(ProductFormRequest $request){
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData["category_id"]);
        $product = $category->products()->create([
            'category_id'=> $validatedData['category_id'],
            'name'=> $validatedData['name'],
            'slug'=> Str::slug($validatedData['slug']),
            'description'=> $validatedData['description'],
            'main_price'=> $validatedData['main_price'],
            'discounted_price'=> $validatedData['discounted_price'],
            'quantity'=> $validatedData['quantity'],
            'popular'=> $request-> popular == true ? '1' : '0',
            'status'=> $request-> status == true ? '1' : '0',
            'meta_title'=> $validatedData['meta_title'],
            'meta_keyword'=> $validatedData['meta_keyword'],
            'meta_description'=> $validatedData['meta_description'],
        ]);

        if($request->hasFile("image")){
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach($request->file('image') as $imageFile){
                
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.".".$extension;
                $imageFile->move($uploadPath,$filename);
                
                $finalImagePathName = $uploadPath.$filename;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image'=> $finalImagePathName,
                ]);
            }
        }

        //$product->save();

        return redirect("/admin/products")->with('message', 'Product Added Successfully');
    }

    public function edit(int $product_id){
        $categories = Category::all();
        $products = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('categories','products'));
    }

    public function update(ProductFormRequest $request, int $product_id){
        $validatedData = $request->validated();
        $product = Category::findOrFail($validatedData('category_id'))-products()->where('id',$product_id)->first();

        if ($product){
            $product->update([
                'category_id'=> $validatedData['category_id'],
                'name'=> $validatedData['name'],
                'slug'=> Str::slug($validatedData['slug']),
                'description'=> $validatedData['description'],
                'main_price'=> $validatedData['main_price'],
                'discounted_price'=> $validatedData['discounted_price'],
                'quantity'=> $validatedData['quantity'],
                'popular'=> $request-> popular == true ? '1' : '0',
                'status'=> $request-> status == true ? '1' : '0',
                'meta_title'=> $validatedData['meta_title'],
                'meta_keyword'=> $validatedData['meta_keyword'],
                'meta_description'=> $validatedData['meta_description'],
            ]);

            if($request->hasFile("image")){
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach($request->file('image') as $imageFile){
                    
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.".".$extension;
                    $imageFile->move($uploadPath,$filename);
                    
                    $finalImagePathName = $uploadPath.$filename;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image'=> $finalImagePathName,
                    ]);
                }
            }

            return redirect("/admin/products")->with('message', 'Product Updated Successfully');
        }

        else{
            return redirect('admin/products')->with('messaage','No Such Product Found');
        }
    }

    public function destroyImage(int $product_image_id){
        $productImage = ProductImage::find($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }

        $productImage->delete();
        return redirect()->back()->with('message','Product Image Deleted');
    }

    public function destroy(int $product_id){
        $product = Product::findOrfail($product_id);
        if ($product ->productImages()){
            foreach($product ->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('message','Product Deleted with all Images of it');
    }

    // In your ProductController or wherever you display the product details

    public function show($id)
    {
        $products = Product::with('reviews')->get();
        $reviews = Review::all();

        return view('products.show', compact('product', 'reviews'));
    }

}

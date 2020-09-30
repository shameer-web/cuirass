<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Product_category;
use App\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      //  return view('admin.pages.product.index');


         $product=Product::where('product_status', 1)->get();
            $data['product']=$product;
     
         

        return view('admin.pages.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

         $category = Product_category::where('category_status', 1)->get();
         $data['category']=$category;

        return view('admin.pages.product.create',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->all());



           $request->validate([
           'product_category_id' =>'required',
           // 'product_slug' =>'required|unique:products|max:100',
           'product_title' =>'required|max:100',
           'product_short_description' =>'required|max:10000',
           'product_description' =>'required|max:10000',
           'image' =>'required|max:100',
           'product_price' =>'required|max:100',
           'product_offer_price' =>'required|max:100',
           'product_type' =>'required|max:100',
           'product_sku' =>'required|max:100',

           


        ]);


           // if(isset($request->product_slug) and $request->product_slug != ''){

           //    $request->validate([
           //       'product_slug' =>'required|unique:products|max:100',
           //   ]);

           //  }
           

        $product =new Product();

       // $request['email'] = $request->email;


         if($request->product_slug =="")

        {

         $request['product_slug'] = Str::slug($request->product_title);
           // $category->category_slug = Str::slug($request->category);

        }  

         else{
            $request['product_slug'] = $request->product_slug;
            //$category->category_slug = $request->slug;
        }
       



       $name = time() . '.' . $request->file('image')->extension();

        $path = $request->file('image')->storeAs('product', $name);
        if ($path) {
            $request['product_image'] = $name;
            $create =  Product::create($request->toArray());
            if ($create) {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Created');
                Session::flash('toastcontent', 'New Product Created  Successfully');
            } else {
                Session::flash('toasttype', 'danger');
                Session::flash('toasttitle', 'Cant Create');
                Session::flash('toastcontent', 'Technical Issue Image Transfered');
            }
        } else {
            Session::flash('toasttype', 'danger');
            Session::flash('toasttitle', 'Cant Create');
            Session::flash('toastcontent', 'Technical Issue Image Not Transfered');
        }

         return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //

         // $product=Product::where('product_status', 1)->get();
         //    $data['product']=$product;

         // $data['$product'] =$product;
         // dd($product);

        $product =$product;
         

        return view('admin.pages.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $edit =$product;
          $data['edit']=$edit;

           $category =Product_category::where('category_status', 1)->get();

           $data['category']=$category;
         

        return view('admin.pages.product.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //

       // dd($request->all());



if ($request->hasFile('image')) {

            $name = time() . '.' . $request->file('image')->extension();

            $path = $request->file('image')->storeAs('product', $name);
            if ($path) {

                $request['product_image'] = $name;
            }
        } elseif (isset($request->product_old_image)) {

            $request['product_image'] = $request['product_old_image'];
        }

        $cardholder_update = $product->update($request->toArray());
        if ($cardholder_update) {

            if (isset($request->product_status) and $request->product_status == '0') {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Deleted');
                Session::flash('toastcontent', 'Product Deleted  Successfully');
            } else {

                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Success');
                Session::flash('toastcontent', 'Product updated Successfully');
            }
        } else {
            Session::flash('toasttype', 'error');
            Session::flash('toasttitle', 'Error');
            Session::flash('toastcontent', ' Not Updated');
        }

        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Product_category;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('admin.pages.product_category.index');



          $category=Product_category::where('category_status', 1)->get();
            $data['category']=$category;
     
         

        return view('admin.pages.product_category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.pages.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

         $request->validate([
           
           'category' =>'required|max:100',
           // 'slug' =>'required|max:100',
           'image' =>'required|max:100',
           

           


        ]);


      //  dd($request->all());

        $category =new Product_category();

         $category->category =$request->category;

        if($request->slug =="")
        {

        // $request['category_slug'] = Str::slug($request->category);
            $category->category_slug = Str::slug($request->category);

        } 

        else{
           // $request['category_slug'] = $request->slug;
            $category->category_slug = $request->slug;
        }

        if($request->hasfile('image'))
        {
            $image_file =$request->file('image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time() . '.' . $image_extension;
            $path = $request->file('image')->storeAs('category',  $image_filename);

            $category->category_image =  $image_filename;
        }

         $category->save();
          




        //   $image_file=$request->file('image');
        //   $image_extension =$image_file->getClientOriginalExtension();
        //   $name =time().'.'.$image_extension;
        //    $path = $request->file('image')->storeAs('category', $name);

      
        // if ($path) {
        //     $request['image'] = $name;
        //     $create =  Product_category::create($request->toArray());
        //     if ($create) {
        //         Session::flash('toasttype', 'success');
        //         Session::flash('toasttitle', 'Created');
        //         Session::flash('toastcontent', 'New Category Created  Successfully');
        //     } else {
        //         Session::flash('toasttype', 'danger');
        //         Session::flash('toasttitle', 'Cant Create');
        //         Session::flash('toastcontent', 'Technical Issue Image Transfered');
        //     }
        // } else {
        //     Session::flash('toasttype', 'danger');
        //     Session::flash('toasttitle', 'Cant Create');
        //     Session::flash('toastcontent', 'Technical Issue Image Not Transfered');
        // }

      

     // dd($request->image);

      

        // return redirect()->route('category.index')->with('message','succesfully update your field');

        return redirect()->route('product-category.index');

        





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
    public function edit(Product_category $product_category )
    {
        //



        $edit= $product_category;
        $data['edit']=$edit;

        return view('admin.pages.product_category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_category $product_category)
    {
        //




     if($request->hasFile('image')) {

            $name = time() . '.' . $request->file('image')->extension();

            $path = $request->file('image')->storeAs('category', $name);
            if ($path) {

                $request['category_image'] = $name;
            }
        } elseif (isset($request->category_old_image)) {

            $request['category_image'] = $request['category_old_image'];
        }

        $cardholder_update = $product_category->update($request->toArray());
        if ($cardholder_update) {

            if (isset($request->category_status) and $request->category_status == '0') {
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


         return redirect()->route('product-category.index');
    
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

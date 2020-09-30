@extends('admin.layouts.admin')


@section('content')


<?php
 $category =$data['category'] 
 ?>


<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
	@csrf

<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline mr-5">
										<!--begin::Page Title-->
										<h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">Create Product </h2>
										<!--end::Page Title-->
										
									</div>
									<!--end::Page Heading-->
								</div>
								
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="row">
									<div class="col-md-8">
										<!--begin::Card-->
										<div class="card card-custom gutter-b example example-compact">
											
											<!--begin::Form-->
											
												
												<div class="card-body">
													
													<div class="form-group">
														
														<label>Product</label>
														<input type="text" name="product_title" value="{{ old('product_title') }}" class="form-control" placeholder="Enter  Product Name" />


														@error('product_title')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>

													<div class="form-group">
														
														<label>Short Description</label>
														

														<textarea id="" name="product_short_description"

														 class="md-textarea form-control" rows="3" placeholder="Enter  product short description" >
														 {{ old('product_short_description') }}
														 	
														 </textarea>



														@error('product_short_description')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>


																										<div class="form-group">
														
														<label>Product Description</label>
														

														<textarea id="" name="product_description" class="md-textarea form-control" rows="3" placeholder="Enter  product  description">
															 {{ old('product_description') }}
														</textarea>



														@error('product_description')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>



													<div class="form-group">
														
														<label>Price</label>
														<input type="text" name="product_price" value="{{ old('product_price') }}" class="form-control" placeholder="Price" />


														@error('product_price')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>



													<div class="form-group">
														
														<label>Offer Price</label>
														<input type="text" name="product_offer_price" value="{{ old('product_offer_price') }}" class="form-control" placeholder="Product Price" />


														@error('product_offer_price')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>



													<div class="form-group pt-5">
														<label for="exampleSelect1">Product Type </label>
														
														<select name="product_type"
														value="{{ old('product_type') }}" class="form-control" id="exampleSelect1" placeholder="Enter Student Gender">
															 
															<option value="variable">variable product</option>
															
															
															 
															
														</select>


														 @error('product_type')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>


													<div class="form-group">
														
														<label>Product SKU</label>
														<input type="text" name="product_sku" value="{{ old('product_sku') }}" class="form-control" placeholder="product sku" />


														@error('product_sku')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>



													


													
												</div>
												
											
											<!--end::Form-->
										</div>
										<!--end::Card-->



										
										<!--end::Card-->
									</div>

									<div class="col-md-4">
										<!--begin::Card-->
										<div class="card card-custom gutter-b example example-compact">


											
												<div class="card-body">

													<div class="card-header text-center">
													<button type="submit" value="submit" class="btn btn-primary mr-2">Draft</button>
													<button type="reset" class="btn btn-secondary">Publish</button>
												    </div>


												    <div class="form-group pt-5">
														
														<label>Slug</label>
														<input type="text" name="product_slug" value="{{ old('product_slug') }}" class="form-control" placeholder="slug" />


														@error('product_slug')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>
													
													<div class="form-group">
														<label for="exampleSelect1">Category </label>
														
														<select name="product_category_id" class="form-control" value="{{ old('product_category_id') }}" id="exampleSelect1" placeholder="Enter Student Gender">
															 
															{{-- <option value="">abc</option>
															<option value="">abc</option>
															<option value="">abc</option>
															<option value="">abc</option> --}}

															 @foreach($category as $row)
															<option value="{{ $row->id }}">{{ $row->category }}</option>
															
															 @endforeach
															
															 
															
														</select>


														@error('product_category_id')
														<p class="text-danger">{{ $message }}</p>
														@enderror


														
														
													</div>

													<div class="form-group">
														<label>Image</label>
														<input type="file" name="image" value="{{ old('image') }}" id="inpFile" class="form-control" placeholder="item Image" />
														<div class="image-preview" id="image-preview">

															<img src="" alt="Image preview" class="image-preview-image">

															<span class="image-preview-default-text">Image Preview</span>
															
														</div>



														@error('image')
														<p class="text-danger">{{ $message }}</p>
														@enderror



                        


														
														
													</div>

													


													
												</div>
												
											
											<!--end::Form-->
										</div>
									</div>	
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>


				</form>	










@endsection


@section('css')

      <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
      <style>
      	.image-preview{
      		width: 200px;
      		min-height:100px;
      		border: 2px solid #dddddd;
      		margin-top: 15px;

      		/* Default text */

      		display: flex;
      		 align-items: center;
      		 justify-content: center;
      		 font-weight: bold;
      		 color: #cccccc;

      	}

      	.image-preview-image{
      		display: none;
      		width: 100%;
      	}
      </style>


@endsection



@section('script')

     <!--begin::Page Vendors(used by this page)-->
		<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/crud/datatables/basic/paginations.js')}}"></script>
		<!--end::Page Scripts-->

		<script>
			const inpFile =document.getElementById("inpFile");
			const previewContainer =document.getElementById("image-preview");
			const previewImage = previewContainer.querySelector(".image-preview-image");
			const previewDefaultText = previewContainer.querySelector(".image-preview-default-text");


			inpFile.addEventListener("change",function(){
				const file =this.files[0];

				if(file){
					const reader =new FileReader();

					previewDefaultText.style.display ="none";
					previewImage.style.display ="block";


					reader.addEventListener("load",function(){
						console.log(this);
						previewImage.setAttribute("src", this.result);

					});
					reader.readAsDataURL(file);


				}
				else{

					previewDefaultText.style.display = null;
					previewImage.style.display = null;
				}
			})


			$(document).ready(function(){
                    $("#image-preview").click(function(){
                    // alert("The paragraph was clicked.");
                    $("#inpFile").show();
                     });
                    });
		</script>

@endsection
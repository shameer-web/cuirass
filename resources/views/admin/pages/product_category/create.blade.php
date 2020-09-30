@extends('admin.layouts.admin')


@section('content')




<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline mr-5">
										<!--begin::Page Title-->
										<h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">Create Category </h2>
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
									<div class="col-md-12">
										<!--begin::Card-->
										<div class="card card-custom gutter-b example example-compact">
											
											<!--begin::Form-->
											<form action="{{ route('product-category.store') }}" method="post" enctype="multipart/form-data">
												@csrf
												<div class="card-body">
													
													<div class="form-group">
														
														<label>Category</label>
														<input type="text" name="category" value="{{ old('category') }}"class="form-control" placeholder=" Category " />


														@error('category')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>



													<div class="form-group">
														
														<label>Slug</label>
														<input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="Slug" />


														@error('slug')
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
												<div class="card-footer">
													<button type="submit" value="submit" class="btn btn-primary mr-2">Submit</button>
													<button type="reset" class="btn btn-secondary">Cancel</button>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card-->
										
										<!--end::Card-->
									</div>
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>










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
                    inpFile.style.display ="none";
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
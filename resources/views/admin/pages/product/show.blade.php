@extends('admin.layouts.admin')


@section('content')



 


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								
								<!--end::Info-->
								<!--begin::Toolbar-->
																<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Notice-->
								
								<!--end::Notice-->
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h3 class="card-label">Product Table
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											
											<!--end::Dropdown-->
											<!--begin::Button-->
											<a href="{{ route('product.index') }}" class="btn btn-success font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>BACK</a>
											<!--end::Button-->
										</div>
									</div>
								{{-- 	<div class="card-body">
                                      
                                     
                                    

                                        <div class="d-flex justify-content-center"> --}}


                                      {{--   	  <div class="row pl-9">
                                       	
                                       
                                         <div class="card-body text-center col-md-4 pl-9">
                                         
                                           <label><h3 class="text-success"> Product Image</h3></label><br>
                                           <img src="{{ url('assets/image/product/'.$product->product_image)}}" alt="" width="100px" height="100px" class="pl-8">


                                        </div>

 
                                         

                                        </div> --}}
                                        	
                                        
										{{-- <form action="#" method="post" enctype="multipart/form-data" class="col-md-6">
												
												<div class="card-body ">
													
													<div class="form-group">
														<label><h3> Name</h3></label>
														<input type="text" name="" class="form-control"value="{{ $product->product_title}}" placeholder="Enter  Vendor Location" />
														
													</div>



													<div class="form-group">
														<label><h3> Category</h3></label>
														<input type="text" name="email" class="form-control"value="{{ $product->category->category }}" placeholder="Enter  Vendor Location" />
														
													</div>

													

													<div class="form-group">
														<label><h3>Short Description</h3></label>
														<input type="text" name="email" class="form-control"value="{{ $product->product_short_description}}" placeholder="Enter  Vendor Location" />
														
													</div>


													<div class="form-group">
														<label><h3>Description</h3></label>
														<input type="text" name="vendor_name" value="{{ $product->product_description}}"class="form-control" placeholder="Enter  Vendor Name" />
														
													</div>




													<div class="form-group">
														<label> <h3>Price</h3></label>
														<input type="text" name="" 
                                                        value="{{ $product->product_price }}"
														class="form-control" placeholder="Enter  Vendor Address" />
														
													</div>



													<div class="form-group">
														<label><h3> Offer Price</h3></label>
														<input type="text" name="" 
														value="{{ $product->product_offer_price}}"class="form-control" placeholder="Enter  Phone Number" />
														
													</div>



													<div class="form-group">
														<label> <h3>Product Type</h3></label>
														<input type="text" name="" 
                                                        value="{{ $product->product_type }}"
														class="form-control" placeholder="Enter  Vendor Address" />
														
													</div>

													<div class="form-group">
														<label> <h3>Product SKU</h3></label>
														<input type="text" name="" 
                                                        value="{{ $product->product_sku }}"
														class="form-control" placeholder="Enter  Vendor Address" />
														
													</div>
													

													


													

													


													


													


													


													

                                             </div>
                                         </form> --}}

                                      
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5 pt-5">
                                    <div class="product-large-slider">
                                      
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{ url('assets/image/product/'.$product->product_image)}}" alt="" >
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    
                                </div>
                                <div class="col-lg-7 pt-5">
                                    <div class="product-details-des">
                                        <h1 class="product-name">{{ $product->product_title }}</h1><hr>
                                        <div class="ratings d-flex">
                                           <h5><b>category</b> &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;{{ $product->category->category }} </h5>
                                        </div>
                                        
                                      
                                       
                                       
                                        <h5 class="pro-desc"><b>Description</b>&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;{{ $product->product_description }} <br>

                                         <b>Short Description</b>&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;{{ $product->product_short_description }}</h5>

                                          <h5><b>Product Price</b>&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;${{ $product->product_price }}<br>
                                          	<b>Offer Price</b>&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;${{ $product->product_offer_price }}


                                          </h5>

                                          <h5> <b>Product Type</b>&nbsp;&nbsp; : &nbsp;&nbsp;{{ $product->product_type }}<br>
                                          	  <b>Product SKU</b>&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;{{ $product->product_sku }}
                                             


                                          </h5>
                                       
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                       
                    </div>
                    <!-- product details wrapper end -->
               

                                     </div>


												
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>



@endsection


@section('css')

      <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />


@endsection



@section('script')

     <!--begin::Page Vendors(used by this page)-->
		<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/crud/datatables/basic/paginations.js')}}"></script>
		<!--end::Page Scripts-->

@endsection




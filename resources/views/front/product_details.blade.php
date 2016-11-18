@extends('layouts.layout')
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					@include('shared.sidebar')
				</div>
			</div>

			<div class="col-sm-9 padding-right">
			<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset('images/product-details/1.jpg')}}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{asset('images/product-details/similar1.jpg')}}" alt=""></a>
										</div>
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
	                 
									                    

						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{asset('images/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{$product->description}}</h2>
								<p>Product ID: {{$product->prod_code}}</p>
								<img src="{{asset('images/product-details/rating.png')}}" alt="" />
								<span>
									<span>RM{{$product->price}}<h5>(GST Included)</h5></span>
									<label>Quantity:</label>
									<input type="text" name="quantity" value="{{ old('quantity') }}">
									
									<a href='{{url("products/cart/$product->id")}}'<button type="button" class="btn btn-default cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button></a>
								</span>
								
									<table class="table table-borderless">
									    <tbody>
									        <tr>
									            <th scope class="">Availability</th>
									            <td class="">{{$product->stock_quantity}}</td>
									        </tr>
									        <tr>
												<th scope class="">Condition</th>
									            <td class="">{{$product->type}}</td>          
									      	</tr>
									      	<tr>
												<th scope class="">Brand</th>
									            <td class="">{{$product->name}}</td>          
									      	</tr>
									      	<tr>
												<th scope class="">Shipping

									            <td class="">West Malaysia RM{{$product->wm_rm}}</td>  
	   								            <td class="">Sabah RM{{$product->sbh_rm}}</td>          
									            <td class="">Sarawak RM{{$product->srk_rm}}</td>          
	        									
									      	</tr>
									    </tbody>
									</table>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="row"><!--category-tab-->
					    	<div class="col-sm-12">
					            <div class="panel with-nav-tabs panel-default">
					                <div class="panel-heading">
					                        <ul class="nav nav-tabs">
					                            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
					                            <li><a href="#reviews_comments" data-toggle="tab">Reviews(0)/Comments(0)</a></li>
					                            <li><a href="#qa" data-toggle="tab">Product Q & A</a></li>
					                            <li><a href="#sellerreturnexchange" data-toggle="tab">Seller/Return/Exchange</a></li>
					                        </ul>
					                </div>
					                <div class="panel-body">
					                    <div class="tab-content">
					                        <div class="tab-pane fade in active" id="details">
												<table class="table table-no-hover">
																<h4>Basic Information of a Product</h4>
															    <tbody>
															        <tr>
															            <th scope class="">Product Status/Sales Type</th>
															            <td class="">{{$product->stock_quantity}}</td>
															            <th scope class="">Product No.</th>
															            <td class="">{{$product->prod_code}}</td> 
															        </tr>
															         <tr>
																		<th scope class="">Brand</th>
															            <td class="">{{$product->name}}</td>    
																		<th scope class="">Country of Origin</th>
															            <td class="">{{$product->name}}</td>          
															      	</tr>
															        <tr>
																		<th scope class="">Weight(kg)</th>
															            <td colspan=3 class="">{{$product->weight}} kg</td>         
															      	</tr>
															      	<tr>
																		<th scope class="">Shipping Method</th>
															            <td colspan=3class="">{{$product->shipping_method}}</td>          
															      	</tr>
															      		<tr>
																		<th scope class="">GST Applicable</th>
															            <td colspan=3class="">{{$product->name}}</td>          
															      	</tr>
															      		<tr>
																		<th scope class="">Tax Invoice</th>
															            <td colspan=3 class="">{{$product->name}}</td>          
															      	</tr>
															      		<tr>
																		<th scope class="">After Sale Service</th>
															            <td colspan=3 class="">{{$product->after_sale_serv}}</td>          
															      	</tr>
															    </tbody>
												</table> 
					                        </div>

					                        <div class="tab-pane fade" id="reviews_comments">
 
 
      											<div class="table-responsive">
													<table class="table table-striped">
														<h4>Customer Reviews</h4>
														 
														 <div class="dropdown"  align="right">
														    <button id="review" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">All Reviews
														    <span class="caret"></span></button>
															<ul class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="review">
														      <li><a href="#">General Review</a></li>
														      <li><a href="#">Photo Review</a></li>
														    </ul>

														    <button id="recommendation" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Recommendation
														    <span class="caret"></span></button>
															<ul class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="recommendation">
														      <li><a href="#">Highly Recommended</a></li>
														      <li><a href="#">Recommended</a></li>
														      <li><a href="#">Moderately Recommended</a></li>
														      <li><a href="#">Not Recommended</a></li>
														    </ul>
														
														    <button id="author" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Author Grade
														    <span class="caret"></span></button>
															<ul class="dropdown-menu" style="right: 0; left: auto;">
														      <li><a href="#">Angkasa Staff</a></li>
														      <li><a href="#">Guest</a></li>
														    </ul>
														</div>

													    <thead> 
													    	<p>
															<tr>
													            <th scope class="">Rating</th>
													            <th scope class="">Content</th>
													            <th scope class="">View/Comments</th>
																<th scope class="">Author/Date</th>
													        </tr>
													    </thead>
													    <tbody id="reviews">
													         <tr>
													            <td class="">{{$product->name}}</td>          
													            <td class="">{{$product->name}}</td>    
													            <td class="">{{$product->name}}</td>          
													            <td class="">{{$product->name}}</td>          
													      	</tr>
													    </tbody>
													</table> 

													<div class="col-md-12 text-center">
											    	  <ul class="pagination pagination-lg pager" id="myReviewsPager"></ul>
											    	</div>

													<table class="table table-striped">
														<h4>Customer Comments</h4>

														<div class="dropdown"  align="right">
														    <button id="satisfaction_rating" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Satisfaction Rating
														    <span class="caret"></span></button>
															<ul class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="satisfaction_rating">
														      <li><a href="#">Satisfied</a></li>
														      <li><a href="#">Average</a></li>
														      <li><a href="#">Dissatisfied</a></li>
														    </ul>

														    <button id="recommendation" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Author Grade
														    <span class="caret"></span></button>
															<ul class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="menu2">
														      <li><a href="#">Angkasa Staff</a></li>
														      <li><a href="#">Guest</a></li>
														    </ul>
														</div>

													    <thead> 
													    	<p>
															<tr>
													            <th scope class="">Rating</th>
													            <th scope class="">Content</th>
																<th scope class="">Author/Date</th>
													        </tr>
													    </thead>
													    <tbody id="comments">
													         <tr>
													            <td class="">{{$product->name}}</td>          
													            <td class="">{{$product->name}}</td>          
													            <td class="">{{$product->name}}</td>          
													      	</tr>
													    </tbody>
													</table> 
											</div>
												<div class="col-md-12 text-center">
										    	  <ul class="pagination pagination-lg pager" id="myCommentsPager"></ul>
										    	</div>
					                        </div>

					                        <script type="text/javascript">	
											$(document).ready(function(){
											    
											  $('#comments').pageMe({pagerSelector:'#myCommentsPager',showPrevNext:true,hidePageNumbers:false,perPage:1});
											    
											});
											</script>

					                        <div class="tab-pane fade" id="qa">
					                        	<div class="table-responsive">
													<table class="table table-striped">
														<h4>Product Q & A</h4>
														 
														 <div class="dropdown"  align="right">
														    <button id="topic" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Topic
														    <span class="caret"></span></button>
															<ul class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="topic">
														      <li><a href="#">Product</a></li>
														      <li><a href="#">Shipping</a></li>
   														      <li><a href="#">Return/Cancellation</a></li>
														      <li><a href="#">Exchange</a></li>
														      <li><a href="#">Other Topics</a></li>
														    </ul>
														</div>

													    <thead> 
													    	<p>
															<tr>
													            <th scope class="">No</th>
													            <th scope class="">Topic</th>
													            <th scope class="">Q & A</th>
																<th scope class="">Author/Date</th>
													        </tr>
													    </thead>
													    <tbody id="qanda">
													         <tr>
													            <td class="">{{$product->name}}</td>          
													            <td class="">{{$product->name}}</td>    
													            <td class="">{{$product->name}}</td>          
													            <td class="">{{$product->name}}</td>          
													      	</tr>
													    </tbody>
													</table> 

													<div class="col-md-12 text-center">
											    	  <ul class="pagination pagination-lg pager" id="myQ&APager"></ul>
											    	</div>
													

							                        <script type="text/javascript">	
													$(document).ready(function(){
													    
													  $('#comments').pageMe({pagerSelector:'#myQ&APager',showPrevNext:true,hidePageNumbers:false,perPage:1});
													    
													});
													</script>

					                        	</div>
					                        </div>

					                        <div class="tab-pane fade" id="sellerreturnexchange">
												<table class="table table-no-hover">
													<h4>Seller Information</h4>
												    <tbody>
												        <tr>
												            <th scope class="">Seller</th>
												            <td class="">{{$product->stock_quantity}}</td>
												        </tr>
												         <tr>
															<th scope class="">Ship-From Address</th>
												            <td class="">{{$product->name}}</td>           
												      	</tr>
												        <tr>
															<th scope class="">Return/Exchange Address</th>
												            <td colspan=3 class="">{{$product->weight}} kg</td>         
												      	</tr>
												      	<tr>
															<th scope class="">Notice on Return/Exchange</th>
												            <td colspan=3class="">{{$product->shipping_method}}</td>          
												      	</tr>
												    </tbody>
												</table> 

												<!-- <table class="table table-no-hover">
													<h4>Return / Exchange Policy</h4>
													 <thead> 
													    	<p>
															<tr>
													            <th scope class="">Cancellation</th>
													            <th scope class="">Return</th>
																<th scope class="">Exchange</th>
													        </tr>
													    </thead>
													    <tbody id="comments">
													         <tr>
													            <td class="">
													            <ul>
													            	<li>saf</li>
													            	<li>fsfs</li>
													            </ul>
													            </td>          
													            <td class="">{{$product->name}}</td>          
													            <td class="">{{$product->name}}</td>          
													      	</tr>
													    </tbody>

												</table> -->

												<h4>Return / Exchange Policy</h4>

												<div class = "list-group">
												   <div class = "list-group-item active">
												      <h4 class = "list-group-item-heading">
												         Cancellation
												      </h4>
												   </div>
												   
												   <div class = "list-group-item">
												      <h5 class = "list-group-item-heading">Request for cancellation if product has not been dispatched after payment completion.</h5>
												   </div>

												   <div class="list-group-item">
												      <h5 class = "list-group-item-heading">
													  How to Request for Cancellation/Return/Exchange?</h5>
												      <p class = "list-group-item-text">
														<div class="well">
														<ul>
															<li>You can request for cancellation after completing payment and if product has not been dispatched by then, cancellation request is approved and you can receive refund.
															But, in case seller has already dispatched product, cancellation request can be rejected.</li>
															<li>You can request for return after obtaining product, you should send the product in question to seller.
															After seller checks if returned product is flawed, and approves your request, return is completed and payment is refunded.</li>
															<li>You can request for exchange if wrong product is shipped, you should send the product in question to seller.
															After seller checks if returned product is flawed, seller approves your request, and re-sends new product.</li>											      
														</p>
												  		</ul>
												  		</div>
												   </div>
												   
												   
												   
												</div>

												<div class = "list-group">
												   <div class = "list-group-item active">
												      <h4 class = "list-group-item-heading">
												         Return
												      </h4>
												   </div>
												   
												   <div class="list-group-item">
												      <h5 class = "list-group-item-heading">
												         Return Policy
												      </h5>
												      
												      <p class = "list-group-item-text">
														<div class="well">
														<ul>
															<li>Request for return within 7 calendar days following delivery date.</li>
															<li>Check seller’s approval on buyer’s request.</li>
															<li>You can request for exchange if wrong product is shipped, you should send the product in question to seller.</li>
															<li>Buyer sends product in question to seller.</li>
															<li>Seller receives and checks returned product</li>
															<li>Seller approves return and return is completed.</li>
														</p>
												  		</ul>
												  		</div>
												   </div>
												   
												</div>
												   
												<div class = "list-group">
												   <div class = "list-group-item active">
												      <h4 class = "list-group-item-heading">
												         Exchange
												      </h4>
												   </div>
												   
												   <div class="list-group-item">
												      <h4 class = "list-group-item-heading">
												     fsdfafsa
												      </h4>
												      
												      <p class = "list-group-item-text">
												         Exchange 
												     </p>
												   </div>
												   
												   <div class = "list-group-item">
												      <h4 class = "list-group-item-heading">24*7 support</h4>
												      <p class = "list-group-item-text">We provide 24*7 support.</p>
												   </div>
												   
												</div>
												</div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					      </div><!--category tab-->


					<ul>
						<li>**Angkasa E-Shop receives report on products to protect buyers’ right. For further information please contact us. Reportgo</li>
						<li>**For order related and other issues, kindly click on E-mail Enquiry here.  E-mailEnquiry</li>
					</ul>
			</div>
	</div>
</div>


</section>
@endsection
@extends('layouts.layout')
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12"><!-- Border image & details -->
				<div class="product-details"><!--product-details-->

					<div class="col-sm-3">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{asset('images/product-details/1.jpg')}}" data-toggle="magnify"/></div>
						  <div class="tab-pane" id="pic-2"><img src="{{asset('images/product-details/4.jpg')}}" data-toggle="magnify" /></div>
						  <div class="tab-pane" id="pic-3"><img src="{{asset('images/product-details/2.jpg')}}" data-toggle="magnify"/></div>
						  <div class="tab-pane" id="pic-4"><img src="{{asset('images/product-details/3.jpg')}}" data-toggle="magnify"/></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{asset('images/product-details/1.jpg')}}" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{asset('images/product-details/4.jpg')}}" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{asset('images/product-details/2.jpg')}}" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="{{asset('images/product-details/3.jpg')}}" /></a></li>
						</ul>
					</div>

					<div class="col-sm-6">
						<div class="content-product-information"><!--/content-product-information-->
							<img src="{{asset('images/product-details/new.jpg')}}" class="newarrival" alt="" />
							<h2>{{$product->short_details}}</h2>
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
						
							<table class="table table-borderless-short-desc">
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
										<th scope class="">
										<div class="popover-product">
											Shipping<i class="fa fa-question" aria-hidden="true" data-toggle="popover" data-trigger="hover" data-placement="top" title="Shipping Rate Notice by Location" data-html="true" 
											data-content="<p><b>West Malaysia</b>
												<p>RM 7.00 for up to 5 kg
												<p>RM 1.00 for each additional 1 kg								
												<hr>
												<b>Sabah</b>
												<p>RM 12.00 for up to 1 kg 
												<p>RM 11.00 for each additional 1 kg
												<hr>
												<p><b>Sarawak</b>
												<p>RM 12.00 for up to 1 kg 
												<p>RM 11.00 for each additional 1 kg">
											</i>
									    </div>
							            <td class="">W.Malaysia RM {{$product->wm_rm}}</td>  
								            hello<span class="price">RM {{$product->wm_rm}}</span>
								        <td class="">Sabah RM {{$product->sbh_rm}}</td>          
							            <td class="">Sarawak RM {{$product->srk_rm}}</td>          
										
							      	</tr>
							    </tbody>
							</table>

						</div><!--/content-product-information-->
					</div><!--Column 6-->

<p
					<div class="row"><!--category-tab-->

						<div class="col-sm-9">
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
											            <td colspan=3 class="">{{$product->name}}</td>          
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
											            <td colspan=3 class="">{{$product->shipping_method}}</td>          
											      	</tr>
											    </tbody>
											</table> 


											<h4>Return / Exchange Policy</h4>
												<div class = "col-md-4 justify-content">
												   <div class = "list-group-item active">
												      <h4 class = "list-group-item-heading">
												         Cancellation
												      </h4>
												   </div>
												   
												   <div class="list-group-item">												      
												      <p class = "list-group-item-text">
														<div class="well">
														<ul>
															<li>Request for cancellation if product has not been dispatched after payment completion.</li>
												  		</ul>
												  		</div>
													 </p>
													</div>
												</div>

												<div class = "col-md-4 justify-content">
												   <div class = "list-group-item active">
												      <h4 class = "list-group-item-heading">
												         Return
												      </h4>
												   </div>
												   
												   <div class="list-group-item">												      
												      <p class = "list-group-item-text">
														<div class="well">
														<ul>
														<li>Request for return within 7 calendar days following delivery date.</li>
														<li>Check seller’s approval on buyer’s request.</li>
														<li>Request for exchange if wrong product is shipped. Send the product in question to seller.</li>
														<li>Seller receives and checks returned product.</li>
														<li>Seller approves return and return is completed.</li>
												  		</ul>
												  		</div>
													 </p>
													</div>
												</div>

												<div class = "col-md-4 justify-content">
												   <div class = "list-group-item active">
												      <h4 class = "list-group-item-heading">
												         Exchange
												      </h4>
												   </div>
												   
												   <div class="list-group-item">												      
												      <p class = "list-group-item-text">
														<div class="well">
														<ul>
															<li>Request for exchange within 7 calendar days following receipt of delivery.</li>
															<li>Check seller’s approval on buyer’s request.</li>
															<li>Buyer can sends product in question to seller.</li>
															<li>Seller receives and checks for returned product.</li>
															<li>Seller can send new product to buyer and buyer receives it. Then exchange process is completed.</li>
												  	 	</ul>
												  		</div>
													 </p>
													</div>
												</div>
												<p><i class="glyphicon glyphicon-exclamation-sign text-danger" style="font-size:18px;"></i>As Mobile Top-up products are directly reloaded on your cell phone number, returns/exchanges are not available. Please take note of this before purchase, and enter your cell phone number correctly.</p>

												<div class="list-group">
														<div class = "list-group-item active">
												      <h4 class = "list-group-item-heading">
													   How to Request for Cancellation/Return/Exchange?
												      </h4>
												   	</div>

												   <div class="list-group-item">
													<p class = "list-group-item-text">
														<div class="well">
														<ul>
															<li>You request for cancellation after completing payment. If product has not been dispatched by then, cancellation request is approved and you can receive refund.
															But, in case seller has already dispatched product, cancellation request can be rejected.</li>
															<li>You request for return after obtaining product, you should send the product in question to seller.
															After seller checks if returned product is flawed, and approves your request, return is completed and payment is refunded.</li>
															<li>You request for exchange if wrong product is shipped, you should send the product in question to seller.
															After seller checks if returned product is flawed, seller approves your request, and re-sends new product.</li>											      
														</p>
												  		</ul>
												  		</div>
												   </div>

												    <div class="list-group-item active">
														<h4 class = "list-group-item-heading">
														   Criteria for Return/Exchange?
													    </h4>
													</div>

												      <div class = "list-group-item">
															<p class = "list-group-item-text">
														<div class="well">
															<h5>You can request for return/exchange within 7 calendar days following delivery date. But return/exchange request cannot be made in following cases:
															</h5>
															<ul>
																<li>When request due to change of mind is made after 7 calendar days following delivery date.</li>
																<li>When product is used, destroyed or damaged.</li>
																<li>When tag attached to product is removed or package of product is opened and product value is damaged.</li>
																<li>When sealed package is opened or packaging materials are lost.</li>
																<li>When too much time has passed and product value has so decreased that its re-sale is not possible.</li>
																<li>When return/exchange request is made for customized product such as hand-made shoes or accessories.</li>
																<li>When components of product (including free gift) have been used or lost.</li>
																<li>When buyer did not follow instructions included in product.</li>
													  		</ul>
												  		</div>
											  	 	</p>
											   </div>
											</div> 
										</div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					</div><!--category tab-->

				</div><!--product-details-->				
			</div><!-- Border image & details -->
		</div>
	</div>
</section>
@endsection
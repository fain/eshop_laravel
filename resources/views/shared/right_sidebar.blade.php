						<div class="merchants_products"><!--merchants_products-->
							<h2>Merchants</h2>
							<div class="merchants-name">
								<ul class="nav nav-pills nav-stacked">
								@foreach ($merchant as $merchants)
<li><a href="#"> <span class="pull-right">(50)</span>{{$merchant->store_name}}</a></li>
@endforeach
								</ul>
							</div>
						</div><!--/merchants_products-->
						
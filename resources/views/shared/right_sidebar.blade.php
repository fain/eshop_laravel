						<div class="merchantsinfo_products"><!--merchantsinfo_products-->
							<h2>Merchants</h2>
							<div class="merchants-name">
								<ul class="nav nav-pills nav-stacked">
								@foreach ($merchantsinfo as $merchantinfo)
								<li><a href="#"><span class="pull-right">(50)</span>{{$merchantinfo->store_name}}</a></li>
								@endforeach
								</ul>
							</div>
						</div><!--/merchantsinfo_products-->
						
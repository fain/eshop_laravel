
<header id="id">

  <nav class="navbar navbar-default">

    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="{{url('')}}" {{$page == 'home' ? 'class=active' : ''}}>Angkasa E-Shop </a> -->

    </div>

    <div class="collapse navbar-collapse js-navbar-collapse">
      
      <!-- start menu -->
       <ul class="nav navbar-nav">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Electronics
      &nbsp;&nbsp;<span class="caret gi-1x"></span></a>

          <ul class="dropdown-menu mega-dropdown-menu">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">New in Stores</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                      <h4><small>Summer dress floral prints</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                      <h4><small>Gold sandals with shiny touch</small></h4>
                      <button class="btn btn-primary" type="button">9,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                      <h4><small>Denin jacket stamped</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <li class="divider"></li>
                <li><a href="{{url('products')}}">View all Category <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              </ul>
            </li>
             


            @foreach ($categories as $category)
             <li class="col-sm-3">
                <ul>
                    <li class="dropdown-header">
            {{$category->name}}
            
            
            
              
            <li>
              <a href="#">{{$category->name}}</a>
            </li><!-- product -->
            

            <li class="divider"></li>
          </li>
        
                </ul>
            </li>
      @endforeach

            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Newsletter</li>
                <form class="form" role="form">
                  <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
              </ul>
            </li>

          </ul>

        </li>
      </ul>
      <!-- end menu -->
      <!-- start menu2 -->
       <ul class="nav navbar-nav">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Women      
            <span class="caret gi-1x"></span></a>

          <ul class="dropdown-menu mega-dropdown-menu">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">New in Stores</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                      <h4><small>Summer dress floral prints</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                      <h4><small>Gold sandals with shiny touch</small></h4>
                      <button class="btn btn-primary" type="button">9,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                      <h4><small>Denin jacket stamped</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <li class="divider"></li>
                <li><a href="{{url('products')}}">View all Category <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              </ul>
            </li>
             


            @foreach ($categories as $category)
             <li class="col-sm-3">
                <ul>
                    <li class="dropdown-header">
            {{$category->name}}
            
            
            
              
            <li>
              <a href="#">{{$category->name}}</a>
            </li><!-- product -->
            

            <li class="divider"></li>
          </li>
        
                </ul>
            </li>
      @endforeach

            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Newsletter</li>
                <form class="form" role="form">
                  <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
              </ul>
            </li>

          </ul>

        </li>
      </ul>
      <!-- end menu2 -->
         <!-- start menu3 -->
       <ul class="nav navbar-nav">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men
                        &nbsp;&nbsp;<span class="caret gi-1x"></span></a>

          <ul class="dropdown-menu mega-dropdown-menu">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">New in Stores</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                      <h4><small>Summer dress floral prints</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                      <h4><small>Gold sandals with shiny touch</small></h4>
                      <button class="btn btn-primary" type="button">9,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                      <h4><small>Denin jacket stamped</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <li class="divider"></li>
                <li><a href="{{url('products')}}">View all Category <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              </ul>
            </li>
             


            @foreach ($categories as $category)
             <li class="col-sm-3">
                <ul>
                    <li class="dropdown-header">
            {{$category->name}}
            
            
            
              
            <li>
              <a href="#">{{$category->name}}</a>
            </li><!-- product -->
            

            <li class="divider"></li>
          </li>
        
                </ul>
            </li>
      @endforeach

            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Newsletter</li>
                <form class="form" role="form">
                  <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
              </ul>
            </li>

          </ul>

        </li>
      </ul>
      <!-- end menu 3-->

 <!-- start menu4 -->
       <ul class="nav navbar-nav">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mobiles
                        &nbsp;&nbsp;<span class="caret gi-1x"></span></a>

          <ul class="dropdown-menu mega-dropdown-menu">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">New in Stores</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                      <h4><small>Summer dress floral prints</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                      <h4><small>Gold sandals with shiny touch</small></h4>
                      <button class="btn btn-primary" type="button">9,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                      <h4><small>Denin jacket stamped</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <li class="divider"></li>
                <li><a href="{{url('products')}}">View all Category <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              </ul>
            </li>
             


            @foreach ($categories as $category)
             <li class="col-sm-3">
                <ul>
                    <li class="dropdown-header">
            {{$category->name}}
            
            
            
              
            <li>
              <a href="#">{{$category->name}}</a>
            </li><!-- product -->
            

            <li class="divider"></li>
          </li>
        
                </ul>
            </li>
      @endforeach

            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Newsletter</li>
                <form class="form" role="form">
                  <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
              </ul>
            </li>

          </ul>

        </li>
      </ul>
      <!-- end menu 4-->

      <!-- start menu5 -->
       <ul class="nav navbar-nav">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Computers
                        &nbsp;&nbsp;<span class="caret gi-1x"></span></a>

          <ul class="dropdown-menu mega-dropdown-menu">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">New in Stores</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                      <h4><small>Summer dress floral prints</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                      <h4><small>Gold sandals with shiny touch</small></h4>
                      <button class="btn btn-primary" type="button">9,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                      <h4><small>Denin jacket stamped</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <li class="divider"></li>
                <li><a href="{{url('products')}}">View all Category <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              </ul>
            </li>
             


            @foreach ($categories as $category)
             <li class="col-sm-3">
                <ul>
                    <li class="dropdown-header">
            {{$category->name}}
            
            
            
              
            <li>
              <a href="#">{{$category->name}}</a>
            </li><!-- product -->
            

            <li class="divider"></li>
          </li>
        
                </ul>
            </li>
      @endforeach

            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Newsletter</li>
                <form class="form" role="form">
                  <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
              </ul>
            </li>

          </ul>

        </li>
      </ul>
      <!-- end menu 5-->
       
       <!-- start menu 6 -->
       <ul class="nav navbar-nav">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tops
                        &nbsp;&nbsp;<span class="caret gi-1x"></span></a>

          <ul class="dropdown-menu mega-dropdown-menu">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">New in Stores</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                      <h4><small>Summer dress floral prints</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                      <h4><small>Gold sandals with shiny touch</small></h4>
                      <button class="btn btn-primary" type="button">9,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                      <h4><small>Denin jacket stamped</small></h4>
                      <button class="btn btn-primary" type="button">49,99 €</button>
                      <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <li class="divider"></li>
                <li><a href="{{url('products')}}">View all Category <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              </ul>
            </li>
             


            @foreach ($categories as $category)
             <li class="col-sm-3">
                <ul>
                    <li class="dropdown-header">
            {{$category->name}}
            
            
            
              
            <li>
              <a href="#">{{$category->name}}</a>
            </li><!-- product -->
            

            <li class="divider"></li>
          </li>
        
                </ul>
            </li>
      @endforeach

            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Newsletter</li>
                <form class="form" role="form">
                  <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
              </ul>
            </li>

          </ul>

        </li>
      </ul>
      <!-- end menu 6-->
      
      <!-- comparison -->
       <ul class="nav navbar-nav">
              
                <li class="dropdown mega-dropdown">
             
                <a id="compare" href="#animatedModal" disabled class="compare-products">
                <i class="fa fa-bar-chart fa-1x" aria-hidden="true"></i>Compare 
                </a>
              </li>
          
        </ul>
        <!-- compare -->
    
    </div>
  <!-- /.nav-collapse -->
  </nav>
</header>



<div class="row"><!--category-tab-->

            <div class="col-sm-12">
                  <div class="panel with-nav-tabs panel-default">

                      <div class="panel-heading">
                              <ul class="nav nav-tabs">
                                  <li class="active"><a href="#highlights" data-toggle="tab">HIGHLIGHTS</a></li>
                                  <li><a href="#shop_brands" data-toggle="tab">SHOP BRANDS</a></li>
                                  <li><a href="#shop_categories" data-toggle="tab">SHOP CATEGORIES</a></li>
                                  <li><a href="#cny_offers" data-toggle="tab">CNY OFFERS</a></li>
                              </ul>
                      </div>

                     
                      <div class="panel-body2">
                          <div class="tab-content">

                           <div class="tab-pane fade in active" id="highlights">
                              
                              <!--  <h4>shop brands</h4> -->
                        <!-- Lightbox -->
                        
<!--                         <section>
 -->                                  <div class="col-md-3 col-sm-12 co-xs-12 gal-item" style="height: 350px">
                                    <div class="box">
                                      <a href="http://www.google.com">
                                          <img src="images/home/highlights/1.png"  alt="" />
                                      </a>

                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-12 co-xs-12 gal-item" style="height: 175px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/2.png"  alt="" />
                                      </a>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6 co-xs-12 gal-item" style="height: 175px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/3.png"  alt="" />
                                      </a>
                                      
                                    </div>
                                  </div>
                                  <div class="col-md-2 col-sm-6 co-xs-12 gal-item" style="height: 175px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/7.png"  alt="" />
                                      </a>
                                  
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item" style="height: 175px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/5.png"  alt="" />
                                      </a>
                                   
                                    </div>
                                  </div>
                                 
                                  <div class="col-md-5 col-sm-6 co-xs-12 gal-item" style="height: 175px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/6.png"  alt="" />
                                      </a>
                                     
                                    </div>
                                  </div>
                                  
                              <!--        <div class="col-md-4 col-sm-12 co-xs-12 gal-item" style="height: 350px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/9.png"  alt="" />
                                      </a>
                                    
                                    </div>
                                  </div>
                                     <div class="col-md-3 col-sm-12 co-xs-12 gal-item" style="height: 350px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/10.png"  alt="" />
                                      </a>
                                    
                                    </div>
                                  </div> -->
                             
                                 <div class="col-md-2 col-sm-12 co-xs-12 gal-item" style="height: 175px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/8.png"  alt="" />
                                      </a>
                                    
                                    </div>
                                  </div>
                               
                                 <div class="col-md-3 col-sm-12 co-xs-12 gal-item" style="height: 175px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/11.png"  alt="" />
                                      </a>
                                    
                                    </div>
                                  </div>
                                  <div class="col-md-5 col-sm-12 co-xs-12 gal-item" style="height: 175px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/4.png"  alt="" />
                                      </a>
                                    
                                    </div>
                                  </div>
                                     <div class="col-md-2 col-sm-12 co-xs-12 gal-item" style="height: 175px">
                                    <div class="box">
                                      <a href="#">
                                          <img src="images/home/highlights/9.png"  alt="" />
                                      </a>
                                    
                                    </div>
                                </div>
<!--                               </section>
 -->                        <!-- Lightbox -->


                            </div>

                        <div class="tab-pane fade" id="shop_brands">
                          2
                        <!-- Lightbox -->
                        rew
                        <!-- Lightbox -->

                        </div>
                        
                       <div class="tab-pane fade" id="shop_categories">
3
                      <!-- Lightbox -->
                        <section>
                                  <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="http://www.google.com">
                                        <img src="http://placemi.com/i3xhd/1000x750">
                                      </a>

                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/gut3z/1000x750">
                                      </a>
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/yggpo/1000x750">
                                      </a>
                                      
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/49zqo/1000x750">
                                      </a>
                                  
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/k2mjk/1000x750">
                                      </a>
                                   
                                    </div>
                                  </div>
                                 
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/59h1p/1000x750">
                                      </a>
                                     
                                    </div>
                                  </div>
                                  <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/lybbn/1000x750">
                                      </a>
                                    
                                    </div>
                                  </div>
                              </section>
                        <!-- Lightbox -->

                       </div>

  <div class="tab-pane fade" id="cny_offers">
44
                      <!-- Lightbox -->
                        <section>
                                  <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="http://www.google.com">
                                        <img src="http://placemi.com/i3xhd/1000x750">
                                      </a>

                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/gut3z/1000x750">
                                      </a>
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/yggpo/1000x750">
                                      </a>
                                      
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/49zqo/1000x750">
                                      </a>
                                  
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/k2mjk/1000x750">
                                      </a>
                                   
                                    </div>
                                  </div>
                                 
                                  <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/59h1p/1000x750">
                                      </a>
                                     
                                    </div>
                                  </div>
                                  <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                                    <div class="box">
                                      <a href="#">
                                        <img src="http://placemi.com/lybbn/1000x750">
                                      </a>
                                    
                                    </div>
                                  </div>
                              </section>
                        <!-- Lightbox -->

                       </div>


                      </div>

                         
                       

                      </div>
                  </div>
    
              </div>
          </div>
          </div><!--category tab-->





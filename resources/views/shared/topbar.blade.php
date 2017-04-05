
<header id="id">

  <nav class="navbar navbar-default">

    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <div class="collapse navbar-collapse js-navbar-collapse">
      
      <!-- start menu -->

      @foreach($treecat as $tc)
      <ul class="nav navbar-nav">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$tc->name}}
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



             <li class="col-sm-3">
                <ul>
                    <li class="dropdown-header">
                    {{$tc->name}}
                     
                     @foreach($tc->subcat as $sc)
                    <li>
                      <a href="#">{{$sc->name}}</a>
                    </li>
                    @endforeach
                    <!-- product -->
                    
                    <li class="divider"></li>
                  </li>
                </ul>
            </li>

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
      @endforeach
     <!-- end menu -->
    
      
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


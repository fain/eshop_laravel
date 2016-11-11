
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/backend/home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw" aria-hidden="true"></i> Product Management <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if(Auth::user()->user_group == 'Admin')
                                    <li>
                                        <a href="/backend/brand">Brand</a>
                                    </li>
                                    <li>
                                        <a href="/backend/categories">Categories</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="/backend/product_listing">Product Listing</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Product Bulk Listing</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Product Info. Management</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Templates</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Customer Reviews / Comments</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Product Q & A</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Order Management <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/backend/products">Awaiting Payment</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Shipping Management</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Completed Order Details</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Pre-Order Details</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Cancelled Transaction Details</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Cancellation Management</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Return Management</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Exchange Management</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Non-Arrival Management</a>
                                </li>
                                <li>
                                    <a href="/backend/products">E-Voucher Management</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i> Settlement Management <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/backend/products">Transfer History</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Sales / Settlement Status</a>
                                </li>
                                <li>
                                    <a href="/backend/products">History Received Tax Invoice</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bullhorn fa-fw" aria-hidden="true"></i> Promotion Management <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/backend/products">Seller Coupon Status</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Promotion Page</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Credit Offer Status</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Member Management <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/backend/products">Seller Details</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Merchant Details</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Seller Grade & Score</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Seller Cash</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Seller Credit</a>
                                </li>
                                <li>
                                    <a href="/backend/products">Listing Ad Coupon</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

            <!-- /.navbar-static-side -->
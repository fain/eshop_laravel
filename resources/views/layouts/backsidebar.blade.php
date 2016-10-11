            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse sidenav-custom">
                <ul class="nav navbar-nav side-nav">
                    <li {{ $page=='home' ? 'class=active' : '' }}>
                        <a href="/backend/home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#product"><i class="fa fa-cube" aria-hidden="true"></i> Product Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="product" class="collapse @if($mainmenu=='product') in @endif">
                            {{--<li>--}}
                                {{--<a href="/backend/categories">Categories</a>--}}
                            {{--</li>--}}
                            <li {{ $page=='product_listing' ? 'class=active' : '' }}>
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
                    <li {{ $page=='categories' || $page=='products' ? 'class=active' : '' }}>
                        <a href="javascript:;" data-toggle="collapse" data-target="#order"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Order Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="order" class="collapse">
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
                    <li {{ $page=='categories' || $page=='products' ? 'class=active' : '' }}>
                        <a href="javascript:;" data-toggle="collapse" data-target="#settle"><i class="fa fa-money" aria-hidden="true"></i> Settlement Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="settle" class="collapse">
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
                    <li {{ $page=='categories' || $page=='products' ? 'class=active' : '' }}>
                        <a href="javascript:;" data-toggle="collapse" data-target="#promo"><i class="fa fa-bullhorn" aria-hidden="true"></i> Promotion Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="promo" class="collapse">
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
                    <li {{ $page=='categories' || $page=='products' ? 'class=active' : '' }}>
                        <a href="javascript:;" data-toggle="collapse" data-target="#member"><i class="fa fa-users" aria-hidden="true"></i> Member Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="member" class="collapse">
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
            <!-- /.navbar-collapse -->
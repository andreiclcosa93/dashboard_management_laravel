    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <!-- User details -->
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{ route('dashboard') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-title">My Profile</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-user"></i>
                            <span>My Profile</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('edit.profile') }}">My Profile</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Manage Section</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-tasks"></i>
                            <span>Manage Suppliers</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('supplier.all') }}">All Supplier</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-paper-plane"></i>
                            <span>Manage Customers</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('customer.all') }}">All Customers</a></li>
                            <li><a href="{{ route('credit.customer') }}">Credit Customers</a></li>
                            <li><a href="{{ route('paid.customer') }}">Paid Customers</a></li>
                            <li><a href="{{ route('customer.wise.report') }}">Customer Wise Report</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-tasks"></i>
                            <span>Manage Units</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('unit.all') }}">All Unit</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-tasks"></i>
                            <span>Manage Category</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('category.all') }}">All Category</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fab fa-product-hunt"></i>
                            <span>Manage Product</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('product.all') }}">All Product</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-store"></i>
                            <span>Manage Purchase</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('purchase.all') }}">All Purchase</a></li>
                            <li><a href="{{ route('purchase.pending') }}">Approve Purchase</a></li>
                            <li><a href="{{ route('daily.purchase.report') }}">Daily Purchase Report</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-file-invoice"></i>
                            <span>Manage Invoice</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('invoice.all') }}">All Invoice</a></li>
                            <li><a href="{{ route('invoice.pending.list') }}">Approve Invoice</a></li>
                            <li><a href="{{ route('print.invoice.list') }}">Print Invoice List</a></li>
                            <li><a href="{{ route('daily.invoice.report') }}">Daily Invoice Report</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fab fa-stack-overflow"></i>
                            <span>Manage Stock</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('stock.report') }}">Stock Report</a></li>
                            <li><a href="{{ route('stock.supplier.wise') }}">Supplier / Product Wise </a></li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </div>

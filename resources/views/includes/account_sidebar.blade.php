<div class="col-3" style="background-color: #ffffff; padding: 0;">
    <div class="row">
        <div class="col-12">
            <ul class="list-group b_bottom">
                <a href="/account">
                    <li class="list-group-item text_dark py-2 pl-5 @if (Request::is('account')) active_sidenav @endif"
                        style="border-top-left-radius: 0; border-top-right-radius: 0;">
                        My Account</li>
                </a>
                <a href="/account/customer/orders">
                    <li
                        class="list-group-item text_dark py-2 pl-5 @if (Request::is('account/customer/orders')) active_sidenav @endif">
                        Orders</li>
                </a>
                <a href="/products">
                    <li
                        class="list-group-item text_dark py-2 pl-5 @if (Request::is('products')) active_sidenav @endif">
                        Manage Products</li>
                </a>
                <a href="/account/edit">
                    <li
                        class="list-group-item text_dark py-2 pl-5 @if (Request::is('account/edit')) active_sidenav @endif">
                        Details</li>
                </a>
                <a href="/account/changepassword">
                    <li
                        class="list-group-item text_dark py-2 pl-5 @if (Request::is('account/changepassword')) active_sidenav @endif">
                        Change Password</li>
                </a>
                <a href="/account/customer/address">
                    <li
                        class="list-group-item text_dark py-2 pl-5 @if (Request::is('account/customer/address')) active_sidenav @endif">
                        Shipping Address</li>
                </a>
                <a href="/categories">
                    <li
                        class="list-group-item text_dark py-2 pl-5 @if (Request::is('account/category')) active_sidenav @endif">
                        Categories</li>
                </a>
                <form id="logout" action="{{ route('logout') }}" method="post">
                    @csrf
                    <li onclick="logout()" class="list-group-item text_dark py-2 pl-5"
                        style="cursor: pointer; border-bottom: 0.5px solid #dfe0e0 !important; color: #d0011b;">LOGOUT</li>
                </form>
            </ul>
        </div>
    </div>
</div>
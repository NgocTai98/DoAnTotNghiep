<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="colorlib-logo"><a href="/">Fashion</a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="/">Trang chủ</a></li>
                        <li class="has-dropdown">
                            <a href="/product">Cửa hàng</a>
                            {{-- <ul class="dropdown">
                                <li><a href="cart.html">Giỏ hàng</a></li>
                                <li><a href="checkout.html">Thanh toán</a></li>

                            </ul> --}}
                        </li>
                        <li><a href="about.html">Giới thiệu</a></li>
                        <li><a href="contact.html">Liên hệ</a></li>
                        <li><a href="/cart"><i class="icon-shopping-cart"></i> Giỏ hàng [{{ Cart::content()->count() }}]</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
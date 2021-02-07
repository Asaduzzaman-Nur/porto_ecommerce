<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{ asset('theme/backend/assets/images/logo-icon.png') }}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Syndash</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('staff.dashboard') }}">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a  href="{{ route('staff.brand.index') }}">
                <div class="parent-icon icon-color-1"><i class="bx bx-list-ol"></i></div>
                <div class="menu-title">Brands</div>
            </a>
        </li>
        <li>
            <a  href="{{ route('staff.category.index') }}">
                <div class="parent-icon icon-color-1"><i class="bx bx-list-ol"></i></div>
                <div class="menu-title">Category</div>
            </a>
        </li>
        <li>
            <a  href="{{ route('staff.product.index') }}">
                <div class="parent-icon icon-color-1"><i class="bx bx-list-ol"></i></div>
                <div class="menu-title">Product</div>
            </a>
        </li>
        <li>
            <a href="#" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i></div>
                <div class="menu-title">Sub-Items</div>
            </a>
            <ul>
                <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Item 1</a></li>
                <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Item 2</a></li>
            </ul>
        </li>

        <li class="menu-label">Others</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-11"><i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">Menu Levels</div>
            </a>
            <ul>
                <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level One</a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Two</a>
                            <ul>
                                <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Three</a>
                                    <ul>
                                        <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level four</a>
                                            <ul>
                                                <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level
                                                        five</a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>

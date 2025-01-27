<aside class="sidebar sidebar-base " id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
            <div class="sidebar-header d-flex align-items-center justify-content-start">
                <a href="/" class="navbar-brand">
                    <!--Logo start-->
                    <div class="logo-main">
                        <div class="logo-normal">
                            <img src="{{ url('logo.png') }}" width="30px">
                            {{-- <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                            </svg> --}}
                        </div>
                        <div class="logo-mini">
                            <img src="{{ url('logo.png') }}" width="30px">
                            {{-- <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                            </svg> --}}
                        </div>
                    </div>
                    <!--logo End-->            
                    <h4 class="logo-title" data-setting="app_name">SimpelAsik</h4>
                </a>
                <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                    <i class="icon">
                        <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </i>
                </div>
            </div>
            <div class="sidebar-body pt-0 data-scrollbar">
                <div class="sidebar-list">
                    <!-- Sidebar Menu Start -->
                    <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                                <span class="default-icon">Home</span>
                                <span class="mini-icon" data-bs-toggle="tooltip" title="Home" data-bs-placement="right">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{url('/')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Dashboard" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li>
                        {{-- MENU DINAMIS --}}
                        
                        @foreach ($menu as $item)
                            @if ($item->children->isEmpty())
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is($item->url) ? 'active' : '' }} {{ Request::is($item->url.'/*') ? 'active' : '' }}" aria-current="page" href="{{ route($item->access) }}">
                                    <i class="icon" data-bs-toggle="tooltip" title="Dashboard" data-bs-placement="right">{!! $item->icon !!}</i>
                                    <span class="item-name">{{$item->menu}}</span>
                                </a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#{{$item->id}}" role="button" aria-expanded="false" aria-controls="sidebar-special">
                                    <i class="icon" data-bs-toggle="tooltip" title="{{$item->menu}}" data-bs-placement="right">{!!$item->icon!!}</i>
                                    <span class="item-name">{{$item->menu}}</span>
                                    <i class="right-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </i>
                                </a>
                                @if ($item->children->isNotEmpty())
                                <ul class="sub-nav collapse" id="{{$item->id}}" data-bs-parent="#sidebar-menu">
                                    @foreach ($item->children as $child)
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is($child->url) ? 'active' : '' }} {{ Request::is($child->url.'/*') ? 'active' : '' }}" href="{{ route($child->access) }}">
                                            <i class="icon">{!! $child->icon !!}</i>
                                            <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Admin Dashboard"
                                                data-bs-placement="right"> AD </i>
                                            <span class="item-name"> {!!$child->menu!!}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endif
                        @endforeach
                        
                        {{--  --}}

                        <li class="nav-item static-item d-none">
                            <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                                <span class="default-icon">CONTOH MENU</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item d-none">
                            <a class="nav-link" aria-current="page" href="https://templates.iqonic.design/hope-ui/pro/html/"
                                target="_blank">
                                <i class="icon" data-bs-toggle="tooltip" title="Design System" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.4"
                                            d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z"
                                            fill="currentColor"></path>
                                        <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">Design System<span class="badge rounded-pill bg-success item-name">UI</span></span>
                            </a>
                        </li>
                        <li class="nav-item d-none">
                            <a class="nav-link" data-bs-toggle="collapse" href="#e-commerce" role="button" aria-expanded="false"
                                aria-controls="sidebar-special">
                                <i class="icon" data-bs-toggle="tooltip" title="E-commerce" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.91064 20.5886C5.91064 19.7486 6.59064 19.0686 7.43064 19.0686C8.26064 19.0686 8.94064 19.7486 8.94064 20.5886C8.94064 21.4186 8.26064 22.0986 7.43064 22.0986C6.59064 22.0986 5.91064 21.4186 5.91064 20.5886ZM17.1606 20.5886C17.1606 19.7486 17.8406 19.0686 18.6806 19.0686C19.5106 19.0686 20.1906 19.7486 20.1906 20.5886C20.1906 21.4186 19.5106 22.0986 18.6806 22.0986C17.8406 22.0986 17.1606 21.4186 17.1606 20.5886Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.1907 6.34909C20.8007 6.34909 21.2007 6.55909 21.6007 7.01909C22.0007 7.47909 22.0707 8.13909 21.9807 8.73809L21.0307 15.2981C20.8507 16.5591 19.7707 17.4881 18.5007 17.4881H7.59074C6.26074 17.4881 5.16074 16.4681 5.05074 15.1491L4.13074 4.24809L2.62074 3.98809C2.22074 3.91809 1.94074 3.52809 2.01074 3.12809C2.08074 2.71809 2.47074 2.44809 2.88074 2.50809L5.26574 2.86809C5.60574 2.92909 5.85574 3.20809 5.88574 3.54809L6.07574 5.78809C6.10574 6.10909 6.36574 6.34909 6.68574 6.34909H20.1907ZM14.1307 11.5481H16.9007C17.3207 11.5481 17.6507 11.2081 17.6507 10.7981C17.6507 10.3781 17.3207 10.0481 16.9007 10.0481H14.1307C13.7107 10.0481 13.3807 10.3781 13.3807 10.7981C13.3807 11.2081 13.7107 11.5481 14.1307 11.5481Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">E-commerce</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="e-commerce" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="https://templates.iqonic.design/hope-ui/pro/html/e-commerce/index.html">
                                        <i class="icon">
                                            <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Admin Dashboard"
                                            data-bs-placement="right"> AD </i>
                                        <span class="item-name"> Admin Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="https://templates.iqonic.design/hope-ui/pro/html/e-commerce/vendor-dashboard.html">
                                        <i class="icon">
                                            <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Wishlist" data-bs-placement="right"> VD
                                        </i>
                                        <span class="item-name">Vendor Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="collapse" href="#shop-main" role="button" aria-expanded="false"
                                        aria-controls="shop-main">
                                        <i class="icon">
                                            <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Shop" data-bs-placement="right">
                                            SP
                                        </i>
                                        <span class="item-name">Shop</span>
                                        <i class="right-icon">
                                            <svg class="submit icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </i>
                                    </a>
                                    <ul class="sub-nav collapse" id="shop-main" data-bs-parent="#e-commerce">
                                        <li class="nav-item">
                                            <a class="nav-link " aria-current="page"
                                                href="https://templates.iqonic.design/hope-ui/pro/html/e-commerce/shop-main.html">
                                                <i class="icon">
                                                    <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                        </g>
                                                    </svg>
                                                </i>
                                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Shop Main"
                                                    data-bs-placement="right"> SM </i>
                                                <span class="item-name">Shop Main</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="https://templates.iqonic.design/hope-ui/pro/html/e-commerce/shop-left-filter.html">
                                                <i class="icon">
                                                    <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                        </g>
                                                    </svg>
                                                </i>
                                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Shop - Left Filter"
                                                    data-bs-placement="right"> SL </i>
                                                <span class="item-name">Shop - Left Filter</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page"
                                        href="https://templates.iqonic.design/hope-ui/pro/html/e-commerce/order-process.html">
                                        <i class="icon">
                                            <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M16.6203 22H7.3797C4.68923 22 2.5 19.8311 2.5 17.1646V11.8354C2.5 9.16894 4.68923 7 7.3797 7H16.6203C19.3108 7 21.5 9.16894 21.5 11.8354V17.1646C21.5 19.8311 19.3108 22 16.6203 22Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M15.7551 10C15.344 10 15.0103 9.67634 15.0103 9.27754V6.35689C15.0103 4.75111 13.6635 3.44491 12.0089 3.44491C11.2472 3.44491 10.4477 3.7416 9.87861 4.28778C9.30854 4.83588 8.99272 5.56508 8.98974 6.34341V9.27754C8.98974 9.67634 8.65604 10 8.24487 10C7.8337 10 7.5 9.67634 7.5 9.27754V6.35689C7.50497 5.17303 7.97771 4.08067 8.82984 3.26285C9.68098 2.44311 10.7814 2.03179 12.0119 2C14.4849 2 16.5 3.95449 16.5 6.35689V9.27754C16.5 9.67634 16.1663 10 15.7551 10Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Order Process"
                                            data-bs-placement="right"> OP </i>
                                        <span class="item-name">Order Process</span>
                                        <div>
                                            <span class="badge bg-info rounded-pill d-inline-block">21</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                            <span class="default-icon">Other</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../dashboard/auth-pro/sign-in.html" target="_blank">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M2 6.447C2 3.996 4.03024 2 6.52453 2H11.4856C13.9748 2 16 3.99 16 6.437V17.553C16 20.005 13.9698 22 11.4744 22H6.51537C4.02515 22 2 20.01 2 17.563V16.623V6.447Z" fill="currentColor"></path>
                                    <path d="M21.7787 11.4548L18.9329 8.5458C18.6388 8.2458 18.1655 8.2458 17.8723 8.5478C17.5802 8.8498 17.5811 9.3368 17.8743 9.6368L19.4335 11.2298H17.9386H9.54826C9.13434 11.2298 8.79834 11.5748 8.79834 11.9998C8.79834 12.4258 9.13434 12.7698 9.54826 12.7698H19.4335L17.8743 14.3628C17.5811 14.6628 17.5802 15.1498 17.8723 15.4518C18.0194 15.6028 18.2113 15.6788 18.4041 15.6788C18.595 15.6788 18.7868 15.6028 18.9329 15.4538L21.7787 12.5458C21.9199 12.4008 21.9998 12.2048 21.9998 11.9998C21.9998 11.7958 21.9199 11.5998 21.7787 11.4548Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Sign Out</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M22 11.9998C22 17.5238 17.523 21.9998 12 21.9998C6.477 21.9998 2 17.5238 2 11.9998C2 6.47776 6.477 1.99976 12 1.99976C17.523 1.99976 22 6.47776 22 11.9998Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8701 12.6307C12.8701 13.1127 12.4771 13.5057 11.9951 13.5057C11.5131 13.5057 11.1201 13.1127 11.1201 12.6307V8.21069C11.1201 7.72869 11.5131 7.33569 11.9951 7.33569C12.4771 7.33569 12.8701 7.72869 12.8701 8.21069V12.6307ZM11.1251 15.8035C11.1251 15.3215 11.5161 14.9285 11.9951 14.9285C12.4881 14.9285 12.8801 15.3215 12.8801 15.8035C12.8801 16.2855 12.4881 16.6785 12.0051 16.6785C11.5201 16.6785 11.1251 16.2855 11.1251 15.8035Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Help</span>
                        </a>
                    </li>
                    <!-- Sidebar Menu End -->        
                </div>
            </div>
            <div class="sidebar-footer"></div>
        </aside>
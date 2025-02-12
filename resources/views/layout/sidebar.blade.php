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
                            <img src="{{ url('logo.png') }}"z>
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
                        @hasanyrole(str_replace(',', '|', $item->roles))
                            @if ($item->children->isEmpty())
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is($item->url) ? 'active' : '' }} {{ Request::is($item->url.'/*') ? 'active' : '' }}" aria-current="page" href="{{ url($item->url) }}" <?php /* href="{{ route($item->access) }}" */ ?>>
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
                                        <a class="nav-link {{ Request::is($child->url) ? 'active' : '' }} {{ Request::is($child->url.'/*') ? 'active' : '' }}" href="{{ url($child->url) }}" <?php /* href="{{ route($child->access) }}" */ ?>>
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
                            @endhasanyrole
                        @endforeach
                        
                        {{--  --}}

                    </ul>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                            <span class="default-icon">Other</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link bg-transparent border-0 d-flex align-items-center">
                                <i class="icon">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M2 6.447C2 3.996 4.03024 2 6.52453 2H11.4856C13.9748 2 16 3.99 16 6.437V17.553C16 20.005 13.9698 22 11.4744 22H6.51537C4.02515 22 2 20.01 2 17.563V16.623V6.447Z" fill="currentColor"></path>
                                        <path d="M21.7787 11.4548L18.9329 8.5458C18.6388 8.2458 18.1655 8.2458 17.8723 8.5478C17.5802 8.8498 17.5811 9.3368 17.8743 9.6368L19.4335 11.2298H17.9386H9.54826C9.13434 11.2298 8.79834 11.5748 8.79834 11.9998C8.79834 12.4258 9.13434 12.7698 9.54826 12.7698H19.4335L17.8743 14.3628C17.5811 14.6628 17.5802 15.1498 17.8723 15.4518C18.0194 15.6028 18.2113 15.6788 18.4041 15.6788C18.595 15.6788 18.7868 15.6028 18.9329 15.4538L21.7787 12.5458C21.9199 12.4008 21.9998 12.2048 21.9998 11.9998C21.9998 11.7958 21.9199 11.5998 21.7787 11.4548Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Sign Out</span>
                            </button>
                        </form>
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
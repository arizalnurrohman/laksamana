                <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu left-border">
                   <div class="container-fluid navbar-inner">
                      <a href="/" class="navbar-brand">
                         
                         <!--Logo start-->
                         <div class="logo-main">
                             <div class="logo-normal">
                                <img src="{{ url('logo.png') }}">
                                {{-- <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                     <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                     <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                     <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                </svg> --}}
                             </div>
                             <div class="logo-mini">
                                <img src="{{ url('logo.png') }}">
                                {{-- <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                     <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                     <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                     <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                </svg> --}}
                             </div>
                         </div>
                         <!--logo End-->         
                         <h4 class="logo-title d-block d-xl-none" data-setting="app_name">Laksamana</h4>
                      </a>
                      <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                         <i class="icon d-flex">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24">
                               <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                         </i>
                      </div>
                      <div class="d-flex align-items-center justify-content-between product-offcanvas">
                        <div class="breadcrumb-title border-end me-3 pe-3 d-none d-xl-block">
                            <small class="mb-0 text-capitalize">@if ($activeMenu) {{ $activeMenu->menu }} @else Dashboard @endif</small>
                        </div>
                        
                      </div>
                      <div class="d-flex align-items-center">
                         <button id="navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                               <span class="navbar-toggler-bar bar1 mt-1"></span>
                               <span class="navbar-toggler-bar bar2"></span>
                               <span class="navbar-toggler-bar bar3"></span>
                            </span>
                         </button>
                      </div>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                            <li class="nav-item dropdown me-0 me-xl-3">
                               <div class="d-flex align-items-center mr-2 iq-font-style" role="group" aria-label="First group"
                                  data-setting="radio">
                                  <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-sm" id="font-size-sm">
                                  <label for="font-size-sm" class="btn btn-border border-0 btn-icon btn-sm" data-bs-toggle="tooltip"
                                     title="Font size 14px" data-bs-placement="bottom">
                                     <span class="mb-0 h6" style="color: inherit !important;">A</span>
                                  </label>
                                  <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-md" id="font-size-md">
                                  <label for="font-size-md" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip"
                                     title="Font size 16px" data-bs-placement="bottom">
                                     <span class="mb-0 h4" style="color: inherit !important;">A</span>
                                  </label>
                                  <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-lg" id="font-size-lg">
                                  <label for="font-size-lg" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip"
                                     title="Font size 18px" data-bs-placement="bottom">
                                     <span class="mb-0 h2" style="color: inherit !important;">A</span>
                                  </label>
                               </div>
                            </li>
                            <li class="nav-item dropdown border-end pe-3 d-none d-xl-block">
                               <div class="form-group input-group mb-0 search-input">
                                  <input type="text" class="form-control" placeholder="Search...">
                                  <span class="input-group-text">
                                     <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                                           stroke-linecap="round" stroke-linejoin="round"></circle>
                                        <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                           stroke-linecap="round" stroke-linejoin="round"></path>
                                     </svg>
                                  </span>
                               </div>
                            </li>
                            <li class="nav-item dropdown iq-responsive-menu border-end d-block d-xl-none">
                               <div class="btn btn-sm bg-body" id="navbarDropdown-search-11" role="button" data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                  <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></circle>
                                     <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                  </svg>
                               </div>
                               <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-search-11"
                                  style="width: 25rem;">
                                  <li class="px-3 py-0">
                                     <div class="form-group input-group mb-0">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-text">
                                           <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                              xmlns="http://www.w3.org/2000/svg">
                                              <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                                                 stroke-linecap="round" stroke-linejoin="round"></circle>
                                              <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                                 stroke-linecap="round" stroke-linejoin="round"></path>
                                           </svg>
                                        </span>
                                     </div>
                                  </li>
                               </ul>
                            </li>
                            
                            <li class="nav-item dropdown" id="itemdropdown1">
                               <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  <div class="btn btn-primary btn-icon btn-sm rounded-pill">
                                     <span class="btn-inner">
                                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                           xmlns="http://www.w3.org/2000/svg">
                                           <path
                                              d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z"
                                              fill="currentColor"></path>
                                           <path opacity="0.4"
                                              d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z"
                                              fill="currentColor"></path>
                                        </svg>
                                     </span>
                                  </div>
                               </a>
                               <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <li>
                                     <a class="dropdown-item" href="app/user-profile.html">Profile</a>
                                  </li>
                                  <li>
                                     <a class="dropdown-item" href="app/user-privacy-setting.html">Privacy Setting</a>
                                  </li>
                                  <li>
                                     <hr class="dropdown-divider">
                                  </li>
                                  <li>
                                     <a class="dropdown-item" href="auth/sign-in.html">Logout</a>
                                  </li>
                               </ul>
                            </li>
                            <li class="nav-item iq-full-screen d-none d-xl-block" id="fullscreen-item">
                               <a href="#" class="nav-link" id="btnFullscreen" data-bs-toggle="dropdown">
                                  <div class="btn btn-primary btn-icon btn-sm rounded-pill">
                                     <span class="btn-inner">
                                        <svg class="normal-screen icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                           xmlns="http://www.w3.org/2000/svg">
                                           <path d="M18.5528 5.99656L13.8595 10.8961" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                           <path d="M14.8016 5.97618L18.5524 5.99629L18.5176 9.96906" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                           <path d="M5.8574 18.896L10.5507 13.9964" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                           <path d="M9.60852 18.9164L5.85775 18.8963L5.89258 14.9235" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <svg class="full-normal-screen d-none icon-24" width="24" height="24" viewBox="0 0 24 24"
                                           fill="none" xmlns="http://www.w3.org/2000/svg">
                                           <path d="M13.7542 10.1932L18.1867 5.79319" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                           <path d="M17.2976 10.212L13.7547 10.1934L13.7871 6.62518" stroke="currentColor"
                                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                           <path d="M10.4224 13.5726L5.82149 18.1398" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                           <path d="M6.74391 13.5535L10.4209 13.5723L10.3867 17.2755" stroke="currentColor"
                                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                     </span>
                                  </div>
                               </a>
                            </li>
                         </ul>
                      </div>
                   </div>
                </nav>
<!--begin::Aside-->
<div id="kt_aside" class="aside pb-5 pt-5 pt-lg-0" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'80px', '300px': '100px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo py-5 border-bottom" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{ route('orders.index') }}" class="d-flex align-items-center">
            <img alt="Logo" src="{{ asset('assets/image/logo.jpeg')}}" class="h-70px logo" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside user-->
    <div class="aside-user mt-2 mb-lg-2 border-bottom" id="kt_aside_user">
        <!--begin::User-->
        <div class="d-flex align-items-center flex-column">
            <!--begin::Symbol-->
            <div class="symbol symbol-60px mb-2 symbol-circle">
                <img src="{{ (Auth::user()->avatar != '') ? url('').'/images'.config('global.USER_IMG_PATH').Auth::user()->avatar : asset('assets/media/avatars/300-1.jpg')  }}" alt="">
            </div>
            <!--end::Symbol-->
            <!--begin::Info-->
            <div class="text-center">
                <!--begin::Username-->
                <p class="text-white fw-bolder fs-4 mb-0">{{ Auth::user()->name }}</p>
                <!--end::Username-->
                <!--begin::Description-->
                <span class="text-gray-400 fw-semibold d-block fs-7 mb-1"> {{ (Auth::user()->userType == 1) ? "Bussiness" : "Administrator" }}</span>
                <!--end::Description-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::User-->
    </div>
    <!--end::Aside user-->
    <!--begin::Aside menu-->
    <div class="aside-menu hover-scroll-overlay-y" id="kt_aside_menu" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
        <!--begin::Aside Menu-->
        <div class="my-2 my-lg-2 pe-lg-n1" id="kt_aside_menu_wrapper" >
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold" id="#kt_aside_menu" data-kt-menu="true">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ url('orders') }}">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-boxes text-gray-100" viewBox="0 0 16 16">
                                <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"></path>
                              </svg>
                        </span>
                        <span class="menu-title">Orders</span>
                    </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ url('scanner') }}">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-qr-code-scan text-gray-100" viewBox="0 0 16 16">
                                <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z"/>
                                <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z"/>
                                <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z"/>
                                <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z"/>
                                <path d="M12 9h2V8h-2v1Z"/>
                              </svg>
                        </span>
                        <span class="menu-title">Scanner</span>
                    </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ url('scan') }}">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-upc-scan text-gray-100" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"></path>
                              </svg>
                        </span>
                        <span class="menu-title">Scan</span>
                    </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ url('feedbacks') }}">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill-lock text-gray-100" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"></path>
                              </svg>
                        </span>
                        <span class="menu-title">Feedbacks</span>
                    </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ url('tickets') }}">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-ticket-perforated text-gray-100" viewBox="0 0 16 16">
                                <path d="M4 4.85v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z"/>
                                <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Z"/>
                              </svg>
                        </span>
                        <span class="menu-title">Tickets</span>
                    </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @if (Auth::user()->userType == 1)
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ url('my-account') }}">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-key text-gray-100" viewBox="0 0 16 16">
                                <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"></path>
                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                              </svg>
                        </span>
                        <span class="menu-title">My Account</span>
                    </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ url('support') }}">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-question-circle text-gray-100" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"></path>
                              </svg>
                        </span>
                        <span class="menu-title">Support</span>
                    </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @endif
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('logout') }} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-power text-gray-100" viewBox="0 0 16 16">
                                <path d="M7.5 1v7h1V1h-1z"/>
                                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                              </svg>
                        </span>
                        <span class="menu-title">Logout</span>
                    </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    {{-- <div class="aside-footer flex-column-auto" id="kt_aside_footer">
        <!--begin::Menu-->
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btm-sm btn-icon btn-custom btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Quick actions">
                <i class="fonticon-notification fs-1"></i>
            </button>
            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mb-3 opacity-75"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">New Ticket</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">New Customer</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                    <!--begin::Menu item-->
                    <a href="#" class="menu-link px-3">
                        <span class="menu-title">New Group</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu item-->
                    <!--begin::Menu sub-->
                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Admin Group</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Staff Group</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Member Group</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu sub-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">New Contact</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mt-3 opacity-75"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content px-3 py-3">
                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                    </div>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu 2-->
        </div>
        <!--end::Menu-->
    </div> --}}
    <!--end::Footer-->
</div>
<!--end::Aside-->

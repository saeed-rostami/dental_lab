<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route("admin.index") }}">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a wire:navigate class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">کاربران</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a wire:navigate class="nav-link" href="{{ route('admin.courses.index') }}">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">دوره ها</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a wire:navigate class="nav-link" href="{{ route('admin.services.index') }}">
                    <i class="fe fe-server fe-16"></i>
                    <span class="ml-3 item-text">خدمات</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a wire:navigate class="nav-link" href="{{ route('admin.comment.index') }}">
                    <i class="fe fe-rewind fe-16"></i>
                    <span class="ml-3 item-text">نظرات</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a wire:navigate class="nav-link" href="{{ route('admin.ticket.index') }}">
                    <i class="fe fe-message-square fe-16"></i>
                    <span class="ml-3 item-text">پیام ها</span>
                </a>
            </li>
        </ul>


        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a wire:navigate class="nav-link" href="{{route('admin.settings')}}">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text">تنظیمات</span>
                </a>
            </li>
        </ul>


    </nav>
</aside>

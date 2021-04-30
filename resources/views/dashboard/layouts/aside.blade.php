<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/') }}"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">لوحة التحكم</span>
                    </a>
                </li>
                @permission('companies-read')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('companies.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="hide-menu">الشركات</span>
                    </a>
                </li>
                @endpermission
                @permission('customers-read')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('customers.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">العملاء</span>
                    </a>
                </li>
                @endpermission
                @permission('delegates-read')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('delegates.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-font" aria-hidden="true"></i>
                        <span class="hide-menu">المناديب</span>
                    </a>
                </li>
                @endpermission
                @permission('items-read')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('items.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="hide-menu">الاصناف</span>
                    </a>
                </li>
                @endpermission
                @permission('users-read')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <span class="hide-menu">المستخدمين</span>
                    </a>
                </li>
                @endpermission
                
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
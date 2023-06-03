<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            @if(auth()->user()->getRoleNames()->first() == "Super Admin")
            <a class="nav-link " href="{{route('super-admin.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
            @endif
        </li><!-- End Dashboard Nav -->

        @if(auth()->user()->getRoleNames()->first() == "Super Admin")

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('super-admin-user.index')}}">
                            <i class="bi bi-circle"></i><span>View User</span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#client-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-square"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="client-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('super-admin-client.index')}}">
                            <i class="bi bi-circle"></i><span>View Client</span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#software-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-laptop"></i><span>Softwares</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="software-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('super-admin-software.index')}}">
                            <i class="bi bi-circle"></i><span>View Software</span>
                        </a>
                    </li>


                </ul>
            </li>
        @endif

    </ul>

</aside><!-- End Sidebar-->

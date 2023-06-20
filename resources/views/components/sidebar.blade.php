<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('master.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>



        @can('manage-user')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('master-user.index')}}">
                            <i class="bi bi-circle"></i><span>View User</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan


        @can('manage-client')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#client-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-square"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="client-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('master-client.index')}}">
                            <i class="bi bi-circle"></i><span>View Client</span>
                        </a>
                    </li>


                </ul>
            </li>
        @endcan

        @can('manage-software')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#software-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-laptop"></i><span>Softwares</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="software-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('master-software.index')}}">
                            <i class="bi bi-circle"></i><span>View Software</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan



        @can('manage-ticket')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#ticket-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-ticket"></i><span>Tickets</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="ticket-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('master-ticket.index')}}">
                            <i class="bi bi-circle"></i><span>View Tickets</span>
                        </a>
                    </li>
                    @can('manage-category')
                        <li>
                            <a href="{{route('master-category.index')}}">
                                <i class="bi bi-circle"></i><span>View Category</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-status')
                        <li>
                            <a href="{{route('master-status.index')}}">
                                <i class="bi bi-circle"></i><span>View Status</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan



        @can('manage-license')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#license-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-card-list"></i><span>Licences</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="license-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('master-license.index')}}">
                            <i class="bi bi-circle"></i><span>View License</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan


        @can('manage-tools')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tools-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>Developer Tools</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tools-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('master-role.index')}}">
                            <i class="bi bi-circle"></i><span>Roles</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('master-permission.index')}}">
                            <i class="bi bi-circle"></i><span>Permission</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('master-ticket-template.index')}}">
                            <i class="bi bi-circle"></i><span>Ticket Template</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

    </ul>

</aside><!-- End Sidebar-->

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            @if(auth()->user()->getRoleNames()->first() == "Super Admin")
            <a class="nav-link " href="{{route('master.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
            @endif
        </li><!-- End Dashboard Nav -->

        @role('Administrator')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('administrator-user.index')}}">
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
                        <a href="{{route('administrator-client.index')}}">
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
                        <a href="{{route('administrator-software.index')}}">
                            <i class="bi bi-circle"></i><span>View Software</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#ticket-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-ticket"></i><span>Tickets</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="ticket-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('administrator-ticket.index')}}">
                            <i class="bi bi-circle"></i><span>View Tickets</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('administrator-category.index')}}">
                            <i class="bi bi-circle"></i><span>View Category</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('administrator-status.index')}}">
                            <i class="bi bi-circle"></i><span>View Status</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#license-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-card-list"></i><span>Licences</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="license-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('administrator-license.index')}}">
                            <i class="bi bi-circle"></i><span>View License</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        @role('Super Admin')
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
                    <li>
                        <a href="{{route('master-category.index')}}">
                            <i class="bi bi-circle"></i><span>View Category</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('master-status.index')}}">
                            <i class="bi bi-circle"></i><span>View Status</span>
                        </a>
                    </li>
                </ul>
            </li>
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
        @endrole


        @role('Developer')
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
                    <li>
                        <a href="{{route('master-category.index')}}">
                            <i class="bi bi-circle"></i><span>View Category</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('master-status.index')}}">
                            <i class="bi bi-circle"></i><span>View Status</span>
                        </a>
                    </li>
                </ul>
            </li>
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
        @endrole

        @role('Support')
            <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#ticket-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-ticket"></i><span>Tickets</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ticket-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('support-ticket.index')}}">
                        <i class="bi bi-circle"></i><span>View Tickets</span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="{{route('support-category.index')}}">--}}
{{--                        <i class="bi bi-circle"></i><span>View Category</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="{{route('support-status.index')}}">--}}
{{--                        <i class="bi bi-circle"></i><span>View Status</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </li>
        @endrole


        @role('Licenser')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#license-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-card-list"></i><span>Licences</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="license-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('licenser-license.index')}}">
                            <i class="bi bi-circle"></i><span>View License</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">--}}
{{--                <i class="bi bi-file"></i><span>File Report</span><i class="bi bi-chevron-down ms-auto"></i>--}}
{{--            </a>--}}
{{--            <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">--}}
{{--                <li>--}}
{{--                    <a href="{{route('master-report.index')}}">--}}
{{--                        <i class="bi bi-circle"></i><span>View File Report</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

        @role('Developer')
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

{{--                <li>--}}
{{--                    <a href="{{route('master-permission.index')}}">--}}
{{--                        <i class="bi bi-circle"></i><span>Permissions</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </li>
        @endrole

    </ul>

</aside><!-- End Sidebar-->

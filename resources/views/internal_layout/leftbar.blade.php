{{ $active = 0 }}

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! url('assets/admin/dist/img/blank.png') !!}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->username }}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" style="margin-bottom: 200px;">
            <li class="header">MAIN NAVIGATION</li>
            @if ($activepage == 1)
                <li class="active"><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i>
                        <span>Dashboard</span></a></li>
            @else
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
            @endif

            @if ($superAdmin || in_array(config('permissions.publisher_list.view'), $permissions))
                @if ($activepage == 3)
                    <li class="active"><a href="{{ route('publishers.show') }}"><i class="fa fa-users"></i>
                            <span>Publishers</span></a></li>
                @else
                    <li><a href="{{ route('publishers.show') }}"><i class="fa fa-users"></i> <span>Publishers</span></a>
                    </li>
                @endif
            @endif
            @if ($activepage == 4)
                @if ($superAdmin || in_array(config('permissions.withdrawls.view'), $permissions))
                    <li class="active"><a href="{{ route('widthdrawls.show') }}"><i class="fa fa-dollar"></i>
                            <span>Withdrawls</span></a></li>
                @endif
            @else
                @if ($superAdmin || in_array(config('permissions.withdrawls.view'), $permissions))
                    <li><a href="{{ route('widthdrawls.show') }}"><i class="fa fa-dollar"></i> <span>Withdrawls</span></a>
                    </li>
                @endif
            @endif


            @if ($activepage == 5)
                <li class="active"><a href="{{ route('alertmsg.show') }}"><i class="fa fa-bell"></i> <span>Alert
                            Message</span></a></li>
            @else
                <li><a href="{{ route('alertmsg.show') }}"><i class="fa fa-bell"></i> <span>Alert Message</span></a>
                </li>
            @endif
            @if ($superAdmin || in_array(config('permissions.add_url.view'), $permissions))
                @if ($activepage == 11)
                    <li class="active"><a href="{{ route('addurl.show') }}"><i class="fa fa-globe"></i> <span>Add
                                URL</span></a></li>
                @else
                    <li><a href="{{ route('addurl.show') }}"><i class="fa fa-globe"></i> <span>Add URL</span></a></li>
                @endif
            @endif


            @if ($superAdmin || in_array(config('permissions.add_url.view'), $permissions))
                @if ($activepage == 111)
                    <li class="active"><a href="{{ route('addurlamz.show') }}"><i class="fa fa-globe"></i> <span>Add
                                URL AMZ</span></a></li>
                @else
                    <li><a href="{{ route('addurlamz.show') }}"><i class="fa fa-globe"></i> <span>Add URL AMZ</span></a></li>
                @endif
            @endif

            @if ($superAdmin || in_array(config('permissions.geo_targeting.view'), $permissions))

                @if ($activepage == 19)
                    <li class="active"><a href="{{ route('geocode.show') }}"><i class="fa fa-globe"></i> <span>Geo
                                Code</span></a></li>
                @else
                    <li><a href="{{ route('geocode.show') }}"><i class="fa fa-globe"></i> <span>Geo Code</span></a>
                    </li>
                @endif
            @endif


            @if ($superAdmin || in_array(config('permissions.landing_domain.view'), $permissions))
                <li class="header">IP REDIRECTION</li>
                @if ($activepage == 8)
                    <li class="active"><a href="{{ route('landing.show') }}"><i class="fa fa-globe"></i> <span>Landing
                                Domain</span></a></li>
                @else
                    <li><a href="{{ route('landing.show') }}"><i class="fa fa-globe"></i> <span>Landing
                                Domain</span></a>
                    </li>
                @endif
            @endif
            @if ($superAdmin || in_array(config('permissions.redirect_domain.view'), $permissions))
                @if ($activepage == 9)
                    <li class="active"><a href="{{ route('redirect.show') }}"><i class="fa fa-globe"></i>
                            <span>Redirect
                                Domain</span></a></li>
                @else
                    <li><a href="{{ route('redirect.show') }}"><i class="fa fa-globe"></i> <span>Redirect
                                Domain</span></a>
                    </li>
                @endif
            @endif


            @if ($superAdmin || in_array(config('permissions.landing_domain.view'), $permissions))
                <li class="header">IP REDIRECTION POPUP</li>
                @if ($activepage == 18)
                    <li class="active"><a href="{{ route('landingPopup.show') }}"><i class="fa fa-globe"></i> <span>Landing Popup Domain</span></a></li>
                @else
                    <li><a href="{{ route('landingPopup.show') }}"><i class="fa fa-globe"></i> <span>Landing Popup Domain</span></a>
                    </li>
                @endif
            @endif
            @if ($superAdmin || in_array(config('permissions.redirect_domain.view'), $permissions))
                @if ($activepage == 19)
                    <li class="active"><a href="{{ route('redirectPopup.show') }}"><i class="fa fa-globe"></i>
                            <span>Redirect
                                Domain Popup</span></a></li>
                @else
                    <li><a href="{{ route('redirectPopup.show') }}"><i class="fa fa-globe"></i> <span>Redirect
                                Domain Popup</span></a>
                    </li>
                @endif
            @endif

            @if ($superAdmin || in_array(config('permissions.landing_domain.view'), $permissions))
                <li class="header">IP REDIRECTION POP line</li>
                @if ($activepage == 28)
                    <li class="active"><a href="{{ route('landingPopupInline.show') }}"><i class="fa fa-globe"></i> <span>Landing Pop Line</span></a></li>
                @else
                    <li><a href="{{ route('landingPopupInline.show') }}"><i class="fa fa-globe"></i> <span>Landing Pop Line</span></a>
                    </li>
                @endif
            @endif
            @if ($superAdmin || in_array(config('permissions.redirect_domain.view'), $permissions))
                @if ($activepage == 29)
                    <li class="active"><a href="{{ route('redirectPopupInline.show') }}"><i class="fa fa-globe"></i>
                            <span>Redirect
                                 Pop Line</span></a></li>
                @else
                    <li><a href="{{ route('redirectPopupInline.show') }}"><i class="fa fa-globe"></i> <span>Redirect
                             Pop Lnline</span></a>
                    </li>
                @endif
            @endif

            @if ($superAdmin || in_array(config('permissions.user_management.view'), $permissions))
                <li class="header">User</li>
                @if ($activepage == 2)
                    <li class="active"><a href="{{ route('users.show') }}"><i class="fa fa-user"></i>
                            <span>Users</span></a></li>
                @else
                    <li><a href="{{ route('users.show') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                @endif
            @endif
            @if ($superAdmin || in_array(config('permissions.role_management.view'), $permissions))

                @if ($activepage == 22)
                    <li class="active"><a href="{{ route('roles.show') }}"><i class="fa fa-user"></i>
                            <span>Roles</span></a></li>
                @else
                    <li><a href="{{ route('roles.show') }}"><i class="fa fa-user"></i> <span>Roles</span></a></li>
                @endif
            @endif

            @if ($superAdmin || in_array(config('permissions.activity_log.view'), $permissions))
                <li class="header">Logs</li>
                @if ($activepage == 23)
                    <li class="active"><a href="{{ route('log_activity.show') }}"><i class="icon-activity"></i>
                            <span>Activity Logs</span></a></li>
                @else
                    <li><a href="{{ route('log_activity.show') }}"><i class="icon-activity"></i> <span>Activity
                                Logs</span></a></li>
                @endif
            @endif

            @if ($superAdmin || in_array(config('permissions.tracking.view'), $permissions))
                <li class="header">Report</li>
                @if ($activepage == 24)
                    <li class="active"><a href="{{ route('tracking.show') }}"><i class="fa fa-history"></i>
                            <span>Tracking</span></a></li>
                @else
                    <li><a href="{{ route('tracking.show') }}"><i class="fa fa-history"></i> <span>Tracking</span></a>
                    </li>
                @endif
            @endif

            @if ($superAdmin || in_array(config('permissions.finance.view'), $permissions))
                <li class="header">Payment</li>
                @if ($activepage == 25)
                    <li class="active"><a href="{{ route('finance.list') }}"><i class="fa fa-money"></i>
                            <span>Finances</span></a></li>
                @else
                    <li><a href="{{ route('finance.list') }}"><i class="fa fa-money"></i> <span>Finances</span></a>
                    </li>
                @endif
            @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

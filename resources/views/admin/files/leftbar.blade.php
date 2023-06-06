

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
                    <p></p>

                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
          
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" style="margin-bottom: 200px;">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{ ($active == 1)?'active':'' }}"><a href="{!! url('wp-network/dashboard') !!}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                
                <li class="{{ ($active == 3)?'active':'' }}"><a href="{!! url('wp-network/publishers') !!}"><i class="fa fa-users"></i> <span>Publishers</span></a></li>
                <li class="{{ ($active == 4)?'active':'' }}"><a href="{!! url('wp-network/widthdrawls') !!}"><i class="fa fa-dollar"></i> <span>Withdrawls</span></a></li>
                
                <li class="{{ ($active == 5)?'active':'' }}"><a href="{!! url('wp-network/alert-message') !!}"><i class="fa fa-bell"></i> <span>Alert Message</span></a></li>
                <li class="{{ ($active == 11)?'active':'' }}"><a href="{!! url('wp-network/add-url') !!}"><i class="fa fa-globe"></i> <span>Add URL</span></a></li>

                <li class="header">IP REDIRECTION</li>
                <li class="{{ ($active == 8)?'active':'' }}"><a href="{!! url('wp-network/landing') !!}"><i class="fa fa-globe"></i> <span>landing Domain</span></a></li>
                <li class="{{ ($active == 9)?'active':'' }}"><a href="{!! url('wp-network/redirect') !!}"><i class="fa fa-globe"></i> <span>Redirect Domain</span></a></li>

                <li class="{{ ($active == 6)?'active':'' }}"><a href="{!! url('wp-network/domain') !!}"><i class="fa fa-globe"></i> <span>IP / Domain</span></a></li>
                <li class="{{ ($active == 7)?'active':'' }}"><a href="{!! url('wp-network/expired-domain') !!}"><i class="fa fa-empire"></i> <span>Expired Domain</span></a></li>
                    
                <li class="header">STATISTICS</li>
                <li class="treeview {{ ($active == 10)?'active':'' }} ">
                    <a href="javascript:void(0)">
                        <i class="fa fa-file-text"></i> <span>Report</span> <i class="fa fa-angle-left pull-right"></i>
                     </a>
                    <ul class="treeview-menu">
                        
                        <li class="{{ (isset($subpage) && $subpage == '10.1')?'active':'' }}"><a href="{!! url('wp-network/report/today-track') !!}"><i class="fa fa-circle-o"></i> <span>Today Tracking</span></a></li>
						<li class="{{ (isset($subpage) && $subpage == '10.2')?'active':'' }}"><a href="{!! url('wp-network/report/yesterday-track') !!}"><i class="fa fa-circle-o"></i> <span>Yesterday Tracking</span></a></li>
						<li class="{{ (isset($subpage) && $subpage == '10.3')?'active':'' }}"><a href="{!! url('wp-network/report/search-track') !!}"><i class="fa fa-circle-o"></i> <span>Search Tracking</span></a></li>
                        
                    </ul>
                </li>

                <li class="{{ ($active == 2)?'active':'' }}"><a href="{!! url('wp-network/users') !!}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                <li class="{{ ($active == 21)?'active':'' }}"><a href="{!! url('wp-network/roles') !!}"><i class="fa fa-user"></i> <span>Roles</span></a></li> 

            
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
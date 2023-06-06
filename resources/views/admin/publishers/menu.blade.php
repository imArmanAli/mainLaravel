<!-- Profile Image -->
<div class="box box-primary">
    <div class="box-body box-profile">
        @if ($singnod->logo != '')
            <img class="profile-user-img img-responsive img-circle" style="margin: 0 auto; height: 100px;"
                src="{!! url('assets/front/upload/profile' . $singnod->logo) !!}" alt="User profile picture">
        @else
            <img class="profile-user-img img-responsive img-circle" style="margin: 0 auto; height: 100px;"
                src="{!! url('assets/front/upload/profile/blank.png') !!}" alt="User profile picture">
        @endif

        <h3 class="profile-username text-center"><?php echo ucwords($singnod->f_name . ' ' . $singnod->l_name); ?></h3>
        <p class="text-muted text-center"><?php echo $singnod->username; ?></p>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Status</b> <a class="pull-right">
                    @if ($singnod->reg_status == 1)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-danger">Pending</span>
                    @endif
                </a>
            </li>
            <li class="list-group-item">
                <b>Last Login Ip</b> <a class="pull-right"><?php echo $singnod->last_login_ip; ?></a>
            </li>
            <li class="list-group-item">
                <b>Last Login Date</b>
                <a class="pull-right">
                    @php($dt = new datetime($singnod->last_login_time))
                    {{ $dt->format('d-M-Y') }}
                </a>
            </li>
            <li class="list-group-item">
                <b>Last Login Time</b>
                <a class="pull-right">
                    @php($dt = new datetime($singnod->last_login_time))
                    {{ $dt->format('H:i a') }}
                </a>
            </li>

        </ul>
        @if ($singnod->reg_status == 1)
            <a href="{{ route('publishers.inactive', ['id' => "$singnod->id", 'status' => '0']) }}"
                data-original-title="In-Active" data-toggle="tooltip" data-placement="top"
                class="btn btn-primary btn-block"> Make In-Active </a>
        @else
            <a href="{{ route('publishers.active', ['id' => "$singnod->id", 'status' => '1']) }}"
                data-original-title="Active" data-toggle="tooltip" data-placement="top"
                class="btn btn-primary btn-block"> Make Active </a>
        @endif

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- Profile Image -->
<div class="box box-success">
    <div class="box-header">
        Menu
    </div>
    <div class="box-body box-profile userprofilemenu ">
        <ul class="list-group list-group-unbordered">
            @if ($superAdmin || in_array(config('permissions.publisher_profile.view'), $permissions))
                <li class="list-group-item {{ $page == 1 ? 'active' : '' }}"><a
                        href="{{ route('publishers_profile.view', "$singnod->id") }}"><i class="fa fa-user"></i>
                        Profile</a></li>
            @endif

            @if ($superAdmin || in_array(config('permissions.publishers_sites.view'), $permissions))
                <li class="list-group-item {{ $page == 2 ? 'active' : '' }}"><a
                        href="{{ route('publishers_sites.view', "$singnod->id") }}"><i class="fa fa-globe"></i>
                        Sites</a>
                </li>
            @endif
            @if ($superAdmin || in_array(config('permissions.publishers_ad_code.view'), $permissions))
                <li class="list-group-item {{ $page == 3 ? 'active' : '' }}"><a
                        href="{{ route('publishers_adcode.view', "$singnod->id") }}"><i class="fa fa-code"></i> Ad
                        Code</a>
                </li>
            @endif
            @if ($superAdmin || in_array(config('permissions.publishers_ad_link.view'), $permissions))
                <li class="list-group-item {{ $page == 6 ? 'active' : '' }}"><a
                        href="{{ route('publishers_adlink.view', "$singnod->id") }}"><i class="fa fa-link"></i> Ad
                        Link</a>
                </li>
            @endif
            @if ($superAdmin || in_array(config('permissions.publishers_login_history.view'), $permissions))
                <li class="list-group-item {{ $page == 4 ? 'active' : '' }}"><a
                        href="{{ route('publishers_login_history.view', "$singnod->id") }}"><i
                            class="fa fa-history"></i>
                        Login History</a></li>
            @endif
            @if ($superAdmin || in_array(config('permissions.publishers_passsword.view'), $permissions))
                <li class="list-group-item {{ $page == 5 ? 'active' : '' }}"><a
                        href="{{ route('publishers_change_password.view', "$singnod->id") }}"><i class="fa fa-key"></i>
                        Change Password</a></li>
            @endif

        </ul>
    </div>
</div>

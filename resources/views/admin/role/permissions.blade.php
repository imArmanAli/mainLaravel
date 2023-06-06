@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $content_title }}</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{ $content_title }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">

                        <div class="box-body">
                            @if (isset($errors) && count($errors) > 0)
                                <div class="alert alert-warning" role="alert">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($message = Session::get('success', false))
                                <p class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $message }}
                                </p>
                            @endif
                            @if ($message = Session::get('error', false))
                                <p class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $message }}
                                </p>
                            @endif
                            <form action="{{ route('save.permissions') }}" method="post">
                                @csrf
                                <input type="hidden" name="role_id" id="role_id" value="{{ $userId }}">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="30%" class="text-center">Title</th>
                                            <th colspan="4" class="text-center">Action</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th class="text-center">View</th>
                                            <th class="text-center">Add</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th class="text-left">Publishers List</th>
                                            <td class="text-center"><input type="checkbox" name="publishers[]"
                                                    value="1" {{ in_array(1, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers[]"
                                                    value="2" {{ in_array(2, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers[]"
                                                    value="3" {{ in_array(3, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers[]"
                                                    value="4" {{ in_array(4, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Publishers Profile</th>
                                            <td class="text-center"><input type="checkbox" name="publishers_profile[]"
                                                    value="5" {{ in_array(5, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_profile[]"
                                                    value="6" {{ in_array(6, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_profile[]"
                                                    value="7" {{ in_array(7, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_profile[]"
                                                    value="8" {{ in_array(8, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Publishers Sites</th>
                                            <td class="text-center"><input type="checkbox" name="publishers_sites[]"
                                                    value="9" {{ in_array(9, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_sites[]"
                                                    value="10" {{ in_array(10, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_sites[]"
                                                    value="11" {{ in_array(11, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_sites[]"
                                                    value="12" {{ in_array(12, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Publishers Ad Code</th>
                                            <td class="text-center"><input type="checkbox" name="publishers_adcode[]"
                                                    value="13" {{ in_array(13, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_adcode[]"
                                                    value="14" {{ in_array(14, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_adcode[]"
                                                    value="15" {{ in_array(15, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_adcode[]"
                                                    value="16" {{ in_array(16, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Publishers Ad link</th>
                                            <td class="text-center"><input type="checkbox" name="publishers_adlink[]"
                                                    value="17" {{ in_array(17, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_adlink[]"
                                                    value="18" {{ in_array(18, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_adlink[]"
                                                    value="19" {{ in_array(19, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_adlink[]"
                                                    value="20" {{ in_array(20, $userRole) ? 'checked' : '' }}></td>
                                        </tr>


                                        <tr>
                                            <th class="text-left">Publishers Login History</th>
                                            <td class="text-center"><input type="checkbox" name="publishers_history[]"
                                                    value="21" {{ in_array(21, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_history[]"
                                                    value="22" {{ in_array(22, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_history[]"
                                                    value="23" {{ in_array(23, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_history[]"
                                                    value="24" {{ in_array(24, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Publishers Passsword</th>
                                            <td class="text-center"><input type="checkbox" name="publishers_password[]"
                                                    value="25" {{ in_array(25, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_password[]"
                                                    value="26" {{ in_array(26, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_password[]"
                                                    value="27" {{ in_array(27, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="publishers_password[]"
                                                    value="28" {{ in_array(28, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Withdrawls</th>
                                            <td class="text-center"><input type="checkbox" name="Withdrawls[]"
                                                    value="29" {{ in_array(29, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="Withdrawls[]"
                                                    value="30" {{ in_array(30, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="Withdrawls[]"
                                                    value="31" {{ in_array(31, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="Withdrawls[]"
                                                    value="32" {{ in_array(32, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Add Url</th>
                                            <td class="text-center"><input type="checkbox" name="add_url[]"
                                                    value="33" {{ in_array(33, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="add_url[]"
                                                    value="34" {{ in_array(34, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="add_url[]"
                                                    value="35" {{ in_array(35, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="add_url[]"
                                                    value="36" {{ in_array(36, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Geo Targeting</th>
                                            <td class="text-center"><input type="checkbox" name="geo_targeting[]"
                                                    value="37" {{ in_array(37, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="geo_targeting[]"
                                                    value="38" {{ in_array(38, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="geo_targeting[]"
                                                    value="39" {{ in_array(39, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="geo_targeting[]"
                                                    value="40" {{ in_array(40, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Landing Domain</th>
                                            <td class="text-center"><input type="checkbox" name="landin_domain[]"
                                                    value="41" {{ in_array(41, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="landin_domain[]"
                                                    value="42" {{ in_array(42, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="landin_domain[]"
                                                    value="43" {{ in_array(43, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="landin_domain[]"
                                                    value="44" {{ in_array(44, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Redirect Domain</th>
                                            <td class="text-center"><input type="checkbox" name="redirect_domain[]"
                                                    value="45" {{ in_array(45, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="redirect_domain[]"
                                                    value="46" {{ in_array(46, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="redirect_domain[]"
                                                    value="47" {{ in_array(47, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="redirect_domain[]"
                                                    value="48" {{ in_array(48, $userRole) ? 'checked' : '' }}></td>
                                        </tr>


                                        <tr>
                                            <th class="text-left">User Management</th>
                                            <td class="text-center"><input type="checkbox" name="user_management[]"
                                                    value="49" {{ in_array(49, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="user_management[]"
                                                    value="50" {{ in_array(50, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="user_management[]"
                                                    value="51" {{ in_array(51, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="user_management[]"
                                                    value="52" {{ in_array(52, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Role Management</th>
                                            <td class="text-center"><input type="checkbox" name="role_management[]"
                                                    value="53" {{ in_array(53, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="role_management[]"
                                                    value="54" {{ in_array(54, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="role_management[]"
                                                    value="55" {{ in_array(55, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="role_management[]"
                                                    value="56" {{ in_array(56, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Permission Management</th>
                                            <td class="text-center"><input type="checkbox" name="permission_management[]"
                                                    value="57" {{ in_array(57, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="permission_management[]"
                                                    value="58" {{ in_array(58, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="permission_management[]"
                                                    value="59" {{ in_array(59, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="permission_management[]"
                                                    value="60" {{ in_array(60, $userRole) ? 'checked' : '' }}></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Wordpress Button Code</th>
                                            <td class="text-center"><input type="checkbox" name="wordpress_button_code[]"
                                                    value="61" {{ in_array(61, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="wordpress_button_code[]"
                                                    value="62" {{ in_array(62, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="wordpress_button_code[]"
                                                    value="63" {{ in_array(63, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="wordpress_button_code[]"
                                                    value="64" {{ in_array(64, $userRole) ? 'checked' : '' }}></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Ad Code Smart Link</th>
                                            <td class="text-center"><input type="checkbox" name="ad_code_smart_link[]"
                                                    value="65" {{ in_array(65, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="ad_code_smart_link[]"
                                                    value="66" {{ in_array(66, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="ad_code_smart_link[]"
                                                    value="67" {{ in_array(67, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="ad_code_smart_link[]"
                                                    value="68" {{ in_array(68, $userRole) ? 'checked' : '' }}></td>
                                        </tr>

                                        <tr>
                                            <th class="text-left">Ad Code Popup Link</th>
                                            <td class="text-center"><input type="checkbox" name="ad_code_popup_link[]"
                                                    value="69" {{ in_array(69, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="ad_code_popup_link[]"
                                                    value="70" {{ in_array(70, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="ad_code_popup_link[]"
                                                    value="71" {{ in_array(71, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="ad_code_popup_link[]"
                                                    value="72" {{ in_array(72, $userRole) ? 'checked' : '' }}></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Ad Code Popup Inline</th>
                                            <td class="text-center"><input type="checkbox" name="ad_code_popup_inline[]"
                                                    value="73" {{ in_array(73, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="ad_code_popup_inline[]"
                                                    value="74" {{ in_array(74, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="ad_code_popup_inline[]"
                                                    value="75" {{ in_array(75, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="ad_code_popup_inline[]"
                                                    value="76" {{ in_array(76, $userRole) ? 'checked' : '' }}></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Finance</th>
                                            <td class="text-center"><input type="checkbox" name="finance[]"
                                                    value="77" {{ in_array(77, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="finance[]"
                                                    value="78" {{ in_array(78, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="finance[]"
                                                    value="79" {{ in_array(79, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="finance[]"
                                                    value="80" {{ in_array(80, $userRole) ? 'checked' : '' }}></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Tracking</th>
                                            <td class="text-center"><input type="checkbox" name="tracking[]"
                                                    value="81" {{ in_array(81, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="tracking[]"
                                                    value="82" {{ in_array(82, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="tracking[]"
                                                    value="83" {{ in_array(83, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="tracking[]"
                                                    value="84" {{ in_array(84, $userRole) ? 'checked' : '' }}></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Activity Log</th>
                                            <td class="text-center"><input type="checkbox" name="activity_log[]"
                                                    value="85" {{ in_array(85, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="activity_log[]"
                                                    value="86" {{ in_array(86, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="activity_log[]"
                                                    value="87" {{ in_array(87, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox" name="activity_log[]"
                                                    value="88" {{ in_array(88, $userRole) ? 'checked' : '' }}></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Publisher Stat Reports</th>
                                            <td class="text-center"><input type="checkbox"
                                                    name="publisher_stats_report[]" value="89"
                                                    {{ in_array(89, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox"
                                                    name="publisher_stats_report[]" value="90"
                                                    {{ in_array(90, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox"
                                                    name="publisher_stats_report[]" value="91"
                                                    {{ in_array(91, $userRole) ? 'checked' : '' }}></td>
                                            <td class="text-center"><input type="checkbox"
                                                    name="publisher_stats_report[]" value="92"
                                                    {{ in_array(92, $userRole) ? 'checked' : '' }}></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    @if ($superAdmin || in_array(config('permissions.permission_management.edit'), $permissions))
                                        <button class="btn btn-success">Save</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@include('internal_layout.footer')

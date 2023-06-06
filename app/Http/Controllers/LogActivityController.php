<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    public function logActivity()
    {
        $content_title = 'Activity Log';
        $main_content  = 'Activity Log';
        $activepage    =  23;

        $role = (new PermissionService)->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];

        $adm_id = \Auth::id();
        $userList = User::get();

        return view('admin.activity.logActivity',compact('content_title','main_content','activepage','superAdmin','permissions','adm_id','userList'));
    }

    public function logActivitybyId(Request $request)
    {
        $user_id 	=   $request->input('adm');
        return \LogActivity::logActivityLists($user_id);
    }

}

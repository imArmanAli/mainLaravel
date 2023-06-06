<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\clients;
use App\Models\sites;
use App\Services\PermissionService;

class StatisticsController extends Controller
{


    public function stats_pub_id($id = 0)
    {
        $content_title = 'Tracking';
        $main_content  = 'Tracking';
        $activepage    =  24;
        $pub_id = $id;
        $publisherList = Clients::all();
        $role = (new PermissionService)->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        return view('admin.report.list',compact('content_title','main_content','activepage', 'publisherList', 'pub_id','superAdmin','permissions'));
    }

    public function sites_by_pub_id($id)
    {
        return Sites::where(['pid'=>$id])->get();
    }

    public function pub_reporting(Request $request)
    {
        $pub_id 	=   $request->input('pub');
        $dateRange 	=   $request->input('dateRange');
        $device 	=   $request->input('device');
        $site 	=   $request->input('site');

        $logs = \Statistics::getStatistics($pub_id, $dateRange, $device, $site);

        return $logs;

    }
}

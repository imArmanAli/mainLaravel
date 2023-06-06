<?php


namespace App\Helpers;
use Request;
use App\Models\LogActivity as LogActivityModel;


class LogActivity
{


    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	// $log['agent'] = Request::header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 0;
    	LogActivityModel::create($log);
    }


    public static function logActivityLists($id)
    {
		if ($id != 0) {
			$response = LogActivityModel::leftjoin('tbl_user', 'tbl_user.id', '=', 'log_activity.user_id')
						->where(['user_id'=>$id])
						->latest()->get();
		} else {
			$response = LogActivityModel::leftjoin('tbl_user', 'tbl_user.id', '=', 'log_activity.user_id')
						->latest()->get();
		}

		return $response;
    }


}
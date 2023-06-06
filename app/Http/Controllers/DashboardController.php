<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adurl;
use App\Models\adurlamz;
use App\Models\alerts;
use App\Models\landing;
use App\Models\landingPopup;
use App\Models\landingPopupInline;
use App\Models\redirect;
use App\Models\redirectPopup;
use App\Models\redirectPopupInline;
use App\Models\clients;
use App\Models\admadunit;
use App\Models\pubadurl;
use App\Models\sites;
use App\Models\loginhistory;
use App\Models\Permission;
use App\Models\user;
use App\Models\geocode;
use App\Models\geocodemac;
use App\Models\geocodeand;
use App\Models\Balance;
use App\Models\countries;
use App\Models\Roles;
use App\Models\register;
use App\Models\statistics;
use App\Models\StatisticsDownload;
use App\Models\StatisticsButton;
use App\Models\PublisherWithdrawalSummary;
use App\Models\PublisherWithdrawalDetail;
use App\Http\Requests\AdurlRequest;
use App\Http\Requests\LandingRequest;
use App\Http\Requests\AlertMsgRequest;
use App\Http\Requests\RedirectRequest;
use App\Models\UserRole;
use App\Services\FileService;
use Illuminate\Foundation\Auth\User as AuthUser;
use TwitterPhp\Connection\User as ConnectionUser;
use Illuminate\Support\Facades\Request as Input;
use App\Models\AdCodeDetail;
use App\Models\CappingPopLink;
use App\Models\CappingPopInline;
use App\Models\States;
use App\Models\BannerSizes;
use URL;
use Illuminate\Support\Facades\DB;

use DateTime;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $content_title = 'Dashboard';
        $main_content  = 'dasbaord';
        $activepage    =  1;
        $today = date('Y-m-d', strtotime('-1 day'));
        //\DB::enableQueryLog(); // Enable query log
        $all_users = Clients::with('stat_today')->get();
        // dd(\DB::getQueryLog()); // Show results of log
        \LogActivity::addToLog('Dashboard');
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        return view('admin.dashboard', compact('content_title', 'main_content', 'activepage', 'all_users', 'superAdmin', 'permissions'));
    }

    public function dashboard_download()
    {
        $content_title = 'Dashboard Downloads';
        $main_content  = 'dasbaord';
        $activepage    =  1;
        $today = date('Y-m-d', strtotime('-1 day'));
        //\DB::enableQueryLog(); // Enable query log
        $all_users = Clients::with('stat_today_download')->get();
         //dd(\DB::getQueryLog()); // Show results of log
        \LogActivity::addToLog('Dashboard Downloads');
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        return view('admin.dashboard_download', compact('content_title', 'main_content', 'activepage', 'all_users', 'superAdmin', 'permissions'));
    }

    /**
     * Ad Url Functions
     */
    public function add_url_view()
    {
        $content_title = 'Add Url';
        $main_content  = 'add url';
        $activepage    =  11;
        $singledata = Adurl::first();
        $alldata = Adurl::get()->skip(1);

        \LogActivity::addToLog('Add Url Page');
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
       
        return view('admin.addurl.list', compact('content_title', 'main_content', 'activepage', 'singledata', 'superAdmin', 'permissions','alldata'));
    }
    public function add_url_save(Request $request)
    {
        $url = URL::to("/");

        if (Input::hasFile('androidfile')) {
            $file = Input::file('androidfile');
            $androidfile = (new FileService)->saveFile($file, 'adnroid');
            if($androidfile){
                $androidfile = $url.'/'.$androidfile;
            }
        }else{
            $androidfile = $request->input("txtAndroid");
        }
        
        if (Input::hasFile('macfile')) {
            $file = Input::file('macfile');
            $macfile = (new FileService)->saveFile($file, 'mac');
            if($macfile){
                $macfile = $url.'/'.$macfile;
            }
        }else{
                $macfile = $request->input("txtMac");
        }

        
        

        $time = $request->input('time');
        $adurl = Adurl::first();
        if ($adurl !== null) {
            Adurl::truncate();
        }
           
            foreach($time as $key => $time_detail){
                $window78file = '';
                $window10file = '';
                $window11file = '';

                if($key == 0){
                    $time_detail_key = '0';
                }else{
                    $time_detail_key = $time_detail_key + 2;
                }

                if (Input::hasFile('window78file.'.$key.'')) {
                   $file = Input::file('window78file.'.$key.'');
                   $window78file = (new FileService)->saveFile($file, 'window');
                   if($window78file){
                        $window78file = $url.'/'.$window78file;
                    }
                }else{
                    $window78file = $request->input("txtFile")[$key];
                }
                
                if (Input::hasFile('window10file.'.$key.'')) {
                    $file = Input::file('window10file.'.$key.'');
                    $window10file = (new FileService)->saveFile($file, 'window10');
                    if($window10file){
                        $window10file = $url.'/'.$window10file;
                    }
                }else{
                    $window10file = $request->input("txt_window_ten")[$key];
                }
                if (Input::hasFile('window11file.'.$key.'')) {
                    $file = Input::file('window11file.'.$key.'');
                    $window11file = (new FileService)->saveFile($file, 'window11');
                    if($window11file){
                        $window11file = $url.'/'.$window11file;
                    }
                }else{
                    $window11file = $request->input("txt_window_eleven")[$key];
                }

                
                
                
                Adurl::create(
                    [
                        'cl_pasword' =>  $request->input("txtPass")[$key],
                        'cl_win_url' =>  $window78file,
                        'cl_win_url_file' => $window78file,
                        'cl_and_url' =>  $androidfile,
                        'cl_and_url_file' =>  $androidfile,
                        'cl_mac_url' =>  $macfile,
                        'cl_mac_url_file' =>  $macfile,
                        'cl_win_10' =>  $window10file,
                        'cl_win_10_file' =>  $window10file,
                        'cl_win_11' =>  $window11file,
                        'cl_win_11_file' =>  $window11file,
                        'time' =>  $time_detail_key
    
                    ],
                );
            }        
        \LogActivity::addToLog('Ad Url updated successfully.');
        return redirect(route('addurl.show'))->with('success', "Ad Url Create successfully.");
    }


      /**
     * Ad Url AMZ Functions
     */
    public function add_url_amz_view()
    {
        $content_title = 'Add Url';
        $main_content  = 'add url';
        $activepage    =  111;
        $singledata = Adurlamz::first();
        $countries = Countries::all();
        \LogActivity::addToLog('Add Url AMZ Page');
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        return view('admin.addurlamz.list', compact('content_title', 'main_content', 'activepage', 'singledata', 'superAdmin', 'permissions','countries'));
    }
    public function add_url_amz_save(Request $request)
    {
        
        $countries          = $request->input("countries");
        $implode_country    = implode(',',$countries);
        $txtPass            = $request->input("txtPass");
        $txt_window_xp      = $request->input("txt_window_xp");
        $txt_window_ten     = $request->input("txt_window_ten");
        $txt_window_eleven  = $request->input("txt_window_eleven");
        $adurl = Adurlamz::first();
        if ($adurl !== null) {
            Adurlamz::truncate();
        }
           
        Adurlamz::create(
            [
                'cl_pasword'        =>  $txtPass,
                'cl_win_url'        =>  $txt_window_xp,
                'cl_win_10'         =>  $txt_window_ten,
                'cl_win_11'         =>  $txt_window_eleven,
                'country'           =>  $implode_country,
                'cl_date_time'      =>  date('Y-m-d H:i:s'),
                'percentage'        =>  0,
                'other_percentage'  =>  0,
            ],
        );       
        \LogActivity::addToLog('Ad Url amz updated successfully.');
        return redirect(route('addurlamz.show'))->with('success', "Ad Url Amazon Create successfully.");
    }

    /**
     * Landing Functions
     */

     public function landing_list()
     {
         $content_title = 'Add Landing';
         $main_content  = 'add landing';
         $activepage    =  8;
         $allnode = Landing::all();
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
       \LogActivity::addToLog('Landing List Page');

         return view('admin.landing.list', compact('content_title', 'main_content', 'activepage', 'allnode', 'superAdmin', 'permissions'));
     }

    public function landing_add()
    {
        $content_title = 'Add Landing';
        $main_content  = 'add landing';
        $activepage    =  8;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        \LogActivity::addToLog('Landing Add Page');

        return view('admin.landing.add', compact('content_title', 'main_content', 'activepage', 'superAdmin', 'permissions'));
    }

    public function landing_edit($id)
    {
        $content_title = 'Edit Landing';
        $main_content  = 'Edit landing';
        $activepage    =  8;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        $catmod = Landing::where('ad_id', $id)->first();
       \LogActivity::addToLog('Landing Edit page');
       return view('admin.landing.modify', compact('content_title', 'main_content', 'activepage', 'catmod', 'superAdmin', 'permissions'));
    }


    public function landing_save(LandingRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtAdname      = $request->input("txtAdname");
            $txtUrl         = $request->input("txtUrl");
            $txtKeyword     = $request->input("txtKeyword");
            $radStatus      = $request->input("radStatus");
        }

        Landing::create([
            'ad_name'        => $txtAdname,
            'ad_url'        => $txtUrl,
            'ad_status'        => $radStatus,
            'ad_keyword'    => $txtKeyword,
        ]);
       \LogActivity::addToLog('Landing Url Added  successfully.');

        return redirect(route('landing.show'))->with('success', "Landing Url Added  successfully.");
    }

    public function landing_delete($id){
        Landing::where('ad_id',$id)->delete();
       \LogActivity::addToLog('Landing Url deleted  successfully.');

        return redirect(route('landing.show'))->with('success', "Landing Url deleted successfully.");
    }

    public function landing_status_update($id, $status)
    {

        Landing::where('ad_id', $id)->update([
            'ad_status'    => $status,
        ]);
       \LogActivity::addToLog('Landing Url status updated successfully.');

        return redirect(route('landing.show'))->with('success', "Landing Url updated successfully.");
    }

    public function landing_update(LandingRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtAdname      = $request->input("txtAdname");
            $txtUrl         = $request->input("txtUrl");
            $txtKeyword     = $request->input("txtKeyword");
            $radStatus      = $request->input("radStatus");
            $hidId          = $request->input("hidId");
        }

        Landing::where('ad_id', $hidId)->update([
            'ad_name'        => $txtAdname,
            'ad_url'        => $txtUrl,
            'ad_status'        => $radStatus,
            'ad_keyword'    => $txtKeyword,
        ]);
       \LogActivity::addToLog('Landing Url updated  successfully.');

        return redirect(route('landing.show'))->with('success', "Landing Url update successfully.");
    }



    /**
     * Landing Popup Functions
     */

     public function landing_list_popup()
     {
         $content_title = 'Add Landing';
         $main_content  = 'add landing';
         $activepage    =  18;
         $allnode = landingPopup::all();
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
       \LogActivity::addToLog('Landing Popup List Page');

         return view('admin.landingPopup.list', compact('content_title', 'main_content', 'activepage', 'allnode', 'superAdmin', 'permissions'));
     }

    public function landing_add_popup()
    {
        $content_title = 'Add Landing';
        $main_content  = 'add landing';
        $activepage    =  18;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        \LogActivity::addToLog('Landing Popup Add Page');

        return view('admin.landingPopup.add', compact('content_title', 'main_content', 'activepage', 'superAdmin', 'permissions'));
    }

    public function landing_edit_popup($id)
    {
        $content_title = 'Edit Landing';
        $main_content  = 'Edit landing';
        $activepage    =  18;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        $catmod = landingPopup::where('ad_id', $id)->first();
       \LogActivity::addToLog('Landing POPup Edit page');
       return view('admin.landingPopup.modify', compact('content_title', 'main_content', 'activepage', 'catmod', 'superAdmin', 'permissions'));
    }


    public function landing_save_popup(LandingRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtAdname      = $request->input("txtAdname");
            $txtUrl         = $request->input("txtUrl");
            $txtKeyword     = $request->input("txtKeyword");
            $radStatus      = $request->input("radStatus");
        }

        landingPopup::create([
            'ad_name'        => $txtAdname,
            'ad_url'        => $txtUrl,
            'ad_status'        => $radStatus,
            'ad_keyword'    => $txtKeyword,
        ]);
       \LogActivity::addToLog('Landing Popup Url Added  successfully.');

        return redirect(route('landingPopup.show'))->with('success', "Landing Url Added  successfully.");
    }

    public function landing_delete_popup($id){
        landingPopup::where('ad_id',$id)->delete();
       \LogActivity::addToLog('Landing Popup Url deleted  successfully.');

        return redirect(route('landingPopup.show'))->with('success', "Landing Url deleted successfully.");
    }

    public function landing_status_update_popup($id, $status)
    {

        landingPopup::where('ad_id', $id)->update([
            'ad_status'    => $status,
        ]);
       \LogActivity::addToLog('Landing Popup Url status updated successfully.');

        return redirect(route('landingPopup.show'))->with('success', "Landing Url updated successfully.");
    }

    public function landing_update_popup(LandingRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtAdname      = $request->input("txtAdname");
            $txtUrl         = $request->input("txtUrl");
            $txtKeyword     = $request->input("txtKeyword");
            $radStatus      = $request->input("radStatus");
            $hidId          = $request->input("hidId");
        }

        landingPopup::where('ad_id', $hidId)->update([
            'ad_name'        => $txtAdname,
            'ad_url'        => $txtUrl,
            'ad_status'        => $radStatus,
            'ad_keyword'    => $txtKeyword,
        ]);
       \LogActivity::addToLog('Landing Popup Url updated  successfully.');

        return redirect(route('landingPopup.show'))->with('success', "Landing Url update successfully.");
    }

    /**
     * Landing PopupInline Functions
     */

     public function landing_list_popup_inline()
     {
         $content_title = 'Add Landing';
         $main_content  = 'add landing';
         $activepage    =  28;
         $allnode = landingPopupInline::all();
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
       \LogActivity::addToLog('Landing PopupInline List Page');

         return view('admin.landingPopupInline.list', compact('content_title', 'main_content', 'activepage', 'allnode', 'superAdmin', 'permissions'));
     }

    public function landing_add_popup_inline()
    {
        $content_title = 'Add Landing';
        $main_content  = 'add landing';
        $activepage    =  28;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        \LogActivity::addToLog('Landing PopupInline Add Page');

        return view('admin.landingPopupInline.add', compact('content_title', 'main_content', 'activepage', 'superAdmin', 'permissions'));
    }

    public function landing_edit_popup_inline($id)
    {
        $content_title = 'Edit Landing';
        $main_content  = 'Edit landing';
        $activepage    =  28;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        $catmod = landingPopupInline::where('ad_id', $id)->first();
       \LogActivity::addToLog('Landing POPup Edit page');
       return view('admin.landingPopupInline.modify', compact('content_title', 'main_content', 'activepage', 'catmod', 'superAdmin', 'permissions'));
    }


    public function landing_save_popup_inline(LandingRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtAdname      = $request->input("txtAdname");
            $txtUrl         = $request->input("txtUrl");
            $txtKeyword     = $request->input("txtKeyword");
            $radStatus      = $request->input("radStatus");
        }

        landingPopupInline::create([
            'ad_name'        => $txtAdname,
            'ad_url'        => $txtUrl,
            'ad_status'        => $radStatus,
            'ad_keyword'    => $txtKeyword,
        ]);
       \LogActivity::addToLog('Landing PopupInline Url Added  successfully.');

        return redirect(route('landingPopupInline.show'))->with('success', "Landing Url Added  successfully.");
    }

    public function landing_delete_popup_inline($id){
        landingPopupInline::where('ad_id',$id)->delete();
       \LogActivity::addToLog('Landing PopupInline Url deleted  successfully.');

        return redirect(route('landingPopupInline.show'))->with('success', "Landing Url deleted successfully.");
    }

    public function landing_status_update_popup_inline($id, $status)
    {

        landingPopupInline::where('ad_id', $id)->update([
            'ad_status'    => $status,
        ]);
       \LogActivity::addToLog('Landing PopupInline Url status updated successfully.');

        return redirect(route('landingPopupInline.show'))->with('success', "Landing Url updated successfully.");
    }

    public function landing_update_popup_inline(LandingRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtAdname      = $request->input("txtAdname");
            $txtUrl         = $request->input("txtUrl");
            $txtKeyword     = $request->input("txtKeyword");
            $radStatus      = $request->input("radStatus");
            $hidId          = $request->input("hidId");
        }

        landingPopupInline::where('ad_id', $hidId)->update([
            'ad_name'        => $txtAdname,
            'ad_url'        => $txtUrl,
            'ad_status'        => $radStatus,
            'ad_keyword'    => $txtKeyword,
        ]);
       \LogActivity::addToLog('Landing PopupInline Url updated  successfully.');

        return redirect(route('landingPopupInline.show'))->with('success', "Landing Url update successfully.");
    }

    /**
     * Redirect Functions
     */

    public function redirect_list()
    {
        $content_title = 'All Redirect';
        $main_content  = 'redirect';
        $activepage    =  9;
        $allnode = Redirect::all();
        \LogActivity::addToLog('Redirect List.');

        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];

        return view('admin.redirect.list', compact('content_title', 'main_content', 'activepage', 'superAdmin', 'permissions', 'allnode'));
    }

    public function redirect_add()
    {
        $content_title = 'Add Redirect';
        $main_content  = 'add redirect';
        $activepage    =  8;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];

        return view('admin.redirect.add',compact('content_title','main_content','activepage','superAdmin'));
    }

    public function redirect_edit($id)
    {
        $content_title = 'Edit Redirect';
        $main_content  = 'Edit redirect';
        $activepage    =  8;
        $catmod = Redirect::where('rd_id', $id)->first();
        \LogActivity::addToLog('Redirect Edit Page');
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        return view('admin.redirect.modify', compact('content_title', 'main_content', 'activepage', 'catmod', 'superAdmin', 'permissions'));
    }


    public function redirect_save(RedirectRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtAdname      = $request->input("txtAdname");
            $txtUrl         = $request->input("txtUrl");
            $radStatus      = $request->input("radStatus");
        }

        Redirect::create([
            'rd_name'        => $txtAdname,
            'rd_url'        => $txtUrl,
            'rd_status'        => $radStatus
        ]);
       \LogActivity::addToLog('Redirect Url Added successfully.');

        return redirect(route('redirect.show'))->with('success', "Redirect Url Added successfully.");
    }

    public function redirect_delete($id){
        Redirect::where('rd_id',$id)->delete();
       \LogActivity::addToLog('Redirect Url deleted successfully.');

        return redirect(route('redirect.show'))->with('success', "Redirect Url deleted successfully.");
    }

    public function redirect_status_update($id, $status)
    {

        Redirect::where('rd_id', $id)->update([
            'rd_status'    => $status,
        ]);
       \LogActivity::addToLog('Redirect Url status update successfully.');

        return redirect(route('redirect.show'))->with('success', "Redirect Url updated successfully.");
    }

    public function redirect_update(RedirectRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtAdname      = $request->input("txtAdname");
            $txtUrl         = $request->input("txtUrl");
            $radStatus      = $request->input("radStatus");
            $hidId          = $request->input("hidId");
        }

        Redirect::where('rd_id', $hidId)->update([
            'rd_name'        => $txtAdname,
            'rd_url'        => $txtUrl,
            'rd_status'        => $radStatus
        ]);
       \LogActivity::addToLog('Redirect Url updated successfully.');

        return redirect(route('redirect.show'))->with('success', "Redirect Url update successfully.");
    }



     /**
     * Redirect Popup Functions
     */

     public function redirect_list_popup()
     {
         $content_title = 'All Redirect';
         $main_content  = 'redirect';
         $activepage    =  19;
         $allnode = redirectPopup::all();
         \LogActivity::addToLog('Redirect Popup List.');
 
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
 
         return view('admin.redirectPopup.list', compact('content_title', 'main_content', 'activepage', 'superAdmin', 'permissions', 'allnode'));
     }
 
     public function redirect_add_popup()
     {
         $content_title = 'Add Redirect';
         $main_content  = 'add redirect';
         $activepage    =  19;
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
         return view('admin.redirectPopup.add',compact('content_title','main_content','activepage','superAdmin'));
     }
 
     public function redirect_edit_popup($id)
     {
         $content_title = 'Edit Redirect';
         $main_content  = 'Edit redirect';
         $activepage    =  19;
         $catmod = redirectPopup::where('rd_id', $id)->first();
         \LogActivity::addToLog('Redirect Popup Edit Page');
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
         return view('admin.redirectPopup.modify', compact('content_title', 'main_content', 'activepage', 'catmod', 'superAdmin', 'permissions'));
     }
 
 
     public function redirect_save_popup(RedirectRequest $request)
     {
         $validate = $request->validated();
         if ($validate) {
             $txtAdname      = $request->input("txtAdname");
             $txtUrl         = $request->input("txtUrl");
             $radStatus      = $request->input("radStatus");
         }
 
         redirectPopup::create([
             'rd_name'        => $txtAdname,
             'rd_url'        => $txtUrl,
             'rd_status'        => $radStatus
         ]);
        \LogActivity::addToLog('Redirect Popup Url Added successfully.');
 
         return redirect(route('redirectPopup.show'))->with('success', "Redirect Url Added successfully.");
     }
 
     public function redirect_delete_popup($id){
        redirectPopup::where('rd_id',$id)->delete();
        \LogActivity::addToLog('Redirect Popup Url deleted successfully.');
 
         return redirect(route('redirectPopup.show'))->with('success', "Redirect Url deleted successfully.");
     }
 
     public function redirect_status_update_popup($id, $status)
     {
 
        redirectPopup::where('rd_id', $id)->update([
             'rd_status'    => $status,
         ]);
        \LogActivity::addToLog('Redirect Popup Url status update successfully.');
 
         return redirect(route('redirectPopup.show'))->with('success', "Redirect Url updated successfully.");
     }
 
     public function redirect_update_popup(RedirectRequest $request)
     {
         $validate = $request->validated();
         if ($validate) {
             $txtAdname      = $request->input("txtAdname");
             $txtUrl         = $request->input("txtUrl");
             $radStatus      = $request->input("radStatus");
             $hidId          = $request->input("hidId");
         }
 
         redirectPopup::where('rd_id', $hidId)->update([
             'rd_name'        => $txtAdname,
             'rd_url'        => $txtUrl,
             'rd_status'        => $radStatus
         ]);
        \LogActivity::addToLog('Redirect Popup Url updated successfully.');
 
         return redirect(route('redirectPopup.show'))->with('success', "Redirect Url update successfully.");
     }


     /**
     * Redirect Popup Inline Inline Functions
     */

     public function redirect_list_popup_inline()
     {
         $content_title = 'All Redirect';
         $main_content  = 'redirect';
         $activepage    =  29;
         $allnode = redirectPopupInline::all();
         \LogActivity::addToLog('Redirect Popup Inline List.');
 
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
 
         return view('admin.redirectPopupInline.list', compact('content_title', 'main_content', 'activepage', 'superAdmin', 'permissions', 'allnode'));
     }
 
     public function redirect_add_popup_inline()
     {
         $content_title = 'Add Redirect';
         $main_content  = 'add redirect';
         $activepage    =  29;
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
         return view('admin.redirectPopupInline.add',compact('content_title','main_content','activepage','superAdmin'));
     }
 
     public function redirect_edit_popup_inline($id)
     {
         $content_title = 'Edit Redirect';
         $main_content  = 'Edit redirect';
         $activepage    =  29;
         $catmod = redirectPopupInline::where('rd_id', $id)->first();
         \LogActivity::addToLog('Redirect Popup Inline Edit Page');
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
         return view('admin.redirectPopupInline.modify', compact('content_title', 'main_content', 'activepage', 'catmod', 'superAdmin', 'permissions'));
     }
 
 
     public function redirect_save_popup_inline(RedirectRequest $request)
     {
         $validate = $request->validated();
         if ($validate) {
             $txtAdname      = $request->input("txtAdname");
             $txtUrl         = $request->input("txtUrl");
             $radStatus      = $request->input("radStatus");
         }
 
         redirectPopupInline::create([
             'rd_name'        => $txtAdname,
             'rd_url'        => $txtUrl,
             'rd_status'        => $radStatus
         ]);
        \LogActivity::addToLog('Redirect Popup Inline Url Added successfully.');
 
         return redirect(route('redirectPopupInline.show'))->with('success', "Redirect Url Added successfully.");
     }
 
     public function redirect_delete_popup_inline($id){
        redirectPopupInline::where('rd_id',$id)->delete();
        \LogActivity::addToLog('Redirect Popup Inline Url deleted successfully.');
 
         return redirect(route('redirectPopupInline.show'))->with('success', "Redirect Url deleted successfully.");
     }
 
     public function redirect_status_update_popup_inline($id, $status)
     {
 
        redirectPopupInline::where('rd_id', $id)->update([
             'rd_status'    => $status,
         ]);
        \LogActivity::addToLog('Redirect Popup Inline Url status update successfully.');
 
         return redirect(route('redirectPopupInline.show'))->with('success', "Redirect Url updated successfully.");
     }
 
     public function redirect_update_popup_inline(RedirectRequest $request)
     {
         $validate = $request->validated();
         if ($validate) {
             $txtAdname      = $request->input("txtAdname");
             $txtUrl         = $request->input("txtUrl");
             $radStatus      = $request->input("radStatus");
             $hidId          = $request->input("hidId");
         }
 
         redirectPopupInline::where('rd_id', $hidId)->update([
             'rd_name'        => $txtAdname,
             'rd_url'        => $txtUrl,
             'rd_status'        => $radStatus
         ]);
        \LogActivity::addToLog('Redirect Popup Inline Url updated successfully.');
 
         return redirect(route('redirectPopupInline.show'))->with('success', "Redirect Url update successfully.");
     }

    /**
     * Publishers Functions
     */

    public function publishers_list()
    {
        $content_title = 'All Publishers';
        $main_content  = 'All Publishers';
        $activepage    =  3;
        $allnode = Clients::all();
        $id = \Auth::id();
        $superAdmin = 0;
        $permissions = [];
        $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
        if ($currentUser->is_admin == 1) {
            $superAdmin = 1;
        } else {
            foreach ($currentUser->role->permissions as $per) {
                array_push($permissions, $per->permission);
            }
        }
        \LogActivity::addToLog('Publisher List');


        return view('admin.publishers.list', compact('content_title', 'main_content', 'activepage', 'allnode', 'superAdmin', 'permissions'));
    }

    public function publishers_profile($id)
    {
        $content_title = 'Publishers';
        $main_content  = 'Publishers';
        $activepage    =  3;
        $page = 1;
        $singnod = Clients::find($id);
        $id = \Auth::id();
        $superAdmin = 0;
        $permissions = [];
        $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
        if ($currentUser->is_admin == 1) {
            $superAdmin = 1;
        } else {
            foreach ($currentUser->role->permissions as $per) {
                array_push($permissions, $per->permission);
            }
        }
        \LogActivity::addToLog('Check publisher profile');



        return view('admin.publishers.profile', compact('content_title', 'main_content', 'page', 'activepage', 'singnod', 'superAdmin', 'permissions'));
    }

    public function publishers_adcode($id)
    {
        $content_title = 'Publishers';
        $main_content  = 'Publishers';
        $activepage    =  3;
        $page = 3;
        $singnod = Clients::find($id);
        $myadcode = Sites::select("*","tbl_sites.site_id AS siteid","xyz_adm_adunit.id AS adid")
        ->join("xyz_adm_adunit","xyz_adm_adunit.sid","=","tbl_sites.site_id")->where(['tbl_sites.pid'=>$id])
        ->get();
       \LogActivity::addToLog('Publishers adCode view');

       $id = \Auth::id();
       $superAdmin = 0;
       $permissions = [];
       $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
       if ($currentUser->is_admin == 1) {
           $superAdmin = 1;
       } else {
           foreach ($currentUser->role->permissions as $per) {
               array_push($permissions, $per->permission);
           }
       }
       return view('admin.publishers.adcode', compact('content_title', 'main_content', 'activepage', 'singnod', 'page', 'myadcode', 'superAdmin', 'permissions'));
   }

   public function publishers_adbalance($pubid)
    {
        $content_title = 'Publishers';
        $main_content  = 'Publishers';
        $activepage    =  3;
        $page = 3;
        
       \LogActivity::addToLog('Publishers Add balance view');

       $id = \Auth::id();
       $superAdmin = 0;
       $permissions = [];
       $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
       if ($currentUser->is_admin == 1) {
           $superAdmin = 1;
       } else {
           foreach ($currentUser->role->permissions as $per) {
               array_push($permissions, $per->permission);
           }
       }
       return view('admin.publishers.add', compact('content_title', 'main_content', 'activepage', 'page', 'superAdmin', 'permissions','pubid'));
   }

        public function publishers_addAmount(Request $request)
        {
            if ($request->isMethod('post')) {
                $hidid = $request->input('hidid');
                $txtBalance = $request->input('txtBalance');
                $txtClick = $request->input('txtClick');

                if ($txtBalance > 0) {
                    $result = Register::find($hidid);

                    if ($result) {
                        $current_balance = $result->account_balance;
                        $newBalance = $txtBalance + $current_balance;
                        $result->update(['account_balance' => $newBalance]);

                        $data2 = [
                            'reg_id' => $hidid,
                            'balance_amount' => $txtBalance,
                            'is_debit' => 'D',
                            'daily_click' => $txtClick,
                            'balance_date' => date('Y-m-d H:i:s'),
                            'balance_desc' => '',
                        ];
                        Balance::create($data2);

                        return redirect()
                            ->route('publishers.show')
                            ->with('success', 'Amount Added Successfully!');
                    } else {
                        return redirect()
                            ->route('publishers.show')
                            ->with('success', 'Wrong user account!');
                    }
                } else {
                    return redirect()
                        ->route('publishers_adbalance.view', ['id' => $hidid])
                        ->with('success', 'Wrong amount!');
                }
            }
        }



    public function publishers_sites($id)
    {
        $content_title = 'Publishers';
        $main_content  = 'Publishers';
        $activepage    =  3;
        $page = 2;
        $singnod = Clients::find($id);
        \LogActivity::addToLog('Publishers sites view');
        $mysites = Sites::where(['pid' => $id])->get();

        $id = \Auth::id();
        $superAdmin = 0;
        $permissions = [];
        $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
        if ($currentUser->is_admin == 1) {
            $superAdmin = 1;
        } else {
            foreach ($currentUser->role->permissions as $per) {
                array_push($permissions, $per->permission);
            }
        }
        return view('admin.publishers.sites', compact('content_title', 'main_content', 'activepage', 'singnod', 'page', 'mysites', 'superAdmin', 'permissions'));
    }

    public function publishers_status_update($id, $status)
    {

        Clients::where('id', $id)->update([
            'reg_status'    => $status,
        ]);
       \LogActivity::addToLog('Publishers status update');

        return redirect(route('publishers.show'))->with('success', "Publisher Status updated successfully.");
    }

    public function publishers_delete($id){
        Clients::where('id',$id)->delete();
       \LogActivity::addToLog('Publishers delete successfully');

        return redirect(route('publishers.show'))->with('success', "Publisher deleted successfully.");
    }

    public function publishers_sites_status($pid, $sid, $status)
    {

        Sites::where('pid', $pid)->where('site_id', $sid)->update([
            'status'    => $status,
        ]);
       \LogActivity::addToLog('Publishers sites status update');

        return redirect(route('publishers_sites.view',$pid))->with('success', "Sites updated successfully.");
    }

    public function publishers_adcode_status($pid, $sid, $status)
    {

        Admadunit::where('pubid', $pid)->where('id', $sid)->update([
            'status'    => $status,
        ]);
       \LogActivity::addToLog('Publishers adcode status update');

        return redirect(route('publishers_adcode.view',$pid))->with('success', "Adcode updated successfully.");
    }


    public function publishers_adcode_detail($pid, $sid, $adid)
    {
        $content_title = 'Publishers';
        $main_content  = 'Publishers';
        $activepage    =  3;
        $page = 3;
        $singnod =  Clients::find($pid);
        $sinads =  Admadunit::find($adid);
        $countries = Countries::all();
        $banner_sizes = BannerSizes::all();

        \LogActivity::addToLog('Publishers adcode detail');


        $myallsite  = Sites::where(['pid' => $pid])->get();
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];

        $OSDevice = array(
            array("code" => "window 7", "name" => "Window 7"),
            array("code" => "window 8", "name" => "Window 8"),
            array("code" => "window 8.1", "name" => "Window 8.1"),
            array("code" => "window 10", "name" => "Window 10"),
            array("code" => "window 11", "name" => "Window 11"),
            array("code" => "ipad", "name" => "Ipad"),
            array("code" => "iphone", "name" => "Iphone"),
            array("code" => "android", "name" => "Android"),
            array("code" => "mac", "name" => "MacBooks"),
            array("code" => "ipod", "name" => "Ipod"),
            array("code" => "blackberry", "name" => "Blackberry"),
            array("code" => "linux", "name" => "Linux"),
            array("code" => "ubunto", "name" => "Ubunto"),
        );

        $cappingPopLink = CappingPopLink::where([['pub_id','=',$pid],['site_id','=',$sid],['adcode_id','=',$adid]])->get()->toArray();

        $cappingPopInline = CappingPopInline::where([['pub_id','=',$pid],['site_id','=',$sid],['adcode_id','=',$adid]])->get()->toArray();

        if (count($cappingPopLink) == 0) {
            $cappingPopLink = array(
                array(
                    'country' => '',
                    'states' => '',
                    'os' => '',
                    'link1' => '',
                    'link2' => '',
                    'link3' => '',
                    'link4' => '',
                    'link5' => '',
                )
            );
        }
        if (count($cappingPopInline) == 0) {
            $cappingPopInline = array(
                array(
                    'country' => '',
                    'states' => '',
                    'os' => '',
                    'link1' => '',
                    'link2' => '',
                    'link3' => '',
                    'link4' => '',
                    'link5' => '',
                )
            );
        }

        $detail1 = AdCodeDetail::where([['pub_id','=',$pid],['site_id','=',$sid],['adcode_id','=',$adid],['adcode_link','=',1]])->first();
        $detail2 = AdCodeDetail::where([['pub_id','=',$pid],['site_id','=',$sid],['adcode_id','=',$adid],['adcode_link','=',2]])->first();
        $detail3 = AdCodeDetail::where([['pub_id','=',$pid],['site_id','=',$sid],['adcode_id','=',$adid],['adcode_link','=',3]])->first();
        $detail4 = AdCodeDetail::where([['pub_id','=',$pid],['site_id','=',$sid],['adcode_id','=',$adid],['adcode_link','=',4]])->first();

        if (empty($detail1)) {
            $detail1['id'] = 0;
            $detail1['link_code'] = 0;
            $detail1['link_type'] = 0;
            $detail1['tmp_type']  = 5;
            $detail1['template_code']  = '';
            $detail1['isCaptcha']  =  0;
        }
        if (empty($detail2)) {
            $detail2['id'] = 0;
            $detail2['link_code'] = 0;
            $detail2['link_type'] = 0;
            $detail2['tmp_type']  = 5;
            $detail2['template_code']  = '';
            $detail2['isCaptcha']  =  0;
        }
        if (empty($detail3)) {
            $detail3['id'] = 0;
            $detail3['link_code'] = 0;
            $detail3['link_type'] = 0;
            $detail3['tmp_type']  = 5;
            $detail3['template_code']  = '';
            $detail3['isCaptcha']  =  0;
        }
        if (empty($detail4)) {
            $detail4['id'] = 0;
            $detail4['link_code'] = 0;
            $detail4['link_type'] = 0;
            $detail4['tmp_type']  = 5;
            $detail4['banner_type']  = 1;
            $detail4['banner_image']  = '';
            $detail4['template_code']  = '';
            $detail4['interval_time']  = '5';
            $detail4['isUnique']  = '1';
            $detail4['banner_width']  = '';
            $detail4['banner_height']  = '';
            $detail4['custom_banner']  = '0';
            $detail4['banner_text']    = '1';
            $detail4['isCaptcha']  =  0;
        }


        //  print_r($detail4);
        //  exit;


        return view('admin.publishers.adcodemodify', compact('content_title', 'main_content', 'activepage', 'singnod', 'page', 'myallsite', 'sinads', 'countries', 'superAdmin', 'permissions', 'sid', 'detail1', 'detail2', 'detail3', 'detail4', 'OSDevice', 'cappingPopLink', 'cappingPopInline','banner_sizes'));
    }


    public function publishers_adcode_nodmodify(Request $request)
    {
        $adid     =   $request->input('adid');
        $siteid    =   $request->input('siteid');
        $pid     =   $request->input('pid');

        $txtbtnName      =   $request->input('txtbtnName');
        $txtBtnlbl         = trim($request->input('txtBtnlbl'));
        $txtTargetSite    =   $request->input('txtTargetSite');
        $radfontweight  =   $request->input('radfontweight');
        $txtFontsize      =   $request->input('txtFontsize');
        $txtbtnColor      =   $request->input('txtbtnColor');
        $txtbgcolor      =   $request->input('txtbgcolor');

        $data = array(
            'Name'            => $txtbtnName,
            'button_label'    => $txtBtnlbl,
            'sid'            => $txtTargetSite,
            'button_font_weight'    => $radfontweight,
            'button_font_size'        => $txtFontsize,
            'button_font_color'        => $txtbtnColor,
            'button_color'    => $txtbgcolor
        );

        Admadunit::where('id',$adid)->update($data);
       \LogActivity::addToLog('Publishers adcode update');

		return redirect(route('publishers_adcode.view',$pid))->with('success', "Adcode updated successfully.");
	}

    /**
     * Publishers Adlink Functions
     */

     public function publishers_adlink($pid)
    {
        $content_title = 'Publishers';
        $main_content  = 'Publishers';
        $activepage    =  3;
        $page = 6;
        $singnod =  Clients::find($pid);
        $singledata = Pubadurl::where(['pid' => $pid])->first();
        \LogActivity::addToLog('Publishers ad url page');
        $id = \Auth::id();
        $superAdmin = 0;
        $permissions = [];
        $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
        if ($currentUser->is_admin == 1) {
            $superAdmin = 1;
        } else {
            foreach ($currentUser->role->permissions as $per) {
                array_push($permissions, $per->permission);
            }
        }
        return view('admin.publishers.addurl', compact('content_title', 'main_content', 'activepage', 'singledata', 'pid', 'page', 'singnod', 'superAdmin', 'permissions'));
    }

    public function publishers_adlink_delete($pid){
        Pubadurl::where('pid',$pid)->delete();
       \LogActivity::addToLog('Publishers ad url delete');

        return redirect(route('publishers_adlink.view',"$pid"))->with('success', "Ad Url deleted successfully.");
    }

    public function publishers_adlink_save(Request $request, $pid)
    {
        $adurl = Pubadurl::where(['pid' => $pid])->first();


        if (Input::hasFile('window78file')) {
            $file = Input::file('window78file');
            $window78file = (new FileService)->saveFile($file, 'window');
        }
        if (Input::hasFile('window10file')) {
            $file = Input::file('window10file');
            $window10file = (new FileService)->saveFile($file, 'window10');
        }
        if (Input::hasFile('window11file')) {
            $file = Input::file('window11file');
            $window11file = (new FileService)->saveFile($file, 'window11');
        }
        if (Input::hasFile('androidfile')) {
            $file = Input::file('androidfile');
            $androidfile = (new FileService)->saveFile($file, 'adnroid');
        }
        if (Input::hasFile('macfile')) {
            $file = Input::file('macfile');
            $macfile = (new FileService)->saveFile($file, 'mac');
        }

        if ($adurl !== null) {
            Pubadurl::where('pid', $pid)->update(
                [
                    'cl_pasword' =>  $request->input("txtPass"),
                    'cl_win_url' =>  $request->input("txtFile"),
                    'cl_win_url_file' =>  $window78file ?? "",
                    'cl_and_url' =>  $request->input("txtAndroid"),
                    'cl_and_url_file' =>  $androidfile ?? "",
                    'cl_mac_url' =>  $request->input("txtMac"),
                    'cl_mac_url_file' =>  $macfile ?? "",
                    'cl_win_10' =>  $request->input("txt_window_ten"),
                    'cl_win_10_file' =>  $window10file ?? "",
                    'cl_win_11' =>  $request->input("txt_window_eleven"),
                    'cl_win_11_file' =>  $window11file ?? ""
                ],
            );
            \LogActivity::addToLog('Publishers ad url update');
            return redirect(route('publishers_adlink.view', "$pid"))->with('success', "Ad Url updated successfully.");
        } else {
            Pubadurl::create(
                [
                    'cl_pasword' =>  $request->input("txtPass"),
                    'cl_win_url' =>  $request->input("txtFile"),
                    'cl_win_url_file' =>  $window78file ?? "",
                    'cl_and_url' =>  $request->input("txtAndroid"),
                    'cl_and_url_file' =>  $androidfile ?? "",
                    'cl_mac_url' =>  $request->input("txtMac"),
                    'cl_mac_url_file' =>  $macfile ?? "",
                    'cl_win_10' =>  $request->input("txt_window_ten"),
                    'cl_win_10_file' =>  $window10file ?? "",
                    'cl_win_11' =>  $request->input("txt_window_eleven"),
                    'cl_win_11_file' =>  $window11file ?? "",
                    'pid'       =>  $pid
                ],
            );
            \LogActivity::addToLog('Publishers ad url create');
            return redirect(route('publishers_adlink.view', "$pid"))->with('success', "Ad Url Create successfully.");
        }
    }


    /**
     * Publishers Adlink Functions
     */

     public function publishers_login_history($pid)
     {
         $content_title = 'Publishers';
         $main_content  = 'Publishers';
         $activepage    =  3;
         $page = 4;
         $singnod =  Clients::find($pid);
         $myhistory  = Loginhistory::where(['reg_id' => $pid])->get();

         $id = \Auth::id();
         $superAdmin = 0;
         $permissions = [];
         $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
         if ($currentUser->is_admin == 1) {
             $superAdmin = 1;
         } else {
             foreach ($currentUser->role->permissions as $per) {
                 array_push($permissions, $per->permission);
             }
         }
         \LogActivity::addToLog('Publishers login history page');
         return view('admin.publishers.loginhistory', compact('content_title', 'main_content', 'activepage', 'myhistory', 'page', 'singnod', 'superAdmin', 'permissions'));
     }

    public function publishers_change_password($pid)
    {
        $content_title = 'Publishers';
        $main_content  = 'Publishers';
        $activepage    =  3;
        $page = 5;
        $singnod =  Clients::find($pid);
        \LogActivity::addToLog('Publishers change password page');

        $id = \Auth::id();
        $superAdmin = 0;
        $permissions = [];
        $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
        if ($currentUser->is_admin == 1) {
            $superAdmin = 1;
        } else {
            foreach ($currentUser->role->permissions as $per) {
                array_push($permissions, $per->permission);
            }
        }
        return view('admin.publishers.change_password', compact('content_title', 'main_content', 'activepage', 'page', 'singnod', 'pid', 'superAdmin', 'permissions'));
    }

    public function publishers_password_update(Request $request, $pid)
    {
        Clients::where('id', $pid)->update(
            [
                'password' =>  bcrypt($request->input("txtNewPass"))
            ]
        );
       \LogActivity::addToLog('Publishers change password successfully');

        return redirect(route('publishers_change_password.view',"$pid"))->with('success', "Password updated successfully.");
    }



    /**
     * Users Functions
     */

    public function users_list()
    {
        $content_title = 'All Users';
        $main_content  = 'users';
        $activepage    =  2;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        $alluser = User::all();
        \LogActivity::addToLog('User list');

        return view('admin.users.list', compact('content_title', 'main_content', 'activepage', 'alluser', 'permissions', 'superAdmin'));
    }

    public function users_add()
    {
        $content_title = 'Add Users';
        $main_content  = 'add users';
        $activepage    =  2;
        \LogActivity::addToLog('User add page');
        $roles = Roles::get();
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        $alluser = User::all();

        return view('admin.users.add', compact('content_title', 'main_content', 'activepage', 'roles', 'permissions', 'superAdmin'));
    }

    public function users_edit($id)
    {
        $content_title = 'Edit Users';
        $main_content  = 'Edit users';
        $activepage    =  2;
        $usermod = User::where('id', $id)->first();
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        $alluser = User::all();
        $roles = Roles::get();
        \LogActivity::addToLog('User edit page');
        return view('admin.users.modify', compact('content_title', 'main_content', 'activepage', 'usermod', 'roles', 'permissions', 'superAdmin'));
    }


    public function users_save(Request $request)
    {

        $selUserLevel     = $request->input('selUserLevel');
        $txtUserName      = $request->input('txtUserName');
        $txtPassword      = bcrypt($request->input('txtPassword'));
        $radStatus      = $request->input('radStatus');

        $userIsExist = User::where('username', $txtUserName)->first();
        if($userIsExist){
           \LogActivity::addToLog('Trying to add user but already exit');

            return redirect(route('users.show'))->with('error', "Username already exist.");
        } else {

            $query = User::create([
                'user_level'         => $request->input('selUserLevel'),
                'username'             => $txtUserName,
                'email'             => $txtUserName,
                'password'             => $txtPassword,
                'user_status'         => $radStatus
            ]);
           \LogActivity::addToLog('Add New User');

            return redirect(route('users.show'))->with('success', "Users Added successfully.");
        }
    }

    public function users_delete($id){
        User::where('id',$id)->delete();
       \LogActivity::addToLog('User delete successfully');

        return redirect(route('users.show'))->with('success', "Users deleted successfully.");
    }

    public function users_update(Request $request)
    {
        $selUserLevel     = $request->input('selUserLevel');
        $txtUserName      = $request->input('txtUserName');
        $txtPassword      = $request->input('txtPassword');
        $radStatus      = $request->input('radStatus');
        $hidId          = $request->input("hidId");
        $userIsExist = User::where('username', $txtUserName)->where('id', '!=', $hidId)->first();
        if ($userIsExist) {
            return redirect(route('users.show'))->with('error', "Username already exist.");
        } else {
            if ($txtPassword != '') {
                User::where('id', $hidId)->update([
                    'user_level'         => $request->input('selUserLevel'),
                    'username'             => $txtUserName,
                    'email'             => $txtUserName,
                    'password'             => bcrypt($txtPassword),
                    'user_status'         => $radStatus
                ]);
            } else {
                User::where('id', $hidId)->update([
                    'user_level'         => $request->input('selUserLevel'),
                    'username'             => $txtUserName,
                    'email'             => $txtUserName,
                    'user_status'         => $radStatus
                ]);
            }
           \LogActivity::addToLog('User update successfully');

            return redirect(route('users.show'))->with('success', "Users update successfully.");
        }
    }



    /**
     * Geo Code Functions
     */

    public function geocode_list()
    {
        $content_title = 'Geo Targeting';
        $main_content  = 'geo taregeting';
        $activepage    =  19;
        $countries = Countries::all();
        $geocode_win = Geocode::all();
        $geocode_mac = Geocodemac::all();
        $geocode_and = Geocodeand::all();
        \LogActivity::addToLog('Geo Code list');

        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        return view('admin.geocode.list', compact('content_title', 'main_content', 'activepage', 'countries', 'geocode_win', 'geocode_mac', 'geocode_and', 'superAdmin', 'permissions'));
    }


    public function save_geocode(Request $request)
    {
        $window_url             = $request->input('window_url');
        $window_url_file             = $request->file('window_url_file');
        $window_pass              = $request->input('window_pass');
        // dd( $window_url_file);
        $win_countries          = $request->input('win_countries');
        $window_rotation          = $request->input('window_rotation');
        $window_rotation_file          = $request->file('window_rotation_file');
        $window_rotation_pass      = $request->input('window_rotation_pass');
        $window_rotation_ratio    = $request->input('window_rotation_ratio');

        $mac_url                  = $request->input('mac_url');
        $mac_url_file                  = $request->file('mac_url_file');
        // dd($mac_url_file);
        $mac_pass                  = $request->input('mac_pass');
        $mac_countries          = $request->input('mac_countries');
        $mac_rotation              = $request->input('mac_rotation');
        $mac_rotation_file             = $request->file('mac_rotation_file');
        $mac_rotation_pass      = $request->input('mac_rotation_pass');
        $mac_rotation_ratio      = $request->input('mac_rotation_ratio');

        $and_url                  = $request->input('and_url');
        $and_url_file                  = $request->file('and_url_file');
        $and_pass                  = $request->input('and_pass');
        $and_countries          = $request->input('and_countries');
        $and_rotation              = $request->input('and_rotation');
        $and_rotation_file          = $request->file('and_rotation_file');
        $and_rotation_pass      = $request->input('and_rotation_pass');
        $and_rotation_ratio      = $request->input('and_rotation_ratio');


        $geoIsExist = Geocode::count();
        if ($geoIsExist > 0) {
            Geocode::truncate();
        }

        foreach ($window_url as $win_key => $window_url_data) {

            if ($window_rotation_ratio[$win_key][0] == '') {
                $rotion_ratio_win = 0;
            } else {
                $rotion_ratio_win = $window_rotation_ratio[$win_key][0];
            }
            $win_rotation_main_ratio = 100 - $rotion_ratio_win;

            $windowUrlFile = "";
            $windowRotationFile = "";
            if (isset($window_url_file[$win_key][0])) {
                $windowUrlFile = (new FileService)->saveFile($window_url_file[$win_key][0], 'targert');
            }
            if (isset($window_rotation_file[$win_key][0])) {
                $windowRotationFile = (new FileService)->saveFile($window_rotation_file[$win_key][0], 'targert');
            }

            Geocode::create([
                'cl_win_url'                => $window_url_data[0] ?? "",
                'cl_win_url_file'           => $windowUrlFile,
                'cl_win_url_pass'           => $window_pass[$win_key][0],
                'cl_win_url_rotation'       => $rotion_ratio_win,
                'cl_win_url_countries'      => implode(',', $win_countries[$win_key]),
                'cl_win_rotation_url'       => $window_rotation[$win_key][0] ?? "",
                'cl_win_rotation_url_file'  => $windowRotationFile,
                'cl_win_url_rotation_pass'  => $window_rotation_pass[$win_key][0],
                'cl_win_url_ratio'          => $win_rotation_main_ratio
            ]);
        }

        $geoIsExistMac = Geocodemac::count();
        if ($geoIsExistMac > 0) {
            Geocodemac::truncate();
        }

        foreach ($mac_url as $mac_key => $mac_url_data) {
            if ($mac_rotation_ratio[$mac_key][0] == '') {
                $rotion_ratio_mac = 0;
            } else {
                $rotion_ratio_mac = $mac_rotation_ratio[$mac_key][0];
            }
            $mac_rotation_main_ratio = 100 - $rotion_ratio_mac;


            $macUrlFile = "";
            $macRotationFile = "";
            if (isset($mac_url_file[$mac_key][0])) {
                $macUrlFile = (new FileService)->saveFile($mac_url_file[$mac_key][0], 'targert');
            }
            if (isset($mac_rotation_file[$mac_key][0])) {
                $macRotationFile = (new FileService)->saveFile($mac_rotation_file[$mac_key][0], 'targert');
            }
            Geocodemac::create([
                'cl_mac_url'                => $mac_url_data[0],
                'cl_mac_url_file'           => $macUrlFile,
                'cl_mac_url_pass'           => $mac_pass[$mac_key][0],
                'cl_mac_url_rotation'       => $rotion_ratio_mac,
                'cl_mac_url_countries'      => implode(',', $mac_countries[$mac_key]),
                'cl_mac_rotation_url'       => $mac_rotation[$mac_key][0],
                'cl_mac_rotation_url_file'  => $macRotationFile,
                'cl_mac_url_rotation_pass'  => $mac_rotation_pass[$mac_key][0],
                'cl_mac_url_ratio'          => $mac_rotation_main_ratio
            ]);
        }

        $geoIsExistAnd = Geocodeand::count();
        if ($geoIsExistAnd > 0) {
            Geocodeand::truncate();
        }

        foreach ($and_url as $and_key => $and_url_data) {
            if ($and_rotation_ratio[$and_key][0] == '') {
                $rotion_ratio_and = 0;
            } else {
                $rotion_ratio_and = $and_rotation_ratio[$and_key][0];
            }
            $and_rotation_main_ratio = 100 - $rotion_ratio_and;

            $andUrlFile = "";
            $andRotationFile = "";
            if (isset($and_url_file[$and_key][0])) {
                $andUrlFile = (new FileService)->saveFile($and_url_file[$and_key][0], 'targert');
            }
            if (isset($and_rotation_file[$and_key][0])) {
                $andRotationFile = (new FileService)->saveFile($and_rotation_file[$and_key][0], 'targert');
            }
            Geocodeand::create([
                'cl_and_url'                => $and_url_data[0],
                'cl_and_url_file'            => $andUrlFile,
                'cl_and_url_pass'           => $and_pass[$and_key][0],
                'cl_and_url_rotation'       => $rotion_ratio_and,
                'cl_and_url_countries'      => implode(',', $and_countries[$and_key]),
                'cl_and_rotation_url'       => $and_rotation[$and_key][0],
                'cl_and_rotation_url_file'   => $andRotationFile,
                'cl_and_url_rotation_pass'  => $and_rotation_pass[$and_key][0],
                'cl_and_url_ratio'          => $and_rotation_main_ratio
            ]);
        }
        \LogActivity::addToLog('Save Geo Code');

         return redirect(route('geocode.show'))->with('success', "Geo Code update successfully.");
    }

    public function delete_geocode()
    {
        Geocode::truncate();
        Geocodemac::truncate();
        Geocodeand::truncate();
       \LogActivity::addToLog('Geo Code Delete');

        return redirect(route('geocode.show'))->with('success', "Geo Code delete successfully.");
    }

    /**
     * User Role Functions
     */
    public function users_role_list()
    {
        $content_title = 'All Roles';
        $main_content  = 'roles';
        $activepage    =  22;
        $allrole = Roles::all();
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];

        \LogActivity::addToLog('User Role list');
        return view('admin.role.list', compact('content_title', 'main_content', 'activepage', 'allrole', 'superAdmin', 'permissions'));
    }

    public function users_role_add()
    {
        $content_title = 'Add Roles';
        $main_content  = 'add roles';
        $activepage    =  22;
        \LogActivity::addToLog('User Role Add Page');

        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        return view('admin.role.add', compact('content_title', 'main_content', 'activepage', 'superAdmin', 'permissions'));
    }

    public function users_role_edit($id)
    {
        $content_title = 'Edit Roles';
        $main_content  = 'Edit Roles';
        $activepage    =  22;
        $usermod = Roles::where('id', $id)->first();
        \LogActivity::addToLog('User Role Edit Page');
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        return view('admin.role.modify', compact('content_title', 'main_content', 'activepage', 'usermod', 'superAdmin', 'permissions'));
    }

    public function users_role_status_update($id, $status)
    {
        Roles::where('id', $id)->update([
            'status'             => $status,
        ]);
        \LogActivity::addToLog('User role status update');

        return redirect(route('roles.show'))->with('success', "Roles update successfully.");
    }


    public function users_role_save(Request $request)
    {

        $name     = $request->input('name');
        $userIsExist = Roles::where('title', $name)->first();
        if ($userIsExist) {
            return redirect(route('roles.show'))->with('error', "Role Name already exist.");
        } else {

            $query = Roles::create([
                'title'             => $name,
                'status'             => '1',
                'created_at'         => date('d-m-Y H:i:s')
            ]);
            \LogActivity::addToLog('New User Role Added');

            return redirect(route('roles.show'))->with('success', "Roles Added successfully.");
        }
    }

    public function users_role_delete($id){
        Roles::where('id',$id)->delete();
        \LogActivity::addToLog('User Role Deleted');

        return redirect(route('roles.show'))->with('success', "Roles deleted successfully.");
    }

    public function users_role_update(Request $request)
    {
        $name             = $request->input('name');
        $hidId          = $request->input("hidId");
        $userIsExist    = Roles::where('title', $name)->where('id', '!=', $hidId)->first();
        if ($userIsExist) {
            return redirect(route('roles.show'))->with('error', "Role Name already exist.");
        } else {
            Roles::where('id', $hidId)->update([
                'title'             => $name,
            ]);
            \LogActivity::addToLog('User Role Updated');

            return redirect(route('roles.show'))->with('success', "Roles update successfully.");
        }
    }

    public function users_role_permission($id)
    {
        $content_title = 'User Role Permission';
        $main_content  = 'User Role Permission';
        $activepage    =  22;
        $usermod = Permission::where('id', $id)->get();

        \LogActivity::addToLog('User Role Permission Page');
        $userRole = UserRole::where('role_id', $id)->pluck('permission')->toArray();
        $userId = $id;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        return view('admin.role.permissions', compact('content_title', 'main_content', 'activepage', 'usermod', 'userId', 'userRole', 'superAdmin', 'permissions'));
    }

    public function save_role_permission(Request $request)
    {
        $roleId = $request->role_id;
        $data = [];
        foreach ($request->all()  as $key => $x) {
            if (is_array($x)) {
                $data =   array_merge($data, $x);
            }
        }
        $user =  UserRole::where('role_id', $roleId)->pluck('id');

        foreach ($data as $d) {
            $userRole =  new UserRole();
            $userRole->role_id = $roleId;
            $userRole->permission = $d;
            $userRole->save();
        }

        UserRole::whereIn('id', $user)->delete();

        return redirect(route('roles.show'))->with('success', "User Roles Added successfully.");
    }

    private function userPermissions()
    {

        $id = \Auth::id();
        $superAdmin = 0;
        $permissions = [];
        $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
        if ($currentUser->is_admin == 1) {
            $superAdmin = 1;
        } else {
            foreach ($currentUser->role->permissions as $per) {
                array_push($permissions, $per->permission);
            }
        }
        return ['superAdmin' => $superAdmin, 'permissions' => $permissions];
    }

    public function stats_export_yesterday($id)
    {
        header('Content-Type: application/csv');
        $filename = "yesterday report.csv";
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        $data['page'] = 6;
        $date = date('Y-m-d',strtotime('-1 Day'));
       
        $query = 'SELECT
            user_ip,stat_date,stat_os,pub_id, browser, site_id, country
            from
                tbl_statistics_btn
            WHERE
                pub_id = '.$id.' AND
                Date(stat_date) = "'.$date.'"

            ORDER BY
                stat_date ASC';
        $results = DB::select($query);
        
        $fp = fopen('php://output', 'w');
        $header = array('Sr.No','Publisher Id','User IP','OS', 'Browser', 'Site ID', 'Country','Date');
        fputcsv($fp, $header);
        
        if ($results) {
            $i = 1;
            foreach ($results as $key => $nod) {
                // print_r($nod);

                $register = Register::where('id', $nod->pub_id)->first();
                if ($register) {
                    $name = ucwords(strtolower($register->username));
                } else {
                    $name = 'Fake ID';
                }
                
                $content = array($i, $name, $nod->user_ip, $nod->stat_os, $nod->browser, $nod->site_id, $nod->country, $nod->stat_date);
                fputcsv($fp, $content); 
                $i++;
            }
        }
        fclose($fp);
        exit;
    }

    public function stats_export_seven($id)
    {
        header('Content-Type: application/csv');
        $filename = "seven day report.csv";
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        $data['page'] = 6;
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d',strtotime('-7 Days'));
        
        $query = 'SELECT
                                distinct DATE(stat_date) as stat_date,
                                pub_id
                            from	
                                tbl_statistics_btn
                            WHERE
                                DATE(stat_date) BETWEEN "'.$end_date.'" and "'.$start_date.'"
                                and pub_id = '.$id.'
                            GROUP BY
                                user_ip,
                                DATE(stat_date)
                            ORDER BY
                                Date(stat_date) ASC';
        
        $todaypublisher = DB::select($query);


        $fp = fopen('php://output', 'w');
        $header = array('Sr.No','Publisher Id','Windows','Android','Mac','Others','Total','Date');
        fputcsv($fp, $header);
        if ($todaypublisher) {
            $i = 1;
            foreach ($todaypublisher as $key => $nod) {
                // print_r($nod);
                $dt = new \Datetime($nod->stat_date);
                $tot_window = \Statistics::getOSRecordsByID($dt->format('Y-m-d'), $nod->pub_id, "windows");
                $tot_android = \Statistics::getOSRecordsByID($dt->format('Y-m-d'), $nod->pub_id, "android");
                $tot_mac = \Statistics::getOSRecordsByID($dt->format('Y-m-d'), $nod->pub_id, "mac");
                $tot_other = \Statistics::getOtherOSRecordsByID($dt->format('Y-m-d'), $nod->pub_id, "windows", "android", "mac");
                
                $register = Register::where('id', $nod->pub_id)->first();
                if ($register) {
                    $name = ucwords(strtolower($register->username));
                } else {
                    $name = 'Fake ID';
                }
                $total = $tot_window+$tot_android+$tot_mac+$tot_other;
                $content = array($i,$name,$tot_window,$tot_android,$tot_mac,$tot_other,$total,$dt->format('d-M-Y'));
                fputcsv($fp, $content); 
                $i++;
            }
        }
        fclose($fp);
        exit;
    }

    public function stats_export_all(Type $var = null)
    {
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d',strtotime('-7 Days'));
        
        header('Content-Type: application/csv');
        $filename = "all publishers report.csv";
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        // $data['page'] = 6;
        $data = Register::where('reg_status', 1)->orderBy('id', 'ASC')->get();
        //echo $this->db->last_query();
        $fp = fopen('php://output', 'w');
        $header = array('Sr.No','Publisher Id','Total Count');
        fputcsv($fp, $header);
        if ($data) {
            $i = 1;
            $total_rec = [];
            foreach ($data as $key => $nod) {
                // print_r($nod);
                $total_records_array = \Statistics::publisherRangeStatAll($start_date,$end_date,$nod->id);
                print_r($total_records_array[0]->total_rec);
                $total_rec[] = $total_records_array[0]->total_rec;
                $content = array($i,$nod->id,$total_records_array[0]->total_rec);
                fputcsv($fp, $content); 
                $i++;
            }
            $content = array('','Total All Records',array_sum($total_rec));
            fputcsv($fp, $content); 
        }
        fclose($fp);
        exit;
    }

    public function publishers_adcode_link(Request $request)
    {
        $id         = $request->input("id");
        $pubId      = $request->input("pubid");
        $adId       = $request->input("adid");
        $siteId     = $request->input("sid");
        $adlink     = $request->input("adlink");
        $linkCode   = $request->input("linkCode");
        $linkType   = $request->input("linkType");
        $tmp_type   = $request->input("tmp_type");
        $banner_type   = $request->input("banner_type");
        $template_code   = $request->input("template_code");
        $isUnique   = $request->input("isUnique");
        $interval_time   = $request->input("interval_time");
        $banner_width    = $request->input("banner_width");
        $banner_height   = $request->input("banner_height");
        $custom_banner   = $request->input("custom_banner");
        $banner_text     = $request->input("banner_text");
        $isCaptcha       = $request->input("isCaptcha");
        if($banner_type == ''){
            $banner_type   = '1';
        }
        if($isUnique == ''){
            $isUnique   = '1';
        }

        $banner_image = '';
        if (Input::hasFile('banner_image')) {
            $file = Input::file('banner_image');
            $banner_image = (new FileService)->saveFile($file, 'banner');
            if (isset($_SERVER['HTTPS']) &&
                ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
                isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
                $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $protocol = 'https://';
            }
            else {
            $protocol = 'http://';
            }
            $url = $protocol.$_SERVER['HTTP_HOST'].'/storage/';
            $banner_image = $url.$banner_image;
        }
        
        if ($id == 0) {
            $response = AdCodeDetail::create(
                [
                    'pub_id'          => $pubId,
                    'site_id'         => $siteId,
                    'adcode_id'       => $adId,
                    'adcode_link'     => $adlink,
                    'link_code'       => $linkCode,
                    'link_type'       => $linkType,
                    'tmp_type'        => $tmp_type,
                    'banner_type'     => $banner_type,
                    'banner_image'    => $banner_image,
                    'template_code'   => $template_code,
                    'isUnique'        => $isUnique,
                    'interval_time'   => $interval_time,
                    'banner_width'    => $banner_width,
                    'banner_height'   => $banner_height,
                    'custom_banner'   => $custom_banner,
                    'banner_text'     => $banner_text,
                    'isCaptcha'       => $isCaptcha,
                ],
            );
        } else {
            if($banner_image != ''){

                $response = AdCodeDetail::where('id', $id)->update(
                    [
                        'pub_id'        => $pubId,
                        'site_id'       => $siteId,
                        'adcode_id'     => $adId,
                        'adcode_link'   => $adlink,
                        'link_code'     => $linkCode,
                        'link_type'     => $linkType,
                        'tmp_type'      => $tmp_type,
                        'banner_type'   => $banner_type,
                        'banner_image'   => $banner_image,
                        'template_code'   => $template_code,
                        'isUnique'        => $isUnique,
                        'interval_time'   => $interval_time,
                        'banner_width'    => $banner_width,
                        'banner_height'   => $banner_height,
                        'custom_banner'   => $custom_banner,
                        'banner_text'     => $banner_text,
                        'isCaptcha'       => $isCaptcha,
                    ],
                );
            }else{
                $response = AdCodeDetail::where('id', $id)->update(
                    [
                        'pub_id'        => $pubId,
                        'site_id'       => $siteId,
                        'adcode_id'     => $adId,
                        'adcode_link'   => $adlink,
                        'link_code'     => $linkCode,
                        'link_type'     => $linkType,
                        'tmp_type'      => $tmp_type,
                        'banner_type'   => $banner_type,
                        'template_code'   => $template_code,
                        'isUnique'        => $isUnique,
                        'interval_time'   => $interval_time,
                        'banner_width'    => $banner_width,
                        'banner_height'   => $banner_height,
                        'custom_banner'   => $custom_banner,
                        'banner_text'     => $banner_text,
                        'isCaptcha'       => $isCaptcha,
                    ],
                );
            }
        }
        return $response;
    }
    
    public function save_pop_adcode(Request $request)
    {
        $pubid = $request->input('pubid');
        $sid = $request->input('sid');
        $adid = $request->input('adid');
        $pop_countries = $request->input('pop_countries');
        $pop_states = $request->input('pop_states');
        $pop_os = $request->input('pop_os');
        $pop_link1 = $request->input('pop_link1');
        $pop_link2 = $request->input('pop_link2');
        $pop_link3 = $request->input('pop_link3');
        $pop_link4 = $request->input('pop_link4');
        $pop_link5 = $request->input('pop_link5');
    
        CappingPopLink::where([['pub_id','=',$pubid],['site_id','=',$sid],['adcode_id','=',$adid]])->delete();
        //DB::connection()->enableQueryLog();
        foreach ($pop_countries as $key => $country) {
            
            CappingPopLink::create([
                'pub_id' => $pubid,
                'site_id' => $sid,
                'adcode_id' => $adid,
                'country' => $country[0],
                'states' => implode(',', $pop_states[$key]),
                'os' => $pop_os[$key][0],
                'link1' => $pop_link1[$key][0],
                'link2' => $pop_link2[$key][0],
                'link3' => $pop_link3[$key][0],
                'link4' => $pop_link4[$key][0],
                'link5' => $pop_link5[$key][0]
            ]);
            // echo '<pre>';
            // print_r(DB::getQueryLog());
        }
       // exit;

        return redirect()->back()->with('success', "Capping of pop link update successfully.");

    }

    public function save_popinline_adcode(Request $request)
    {
        $pubid = $request->input('pubid');
        $sid = $request->input('sid');
        $adid = $request->input('adid');
        $pop_countries = $request->input('popinline_countries');
        $pop_states = $request->input('popinline_states');
        $pop_os = $request->input('popinline_os');
        $pop_link1 = $request->input('popinline_link1');
        $pop_link2 = $request->input('popinline_link2');
        $pop_link3 = $request->input('popinline_link3');
        $pop_link4 = $request->input('popinline_link4');
        $pop_link5 = $request->input('popinline_link5');

        CappingPopInline::where([['pub_id','=',$pubid],['site_id','=',$sid],['adcode_id','=',$adid]])->delete();

        foreach ($pop_countries as $key => $country) {
            
            CappingPopInline::create([
                'pub_id' => $pubid,
                'site_id' => $sid,
                'adcode_id' => $adid,
                'country' => $country[0],
                'states' => implode(',', $pop_states[$key]),
                'os' => $pop_os[$key][0],
                'link1' => $pop_link1[$key][0],
                'link2' => $pop_link2[$key][0],
                'link3' => $pop_link3[$key][0],
                'link4' => $pop_link4[$key][0],
                'link5' => $pop_link5[$key][0]
            ]);
        }

        return redirect()->back()->with('success', "Capping of pop Inline update successfully.");

    }
    


    public function statesById($code)
    {
        // print_r($code);exit;
        $states = States::where('country_code', $code)->get();
        return $states;
    }


        /**
     * Alert Message Functions
     */

     public function alert_message_list()
     {
         $content_title = 'Add Alerts';
         $main_content  = 'add alerts';
         $activepage    =  8;
         $allnode = Alerts::all();
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
       \LogActivity::addToLog('Alerts List Page');
     
         return view('admin.alert_msg.list', compact('content_title', 'main_content', 'activepage', 'allnode', 'superAdmin', 'permissions'));
     }

    public function alert_message_add()
    {
        $content_title = 'Add Alerts';
        $main_content  = 'add alerts';
        $activepage    =  8;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        \LogActivity::addToLog('Alerts Message Add Page');

        return view('admin.alert_msg.add', compact('content_title', 'main_content', 'activepage', 'superAdmin', 'permissions'));
    }

    public function alert_message_edit($id)
    {
        $content_title = 'Edit Alerts';
        $main_content  = 'Edit alerts';
        $activepage    =  8;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        $catmod = Alerts::where('am_id', $id)->first();
       \LogActivity::addToLog('Alerts Message Edit page');
       return view('admin.alert_msg.modify', compact('content_title', 'main_content', 'activepage', 'catmod', 'superAdmin', 'permissions'));
    }


    public function alert_message_save(AlertMsgRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtType 	= $request->input('txtType');
		    $radStatus  = $request->input('radStatus');
		    $txtDesc  	= $request->input('txtDesc');
        }

        Alerts::create([
            'am_description'=> $txtDesc,
			'am_type' 		=> $txtType,
			'am_status' 	=> $radStatus,
			'am_title' 	    => '',
			'am_date' 	    => date('Y-m-d H:i:s'),
        ]);
       \LogActivity::addToLog('Alerts Message Added  successfully.');

        return redirect(route('alertmsg.show'))->with('success', "Alert Message Added  successfully.");
    }

    public function alert_message_delete($id){
        Alerts::where('am_id',$id)->delete();
       \LogActivity::addToLog('Alerts Message deleted  successfully.');

        return redirect(route('alertmsg.show'))->with('success', "Alert Message deleted successfully.");
    }



    public function alert_message_update(AlertMsgRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $txtType 	= $request->input('txtType');
		    $radStatus  = $request->input('radStatus');
		    $txtDesc  	= $request->input('txtDesc');
            $hidId          = $request->input("hidId");
        }

        Alerts::where('am_id', $hidId)->update([
            'am_description'=> $txtDesc,
			'am_type' 		=> $txtType,
			'am_status' 	=> $radStatus,
			'am_title' 	    => '',
			'am_date' 	    => date('Y-m-d H:i:s'),
        ]);
       \LogActivity::addToLog('Alerts Message updated  successfully.');

        return redirect(route('alertmsg.show'))->with('success', "Alert Message update successfully.");
    }

     /**
     * Withdrawl List Functions
     */

     public function widthdrawls_list()
     {
         $content_title = 'List';
         $main_content  = 'widthdrawls/list';
         $activepage    =  8;
         $allnode = PublisherWithdrawalSummary::with('register')->select(['*', 'id as wid'])->where('status', -1)->latest('id')->get();
         $role = $this->userPermissions();
         $superAdmin = $role['superAdmin'];
         $permissions = $role['permissions'];
       \LogActivity::addToLog('Withdrawl List Page');
     
         return view('admin.withdrawls.list', compact('content_title', 'main_content', 'activepage', 'allnode', 'superAdmin', 'permissions'));
     }

     public function widthdrawls_edit($id)
    {
        $content_title = 'List';
         $main_content  = 'widthdrawls/list';
        $activepage    =  8;
        $role = $this->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        //$sinnod = PublisherWithdrawalSummary::where('id', $id)->first();
        $sinnod = PublisherWithdrawalSummary::with(['register', 'withdrawalDetails'])->where('status', -1)->latest('id')->get();
       \LogActivity::addToLog('Withdraw Detail page');
       return view('admin.withdrawls.detail', compact('content_title', 'main_content', 'activepage', 'sinnod', 'superAdmin', 'permissions'));
    }


    public function widthdrawls_paynow(Request $request)
    {
        $hidId              = $request->input("hidid");
        $txtAmount          = $request->input("txtAmount");

        PublisherWithdrawalSummary::where('id', $hidId)->update([
            'status'=> '1'
        ]);
       \LogActivity::addToLog('Withdraw payment paid successfully.');

        return redirect(route('widthdrawls.show'))->with('success', "Amount Updated successfully.");
    }
}

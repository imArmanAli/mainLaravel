<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */


    Route::get('/', 'LoginController@show')->name('login.show');
    Route::get('/wp-network', 'LoginController@show')->name('login.show');

    Route::group(['middleware' => ['guest']], function() {

        $admin = "/wp-network";
        /**
         * Login Routes
         */
        Route::get($admin.'/login', 'LoginController@show')->name('login.show');
        Route::post($admin.'/login', 'LoginController@login')->name('adminlogin.perform');
    });

    Route::group(['middleware' => ['auth']], function() {
        $admin = "/wp-network";
        /**
         * Logout Routes
         */
        Route::get($admin.'/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * Dashboard Routes
         */
        Route::get($admin.'/dashboard', 'DashboardController@index')->name('dashboard.show');

        /**
         * Dashboard Routes
         */
        Route::get($admin.'/dashboard-download', 'DashboardController@dashboard_download')->name('dashboarddownload.show');


        /**
         * Adurl Routes
         */
        Route::get($admin.'/add-url', 'DashboardController@add_url_view')->name('addurl.show');
        Route::post($admin.'/add-url-save', 'DashboardController@add_url_save')->name('addurl.save');

        /**
         * Adurl Amazon Routes
         */
        Route::get($admin.'/add-url-amz', 'DashboardController@add_url_amz_view')->name('addurlamz.show');
        Route::post($admin.'/add-url-amz-save', 'DashboardController@add_url_amz_save')->name('addurlamz.save');



        /**
         * Alert Message Routes
         */
        Route::get($admin.'/alert-message', 'DashboardController@alert_message_list')->name('alertmsg.show');
        Route::get($admin.'/alert-message/add', 'DashboardController@alert_message_add')->name('addalertmsg.show');
        Route::get($admin.'/delete-alert-message/{id}', 'DashboardController@alert_message_delete')->name('alertmsg.delete');
        Route::get($admin.'/alert-message/modify/{id}', 'DashboardController@alert_message_edit')->name('alertmsg.edit');
        Route::post($admin.'/save-alert-message', 'DashboardController@alert_message_save')->name('alertmsg.save');
        Route::post($admin.'/update-alert-message', 'DashboardController@alert_message_update')->name('alertmsg.update');

        /**
         * Withdrawl detail Routes
         */
        Route::get($admin.'/widthdrawls', 'DashboardController@widthdrawls_list')->name('widthdrawls.show');
        Route::get($admin.'/widthdrawls/modify/{id}', 'DashboardController@widthdrawls_edit')->name('widthdrawls.edit');
        Route::post($admin.'/widthdrawls/paynow', 'DashboardController@widthdrawls_paynow')->name('widthdrawls.paynow');

        /**
         * Lading Domain Routes
         */
        Route::get($admin.'/landing', 'DashboardController@landing_list')->name('landing.show');
        Route::get($admin.'/landing/add', 'DashboardController@landing_add')->name('addlanding.show');
        Route::get($admin.'/delete-landing/{id}', 'DashboardController@landing_delete')->name('landing.delete');
        Route::get($admin.'/landing/modify/{id}', 'DashboardController@landing_edit')->name('landing.edit');
        Route::get($admin.'/landing/play/{id}/{status}', 'DashboardController@landing_status_update')->name('landing.play');
        Route::get($admin.'/landing/pause/{id}/{status}', 'DashboardController@landing_status_update')->name('landing.pause');

        Route::post($admin.'/save-landing', 'DashboardController@landing_save')->name('landing.save');
        Route::post($admin.'/update-landing', 'DashboardController@landing_update')->name('landing.update');

        /**
         * Lading POPup Domain Routes
         */
        Route::get($admin.'/landingPopup', 'DashboardController@landing_list_popup')->name('landingPopup.show');
        Route::get($admin.'/landingPopup/add', 'DashboardController@landing_add_popup')->name('addlandingPopup.show');
        Route::get($admin.'/delete-landingPopup/{id}', 'DashboardController@landing_delete_popup')->name('landingPopup.delete');
        Route::get($admin.'/landingPopup/modify/{id}', 'DashboardController@landing_edit_popup')->name('landingPopup.edit');
        Route::get($admin.'/landingPopup/play/{id}/{status}', 'DashboardController@landing_status_update_popup')->name('landingPopup.play');
        Route::get($admin.'/landingPopup/pause/{id}/{status}', 'DashboardController@landing_status_update_popup')->name('landingPopup.pause');

        Route::post($admin.'/save-landingPopup', 'DashboardController@landing_save_popup')->name('landingPopup.save');
        Route::post($admin.'/update-landingPopup', 'DashboardController@landing_update_popup')->name('landingPopup.update');



        /**
         * Lading POPup Inline Domain Routes
         */
        Route::get($admin.'/landingPopupInline', 'DashboardController@landing_list_popup_inline')->name('landingPopupInline.show');
        Route::get($admin.'/landingPopupInline/add', 'DashboardController@landing_add_popup_inline')->name('addlandingPopupInline.show');
        Route::get($admin.'/delete-landingPopupInline/{id}', 'DashboardController@landing_delete_popup_inline')->name('landingPopupInline.delete');
        Route::get($admin.'/landingPopupInline/modify/{id}', 'DashboardController@landing_edit_popup_inline')->name('landingPopupInline.edit');
        Route::get($admin.'/landingPopupInline/play/{id}/{status}', 'DashboardController@landing_status_update_popup_inline')->name('landingPopupInline.play');
        Route::get($admin.'/landingPopupInline/pause/{id}/{status}', 'DashboardController@landing_status_update_popup_inline')->name('landingPopupInline.pause');

        Route::post($admin.'/save-landingPopupInline', 'DashboardController@landing_save_popup_inline')->name('landingPopupInline.save');
        Route::post($admin.'/update-landingPopupInline', 'DashboardController@landing_update_popup_inline')->name('landingPopupInline.update');



        /**
         * Redirect Domain Routes
         */
        Route::get($admin.'/redirect', 'DashboardController@redirect_list')->name('redirect.show');
        Route::get($admin.'/redirect/add', 'DashboardController@redirect_add')->name('addredirect.show');
        Route::get($admin.'/delete-redirect/{id}', 'DashboardController@redirect_delete')->name('redirect.delete');
        Route::get($admin.'/redirect/modify/{id}', 'DashboardController@redirect_edit')->name('redirect.edit');
        Route::get($admin.'/redirect/play/{id}/{status}', 'DashboardController@redirect_status_update')->name('redirect.play');
        Route::get($admin.'/redirect/pause/{id}/{status}', 'DashboardController@redirect_status_update')->name('redirect.pause');

        Route::post($admin.'/save-redirect', 'DashboardController@redirect_save')->name('redirect.save');
        Route::post($admin.'/update-redirect', 'DashboardController@redirect_update')->name('redirect.update');


        /**
         * Redirect Popup Domain Routes
         */
        Route::get($admin.'/redirectPopup', 'DashboardController@redirect_list_popup')->name('redirectPopup.show');
        Route::get($admin.'/redirectPopup/add', 'DashboardController@redirect_add_popup')->name('addredirectPopup.show');
        Route::get($admin.'/delete-redirectPopup/{id}', 'DashboardController@redirect_delete_popup')->name('redirectPopup.delete');
        Route::get($admin.'/redirectPopup/modify/{id}', 'DashboardController@redirect_edit_popup')->name('redirectPopup.edit');
        Route::get($admin.'/redirectPopup/play/{id}/{status}', 'DashboardController@redirect_status_update_popup')->name('redirectPopup.play');
        Route::get($admin.'/redirectPopup/pause/{id}/{status}', 'DashboardController@redirect_status_update_popup')->name('redirectPopup.pause');

        Route::post($admin.'/save-redirectPopup', 'DashboardController@redirect_save_popup')->name('redirectPopup.save');
        Route::post($admin.'/update-redirectPopup', 'DashboardController@redirect_update_popup')->name('redirectPopup.update');


        /**
         * Redirect PopupInline Inline Domain Routes
         */
        Route::get($admin.'/redirectPopupInline', 'DashboardController@redirect_list_popup_inline')->name('redirectPopupInline.show');
        Route::get($admin.'/redirectPopupInline/add', 'DashboardController@redirect_add_popup_inline')->name('addredirectPopupInline.show');
        Route::get($admin.'/delete-redirectPopupInline/{id}', 'DashboardController@redirect_delete_popup_inline')->name('redirectPopupInline.delete');
        Route::get($admin.'/redirectPopupInline/modify/{id}', 'DashboardController@redirect_edit_popup_inline')->name('redirectPopupInline.edit');
        Route::get($admin.'/redirectPopupInline/play/{id}/{status}', 'DashboardController@redirect_status_update_popup_inline')->name('redirectPopupInline.play');
        Route::get($admin.'/redirectPopupInline/pause/{id}/{status}', 'DashboardController@redirect_status_update_popup_inline')->name('redirectPopupInline.pause');

        Route::post($admin.'/save-redirectPopupInline', 'DashboardController@redirect_save_popup_inline')->name('redirectPopupInline.save');
        Route::post($admin.'/update-redirectPopupInline', 'DashboardController@redirect_update_popup_inline')->name('redirectPopupInline.update');

        /**
         * Redirect Domain Routes
         */
        Route::get($admin.'/publishers', 'DashboardController@publishers_list')->name('publishers.show');
        Route::get($admin.'/publishers/inactive/{id}/{status}', 'DashboardController@publishers_status_update')->name('publishers.inactive');
        Route::get($admin.'/publishers/active/{id}/{status}', 'DashboardController@publishers_status_update')->name('publishers.active');
        Route::get($admin.'/publishers/delnode/{id}', 'DashboardController@publishers_delete')->name('publishers.delete');
        Route::get($admin.'/publishers/profile/{id}', 'DashboardController@publishers_profile')->name('publishers_profile.view');
        Route::get($admin.'/publishers/adcode/{id}', 'DashboardController@publishers_adcode')->name('publishers_adcode.view');
        Route::get($admin.'/publishers/adbalance/{id}', 'DashboardController@publishers_adbalance')->name('publishers_adbalance.view');
        Route::post($admin.'/publishers/adamount', 'DashboardController@publishers_addAmount')->name('publishers_adamount.add');
        Route::get($admin.'/publishers/site/{id}', 'DashboardController@publishers_sites')->name('publishers_sites.view');
        Route::get($admin.'/publishers/apvsite/{pid}/{sid}/{status}', 'DashboardController@publishers_sites_status')->name('publishers_sites_status.approve');
        Route::get($admin.'/publishers/rejsite/{pid}/{sid}/{status}', 'DashboardController@publishers_sites_status')->name('publishers_sites_status.reject');

        Route::get($admin.'/publishers/apvadcode/{pid}/{sid}/{status}', 'DashboardController@publishers_adcode_status')->name('publishers_adcode_status.approve');
        Route::get($admin.'/publishers/rejadcode/{pid}/{sid}/{status}', 'DashboardController@publishers_adcode_status')->name('publishers_adcode_status.reject');

        Route::get($admin.'/publishers/adcode_detail/{pid}/{sid}/{adid}', 'DashboardController@publishers_adcode_detail')->name('publishers_adcode_detail.show');
        Route::post($admin.'/publishers/nodmodify', 'DashboardController@publishers_adcode_nodmodify')->name('publishers_adcode_detail.update');

        Route::get($admin.'/publishers/adlink/{id}', 'DashboardController@publishers_adlink')->name('publishers_adlink.view');
        Route::post($admin.'/publishers/add-url/addfilepbl/{id}', 'DashboardController@publishers_adlink_save')->name('publishers_adlink.save');
        Route::get($admin.'/publishers/add-url/deletefilepbl/{id}', 'DashboardController@publishers_adlink_delete')->name('publishers_adlink.delete');

        Route::get($admin.'/publishers/loginhistory/{id}', 'DashboardController@publishers_login_history')->name('publishers_login_history.view');

        Route::get($admin.'/publishers/change-password/{id}', 'DashboardController@publishers_change_password')->name('publishers_change_password.view');
        Route::post($admin.'/publishers/updatepass/{id}', 'DashboardController@publishers_password_update')->name('publishers_password.update');

        
        Route::get($admin.'/publishers/stats-export-yesterday/{id}', 'DashboardController@stats_export_yesterday')->name('stats_export_yesterday.download'); 
        Route::get($admin.'/publishers/stats-export-seven/{id}', 'DashboardController@stats_export_seven')->name('stats_export_seven.download'); 
        Route::get($admin.'/publishers/stats-export-all-publishers', 'DashboardController@stats_export_all')->name('stats_export_all.download'); 
        

        Route::post($admin.'/publishers/adcode-link-modify', 'DashboardController@publishers_adcode_link')->name('ad_code_link.save');
        /**
         * User Routes
         */
        Route::get($admin.'/users', 'DashboardController@users_list')->name('users.show');
        Route::get($admin.'/users/add', 'DashboardController@users_add')->name('addusers.show');
        Route::get($admin.'/users/deluser/{id}', 'DashboardController@users_delete')->name('users.delete');
        Route::get($admin.'/users/modify/{id}', 'DashboardController@users_edit')->name('users.edit');


        Route::post($admin.'/users/addnod', 'DashboardController@users_save')->name('users.save');
        Route::post($admin.'/users/usermodify', 'DashboardController@users_update')->name('users.update');

        /**
         * User Role Routes
         */

         Route::get($admin.'/roles', 'DashboardController@users_role_list')->name('roles.show');
         Route::get($admin.'/roles/add', 'DashboardController@users_role_add')->name('addrole.show');

         Route::get($admin.'/roles/delrole/{id}', 'DashboardController@users_role_delete')->name('roles.delete');
         Route::get($admin.'/roles/modify/{id}', 'DashboardController@users_role_edit')->name('roles.edit');


         Route::get($admin.'/roles/inactive/{id}/{status}', 'DashboardController@users_role_status_update')->name('roles.inactive');
         Route::get($admin.'/roles/active/{id}/{status}', 'DashboardController@users_role_status_update')->name('roles.active');

         Route::post($admin.'/roles/addnod', 'DashboardController@users_role_save')->name('roles.save');
         Route::post($admin.'/roles/rolemodify', 'DashboardController@users_role_update')->name('roles.update');

         Route::get($admin.'/roles/permissions/{id}', 'DashboardController@users_role_permission')->name('roles.permissions');
        // raw routes data
         Route::post($admin.'/roles/permissions_save', 'DashboardController@save_role_permission')->name('save.permissions');

        /**
         * Geo Code Routes
         */
        Route::get($admin.'/geocode', 'DashboardController@geocode_list')->name('geocode.show');
        Route::get($admin.'/geocode_delete', 'DashboardController@delete_geocode')->name('geocode.delete');
        Route::post($admin.'/save_geocode', 'DashboardController@save_geocode')->name('geocode.save');
        /**
         * Log Activity Routes
         */
        Route::get($admin.'/logActivity', 'LogActivityController@logActivity')->name('log_activity.show');
        Route::post($admin.'/logActivityByID', 'LogActivityController@logActivitybyId')->name('get_user_tracking_id.show');
        /**
         * Statistic
         */
        Route::get($admin.'/publishers/stats/{id?}', 'StatisticsController@stats_pub_id')->name('tracking.show');
        Route::get($admin.'/publishers/stats/sites/{id}', 'StatisticsController@sites_by_pub_id')->name('sites_by_pub_id.list');
        Route::post($admin.'/publishers/reporting', 'StatisticsController@pub_reporting')->name('get_pub_report.show');




         /**
         * Finance
         */
        Route::get($admin.'/finance/list', 'FinanceController@financeList')->name('finance.list');
        Route::get($admin.'/publisher/payment/{id}', 'FinanceController@publisherPayment')->name('publisher.payment');
        Route::post($admin.'/stripe', 'FinanceController@stripePayment')->name('stripe.post');

        Route::post($admin.'/save_pop_adcode', 'DashboardController@save_pop_adcode')->name('pop_adcode.save');
        Route::post($admin.'/save_popinline_adcode', 'DashboardController@save_popinline_adcode')->name('popinline_adcode.save');

        Route::get($admin.'/get_states/{code}', 'DashboardController@statesById')->name('states.get');
    }); 

    Route::get('/linkstorage', function () {
        Artisan::call('storage:link');
    });
});
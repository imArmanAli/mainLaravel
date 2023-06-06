<?php


namespace App\Helpers;
use Request;
use App\Models\statistics as StatisticsModel;
use Illuminate\Support\Facades\DB;


class Statistics
{


    // public static function getStatistics($pub_id, $dateRange, $device, $site)
    // { 
    //     try {
    //         $dates = explode(" - ", $dateRange);
    //         $tables = array('tbl_statistics_pub', 'tbl_statistics', 'tbl_statistics_templ', 'tbl_statistics_download');
    //         $response = [];
    //         $constraits = array('User Click', 'Redirect', 'Template', 'click expression');
    //         DB::select('SET SESSION group_concat_max_len = 10000000;');
    //         foreach ($tables as $key => $value) {
    //             $deviceCount = 'Windows';
    //             $results = Statistics::getReportByQuery($dates, $pub_id, $device, $site, $value, $constraits[$key]);
                
    //             $windowCounts = Statistics::getOSCount($dates, $pub_id, 'Windows', $site, $value);
    //             $androidCounts = Statistics::getOSCount($dates, $pub_id, 'Android', $site, $value);
    //             $macCounts = Statistics::getOSCount($dates, $pub_id, 'mac', $site, $value);
    //             $linuxCounts = Statistics::getOSCount($dates, $pub_id, 'linux', $site, $value);
    //             $otherOSCounts = Statistics::getOtherOSCount($dates, $pub_id, $site, $value);

    //             $operaCounts = Statistics::getBrowserCount($dates, $pub_id, 'Opera', $site, $value);
    //             $firefoxCounts = Statistics::getBrowserCount($dates, $pub_id, 'Firefox', $site, $value);
    //             $chromeCounts = Statistics::getBrowserCount($dates, $pub_id, 'Chrome', $site, $value);
    //             $safariCounts = Statistics::getBrowserCount($dates, $pub_id, 'Safari', $site, $value);
    //             $otherBrowserCounts = Statistics::getOtherBrowserCount($dates, $pub_id, $site, $value);

                
    //             foreach ($results as $key => $value) {
    //                 //OS Counts
    //                 foreach ($windowCounts as $key => $window) {
    //                     if ($window->date == $value->dates) {
    //                         $value->window = $window->count;
    //                     }
    //                 }
    //                 foreach ($androidCounts as $key => $android) {
    //                     if ($android->date == $value->dates) {
    //                         $value->android = $android->count;
    //                     }
    //                 }
    //                 foreach ($macCounts as $key => $mac) {
    //                     if ($mac->date == $value->dates) {
    //                         $value->mac = $mac->count;
    //                     }
    //                 }
    //                 foreach ($linuxCounts as $key => $linux) {
    //                     if ($linux->date == $value->dates) {
    //                         $value->linux = $linux->count;
    //                     }
    //                 }
    //                 foreach ($otherOSCounts as $key => $otherOS) {
    //                     if ($otherOS->date == $value->dates) {
    //                         $value->otherOS = $otherOS->count;
    //                     }
    //                 }


    //                 //Browser Counts
    //                 foreach ($operaCounts as $key => $opera) {
    //                     if ($opera->date == $value->dates) {
    //                         $value->opera = $opera->count;
    //                     }
    //                 }
    //                 foreach ($firefoxCounts as $key => $firefox) {
    //                     if ($firefox->date == $value->dates) {
    //                         $value->firefox = $firefox->count;
    //                     }
    //                 }
    //                 foreach ($chromeCounts as $key => $chrome) {
    //                     if ($chrome->date == $value->dates) {
    //                         $value->chrome = $chrome->count;
    //                     }
    //                 }
    //                 foreach ($safariCounts as $key => $safari) {
    //                     if ($safari->date == $value->dates) {
    //                         $value->safari = $safari->count;
    //                     }
    //                 }
    //                 foreach ($otherBrowserCounts as $key => $otherBrowsers) {
    //                     if ($otherBrowsers->date == $value->dates) {
    //                         $value->otherBrowsers = $otherBrowsers->count;
    //                     }
    //                 }
    //             }

    //             foreach ($results as $key => $values) {
    //                 $values->browsers = 'opera ('.(isset($values->opera) ? $values->opera : 0).'),firefox ('.(isset($values->firefox) ? $values->firefox : 0).'),chrome ('.(isset($values->chrome) ? $values->chrome : 0).'),safari ('.(isset($values->safari) ? $values->safari : 0).'),other ('.(isset($values->otherBrowsers) ? $values->otherBrowsers : 0).')';

    //                 $values->device = 'window ('.(isset($values->window) ? $values->window : 0).'),android ('.(isset($values->android) ? $values->android : 0).'),mac ('.(isset($values->mac) ? $values->mac : 0).'),linux ('.(isset($values->linux) ? $values->linux : 0).'),other ('.(isset($values->otherOS) ? $values->otherOS : 0).')';

    //                 unset($values->opera);
    //                 unset($values->firefox);
    //                 unset($values->chrome);
    //                 unset($values->safari);
    //                 unset($values->otherBrowsers);
                    
    //                 unset($values->window);
    //                 unset($values->android);
    //                 unset($values->mac);
    //                 unset($values->linux);
    //                 unset($values->otherOS);

    //             }
                
    //             // print_r($results);
    //             // exit;

    //             $response = array_merge($response, $results);
    //         }
            
    //         //code...
    //         // dd($response);
    //         return $response;
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //         return $th;
    //     }
    // }


    public static function getStatistics($pub_id, $dateRange, $device, $site)
    { 
        try {
            $dates = explode(" - ", $dateRange);
            $tables = array('tbl_statistics');
            $response = [];
            $constraits = array('Clicks');
            DB::select('SET SESSION group_concat_max_len = 10000000;');
            foreach ($tables as $key => $value) {
                $deviceCount = 'Windows';
                $results = Statistics::getReportByQuery($dates, $pub_id, $device, $site, $value, $constraits[$key]);
                
                $windowCounts = Statistics::getOSCount($dates, $pub_id, 'Windows', $site, $value);
                $androidCounts = Statistics::getOSCount($dates, $pub_id, 'Android', $site, $value);
                $macCounts = Statistics::getOSCount($dates, $pub_id, 'mac', $site, $value);
                $linuxCounts = Statistics::getOSCount($dates, $pub_id, 'linux', $site, $value);
                $otherOSCounts = Statistics::getOtherOSCount($dates, $pub_id, $site, $value);

                $operaCounts = Statistics::getBrowserCount($dates, $pub_id, 'Opera', $site, $value);
                $firefoxCounts = Statistics::getBrowserCount($dates, $pub_id, 'Firefox', $site, $value);
                $chromeCounts = Statistics::getBrowserCount($dates, $pub_id, 'Chrome', $site, $value);
                $safariCounts = Statistics::getBrowserCount($dates, $pub_id, 'Safari', $site, $value);
                $otherBrowserCounts = Statistics::getOtherBrowserCount($dates, $pub_id, $site, $value);

                
                foreach ($results as $key => $value) {
                    //OS Counts
                    foreach ($windowCounts as $key => $window) {
                        if ($window->date == $value->dates) {
                            $value->window = $window->count;
                        }
                    }
                    foreach ($androidCounts as $key => $android) {
                        if ($android->date == $value->dates) {
                            $value->android = $android->count;
                        }
                    }
                    foreach ($macCounts as $key => $mac) {
                        if ($mac->date == $value->dates) {
                            $value->mac = $mac->count;
                        }
                    }
                    foreach ($linuxCounts as $key => $linux) {
                        if ($linux->date == $value->dates) {
                            $value->linux = $linux->count;
                        }
                    }
                    foreach ($otherOSCounts as $key => $otherOS) {
                        if ($otherOS->date == $value->dates) {
                            $value->otherOS = $otherOS->count;
                        }
                    }


                    //Browser Counts
                    foreach ($operaCounts as $key => $opera) {
                        if ($opera->date == $value->dates) {
                            $value->opera = $opera->count;
                        }
                    }
                    foreach ($firefoxCounts as $key => $firefox) {
                        if ($firefox->date == $value->dates) {
                            $value->firefox = $firefox->count;
                        }
                    }
                    foreach ($chromeCounts as $key => $chrome) {
                        if ($chrome->date == $value->dates) {
                            $value->chrome = $chrome->count;
                        }
                    }
                    foreach ($safariCounts as $key => $safari) {
                        if ($safari->date == $value->dates) {
                            $value->safari = $safari->count;
                        }
                    }
                    foreach ($otherBrowserCounts as $key => $otherBrowsers) {
                        if ($otherBrowsers->date == $value->dates) {
                            $value->otherBrowsers = $otherBrowsers->count;
                        }
                    }
                }

                foreach ($results as $key => $values) {
                    $values->browsers = 'opera ('.(isset($values->opera) ? $values->opera : 0).'),firefox ('.(isset($values->firefox) ? $values->firefox : 0).'),chrome ('.(isset($values->chrome) ? $values->chrome : 0).'),safari ('.(isset($values->safari) ? $values->safari : 0).'),other ('.(isset($values->otherBrowsers) ? $values->otherBrowsers : 0).')';

                    $values->device = 'window ('.(isset($values->window) ? $values->window : 0).'),android ('.(isset($values->android) ? $values->android : 0).'),mac ('.(isset($values->mac) ? $values->mac : 0).'),linux ('.(isset($values->linux) ? $values->linux : 0).'),other ('.(isset($values->otherOS) ? $values->otherOS : 0).')';

                    unset($values->opera);
                    unset($values->firefox);
                    unset($values->chrome);
                    unset($values->safari);
                    unset($values->otherBrowsers);
                    
                    unset($values->window);
                    unset($values->android);
                    unset($values->mac);
                    unset($values->linux);
                    unset($values->otherOS);

                }
                
                // print_r($results);
                // exit;

                $response = array_merge($response, $results);
            }
            
            //code...
            // dd($response);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }

    private static function getReportByQuery($dates, $pub_id, $device, $site, $table_name, $page)
    {
        
        if ($pub_id == 0 && $device == 0 && $site == 0) {
            $query = 'SELECT
                            ts2.url,
                            ts.pub_id,
                            -- GROUP_CONCAT(ts.browser) as browsers,
                            -- GROUP_CONCAT(ts.stat_os) as device,
                            -- GROUP_CONCAT(ts.country) as countries,
                            -- CONCAT(ts.country, \'(\', COUNT(DISTINCT ts.country, user_ip), \')\') as countries,
                            Date(ts.stat_date) as dates,
                            COUNT(DISTINCT user_ip) as total,
                            "'.$page.'" as page
                        from
                            '.$table_name.' ts
                        join 
                            tbl_sites ts2 on ts2.site_id = ts.site_id 
                        WHERE
                            Date(ts.stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                        GROUP BY
                            ts.pub_id,
                            ts.site_id,
                            ts2.url,
                            Date(ts.stat_date)';
        } else if ($pub_id != 0 && $device == 0 && $site == 0) {
            $query = 'SELECT
                            ts2.url,
                            ts.pub_id,
                            -- GROUP_CONCAT(ts.browser) as browsers,
                            -- GROUP_CONCAT(ts.stat_os) as device,
                            -- GROUP_CONCAT(ts.country) as countries,
                            -- CONCAT(ts.country, \'(\', COUNT(DISTINCT ts.country, user_ip), \')\') as countries,
                            Date(ts.stat_date) as dates,
                            COUNT(DISTINCT user_ip) as total,
                            "'.$page.'" as page 
                        from
                            '.$table_name.' ts
                        join 
                            tbl_sites ts2 on ts2.site_id = ts.site_id 
                        WHERE
                            Date(ts.stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            AND
                            ts.pub_id = '.$pub_id.'
                        GROUP BY
                            ts.pub_id,
                            ts.site_id,
                            ts2.url,
                            Date(ts.stat_date)';
                        
        } else if ($pub_id != 0 && $device == 0 && $site != 0) {
            $query = 'SELECT
                            ts2.url,
                            ts.pub_id,
                            -- GROUP_CONCAT(ts.browser) as browsers,
                            -- GROUP_CONCAT(ts.stat_os) as device,
                            -- CONCAT(ts.country, \'(\', COUNT(DISTINCT ts.country, user_ip), \')\') as countries,
                            COUNT(DISTINCT ts.country) as countries,
                            Date(ts.stat_date) as dates,
                            COUNT(DISTINCT user_ip) as total,
                            "'.$page.'" as page 
                        from
                            '.$table_name.' ts
                        join 
                            tbl_sites ts2 on ts2.site_id = ts.site_id 
                        WHERE
                            Date(ts.stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            AND
                            ts.pub_id = '.$pub_id.'
                            AND
                            ts.site_id = '.$site.'
                        GROUP BY
                            ts.pub_id,
                            ts.site_id,
                            ts2.url,
                            Date(ts.stat_date)';
        } else if ($pub_id == 0 && $device != 0 && $site == 0) {
            $query = 'SELECT
                            ts2.url,
                            ts.pub_id,
                            -- GROUP_CONCAT(ts.browser) as browsers,
                            -- GROUP_CONCAT(ts.stat_os) as device,
                            -- GROUP_CONCAT(ts.country) as countries,
                            -- CONCAT(ts.country, \'(\', COUNT(DISTINCT ts.country, user_ip), \')\') as countries,
                            Date(ts.stat_date) as dates,
                            COUNT(DISTINCT user_ip) as total,
                            "'.$page.'" as page 
                        from
                            '.$table_name.' ts
                        join 
                            tbl_sites ts2 on ts2.site_id = ts.site_id 
                        WHERE
                            Date(ts.stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            AND
                            ts.stat_os = '.$device.'
                        GROUP BY
                            ts.pub_id,
                            ts.site_id,
                            ts2.url,
                            Date(ts.stat_date)';
        } else if ($pub_id != 0 && $device != 0 && $site != 0) {
            $query = 'SELECT
                            ts2.url,
                            ts.pub_id,
                            -- GROUP_CONCAT(ts.browser) as browsers,
                            -- GROUP_CONCAT(ts.stat_os) as device,
                            -- GROUP_CONCAT(ts.country) as countries,
                            -- CONCAT(ts.country, \'(\', COUNT(DISTINCT ts.country, user_ip), \')\') as countries,
                            Date(ts.stat_date) as dates,
                            COUNT(DISTINCT user_ip) as total,
                            "'.$page.'" as page 
                        from
                            '.$table_name.' ts
                        join 
                            tbl_sites ts2 on ts2.site_id = ts.site_id 
                        WHERE
                            Date(ts.stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            AND
                            ts.pub_id = '.$pub_id.'
                            AND
                            ts.site_id = '.$site.'
                            AND
                            ts.stat_os = "'.$device.'"
                        GROUP BY
                            ts.pub_id,
                            ts.site_id,
                            ts2.url,
                            Date(ts.stat_date)';
        } else if ($pub_id != 0 && $device != 0 && $site == 0) {
            $query = 'SELECT
                            ts2.url,
                            ts.pub_id,
                            -- GROUP_CONCAT(ts.browser) as browsers,
                            -- GROUP_CONCAT(ts.stat_os) as device,
                            -- GROUP_CONCAT(ts.country) as countries,
                            -- CONCAT(ts.country, \'(\', COUNT(DISTINCT ts.country, user_ip), \')\') as countries,
                            Date(ts.stat_date) as dates,
                            COUNT(DISTINCT user_ip) as total,
                            "'.$page.'" as page 
                        from
                            '.$table_name.' ts
                        join 
                            tbl_sites ts2 on ts2.site_id = ts.site_id 
                        WHERE
                            Date(ts.stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            AND
                            ts.pub_id = '.$pub_id.'
                            AND
                            ts.stat_os = "'.$device.'"
                        GROUP BY
                            ts.pub_id,
                            ts.site_id,
                            ts2.url,
                            Date(ts.stat_date)';
        }else if ($pub_id == 0 && $device == 0 && $site != 0) {
            $query = 'SELECT
                            ts2.url,
                            ts.pub_id,
                            -- GROUP_CONCAT(ts.browser) as browsers,
                            -- GROUP_CONCAT(ts.stat_os) as device,
                            -- GROUP_CONCAT(ts.country) as countries,
                            -- CONCAT(ts.country, \'(\', COUNT(DISTINCT ts.country, user_ip), \')\') as countries,
                            Date(ts.stat_date) as dates,
                            COUNT(DISTINCT user_ip) as total,
                            "'.$page.'" as page 
                        from
                            '.$table_name.' ts
                        join 
                            tbl_sites ts2 on ts2.site_id = ts.site_id 
                        WHERE
                            Date(ts.stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            AND
                            ts.pub_id = '.$pub_id.'
                            AND
                            ts.site_id = '.$site.'
                        GROUP BY
                            ts.pub_id,
                            ts.site_id,
                            ts2.url,
                            Date(ts.stat_date)';
        }
        $results = DB::select($query);

        return $results;
    }

    private static function getOtherOSCount($dates, $pub_id, $site, $table_name)
    {
        if ($pub_id == 0 && $site == 0) {
            $query = 'SELECT
                    COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                from
                    '.$table_name.'
                WHERE
                    Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                    and stat_os != "Windows" 
                    and stat_os != "Android" 
                    and stat_os != "mac" 
                    and stat_os != "linux" 
                    GROUP by 
                    Date(stat_date)';
        } else if ($pub_id != 0 && $site == 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and pub_id = '.$pub_id.'
                            and stat_os != "Windows" 
                            and stat_os != "Android" 
                            and stat_os != "mac" 
                            and stat_os != "linux" 
                            GROUP by 
                            Date(stat_date)';
        } else if ($pub_id != 0 && $site != 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and pub_id = '.$pub_id.'
                            and site_id = '.$site.'
                            and stat_os != "Windows" 
                            and stat_os != "Android" 
                            and stat_os != "mac" 
                            and stat_os != "linux" 
                            GROUP by 
                            Date(stat_date)';
        } else if ($pub_id == 0 && $site != 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and site_id = '.$site.'
                            and stat_os != "Windows" 
                            and stat_os != "Android" 
                            and stat_os != "mac" 
                            and stat_os != "linux" 
                            GROUP by 
                            Date(stat_date)';
        }
        $osCount = DB::select($query);

        return $osCount;
    }
    private static function getOSCount($dates, $pub_id, $device, $site, $table_name)
    {
        if ($pub_id == 0 && $site == 0) {
            $query = 'SELECT
                    COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                from
                    '.$table_name.'
                WHERE
                    Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                    and stat_os = "'.$device.'" 
                    GROUP by 
                    Date(stat_date)';
        } else if ($pub_id != 0 && $site == 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and pub_id = '.$pub_id.'
                            and stat_os = "'.$device.'" 
                            GROUP by 
                            Date(stat_date)';
        } else if ($pub_id != 0 && $site != 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and pub_id = '.$pub_id.'
                            and site_id = '.$site.'
                            and stat_os = "'.$device.'" 
                            GROUP by 
                            Date(stat_date)';
        } else if ($pub_id == 0 && $site != 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and site_id = '.$site.'
                            and stat_os = "'.$device.'" 
                            GROUP by 
                            Date(stat_date)';
        }
        $osCount = DB::select($query);

        return $osCount;
    }


    private static function getOtherBrowserCount($dates, $pub_id, $site, $table_name)
    {
        if ($pub_id == 0 && $site == 0) {
            $query = 'SELECT
                    COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                from
                    '.$table_name.'
                WHERE
                    Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                    and browser NOT IN ("Firefox","Chrome","Safari","Opera") 
                    GROUP by 
                    Date(stat_date)';
        } else if ($pub_id != 0 && $site == 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and pub_id = '.$pub_id.'
                            and browser NOT IN ("Firefox","Chrome","Safari","Opera") 
                            GROUP by 
                            Date(stat_date)';
        } else if ($pub_id != 0 && $site != 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and pub_id = '.$pub_id.'
                            and site_id = '.$site.'
                            and browser NOT IN ("Firefox","Chrome","Safari","Opera") 
                            GROUP by 
                            Date(stat_date)';
        } else if ($pub_id == 0 && $site != 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and site_id = '.$site.'
                            and browser NOT IN ("Firefox","Chrome","Safari","Opera") 
                            GROUP by 
                            Date(stat_date)';
        }
        $osCount = DB::select($query);

        return $osCount;
    }
    private static function getBrowserCount($dates, $pub_id, $device, $site, $table_name)
    {
        if ($pub_id == 0 && $site == 0) {
            $query = 'SELECT
                    COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                from
                    '.$table_name.'
                WHERE
                    Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                    and browser = "'.$device.'" 
                    GROUP by 
                    Date(stat_date)';
        } else if ($pub_id != 0 && $site == 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and pub_id = '.$pub_id.'
                            and browser = "'.$device.'" 
                            GROUP by 
                            Date(stat_date)';
        } else if ($pub_id != 0 && $site != 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and pub_id = '.$pub_id.'
                            and site_id = '.$site.'
                            and browser = "'.$device.'" 
                            GROUP by 
                            Date(stat_date)';
        } else if ($pub_id == 0 && $site != 0) {
            $query = 'SELECT
                            COUNT(DISTINCT user_ip) as count, Date(stat_date) as date
                        from
                            '.$table_name.'
                        WHERE
                            Date(stat_date) BETWEEN "'.$dates[0].'" AND "'.$dates[1].'"
                            and site_id = '.$site.'
                            and browser = "'.$device.'" 
                            GROUP by 
                            Date(stat_date)';
        }
        $osCount = DB::select($query);

        return $osCount;
    }

    public static function getOSRecordsByID($date, $id, $os)
    {
        $query = 'SELECT COUNT(DISTINCT user_ip) as count from tbl_statistics_btn
        WHERE Date(stat_date) LIKE  "'.$date.'"
        and pub_id = '.$id.'	
        and stat_os = "'.$os.'"';
        $osCount = DB::select($query);
        
        foreach ($osCount as $value) 
        $array[] = $value->count;
       
        return $array[0];
    }

    public static function getOtherOSRecordsByID($date, $id, $os1, $os2, $os3)
    {
        $query = 'SELECT COUNT(DISTINCT user_ip) as count from tbl_statistics
        WHERE Date(stat_date) LIKE  "'.$date.'"
        and pub_id = '.$id.'	
        and stat_os != "'.$os1.'"
        and stat_os != "'.$os2.'"
        and stat_os != "'.$os3.'"';
        $osCount = DB::select($query);
        
        foreach ($osCount as $value) 
        $array[] = $value->count;
       
        return $array[0];
    }

    public static function publisherRangeStatAll($start_date, $end_date, $id)
    {
        $query = 'SELECT COUNT(*) as total_rec from tbl_statistics_btn
        WHERE Date(stat_date) BETWEEN "'.$end_date.'" and "'.$start_date.'"
        and pub_id = '.$id.'';
        $total_records_array = DB::select($query);
        
        return $total_records_array;
    }

}
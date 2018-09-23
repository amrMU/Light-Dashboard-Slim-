<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Config;
use View;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() {
        if ( Config::get('app.locale') == 'en'){
            $name = 'name_en';
            $about = 'about_product_en';
            $feture = 'feture_en';
        }else{
            $name = 'name_ar';
            $about = 'about_product_ar';
            $feture = 'feture_ar';
            
        }
        view()->share('name',$name);
        view()->share('about',$about);
        view()->share('feture',$feture);
    }

    public static function check_in_range($start_date, $end_date, $date_from_user)
    {
      // Convert to timestamp
      $start_ts = strtotime($start_date);
      $end_ts = strtotime($end_date);
      $user_ts = strtotime($date_from_user);
    
      // Check that user date is between start & end
      return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }
    
}

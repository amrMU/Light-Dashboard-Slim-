<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category,App\Slider,App\AboutUs;
use App\ContactUsSetting,App\ContactUs;
use App\Helpers;
use App;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        App::booted(function()
        {
            if (\Schema::hasTable('contactus_settings') && \Schema::hasTable('contact_us') ) {
                $setting = ContactUsSetting::with(['whatsapp','phone'])->first();
                $contactus_requests_count = ContactUs::where('read','0')->count();
                view()->share('setting', $setting);
                view()->share('contactus_requests_count', $contactus_requests_count);
            }
                       
           
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

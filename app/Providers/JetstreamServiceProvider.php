<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\Admin;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
        // $prefix = Route::current();

        // if($prefix == '/admin/login'){
        //     Fortify::authenticateUsing(function (Request $request) {
        //         $admin = Admin::where('email', $request->login)

        //                         ->first();

        //         if ($admin &&
        //             Hash::check($request->password, $admin->password)) {
        //             return $admin;
        //         }
        //     });

        // }else{

            // Fortify::authenticateUsing(function (Request $request) {
            //     $user = User::where('email', $request->login)
            //                     ->orWhere('phone',$request->login)
            //                     ->first();

            //     if ($user &&
            //         Hash::check($request->password, $user->password)) {
            //         return $user;
            //     }
            // });
        // }



    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}

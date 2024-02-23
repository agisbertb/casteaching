<?php

use App\Models\Team;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

if (! function_exists('create_default_user')) {
    function create_default_user()
    {
        $user = User::create([
            'name' => config('casteaching.default_user.name','Andreu Gisbert Bel'),
            'email' => config('casteaching.default_user.email','agisbert@iesebre.com'),
            'password' => Hash::make(config('casteaching.default_user.password','12345678'))
        ]);

        $user->super_admin = true;
        $user->save();

        add_personal_team($user);
    }
}

if (! function_exists('create_default_videos')) {
    function create_default_videos()
    {
        Video::create([
            'title' => 'Ubuntu 100',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => Carbon::parse('January 11, 2024 15:00'),
            'previous' => null,
            'next' => null,
            'series_id' => 1
        ]);
    }
}
if (! function_exists('create_regular_user')) {
    function create_regular_user()
    {
        $user = User::create([
            'name' => 'Pepe Pringao',
            'email' => 'pringao@casteaching.com',
            'password' => Hash::make('12345678'),
            'super_admin' => false,
        ]);

        add_personal_team($user);

        return $user;
    }
}

/**
 * @param $user
 * @return void
 */

if (! function_exists('add_personal_team')) {
function add_personal_team($user): void
{
    try {
        Team::forceCreate([
            'name' => $user->name . "'s Team",
            'user_id' => $user->id,
            'personal_team' => true
        ]);
    } catch (\Exception $exception) {

    }
}
}

if (! function_exists('create_video_manager_user')) {
    function create_video_manager_user()
    {

        $user = User::create([
            'name' => 'Video Manager',
            'email' => 'videosmanager@casteaching.com',
            'password' => Hash::make('12345678'),
        ]);

        Permission::create(['name' => 'videos_manage_index']);
        $user->givePermissionTo('videos_manage_index');

        add_personal_team($user);

        return $user;
    }
}


if (! function_exists('create_superadmin_user')) {
    function create_superadmin_user()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@casteaching.com',
            'password' => Hash::make('12345678'),
            'super_admin' => true,
        ]);
        $user->super_admin = true;
        $user->save();

        add_personal_team($user);

        return $user;
    }
}

if (! function_exists('define_gates')) {
    function define_gates(){

        Gate::before(function (User $user, $ability) {
            if ($user->isSuperAdmin()) {
                return true;
            }
        });
    }
}

if (! function_exists('create_permissions')) {
    function create_permissions(){
        Permission::firstOrCreate(['name' => 'videos_manage_index']);
    }
}

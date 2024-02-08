<?php

use App\Models\Team;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

if (! function_exists('create_default_user')) {
    function create_default_user()
    {
        $user = User::create([
            'name' => config('casteaching.default_user.name','Andreu Gisbert Bel'),
            'email' => config('casteaching.default_user.email','agisbert@iesebre.com'),
            'password' => Hash::make(config('casteaching.default_user.password','12345678'))
        ]);

        try {
            Team::create([
                'name' => $user->name . "'s Team",
                'user_id' => $user->id,
                'personal_team' => true
            ]);
        } catch (\Exception $exception){

        }
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

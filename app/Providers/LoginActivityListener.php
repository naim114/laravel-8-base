<?php

namespace App\Providers;

use App\Models\User;
use App\Models\UserActivity;
use App\Providers\LoginActivityEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;

class LoginActivityListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LoginActivityEvent $event
     * @return bool $query
     */
    public function handle(LoginActivityEvent $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $user = $event->user;
        $request = $event->request;

        UserActivity::create([
            'description' => "Logged in at {$current_timestamp} by {$user->username}({$user->email})",
            'user_id' => $user->id,
            'ip_address' => $request->getClientIp(),
            'user_agent' => $request->server('HTTP_USER_AGENT'),
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp,
        ]);

        User::where('id', $user->id)
            ->update([
                'last_login' => Carbon::now(),
            ]);

        return true;
    }
}
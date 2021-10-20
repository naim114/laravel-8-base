<?php

namespace App\Providers;

use App\Models\UserActivity;
use App\Providers\UserActivityEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;

class UserActivityListener
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
     * @param  UserActivityEvent  $event
     * @return void
     */
    public function handle(UserActivityEvent $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $user = $event->user;
        $request = $event->request;
        $desc = $event->desc;

        $query = UserActivity::create([
            'description' => "{$desc} by {$user->username}({$user->email})",
            'user_id' => $user->id,
            'ip_address' => $request->getClientIp(),
            'user_agent' => $request->server('HTTP_USER_AGENT'),
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp,
        ]);

        return $query;
    }
}

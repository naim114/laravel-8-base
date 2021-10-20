<?php

namespace App\Providers;

use App\Providers\RegisterActivityEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegisterActivityListener
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
     * @param  RegisterActivityEvent  $event
     * @return void
     */
    public function handle(RegisterActivityEvent $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $user = $event->user;
        $request = $event->request;

        $query = DB::table('user_activity')->insert(
            [
                'description' => "New account created at {$current_timestamp} by {$user->username}({$user->email})",
                'user_id' => 0,
                'ip_address' => $request->getClientIp(),
                'user_agent' => $request->server('HTTP_USER_AGENT'),
                'created_at' => $current_timestamp,
            ]
        );

        return $query;
    }
}

<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UpdateUserLoginStatus
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        $user = $event->user;
        if ($user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['is_login' => 0]);
        }
    }
}

<?php

namespace App\Providers;

use App\Models\Chat;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class MessageCountComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            $chat = Chat::where('user1', auth()->id())->orWhere('user2', auth()->id())->first();
            $messageCount = $chat ? $chat->message_count : 0;
            $view->with('messageCount', $messageCount);
        });
    }
}

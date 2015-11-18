<?php

namespace App\Composers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CurrentUserComposer
{
    public function compose(View $view)
    {
        $view->with('currentUser', Auth::user());
    }
}
<?php

use App\User;

if (! function_exists('me')) {
    /** @return mixed */
    function me()
    {
        return User::where('email', 'patrique.ouimet@gmail.com')->first();
    }
}

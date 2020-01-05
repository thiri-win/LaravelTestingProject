<?php

if (!function_exists('isSuperAdmin')) :

    function isSuperAdmin()
    {
        return auth()->user()->hasRole('SuperAdmin')==='SuperAdmin' ? true:false;
    }

endif;
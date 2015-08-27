<?php

if (!function_exists('fm')) {

    function fm()
    {
        return get_instance()->session->fm();
    }

}
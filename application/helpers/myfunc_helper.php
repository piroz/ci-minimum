<?php

if (!function_exists('fm')) {

    function fm()
    {
        return get_instance()->session->fm();
    }

}

if (!function_exists('he')) {

    function he($name)
    {
        return strlen(form_error($name)) > 0;
    }

}
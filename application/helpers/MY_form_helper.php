<?php

/**
 * Form open wrapper
 */
if (!function_exists('fo')) {

    function fo($action = '', $attributes = '', $hidden = array())
    {
        $reversed = site_url($action);

        return form_open($reversed, $attributes, $hidden);
    }

}

if (!function_exists('he')) {

    function he($name)
    {
        return strlen(form_error($name)) > 0;
    }

}
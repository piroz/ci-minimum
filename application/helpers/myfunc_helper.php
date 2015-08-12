<?php

if (!function_exists('he')) {

    function he($name)
    {
        return strlen(form_error($name)) > 0;
    }

}

if (!function_exists('redirectToTop')) {

    function redirectToTop()
    {
        return redirect(get_instance()->config->base_url());
    }

}

if (!function_exists('postRedirect')) {

    function postRedirect($action, array $vars)
    {
        if (!preg_match('#^https?://#i', $action)) {
            $action = site_url($action);
        }

        log_message('debug', "postRdirect to {$action}");

        echo get_instance()->load->view('_parts/post_redirect', compact('vars', 'action'), true);

        exit;
    }

}

if (!function_exists('fm')) {

    function fm()
    {
        return get_instance()->session->fm();
    }

}
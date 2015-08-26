<?php

if (!function_exists('defineEnvironment')) {

    function defineEnvironment()
    {
        switch ($_SERVER['HTTP_HOST']) {
            case 'xx.xx.xx.xx':
                define('ENVIRONMENT', 'production');
                break;

            case 'xx.xx.xx.xx':
                define('ENVIRONMENT', 'staging');
                break;

            default:
                define('ENVIRONMENT', 'development');
                break;
        }
    }

}
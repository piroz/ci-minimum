<?php

if (!function_exists('make_seed')) {

    function make_seed()
    {
        list($usec, $sec) = explode(' ', microtime());
        return (float) $sec + ((float) $usec * 100000);
    }

}

/**
 * library funcitons
 */
/**
 * getInputServer
 * 
 * Get value from $_SERVER safely
 * 
 * @param string $key
 * @return string
 */
if (!function_exists('getInputServer')) {

    function getInputServer($key)
    {
        return strlen($key) > 0 ? filter_input(INPUT_SERVER, $key) : null;
    }

}

/**
 * getBaseUrl
 * 
 * get base url
 * 
 * http://xx.xx.xx.xx{/hoge/fuga/}test.php?var=val
 * >>> /hoge/fuga
 * 
 * http://xx.xx.xx.xx/
 * >>> /
 * 
 * @return string
 */
if (!function_exists('getBaseUrl')) {

    function getBaseUrl()
    {
        return dirname(getInputServer('SCRIPT_NAME'));
    }

}

/**
 * a
 * 
 * get value from array
 * 
 * @param string $key
 * @param array $array
 * @param mixed $default
 * @return mixed
 */
if (!function_exists('a')) {

    function a($key, $array, $default = null)
    {
        if (isset($array[$key])) {
            return $array[$key];
        }
        return $default;
    }

}

/**
 * gf
 * 
 * get files array related $key
 * 
 * @param string $key
 * @return array
 */
if (!function_exists('gf')) {

    function gf($key)
    {
        return a($key, $_FILES);
    }

}

/**
 * ta
 * 
 * to array
 * 
 * @param mixed $var
 * @return array
 */
if (!function_exists('ta')) {

    function ta($var)
    {
        return (array) $var;
    }

}

/**
 * h
 * 
 * html escape via htmlspecialchars
 * 
 * @param string $string
 * @return string
 */
if (!function_exists('h')) {

    function h($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

}

/**
 * d
 * 
 * debug function
 * 
 * @param mixed $var, $var, ...
 * @return void
 */
if (!function_exists('d')) {

    function d()
    {
        var_dump(func_get_args());
    }

}

/**
 * pd
 * 
 * debug function for html output
 * 
 * @param mixed $var, $var, ...
 * @return void
 */
if (!function_exists('pd')) {

    function pd()
    {
        echo '<pre>';
        d(func_get_args());
        echo '</pre>';
    }

}

/**
 * dt
 * 
 * current date and time
 * 
 * @return string
 */
if (!function_exists('dt')) {

    function dt()
    {
        return date('Y-m-d H:i:s');
    }

}

/**
 * getYoutubeId
 * 
 */
if (!function_exists('getYoutubeId')) {

    function getYoutubeId($string)
    {
        $id = array();
        $pattern = '/[\/?=]([-\w]{11})/';
        preg_match($pattern, $string, $id);
        return $id[1];
    }

}

/**
 * zerofill
 * 
 */
if (!function_exists('zeroFill')) {

    function zeroFill($m, $num)
    {
        return sprintf('%0' . $m . 'd', $num);
    }

}



/**
 * isDecimal
 * 
 * string is decimal
 */
if (!function_exists('isDecimal')) {

    function isDecimal($string)
    {
        return (bool) preg_match('@^[0-9]+$@', $string);
    }

}

/**
 * df
 * 
 * date format
 */
if (!function_exists('df')) {

    function df($val, $format, $default = '')
    {
        $time = strtotime($val);

        if (false === $time) {
            return $default;
        }

        return strftime($format, $time);
    }

}

if (!function_exists('error_return_url')) {

    function error_return_url()
    {
        $ref = getInputServer('HTTP_REFERER');
        $parse = parse_url($ref, PHP_URL_HOST);

        if (null === $parse) {
            return getBaseUrl();
        }

        return $ref;
    }

}

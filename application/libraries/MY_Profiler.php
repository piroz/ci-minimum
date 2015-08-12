<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * # Codeigniter Session Profiler
 *
 * * Adds session data to the profiler in CodeIgniter 2.0
 * * Adds a table row for each item of session data with the key and value
 * * Shows both CI session data and custom session data
 *
 * Note: I did not write the original implementation, I just adapted it
 * for CodeIgniter >= 2.0 . You can find the implementation for CodeIgniter < 2.0 [here][http://codeigniter.com/forums/viewthread/60066/] 
 *
 * @author  Jeroen v.d Gulik, Isset Internet Professionals
 * @link    http://isset.nl/
 * @version 0.3
 * @package Codeigniter Session Profiler
 * @license MIT License
 *
 * Copyright (C) 2010 - 2011, Isset Internet Professionals
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
class MY_Profiler extends CI_Profiler
{

    /**
     * Constructor method, called whenever the profiler is initialized and can be used
     * to set custom configuration options by setting the first argument to an array.
     *
     * @author Jeroen v.d Gulik
     * @access public
     * @param  array $config An associative array of custom configuration options.
     * @return object
     * @see    CI_Profiler::__construct()
     */
    public function __construct($config = array())
    {
        $this->_available_sections[] = 'session';
        parent::__construct($config);
    }

    /**
     * Compiles the session data and generates the HTML output.
     *
     * @author Jeroen v.d Gulik
     * @access public
     * @return string The HTML containing the session data.
     * @see    CI_Profiler::_compile_session()
     */
    public function _compile_session()
    {
        $output = PHP_EOL . PHP_EOL;
        $output .= '<fieldset style="border:1px solid #009999;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee">';
        $output .= PHP_EOL;
        $output .= '<legend style="color:#009999;">&nbsp;&nbsp;' . 'SESSION DATA' . '&nbsp;&nbsp;</legend>';
        $output .= PHP_EOL;

        if (!property_exists($this->CI, 'session') OR ! is_object($this->CI->session)) {
            $output .= "<div style='color:#009999;font-weight:normal;padding:4px 0 4px 0'>" . 'No SESSION data exists' . "</div>";
        } else {
            $output .= PHP_EOL . PHP_EOL . "<table cellpadding='4' cellspacing='1' border='0' width='100%'>" . PHP_EOL;
            $sess = get_object_vars($this->CI->session);

            foreach ($sess['userdata'] as $key => $val) {
                if (!is_numeric($key)) {
                    $key = "'" . $key . "'";
                }

                $output .= "<tr><td width='50%' style='color:#000;background-color:#ddd;'>&#36;_SESSION[" . $key . "]&nbsp;&nbsp; </td><td width='50%' style='color:#009999;font-weight:normal;background-color:#ddd;'>";

                if (is_array($val)) {
                    $output .= "<pre>" . htmlspecialchars(stripslashes(print_r($val, true))) . "</pre>";
                } else {
                    $output .= htmlspecialchars(stripslashes($val));
                }

                $output .= "</td></tr>" . PHP_EOL;
            }

            $output .= "</table>" . PHP_EOL;
        }

        $output .= "</fieldset>";

        return $output;
    }

}

/* End of file MY_Profiler.php */
/* Location: ./application/libraries/MY_Profiler.php */

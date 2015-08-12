<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MY_Input
 */
class MY_Input extends CI_Input
{

    /**
     * isPost
     * 
     * POSTリクエストであったかどうか？
     * 
     * @return boolean
     */
    public function isPost()
    {
        return strtolower($this->server('REQUEST_METHOD')) === 'post';
    }

}

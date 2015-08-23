<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MY_Input
 */
class MY_Input extends CI_Input
{
    const SERVER_KEY_METHOD = 'REQUEST_METHOD';
    const METHOD_STR_POST = 'POST';
    const METHOD_STR_GET = 'GET';
    const METHOD_STR_PUT = 'PUT';
    const METHOD_STR_DELETE = 'DELETE';
    
    /**
     * method
     * 
     * @return string
     */
    public function method()
    {
        return strtoupper($this->server(self::SERVER_KEY_METHOD));
    }

    /**
     * isPost
     * 
     * POSTリクエストであったかどうか？
     * 
     * @return boolean
     */
    public function isPost()
    {
        return $this->method() === self::METHOD_STR_POST;
    }

    /**
     * isGet
     * 
     * GETリクエストであったかどうか？
     * 
     * @return boolean
     */
    public function isGet()
    {
        return $this->method() === self::METHOD_STR_GET;
    }
    
    /**
     * isPut
     * 
     * PUTリクエストであったかどうか？
     * 
     * @return boolean
     */
    public function isPut()
    {
        return $this->method() === self::METHOD_STR_PUT;
    }
    
    /**
     * isDelete
     * 
     * DELETEリクエストであったかどうか？
     * 
     * @return boolean
     */
    public function isDelete()
    {
        return $this->method() === self::METHOD_STR_DELETE;
    }
}

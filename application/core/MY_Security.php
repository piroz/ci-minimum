<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MY_Security
 */
class MY_Security extends CI_Security
{

    /**
     * Show CSRF Error
     *
     * @return	void
     */
    public function csrf_show_error()
    {
        show_error('前のページに戻って再度投稿してください。', 403, 'フォームの有効期限が切れました。');
    }

}

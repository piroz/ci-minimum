<?php

/**
 * MY_Exceptions
 */
class MY_Exceptions extends CI_Exceptions
{

    /**
     * 404 Page Not Found Handler
     *
     * @access	private
     * @param	string	the page
     * @param 	bool	log error yes/no
     * @return	string
     */
    function show_404($page = '', $log_error = TRUE)
    {
        $heading = 'エラーが発生しました。';
        $message = 'お探しのページは見つかりませんでした。';

        // By default we log this, but allow a dev to skip it
        if ($log_error) {
            log_message('error', '404 Page Not Found --> ' . $page);
        }

        echo $this->show_error($heading, $message, 'error_404', 404);
        exit;
    }

}

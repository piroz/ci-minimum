<?php

/**
 * PrePostAction
 */
Class PrePostAction
{

    /**
     * profiling
     * 
     * 開発環境ならかならずプロファイリングをページ末尾に表示させる
     */
    public function profiling()
    {
        if (ENVIRONMENT === 'development') {
            get_instance()->output->enable_profiler(TRUE);
        }
    }

    /**
     * needLogin
     * 
     * ログイン必須ページでは認証状態をチェックする（preDispatchの前に実行）
     */
    public function needLogin()
    {
        $ci = get_instance();

        if (!isset($ci->needLogin) || $ci->needLogin === false) {
            return;
        }

        // @change-me
    }

    /**
     * predispatch
     * 
     * コントローラに「preDispatch」の名前のメソッドがある場合、それをアクション実行前に実行する
     */
    public function predispatch()
    {
        $ci = get_instance();

        if (method_exists($ci, 'preDispatch')) {
            $ci->preDispatch();
        }
    }

    /**
     * postdispatch
     * 
     * コントローラに「postdispatch」の名前のメソッドがある場合、それをアクション実行後に実行する
     */
    public function postdispatch()
    {
        $ci = get_instance();

        if (method_exists($ci, 'postDispatch')) {
            $ci->postDispatch();
        }
    }

}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

// 開発環境ならかならずプロファイリングをページ末尾に表示させる
$hook['post_controller_constructor'][] =  array(
	'class'     => 'PrePostAction',
	'function'  => 'profiling',
	'filename'  => 'pre_post_action.php',
	'filepath'  => 'hooks',
);
// ログイン必須ページでは認証状態をチェックする（preDispatchの前に実行）
$hook['post_controller_constructor'][] =  array(
	'class'     => 'PrePostAction',
	'function'  => 'needLogin',
	'filename'  => 'pre_post_action.php',
	'filepath'  => 'hooks',
);
// コントローラに「preDispatch」の名前のメソッドがある場合、それをアクション実行前に実行する
$hook['post_controller_constructor'][] =  array(
	'class'     => 'PrePostAction',
	'function'  => 'predispatch',
	'filename'  => 'pre_post_action.php',
	'filepath'  => 'hooks',
);
// コントローラに「postdispatch」の名前のメソッドがある場合、それをアクション実行後に実行する
$hook['post_controller'][] =  array(
	'class'     => 'PrePostAction',
	'function'  => 'postdispatch',
	'filename'  => 'pre_post_action.php',
	'filepath'  => 'hooks',
);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */
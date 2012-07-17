<?php
if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

$mydirname = basename(dirname(dirname(dirname(__FILE__))));
$namepref = '_MI_' . strtoupper($mydirname);

if (!defined($namepref . '_LOADED')) {

// Module Info

define($namepref.'_LOADED', 1);

// The name of this module
define($namepref.'_NAME', 'xugjメニューリフレッシュ');
// A brief description of this module
define($namepref.'_DESC', 'xugj_assign のメニューキャッシュを削除するモジュール');

define($namepref.'_MESSAGE', 'xugj_assign のメニューキャッシュを削除しますか');
define($namepref.'_SUCCESS', 'メニューキャッシュを削除しました');
define($namepref.'_FAILED', '削除できませんでした');

define($namepref.'_MENU', 'リスト');
define($namepref.'_HELP', 'ヘルプ');

}
?>
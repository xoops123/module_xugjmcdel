<?php
if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

$mydirname = basename(dirname(dirname(dirname(__FILE__))));
$namepref = '_MI_' . strtoupper($mydirname);

if (!defined($namepref . '_LOADED')) {

// Module Info

define($namepref.'_LOADED', 1);

// The name of this module
define($namepref.'_NAME', 'xugjMenusCacheDel');
// A brief description of this module
define($namepref.'_DESC', 'This is,You can delete xugj_assign menus cache');

define($namepref.'_MESSAGE', 'Do You delete menu\'s cache for theme used xugj_assing?');

define($namepref.'_MENU', 'List');
define($namepref.'_HELP', 'Help');

}
?>
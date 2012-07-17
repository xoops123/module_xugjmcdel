<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;
$mydirname = basename(dirname(dirname(__FILE__)));
$namepref = '_MI_' . strtoupper($mydirname);

$adminmenu[1]['title'] = constant($namepref.'_MENU');
$adminmenu[1]['link'] = "admin/index.php";
$adminmenu[2]['title'] = constant($namepref.'_HELP');
$adminmenu[2]['link'] = "language/ja_utf8/help/help.html";
?>
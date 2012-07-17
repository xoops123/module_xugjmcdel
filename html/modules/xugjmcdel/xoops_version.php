<?php
// $Id: xoops_version.php ver0.03a 2011/01/31  19:30:00 domifara Exp $
if (!defined('XOOPS_ROOT_PATH')) exit();

$mydirname = basename( dirname( __FILE__ ) ) ;
$namepref = '_MI_' . strtoupper($mydirname);

//
// Define a basic manifesto.
//
$modversion['name'] = constant($namepref.'_NAME');
$modversion['description'] = constant($namepref.'_DESC');
$modversion['dirname'] = $mydirname;

$modversion['version'] = 0.05; //0.03b

$modversion['cube_style'] = 1;

$modversion['license'] = 'GPL see LICENSE';
$modversion['image']    = 'slogo.png';
$modversion['credits'] = 'domifara';
$modversion['author'] = 'domifara';
$modversion['help'] = null; // -> altsys menu "help"

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/admin_menu.php';

// Menu
$modversion['hasMain'] = 0;

//templates
$modversion['templates'][0]['file'] = 'xugjmcdel_list.html';
$modversion['templates'][0]['description'] = '';
$modversion['templates'][1]['file'] = 'xugjmcdel_confirm.html';
$modversion['templates'][1]['description'] = '';

$modversion['hasSearch'] = 0;

$modversion['hasNotification'] = 0;
?>
<?php
require_once '../../../mainfile.php';

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

$mydirpath = dirname(dirname(__FILE__));

require $mydirpath.'/class/xugjmcdel.class.php';

$root =& XCube_Root::getSingleton();
$root->mController->executeHeader();

$xugjmcdel = new xugjmcdel(true);
$root->mController->mExecute->add(array(&$xugjmcdel, 'execute'));
$root->mController->execute();

$xoopsLogger=&$root->mController->getLogger();
$xoopsLogger->stopTime();
$root->mController->executeView();
?>
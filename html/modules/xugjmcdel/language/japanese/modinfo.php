<?php
if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

$mydirname = basename(dirname(dirname(dirname(__FILE__))));
$namepref = '_MI_' . strtoupper($mydirname);

if (!defined($namepref . '_LOADED')) {

// Module Info

define($namepref.'_LOADED', 1);

// The name of this module
define($namepref.'_NAME', 'xugj_assign����å����ե�å���');
// A brief description of this module
define($namepref.'_DESC', 'xugj_assign �Υ�˥塼����å����������⥸�塼��');

define($namepref.'_MESSAGE', 'xugj_assign �Υ�˥塼����å���������ޤ���');
define($namepref.'_SUCCESS', '��˥塼����å���������ޤ���');
define($namepref.'_FAILED', '����Ǥ��ޤ���Ǥ���');

define($namepref.'_MENU', '�ꥹ��');
define($namepref.'_HELP', '�إ��');

}
?>
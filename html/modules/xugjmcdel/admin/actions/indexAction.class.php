<?php
// $Id: indexAction.class.php ver0.03a 2011/01/31  19:25:00 domifara Exp $
if (!defined('XOOPS_ROOT_PATH')) exit();
class indexAction extends Xugjmcdel_Abstract
{
  var $listdata;
  var $mPagenavi = null;

  function indexAction()
  {
    $root =& XCube_Root::getSingleton();
    if ( !$root->mContext->mUser->isInRole('Module.xugjmcdel.Admin') ) {
      $root->mController->executeForward(XOOPS_URL.'/');
    }

    $modHand = xoops_getmodulehandler('data');

//    $modObj =& $modHand->getObjects(null,true);
    $modObj =& $modHand->getObjects();
    foreach ($modObj as $key => $val) {
      foreach ($val->gets() as $var_name => $void) {
        $item_ary[$var_name] = $val->getShow($var_name);
      }

      $this->listdata[] =& $item_ary;
      unset($item_ary);
    }
  }

  function executeView(&$render)
  {
    $mydirname = basename(dirname(dirname(dirname(__FILE__))));

  	$render->setTemplateName(XOOPS_MODULE_PATH.'/'.$mydirname.'/templates/xugjmcdel_list.html');

    $render->setAttribute('ActionForm', $this->mActionForm);
    $render->setAttribute('ListData', $this->listdata);

  }
}
?>
<?php
if (!defined('XOOPS_ROOT_PATH')) exit();
class deleteAction extends Xugjmcdel_Abstract
{
  var $deletedata = false;
  var $post = false;

  function deleteAction()
  {
    $mydirname = basename(dirname(dirname(dirname(__FILE__))));
    $namepref = '_MI_' . strtoupper($mydirname);

  	$root =& XCube_Root::getSingleton();
    if ( !$root->mContext->mUser->isInRole('Module.xugjmcdel.Admin') ) {
      $root->mController->executeForward(XOOPS_URL);
    }
    $id = intval($root->mContext->mRequest->getRequest('id'));
    if ( $id < 1 ) {
      $this->isError = true;
      $this->errMsg = 'ERROR No ID='.$id.'  '.constant($namepref.'_FAILED');
      return;
    }

    $modHand =& xoops_getmodulehandler('data');
    $dObj =& $modHand->get($id);
    if ( $root->mContext->mRequest->getRequest('submitdelete')=='' ) {
      foreach ($dObj->gets() as $var_name => $void) {
        $this->deletedata[$var_name] = $dObj->getShow($var_name);
      }
    } else {
      $this->post = true;
      if ( !$modHand->delete($dObj) ) {
        $this->isError = true;
        $this->errMsg = constant($namepref.'_FAILED');
      }
    }
  }

  function executeView(&$render)
  {
    $mydirname = basename(dirname(dirname(dirname(__FILE__))));
    $namepref = '_MI_' . strtoupper($mydirname);

    if ( $this->post ) {
      $root =& XCube_Root::getSingleton();
      $root->mController->executeRedirect(XOOPS_MODULE_URL.'/'.$mydirname.'/admin/index.php?action=index', 2, constant($namepref.'_SUCCESS') );
    } else {
      $render->setTemplateName(XOOPS_MODULE_PATH.'/'.$mydirname.'/templates/xugjmcdel_confirm.html');
      $render->setAttribute('deletedata', $this->deletedata);
    }
  }
}
?>
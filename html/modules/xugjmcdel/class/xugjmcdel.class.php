<?php
if (!defined('XOOPS_ROOT_PATH')) exit();

$mydirpath = dirname(dirname(__FILE__));

require $mydirpath.'/class/AbstractAction.class.php';
require $mydirpath.'/forms/xugjmcdelForm.class.php';

class xugjmcdel
{
  var $act;

  function xugjmcdel($adm = false)
  {
    $this->mAdmin = $adm;
    $root =& XCube_Root::getSingleton();
    $this->act = $root->mContext->mRequest->getRequest('action');
    if ( $this->act == "" ) {
      $this->act = 'index';
    }
    if (!preg_match("/^\w+$/", $this->act)) {
      exit('bad action name');
    }
  }

  function execute($controller)
  {
    $mydirpath = dirname(dirname(__FILE__));

    $className = $this->act.'Action';
  	if ( $this->mAdmin ) {
      $fileName = $mydirpath.'/admin/actions/'.$className.'.class.php';
    } else {
      //$fileName = _MY_MODULE_PATH.'actions/'.$className.'.class.php';
     exit('not admin');
	}
    if (!file_exists($fileName)) {
      exit('file not found');
    }
    require $fileName;

    $Action = new $className($controller);
    $Action->execute();

    if ( $Action->getisError() ) {
      $controller->executeRedirect(XOOPS_URL.'/', 2, $Action->geterrMsg());
    } else {
      $Action->executeView($controller->mRoot->mContext->mModule->getRenderTarget());
    }
  }
}
?>
<?php
if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

class Xugjmcdel_Module extends Legacy_ModuleAdapter
  {
    function __construct(&$xoopsModule)
    {
      parent::Legacy_ModuleAdapter($xoopsModule);
    }

    function hasAdminIndex()
    {
      return true;
    }

    function getAdminIndex()
    {
    	return XOOPS_MODULE_URL.'/'.$this->mXoopsModule->get('dirname').'/admin/index.php';
    }

    function getAdminMenu()
    {
        if ( !$this->_mAdminMenuLoadedFlag) {
        $this->mAdminMenu[] = array(
          'link' => XOOPS_MODULE_URL.'/'.$this->mXoopsModule->get('dirname').'/admin/index.php',
          'title' => 'LIST',
          'keywords' => 'Main xugj_assign cache delete',
          'show' => true
        );
        $this->mAdminMenu[] = array(
          'link' => XOOPS_MODULE_URL.'/'.$this->mXoopsModule->get('dirname').'/language/'.$GLOBALS['xoopsConfig']['language'].'/help/help.html',
          'title' => 'HELP',
          'keywords' => 'Help',
          'show' => true
        );
        $this->_mAdminMenuLoadedFlag = true;
        }
        return $this->mAdminMenu;
    }

    function isEnableCache()
    {
      return false;
    }
}
?>
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
    $mydirname = basename(dirname(dirname(__FILE__)));
    $namepref = '_MI_' . strtoupper($mydirname);
    if ( file_exists(XOOPS_MODULE_PATH.'/'.$mydirname.'/language/'.$GLOBALS['xoopsConfig']['language'].'/modinfo.php') ) {
     include_once XOOPS_MODULE_PATH.'/'.$mydirname.'/language/'.$GLOBALS['xoopsConfig']['language'].'/modinfo.php';
    }else{
     include_once XOOPS_MODULE_PATH.'/'.$mydirname.'/language/english/modinfo.php';
    }
    
        if ( !$this->_mAdminMenuLoadedFlag) {
        $this->mAdminMenu[] = array(
          'link' => XOOPS_MODULE_URL.'/'.$this->mXoopsModule->get('dirname').'/admin/index.php',
          'title' => constant($namepref.'_MENU'),
          'keywords' => 'Main xugj_assign cache delete',
          'show' => true
        );
        $this->mAdminMenu[] = array(
          'link' => XOOPS_MODULE_URL.'/'.$this->mXoopsModule->get('dirname').'/language/'.$GLOBALS['xoopsConfig']['language'].'/help/help.html',
          'title' => constant($namepref.'_HELP'),
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
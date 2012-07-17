<?php
if (!defined('XOOPS_ROOT_PATH')) exit();
require_once XOOPS_ROOT_PATH.'/core/XCube_ActionForm.class.php';
require_once XOOPS_MODULE_PATH.'/legacy/class/Legacy_Validator.class.php';

class Xugjmcdel_Form extends XCube_ActionForm
{
  function Xugjmcdel_Form()
  {
    parent::XCube_ActionForm();
  }

  function getTokenName()
  {
    return "module.xugjmcdel.Xugjmcdel.TOKEN";
  }

  function prepare()
  {
    //ActionForm Propertie
    $this->mFormProperties['title'] = new XCube_StringProperty('title');
    $this->mFormProperties['date'] = new XCube_StringProperty('date');
    $this->mFormProperties['pass'] = new XCube_StringProperty('pass');
    //no check
    $this->mFieldProperties['pass'] = new XCube_FieldProperty($this);
  }

  function setres(&$obj)
  {
  }

  function load()
  {
  }

  function update(&$obj)
  {
    $root =& XCube_Root::getSingleton();
    $pass = $this->get('pass');
    if ( $pass != "" ) {
      $pass = sha1($pass.XOOPS_SALT);
    }
    $obj->set('title', $this->get('title'));
    $obj->set('date', $this->get('date'));
    $obj->set('pass', $pass);
  }
}
?>
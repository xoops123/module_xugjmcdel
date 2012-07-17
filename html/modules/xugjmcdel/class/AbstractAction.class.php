<?php
if (!defined('XOOPS_ROOT_PATH')) exit();

class Xugjmcdel_Abstract
{
  var $isError = false;
  var $errMsg = "";
  var $mActionForm;
  var $mAdmin = false;

  function Xugjmcdel_Abstract()
  {
  }

  function getisError()
  {
    return $this->isError;
  }

  function geterrMsg()
  {
    return $this->errMsg;
  }

  function execute()
  {
  }

  function executeView(&$render)
  {
  }
}
?>
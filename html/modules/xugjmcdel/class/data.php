<?php
// $Id: data.php ver0.03a 2011/01/31  19:25:00 domifara Exp $
if (!defined('XOOPS_ROOT_PATH')) exit();

class XugjmcdelDataObject extends XoopsSimpleObject
{
	function XugjmcdelDataObject()
	{
		$this->initVar('id', XOBJ_DTYPE_INT, '0', true);
		$this->initVar('title', XOBJ_DTYPE_STRING, '', true, 250);
		$this->initVar('date', XOBJ_DTYPE_INT, '0', true);
		$this->initVar('pass', XOBJ_DTYPE_STRING, '', false);
	}

}

class XugjmcdelDataHandler extends XoopsObjectHandler
{
	var $mTable = 'xugjmcdel_data';
	var $mPrimary = 'id';
	//XoopsSimpleObject
	var $mClass = 'XugjmcdelDataObject';

	var $_check_list ;
	var $target_list = array();

	function XugjmcdelDataHandler(&$db) {
		parent::XoopsObjectHandler($db);
		$check_list = array(
			"xoops_root_cache" => XOOPS_ROOT_PATH.'/cache' ,
			"xoops_trust_cache" => XOOPS_TRUST_PATH.'/cache'
			);
		if (XOOPS_ROOT_PATH.'/cache' != XOOPS_CACHE_PATH ){
			if (XOOPS_TRUST_PATH.'/cache' != XOOPS_CACHE_PATH ){
				$check_list =array_merge($check_list , array("xoops_cache" => XOOPS_CACHE_PATH ));
			}
		}
		$this->_check_list = $check_list;

		$target_list_array=array();
		foreach($this->_check_list as $dir => $_check_path){
			if (!is_dir($_check_path)){ continue;}
			if  ( !($dir = @opendir( $_check_path ) ) ){ continue;}
			if( $d = opendir(  $_check_path ) ){
				$count = 0;
				while( $file = readdir($d) ){
						if( ! (substr($file,0,6) == 'theme_') )continue;
						$count = $count + 1;
						$mtime = filemtime($_check_path.'/'.$file);
						$target_list_array[$count] = array(
										'id' => $count,
										'title' => $_check_path.'/'.$file,
										'date' => $mtime ,
								'pass' => ''
								);

				}
				closedir($d);
			}
		}

		if ( ! empty($target_list_array) ){
			foreach($target_list_array as $key => $row){
				$title[$key] = $row['title'];
			}
			array_multisort($title,SORT_ASC,$target_list_array);


			foreach($target_list_array as $key => $row){
				$this->target_list[$row['id']] = $row;
			}
		}
	}

	function &getObjects($criteria = null, $id_as_key = false)
	{
		$ret = array();

		if ( is_array($this->target_list)) {
			foreach($this->target_list as $myrow){
				$ccmodule = new $this->mClass();
				$ccmodule->assignVars($myrow);
				if ($id_as_key) {
					$id = $ccmodule->getVar('id');
					$ret[$id] = $ccmodule;
				}else{
					$ret[] = $ccmodule;
				}
				unset($ccmodule);
			}
		}
		return $ret;
	}


		function &get($id = null){
/*
echo '<pre>';
print "id=".$id;
print_r($this->target_list);
echo '</pre>';
*/
			//$myrow = $this->target_list[$id];
			$myrow =false;
			foreach($this->target_list as $key => $row){
				if($row['id'] == $id ){
					$myrow = $row;
					break;
				}
			}
			if ($myrow ==false) {die('ID=' . $id . ' ERROR');}
			$ccmodule = new $this->mClass();
			$ccmodule->assignVars($myrow);
			$ret =& $ccmodule;
			return $ret;
		}

		function getCount($criteria = null){
			$ret=0;
			if (is_array($this->target_list)) {
				 $ret = count(array_keys($this->target_list));
			}
			return $ret;
		}


		function delete(&$obj, $force = false)
		{
//echo '<pre>';
//print_r($obj->getVar('title'));
//echo '</pre>';
//exit;
			$filepath= $obj->getVar('title');
			$ret = unlink($filepath);
			if ( $force ) {
					$ret = true;
			}
			return $ret ;
		}

		function deleteall($force = false){
			$ret ;
			foreach ($this->target_list as $key => $val) {
//echo '<pre>';
//print_r($val);
//echo '</pre>';
//exit;
			$filepath= $val['title'];
			$ret = unlink($filepath);
			}
			if ( $force ) {
					$ret = true;
			}
			return $ret ;
		}

}
?>
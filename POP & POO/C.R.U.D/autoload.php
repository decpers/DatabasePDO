<?php
	/*
	 * Remember: files name and classes name must to be same.
	 */

	function autoload($class){
		require_once($class.".php");
	}
	spl_autoload_register("autoload");
	
?>
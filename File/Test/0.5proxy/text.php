<?php
	/**
	 * Created by proxy.
	 * User: android
	 * Date: 2015/8/31
	 * Time: 15:15
	 */


	/**
	 * Class center  如果直接操作核心系统很容易崩溃.. 让核心 与服务分离
	 */

	class center{
		function kernel (){
			echo "<br>都是一些核心操作<br>";
		}
	}

	class proxy{

		public $center;
		function __construct() {
		  $this->center = new center();
		}

		function dosomething(){
			echo "写日志";
			$this->center->kernel();
		}
	}

	$proxy = new proxy();
	$proxy->dosomething();




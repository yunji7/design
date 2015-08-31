<?php
	/**
	 * Created by my.
	 * User: android
	 * Date: 2015/8/12
	 * Time: 10:06
	 */


	/**
	 * Class pen  proxy  模式   // 对修改关闭对扩展开放..
	 *  function 默认是public 模式
	 */

	/**
	 * Class pen 一支笔有写的功能
	 */
	class pen{
		function write(){
			echo "写<br>";
		}
	}

	/**
	 * Class proxy  代理模式
	 */
	class proxy{
		public $proxy;

		function __construct() {
 			$this->proxy = new pen();
		}

		function write(){
			$this->before();
			$this->proxy->write();
			$this->after();

		}
		function before(){
			echo "之前<br>";
		}
		function after(){
			echo "之后<br>";
		}

	}


	$proxy = new proxy();

	$proxy->write();


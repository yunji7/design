<?php
	/**
	 * Created by my.
	 * User: android
	 * Date: 2015/8/12
	 * Time: 10:06
	 */


	/**
	 * Class pen  proxy  ģʽ   // ���޸Ĺرն���չ����..
	 *  function Ĭ����public ģʽ
	 */

	/**
	 * Class pen һ֧����д�Ĺ���
	 */
	class pen{
		function write(){
			echo "д<br>";
		}
	}

	/**
	 * Class proxy  ����ģʽ
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
			echo "֮ǰ<br>";
		}
		function after(){
			echo "֮��<br>";
		}

	}


	$proxy = new proxy();

	$proxy->write();


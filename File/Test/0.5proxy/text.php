<?php
	/**
	 * Created by proxy.
	 * User: android
	 * Date: 2015/8/31
	 * Time: 15:15
	 */


	/**
	 * Class center  ���ֱ�Ӳ�������ϵͳ�����ױ���.. �ú��� ��������
	 */

	class center{
		function kernel (){
			echo "<br>����һЩ���Ĳ���<br>";
		}
	}

	class proxy{

		public $center;
		function __construct() {
		  $this->center = new center();
		}

		function dosomething(){
			echo "д��־";
			$this->center->kernel();
		}
	}

	$proxy = new proxy();
	$proxy->dosomething();




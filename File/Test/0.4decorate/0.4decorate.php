<?php
	/**
	 * Created by decorate.
	 * User: android
	 * Date: 2015/8/11
	 * Time: 16:40
	 */


	/**
	 *  װ����ģʽ ..Ϊ���е��෽����ӹ��� ����ȥ��Դ����
	 */

	interface clothes{
		public function clothes();
	}
 	class person implements clothes{

		public function clothes(){

			echo "������ɫ���·�<br>";

		}
	}

	class decorate implements clothes{
		public $decorate;
		function __construct(clothes $clothes) {
			 $this->decorate = $clothes;
		}

		public function clothes() {
			echo "֮ǰ<br>";
		    $this->decorate->clothes();
			echo "֮���Ϻ�ɫ���·�<br>";

		}


	}


	$A = new person();
	$B = new decorate($A);
	$B->clothes();
<?php
	/**
	 * Created by decorate.
	 * User: android
	 * Date: 2015/8/11
	 * Time: 16:40
	 */


	/**
	 *  装饰者模式 ..为已有的类方法添加功能 而不去动源代码
	 */

	interface clothes{
		public function clothes();
	}
 	class person implements clothes{

		public function clothes(){

			echo "穿上绿色的衣服<br>";

		}
	}

	class decorate implements clothes{
		public $decorate;
		function __construct(clothes $clothes) {
			 $this->decorate = $clothes;
		}

		public function clothes() {
			echo "之前<br>";
		    $this->decorate->clothes();
			echo "之后穿上红色的衣服<br>";

		}


	}


	$A = new person();
	$B = new decorate($A);
	$B->clothes();
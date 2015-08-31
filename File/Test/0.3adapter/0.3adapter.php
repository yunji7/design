<?php
	/**
	 * Created by adapter.
	 * User: android
	 * Date: 2015/8/11
	 * Time: 14:58
	 */


	namespace adapter;
	use adapter;
	/**
	 *  适配器模式   拿到别的类已经实现的方法  就如同名字一样. 适配器.什么叫适配器.转为我们需要的东西
	 */

	/**
	 *  类的适配器模式
	 */
	class mp3 {
		public function music() {
			echo "music <br>";
		}
	}

	interface IF_phone {
		public function music();

		public function call();
	}

	class phone extends mp3 implements IF_phone {
		public function call() {
			echo "打电话";
		}
	}

	$phone = new phone();

	$phone->music();
	$phone->call();

	/**
	 *  对象的适配器
	 */
	class phoneObject implements IF_phone {
		public $music;

		function __construct() {
			$this->music = new mp3();
		}

		public function music() {
			$this->music->music();
		}

		public function call() {
			echo "call";
		}

	}

	echo "<br>";

	$phoneObject = new phoneObject();

	$phoneObject->music();
	$phoneObject->call();


	/**
	 *  接口的适配 ... 有的时候 我们不需要实现所有的接口..(胖接口)
	 */
	interface IF_allMore {
		public function on();

		public function off();

	}

	abstract class person implements IF_allMore {
		public function on() {

		}

		public function off() {

		}
	}

	class personA extends person {
		public function on() {
			echo "<br><br>A哥只会开灯<br>";
		}
	}
	class personB extends person{
		public function off(){
			echo "<br>B哥只会关灯<br>";
		}
	}

	class client{
		function __construct(IF_allMore $A) {
			 $A->on();
			$A->off();
		}
	}

	$A = new personA();
	$B = new personB();
	new client($A);
	new client($B);





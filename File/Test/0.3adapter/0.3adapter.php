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
	 *  ������ģʽ   �õ�������Ѿ�ʵ�ֵķ���  ����ͬ����һ��. ������.ʲô��������.תΪ������Ҫ�Ķ���
	 */

	/**
	 *  ���������ģʽ
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
			echo "��绰";
		}
	}

	$phone = new phone();

	$phone->music();
	$phone->call();

	/**
	 *  �����������
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
	 *  �ӿڵ����� ... �е�ʱ�� ���ǲ���Ҫʵ�����еĽӿ�..(�ֽӿ�)
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
			echo "<br><br>A��ֻ�Ὺ��<br>";
		}
	}
	class personB extends person{
		public function off(){
			echo "<br>B��ֻ��ص�<br>";
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





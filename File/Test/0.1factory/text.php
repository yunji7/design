<?php
	/**
	 * Created by factory.
	 * User: android
	 * Date: 2015/8/29
	 * Time: 15:08
	 */

	/**
	 *  ����ģʽ ��ͨ����
	 */
	class phoneA {
		public $value;
	}

	class phoneB {
		public $value;
	}


	class factory {
		static function  getPhoneA() {
			return new phoneA();
		}
		static function  getPhoneB() {
			return new phoneB();
		}
	}

	/**
	 * Υ���տ�ԭ��.
	 */
	$phone = factory::getPhoneA();

	$phone->value = 5;

	var_dump($phone);


	/**
	 *  ���󹤳�  . .�տ�ԭ��
	 */
	class my_phone {
		public $value;
	}

	abstract class AB_getClass {
		abstract function getClass();
	}

	class phonefactory extends AB_getClass {
		function getClass() {
			return new my_phone();
		}
	}

	$phoneFactory = new phonefactory();


	$my_phone = $phoneFactory->getClass();

	$my_phone->value = 500;
	var_dump($my_phone);







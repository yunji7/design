<?php

	/**
	 * Created by factory.
	 * User: android
	 * Date: 2015/8/10
	 * Time: 16:24
	 */

	namespace factoryAA;
	use factoryAA;

	/**
	 *  ���󹤳� �͹�������  ��������һ����Ʒ���ϵ���Ʒ.  ���󹤳�������ͬ��Ʒ����
	 */

	/**
	 *  Ϊʲô����Ҫʹ�ù���������
	 *  ��һ �����γ�һ����׼.���Ŷ�.���õ�ȥ��Ӧ
	 *  �ڶ� ���������.һ���������Ϊ�������Ķ�����. �ܸ�����С�Ĵ���
	 */

	/**
	 * ��������
	 */
	class keyboard {
		// ����
		public $material;

		//���̸���
		public $number;
	}

	class mouse {
		//���
		public $show;
		// ��ɫ
		public $color;
	}

	class factory {
		public static function  keyboard() {
			return new keyboard();
		}

		public static function mouse() {
			return new mouse();
		}
	}

	/**
	 * Class client ����
	 */
	class client {
		function __construct() {
			$keyboard = factory::keyboard();
			$mouse = factory::mouse();
		}
	}

	/**
	 *  �������ÿ���һ�������Ҫȥ��factory ��Դ����.������Υ���տ�ԭ��   �Ǿ���Ҫ����ʹ�ó��󹤳�
	 */

	/**
	 * Class pen  �ֱ�
	 */
	class pen {
		public $color;
		public $size;
	}

	/**
	 * Class pencil Ǧ��
	 */
	class pencil {
		public $color;
		public $size;
	}

	interface getClass {
		public   function getClass();
	}

	class factoryPen implements getClass {

		public   function getClass() {
			return new pen();
		}
	}

	class factoryPencil implements getClass {

		public   function getClass() {
			return new pencil();
		}

	}

	class  clientA{

		function __construct() {
			$factory = new factoryPen();
			$pen = $factory->getClass();
			$factory = new factoryPencil();
			$pencil = $factory->getClass();
		}

	}


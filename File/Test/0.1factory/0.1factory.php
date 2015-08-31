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
	 *  抽象工厂 和工厂方法  工厂方法一条产品线上的物品.  抽象工厂创建不同物品的类
	 */

	/**
	 *  为什么我们要使用工厂方法呢
	 *  第一 我们形成一个标准.让团队.更好的去适应
	 *  第二 当程序大了.一个类如果因为别的情况改动类名. 能付出很小的代价
	 */

	/**
	 * 工厂方法
	 */
	class keyboard {
		// 材料
		public $material;

		//键盘个数
		public $number;
	}

	class mouse {
		//外观
		public $show;
		// 颜色
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
	 * Class client 场景
	 */
	class client {
		function __construct() {
			$keyboard = factory::keyboard();
			$mouse = factory::mouse();
		}
	}

	/**
	 *  如果我们每添加一个类就需要去改factory 的源代码.这样是违背闭开原则   那就需要我们使用抽象工厂
	 */

	/**
	 * Class pen  钢笔
	 */
	class pen {
		public $color;
		public $size;
	}

	/**
	 * Class pencil 铅笔
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


<?php
	/**
	 * Created by flyweight.
	 * User: android
	 * Date: 2015/8/12
	 * Time: 15:29
	 */

	/**
	 *  享元模式 对象粒度粗细 主要是实现对象共享 杯子一样我喝完了.我还可以继续盛水,复用
	 */
	class person {
		public $name;
		public $mouse;


	}

	class mouse {
		public $name;

		/**
		 * @inheritDoc
		 */
		function __construct($name) {
			$this->name = $name;
		}

	}

	class factory {
		public $mouse;

		function getmouse($name) {
			//如果存在
			if (isset($this->mouse[$name])) {
				return $this->mouse[$name];
			} else {
				//如果不存在
				$this->mouse[$name] = new mouse($name);
				return $this->mouse[$name];
			}
		}
	}


	$factory = new factory();


	$perA = new person();
	$perA->mouse = $factory->getmouse("one");;
	$perB = new person();
	$perB->mouse = $factory->getmouse("two");;
	$perC = new person();
	$perC->mouse = $factory->getmouse("one");;


	var_dump($factory);


	var_dump($perA);
	var_dump($perB);
	var_dump($perC);

	echo "<br><br><br><br>";

	var_dump($perA);
	var_dump($perB);
	var_dump($perC);


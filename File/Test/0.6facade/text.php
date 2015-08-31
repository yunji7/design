<?php
	/**
	 * Created by facade.
	 * User: android
	 * Date: 2015/8/31
	 * Time: 18:36
	 */


	/**
	 * 外观模式
	 */
	class  engine {
		function start() {
			echo "<br>风扇引擎转动<br>";
		}


		function close (){
			echo "<br>风扇引擎关闭<br>";
		}
	}

	class leaf {
		function fun() {
			echo "<br>枫叶转动<br>";
		}

		function off() {
			echo "<br>枫叶停下<br>";
		}
	}

	class switchFan {
		function game() {
			echo "<br>开关打开<br>";
		}

		function gameover() {
			echo "<br>开关关闭<br>";
		}
	}

	class facade {
		private $engine;
		private $leaf;
		private $switchFan;

		function __construct() {
			$this->engine = new engine();
			$this->leaf = new leaf();
			$this->switchFan = new switchFan();
		}

		function start() {
			$this->switchFan->game();
			$this->engine->start();
			$this->leaf->fun();
		}

		function close() {
			$this->switchFan->gameover();
			$this->engine->close();
			$this->leaf->off();

		}

	}
	$facade =  new facade();
	$facade->start();
	$facade->close();





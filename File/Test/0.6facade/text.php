<?php
	/**
	 * Created by facade.
	 * User: android
	 * Date: 2015/8/31
	 * Time: 18:36
	 */


	/**
	 * ���ģʽ
	 */
	class  engine {
		function start() {
			echo "<br>��������ת��<br>";
		}


		function close (){
			echo "<br>��������ر�<br>";
		}
	}

	class leaf {
		function fun() {
			echo "<br>��Ҷת��<br>";
		}

		function off() {
			echo "<br>��Ҷͣ��<br>";
		}
	}

	class switchFan {
		function game() {
			echo "<br>���ش�<br>";
		}

		function gameover() {
			echo "<br>���عر�<br>";
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





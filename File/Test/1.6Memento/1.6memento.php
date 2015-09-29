<?php

	/**
	 * Created by memento.
	 * User: pc
	 * Date: 2015/8/26
	 * Time: 18:12
	 */
	class my {

		public $X;

		function __construct($X) {
			$this->X = $X;
		}

		function createMemento(){
			return new memento($this->X);
		}

		function setmemento(memento $memento){
			$this->X = $memento->value;
		}
	}

	class memento{
		public $value;
		function __construct($value) {
			$this->value = $value;
		}

		function getValue(){
			return $this->value;
		}
	}

	$my = new my("5");
	$safe = $my->createMemento();


	$my->X = "6";
	var_dump($my);
	$my->setmemento($safe);
	var_dump($my);

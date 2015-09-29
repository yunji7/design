<?php
/**
 * Created by responsibility.
 * User: pc
 * Date: 2015/8/26
 * Time: 17:25
 */

  /**
   *  责任链模式
   */

	interface operator{
		function operator();
	}

	abstract class Handler{
		private $handler;
		function sethandler($h){
			$this->handler = $h;
		}
		function gethandler(){
			return $this->handler;
		}
	}

	class ob extends Handler implements operator{

	   public 	$name;

		function __construct($name) {
			$this->name = $name;
			// TODO: Implement __construct() method.
		}


		function operator() {
			echo $this->name;
			if($this->gethandler()!== null){
				$this->gethandler()->operator();
			}
		}
	}

	$A = new ob("A");
	$B = new ob("B");
	$C = new ob("C");

	$A->sethandler($B);
	$B->sethandler($C);



	$A->operator();
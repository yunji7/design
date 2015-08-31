<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2015/8/27
 * Time: 10:33
 */


	abstract class colleague{
		protected $value;

		abstract function setvalue($value, mediator $mediator);


		function  set_Value($value){
			$this->value = $value;
		}
		function getvalue(){
			return $this->value;
		}
	}

	class collA extends colleague{

		function setvalue($value, mediator $mediator) {
		    $this->value = $value;
			$mediator->setA();
		}
	}

	class collB extends colleague{

		function setvalue($value, mediator $mediator) {
			$this->value = $value;
			$mediator->setA();
		}
	}


	abstract class mediator{
		protected $colleagueA;
		protected $colleagueB;

		function __construct(colleague $A ,colleague $B) {
			$this->colleagueA = $A;
			$this->colleagueB = $B;
		}

		function setA(){
			$int = $this->colleagueA->getvalue();
			$this->colleagueB->set_Value($int * 500);
		}

		function setB(){
			$int = $this->colleagueB->getvalue();
			$this->colleagueA->set_Value($int / 500);
		}
	}

	class mediator_center extends mediator{

	}


	$A = new collA();
	$B = new collB();

	$mediator = new mediator_center($A, $B);

	$A->setvalue(5,$mediator);

	var_dump($A);
	var_dump($B);
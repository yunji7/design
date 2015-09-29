<?php
	/**
	 * Created by visitor.
	 * User: pc
	 * Date: 2015/8/27
	 * Time: 9:47
	 */

 	class A{
		public $yes;
		function  method(){
			echo "A";
		}

		function method1(B $b){
			$b->showA($this);
		}
	}

	class B{
		function showA(A $a){
			$a->method();
			echo $a->yes =5 ;
		}
	}

	$A = new A();
	$B = new B();

	$A->method();
	$A->method1($B);
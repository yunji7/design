<?php
	/**
	 * Created by interpreter;
	 * User: android
	 * Date: 2015/8/29
	 * Time: 12:59
	 */


 	/**
	 *  ½âÊÍÆ÷Ä£Ê½
	 */



	class context{
		public $sum;
	}

	abstract class calc{
		abstract function inter(context $context);
	}

	class sum extends calc{
		function inter(context $context) {
		 	$context->sum ++;
		}
	}

	class minus extends calc{
		function inter(context $context) {
			$context->sum --;
		}
	}

	for ($i = 0; $i < 5; $i++) {
		$A[] = new sum();
	}

	for ($i = 0; $i < 5; $i++) {
		$A[] = NEW minus();
	}

	$context = new context();
	$context->sum = 5;



	for ($i = 0; $i < count($A); $i++) {
		$A[$i]->inter($context);
		echo $context->sum."<br>";
	}


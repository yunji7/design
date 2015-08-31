<?php
	/**
	 * Created by adapter.
	 * User: android
	 * Date: 2015/8/30
	 * Time: 21:01
	 */


/**
 *  适配器模式  结构模式
 */

/**
 *  第一种接口适配器
 */

	/**
	 * Class display 显示器  适配器. ..别人已经实现的了功能我就不用在去实现了..
	 */
 class display{
	 function show(){
		 echo "显示<br>";
	 }
 }

	interface IF_display{
		function  show();
		function  on();
		function off();
	}


	//电视
	class television extends display implements IF_display{
		function  on() {
		  echo "开<br>";
		}

		function off() {
			echo "关闭<br>";
		}
	}

	$display = new television();
	$display->show();
	$display->on();
	$display->off();


	echo "
	<br>********************************<br>
	";

	/*
	 *  第二种就是持有引用
	 */

   class television_B implements IF_display{

	   public $display;
	   function __construct(display $display) {
		   $this->display = $display;
	   }

	   function  show() {
		    $this->display->show();
	   }

	   function  on() {
		   echo "开";
	   }

	   function off() {
		    echo "关闭";
	   }
   }

	$displayTele = new display();
	$display = new television_B($displayTele);

	$display->on();
	$display->show();
	$display->on();


	echo "
	<br>********************************<br>
	";


	/**
	 * 第三种适配器 模式   我们会遇到我们不想实现的接口
	 */

  abstract class ABS_television  extends display implements IF_display {

	  function  on() {

	  }

	  function off() {
		  // TODO: Implement off() method.
	  }

  }
	class No_OFF_televisionA extends ABS_television{
		function on(){
			echo "<br>No_OFF_televisionA<br>";
		}
	}
	class No_OFF_televisionB extends ABS_television{
		function on(){
			echo "<br>No_OFF_televisionB<br>";
		}
	}


	$ABS_televisionA = new No_OFF_televisionA();
	$ABS_televisionB = new No_OFF_televisionB();

	$ABS_televisionA->on();
	$ABS_televisionB->on();






























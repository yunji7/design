<?php
	/**
	 * Created by adapter.
	 * User: android
	 * Date: 2015/8/30
	 * Time: 21:01
	 */


/**
 *  ������ģʽ  �ṹģʽ
 */

/**
 *  ��һ�ֽӿ�������
 */

	/**
	 * Class display ��ʾ��  ������. ..�����Ѿ�ʵ�ֵ��˹����ҾͲ�����ȥʵ����..
	 */
 class display{
	 function show(){
		 echo "��ʾ<br>";
	 }
 }

	interface IF_display{
		function  show();
		function  on();
		function off();
	}


	//����
	class television extends display implements IF_display{
		function  on() {
		  echo "��<br>";
		}

		function off() {
			echo "�ر�<br>";
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
	 *  �ڶ��־��ǳ�������
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
		   echo "��";
	   }

	   function off() {
		    echo "�ر�";
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
	 * ������������ ģʽ   ���ǻ��������ǲ���ʵ�ֵĽӿ�
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






























<?php
	/**
	 * Created by my.
	 * User: android
	 * Date: 2015/8/12
	 * Time: 11:50
	 */

	/**
	 * Interface eat 桥接模式 相同的方法却是不相同的实现..
	 */


	interface eat{
		function eat();
	}

	class my implements eat{


		function eat() {
			echo "我吃东西我是坐着吃<br>";
		}
	}
	class she implements eat{
		function eat() {
		  echo "女孩吃东西是站着吃<br>";
		}
	}

	class bridge {
		public $person;

	 	function setPerson(eat $eat){
			$this->person = $eat;
		}

		function eat(){
			$this->person->eat();
		}
	}


	$my = new my();
	$she = new she();

	$bridge = new bridge();

	$bridge->setPerson($my);
	$bridge->eat();
	$bridge->setPerson($she);
	$bridge->eat();


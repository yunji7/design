<?php
	/**
	 * Created by my.
	 * User: android
	 * Date: 2015/8/12
	 * Time: 11:50
	 */

	/**
	 * Interface eat �Ž�ģʽ ��ͬ�ķ���ȴ�ǲ���ͬ��ʵ��..
	 */


	interface eat{
		function eat();
	}

	class my implements eat{


		function eat() {
			echo "�ҳԶ����������ų�<br>";
		}
	}
	class she implements eat{
		function eat() {
		  echo "Ů���Զ�����վ�ų�<br>";
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


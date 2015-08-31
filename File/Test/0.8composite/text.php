<?php
	/**
	 * Created by composite.
	 * User: android
	 * Date: 2015/8/31
	 * Time: 21:45
	 */

 /**
  *  组合模式.公司从BOSS到底层员工..
  */

	interface IF_MSG{
		function  IF_F_Msg();
		function IF_F_Id();
	}


	abstract class company implements IF_MSG{
		protected $company;
		protected $subordinate;
		//添加
		function add(IF_MSG $IF_MSG){
			$this->subordinate[$IF_MSG->IF_F_Id()] = $IF_MSG;
		}
		//删除
		function delect(IF_MSG $IF_MSG){
			unset ($this->subordinate[$IF_MSG->IF_F_Id()]) ;
		}
		//通知
		function message(){

			if($this->subordinate == NULL){
				return ;
			}

			foreach ($this->subordinate as  $key=>$value ) {
//				echo $key;
				$value->IF_F_Msg();
			}

		}



		function IF_F_Id() {
			return uniqid('money', true);
		}
	}
	class myCompany extends company{
		function  IF_F_Msg() {
		  $this->message();
		}

	}



	class money extends company {
		function  IF_F_Msg() {
			echo "<br>财务部门出通知了<br>";
			$this->message();
		}
	}


	class manpower extends company  {
		function  IF_F_Msg() {
			echo "<br>人力部门出通知了<br>";
			$this->message();
		}
	}


	class man implements IF_MSG{
		public  $name;
		function __construct($name) {
			$this->name = $name;
		}

		function  IF_F_Msg() {
			 echo $this->name."小的收到了";
		}

		function IF_F_Id() {
			return uniqid('money', true);
		}
	}


	$mycompany = new myCompany();

	$money = new money();
	$manpower = new  manpower();

	$mycompany->add($money);
	$mycompany->add($manpower);

	$A1 = new man("A1");
	$A2 = new man("A2");
	$A3 = new man("A2");

	$money->add($A1);
	$money->add($A2);
	$manpower->add($A3);

	$mycompany->IF_F_Msg();



	$mycompany->delect($money);
  echo "<br>*********************<br>";
	$manpower->IF_F_Msg();


	echo "<br>*********************<br>";
	$money->IF_F_Msg();






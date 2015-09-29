<?php
	/**
	 * Created by chain of .
	 * User: lee
	 * Date: 2015/9/9
	 * Time: 21:11
	 */
	/*
	 * 责任链..模式  我不需要.. 到底谁处理了消息...我只需要知道我扔出了消息等待回应
	 *
	 * 场景 我要钱..yes  i need some money ..要多少钱. 交给他们处理我只知道我要钱..你们给我吐出来
	 */

	interface IF_run
	{
		function notify($data);
	}

	abstract class chain implements IF_run
	{
		protected $person;
		protected $min;
		protected $max;
		protected $name;

		function __construct($name, $min, $max)
		{

			if($min>$max){
				$x = new EXCEPTION("min 不能大于 max");
				throw $x;
			}
			$this->name = $name;
			$this->min = $min;
			$this->max = $max;
		}


		function  set(  $person)
		{
			$this->person = $person;
		}

		function get()
		{
			return $this->person;
		}

		function notify($data)
		{

			if($this->min < $data && $this->max > $data){
				echo $this->name;
				echo $this->name."提供".$data."贷款";
				return true;
			}else{
				if(isset($this->person)){
					$this->person->notify($data);
				}else{
					echo "没有anybody 提供 money to you";
				}
			}
		}


	}

	class man extends chain
	{

	}

	try {

		/**
		 * 提供 50以内的金钱
		 */
		$one = new man("男一号",0,50);
		/**
		 * 提供999-5555的金钱
		 */
		$two = new man("女二号",999,5555);
		/**
		 * 提供999,55555金钱
		 */
		$three = new man("女三号",9999,55555);


		$one->set($two);
		$two->set($three);


		/**
		 * 我需要35美元;
		 */
		  $one->notify(5);

	} catch (PDOException $e) {
			echo $e->getMessage();
			echo "<br>";
			echo $e->getTrace();
		}

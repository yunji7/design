<?php
	/**
	 * Created by chain of .
	 * User: lee
	 * Date: 2015/9/9
	 * Time: 21:11
	 */
	/*
	 * ������..ģʽ  �Ҳ���Ҫ.. ����˭��������Ϣ...��ֻ��Ҫ֪�����ӳ�����Ϣ�ȴ���Ӧ
	 *
	 * ���� ��ҪǮ..yes  i need some money ..Ҫ����Ǯ. �������Ǵ�����ֻ֪����ҪǮ..���Ǹ����³���
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
				$x = new EXCEPTION("min ���ܴ��� max");
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
				echo $this->name."�ṩ".$data."����";
				return true;
			}else{
				if(isset($this->person)){
					$this->person->notify($data);
				}else{
					echo "û��anybody �ṩ money to you";
				}
			}
		}


	}

	class man extends chain
	{

	}

	try {

		/**
		 * �ṩ 50���ڵĽ�Ǯ
		 */
		$one = new man("��һ��",0,50);
		/**
		 * �ṩ999-5555�Ľ�Ǯ
		 */
		$two = new man("Ů����",999,5555);
		/**
		 * �ṩ999,55555��Ǯ
		 */
		$three = new man("Ů����",9999,55555);


		$one->set($two);
		$two->set($three);


		/**
		 * ����Ҫ35��Ԫ;
		 */
		  $one->notify(5);

	} catch (PDOException $e) {
			echo $e->getMessage();
			echo "<br>";
			echo $e->getTrace();
		}

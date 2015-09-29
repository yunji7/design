<?php

	/**
	 * Created by iterator
	 * User: lee
	 * Date: 2015/9/9
	 * Time: 18:31
	 */
	interface IF_IteratorX
	{
		function   IF_F_first(); //将游标指向第一个元素

		function   IF_F_next(); //将游标指向下一个元素

		function   IF_F_hasNext(); //判断是否存在下一个元素

		function   IF_F_currentItem(); //获取游标指向的当前元素
	}

	class person
	{
		public $name;
		public $min;
		public $max;

		function __construct($name, $min, $max)
		{
			$this->name = $name;
			$this->max = $max;
			$this->min = $min;
		}
	}

	class CL implements IF_IteratorX
	{
		public $person;
		public $key;

		function __construct(person $person)
		{
			$this->person[] = $person;

			$this->key = 0;
		}

		function add(person $person)
		{
			$this->person[] = $person;
		}


		function   IF_F_first()
		{
			$this->key = 0;
		}

		function   IF_F_next()
		{
			$this->key++;
		}

		function   IF_F_hasNext()
		{
			return isset($this->person[$this->key]);
		}

		function   IF_F_currentItem()
		{
			return $this->person[$this->key];
		}
	}


	/**
	 * debug
	 */

	/**
	 *
	 * $wo1 =  new person("主任",0,5000);
	 * $key = new CL($wo1);
	 *
	 *
	 * var_dump($key);
	 *
	 * var_dump(  $key->IF_F_hasNext());
	 * echo "<br>";
	 * echo $key->IF_F_next();
	 * echo "<br>-----";
	 * var_dump( $key->IF_F_hasNext());
	 *
	 *
	 */
	class test
	{
		function __construct($number)
		{
			$wo1 = new person("主任", 0, 5000);
			$wo2 = new person("副董事长", 5000, 10000);
			$wo3 = new person("董事长", 10000, 50000);
			$wo4 = new person("董事会", 50000, PHP_INT_MAX);

			$key = new CL($wo1);
			$key->add($wo2);
			$key->add($wo3);
			$key->add($wo4);

			while ($key->IF_F_hasNext()) {
				//var_dump($key->IF_F_currentItem()); //debug


				$object = $key->IF_F_currentItem();

				if($number > $object->min && $number < $object->max ){
					echo $object->name."批准<br>";
				}

				$key->IF_F_next();
			}

		}
	}





	new test(50);
	new test(5001);
	new test(15555);
	new test(15555555);







<?php

	/**
	 * Created by php.
	 * User: lee
	 * Date: 2015/9/9
	 * Time: 16:54
	 */
	abstract class drink
	{
		protected function pour()
		{
			echo "���ӵ�ˮ<br>";
		}

		abstract function dosomething();

		protected function stir()
		{
			echo "����<br>";
		}


		function make()
		{
			$this->pour();
			$this->dosomething();
			$this->stir();

			echo "����<br><br><br><br><br><br><br><br>";
		}
	}

	class  milk extends drink
	{
		function dosomething()
		{
			echo "�̷�<br>";
		}

	}

	class coffee extends drink
	{
		function dosomething()
		{
			echo "���㿧��<br>";
		}
	}


	$milk = new milk();
	$coffee = new coffee();

	$milk->make();
	$coffee->make();
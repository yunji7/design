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
			echo "±­×Óµ¹Ë®<br>";
		}

		abstract function dosomething();

		protected function stir()
		{
			echo "½Á°è<br>";
		}


		function make()
		{
			$this->pour();
			$this->dosomething();
			$this->stir();

			echo "³ÉÐÍ<br><br><br><br><br><br><br><br>";
		}
	}

	class  milk extends drink
	{
		function dosomething()
		{
			echo "ÄÌ·Û<br>";
		}

	}

	class coffee extends drink
	{
		function dosomething()
		{
			echo "µ¹µã¿§·È<br>";
		}
	}


	$milk = new milk();
	$coffee = new coffee();

	$milk->make();
	$coffee->make();
<?php
	/**
	 * Created by PhpStorm.
	 * User: lee
	 * Date: 2015/9/25
	 * Time: 16:40
	 */

	/**
	 * 避免相互持有..  也就是中心化.. 高度集
	 */

	interface IF_send{
		function send($message);
	}


	class my implements IF_send{


		public $center;

		function __construct(center $center)
		{
			 $this->center = $center;
		}


		function send($message){
				$this->center->sendShe($message);
		}

		function get($message)
		{
			echo "My收到$message<br>";
		}
	}

	class she{

		public $center;

		function __construct(center $center)
		{
			$this->center = $center;
		}

		function send($message){
			$this->center->sendmy($message);
		}

		function get($message){
			echo "She收到$message<br>";

			$this->send("love  to you");
			$this->send("to love more you");

		}
	}


	 class center{
		 public $my;
		 public $she;

		 function setMy(my $my){
			 $this->my = $my;
		 }

		 function setShe(she $she){
			 $this->she = $she;
		 }


		 function sendMy($message){
			$this->my->get($message);
		 }

		 function sendShe($message){
			 $this->she->get($message);
		 }

	 }


	$center = new center();
	$my = new my($center);
	$she = new she($center);
	$center->setMy($my);
	$center->setShe($she);

	$my->send("love do you copy");
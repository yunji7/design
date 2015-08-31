<?php
	/**
	 * Created by `.
	 * User: pc
	 * Date: 2015/8/26
	 * Time: 14:46
	 */

	/**
	 * template
	 */


	abstract class AB_car{
		public function engine(){
			echo "引擎发动<br>";
		}

		public function trumpet(){
			echo "汽车喇叭<br>";
		}

	}

	class temp_A  extends AB_car {
		public function run(){
			echo "<br>发动<br>";
			$this->engine();
			$this->trumpet();
		}
	}

	class temp_B extends AB_car {
		public function run(){
			echo "<br>发动<br>";
			$this->trumpet();
			$this->engine();
		}
	}

	$car_A = new temp_A();
	$car_B = new temp_B();

	$car_A->run();
	$car_B->run();





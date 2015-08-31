<?php
	/**
	 * Created by strategy.
	 * User: android
	 * Date: 2015/8/13
	 * Time: 11:19
	 */

	/**
	 * ²ßÂÔÄ£Ê½
	 */
	abstract class Animal {
		abstract public function speak();
	}

	class snake extends Animal {
		public function speak() {
			echo "snake speak";
		}
	}

	class dog extends Animal {
		public function speak() {
			echo "dog speak";
		}
	}


	class client{

		function __construct() {
			$snake = new snake();
			$dog   = new dog();
			$this->speak($snake);
			$this->speak($dog);
		}

		function speak(Animal $speak){
			$speak->speak();
		}

	}

	new client();
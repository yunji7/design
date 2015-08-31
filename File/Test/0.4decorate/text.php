<?php

	/**
	 * Created by decorate.
	 * User: android
	 * Date: 2015/8/30
	 * Time: 23:40
	 */
	interface wear {
		function clothes();
	}


	class my implements wear {
		function clothes() {
			echo "我穿上衣服了";
		}
	}

	//如果有一天我想在我穿衣服之前.或者之后干点别的事情.



 	class Do_something  implements wear{
		public $wear;
		function __construct(wear $wear) {
		 	$this->wear = $wear;
		}
		function clothes(){
			echo "  before -> ";
			$this->wear->clothes();
			echo "  after -> ";
		}
	}

	//如果有一天.我又想在做事之前 在做一些事情
	class Do_more_something implements wear{
		 public $wear;
		function __construct(wear $wear) {
		   $this->wear = $wear;
		}


		function clothes() {
			echo " more -> more";
		  $this->wear->clothes();
			echo " end  -> end";
		}

	}
 	$my = new my();
	$Do_something = new Do_something($my);
	$Do_more_something = new Do_more_something($Do_something);

	$Do_more_something->clothes();
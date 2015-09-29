<?php
	/**
	 * Created by stata.
	 * User: pc
	 * Date: 2015/8/27
	 * Time: 8:41
	 */

	/**
	 * 状态模式
	 */
	interface IF_state {
		function run($date);

	}

	class body {

		private  $state;
		public  $date;
		function __construct(IF_state $IF_state) {
			$this->state = $IF_state;
			$this->date = 10;
		}

		function go(){
			$this->state->run($this->date);
		}
		function setState($date){
			$this->state = $date;
		}
	}

	class C_state_workAm implements IF_state {

		function run($date) {
			if($date < 12){
				echo "上午工作了";
			}
		}
	}
	class C_state_workPm implements IF_state {

		function run($date) {
			if($date > 12 ){
				echo "下午不用上班了";
			}
		}
	}

	$am = new C_state_workAm();
	$pm = new C_state_workPm();

	$body = new body($am);
	$body->go();

	$body->setState($pm);
	$body->date = 13;
	$body->go();



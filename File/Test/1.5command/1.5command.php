<?php

	/**
	 * Created by  command.
	 * User: pc
	 * Date: 2015/8/26
	 * Time: 18:00
	 */


	/**
	 * Interface exe 万变不离其中.就是解耦..高内聚``低耦合
	 */
	interface exe{
		function exe();
	}
	class order implements exe{
		function exe() {
			echo "执行XX命令";
		}
	}

	class command{
		public $order;

		function __construct(exe $order) {
			 $this->order = $order;
		}

		function exe(){
			$this->order->exe();
		}
	}

	class boss{
		private  $command;

		function __construct(command $command) {
			 $this->command = $command;
		}

		function exe(){
			$this->command->exe();
		}
	}

	$order = new order();
	$command = new command($order);
	$boss = new boss($command);


	$boss->exe();
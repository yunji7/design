<?php
	/**
	 * Created by template.
	 * User: android
	 * Date: 2015/8/17
	 * Time: 15:58
	 */

	/**
	 *  observer
	 */


	/**
	 * Interface 观察者
	 */
	interface IF_observer {

		//添加一个
		public function add(IF_update $server);

		//删除一个
		public function delect(IF_update $server);

		//通知
		public function update();

		//自身操作
		public function myself();
	}


	//Audience 观众
	interface IF_update {

		//消息
		public function F_update();

		//返回标识对象ID
		public function F_unique();
	}

	abstract class  observer implements IF_observer {

		//observer List
		private $server;


		public function add(IF_update $server) {
			// TODO: Implement add() method.
			$this->server[$server->F_unique()] = $server;
		}

		public function delect(IF_update $server) {
			// TODO: Implement add() method.


			unset($this->server[$server->F_unique()]);

		}

		public function update() {
			// TODO: Implement update() method.

			foreach ($this->server as $server) {
				$server->F_update();
			}

		}

	}


	class tree extends observer {

		public function myself() {

			echo "----有动作了-----";
			$this->update();
		}
	}

	class Audience implements IF_update {
		public $id;

		public function F_update() {
			echo "yes";
			// TODO: Implement F_update() method.
		}

		public function F_unique() {
			if (empty($this->id)) {
				$this->id = uniqid('', true);
			}

			return $this->id;

			// TODO: Implement F_unique() method.
		}

	}




	$A = new tree();
	$B = new Audience();
	$C = new Audience();


	$A->add($B);
	$A->add($C);
	$A->myself();
	var_dump($A);


	$A->delect($B);
	$A->myself();
	var_dump($A);














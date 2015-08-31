<?php
	/**
	 * Created by my
	 * User: android
	 * Date: 2015/8/7
	 * Time: 15:44
	 */


	namespace buildModel;

	/***
	 *   建造者模式 为什么一样的粽子一样的材料 却是不一样的口味 (流程不一样)
	 *   为什么那么多烂尾楼? 为什么先建立房屋在建立停车场 导致 楼房塌陷..?  (建造流程不一样)
	 */
	class zongzi {
		//颜色
		public $color;
		//大小
		public $size;
		//里面包着什么东西
		public $kernel;
		//
	}

	interface getclass {
		public function getclass();
	}

	//粽子
	class factoryzongzi implements getClass {

		public function getclass() {
			return new zongzi();
		}


	}

	//建造者
	class factorybuild implements getClass {


		public function getclass() {
			return new buildZongzi();
		}
	}


	/**
	 * Class buildZongzi 包粽子的人.必须会
	 */
	interface IFzongzi {

		/**
		 * 把米变成糯米
		 */
		public function nuom();

		/**
		 *   把肉馅放到米里面
		 */
		public function inside();

		/**
		 *  用叶子包好肉
		 */
		public function rou();

		/**
		 * 用绳子包好
		 */
		public function string();

		/**
		 *  返回一个完整的产品'
		 */
		public function result();
	}

	/**
	 * Class buildZongzi 包粽子的人
	 */
	class buildZongzi implements IFzongzi {
		//粽子类
		public $zongzi;

		function __construct() {
			$factory = new factoryzongzi();
			$this->zongzi = $factory->getclass();
		}

		/**
		 * 把米变成糯米
		 */
		public function nuom() {
			echo "把米变成糯米";
		}

		/**
		 *   把肉馅放到米里面
		 */
		public function inside() {
			echo "把肉馅放到米里面";
			$this->zongzi->size = 50;
			$this->zongzi->kernel = "猪肉";
		}

		/**
		 *  用叶子包好肉
		 */
		public function rou() {
			echo "用叶子包好肉";
			//包好就变成黑色;
			$this->zongzi->color = "black";
		}

		/**
		 * 用绳子包好
		 */
		public function string() {
			echo "完成";
		}

		/**
		 *  返回一个完整的产品'
		 */
		public function result() {
			return $this->zongzi;
		}
	}


	interface standard {
		public function standard();
	}

	/**
	 * Class director 指挥者
	 */
	class director implements standard {
		private $build;

		/**
		 * @param IFzongzi $IFzongzi 指挥者的生存就是为了 指挥建造者.. (建造者?农民工?)
		 */
		function __construct(IFzongzi $IFzongzi) {
			$this->build = $IFzongzi;
		}

		/**
		 * @return mixed  返回粽子类
		 */
		public function standard() {
			echo "第一步<br>";
			$this->build->nuom();
			echo "<br>第二步<br>";
			$this->build->inside();
			echo "<br>第三步<br>";
			$this->build->rou();
			echo "<br>第四步<br>";
			$this->build->string();

			return $this->build->result();
		}
	}


	class clientA {

		function __construct() {
			$build = new buildZongzi();
			$director = new director($build);
			$zongzi = $director->standard();


			echo "完整的产品";
			var_dump($zongzi);
		}

	}

	echo "场景A<br>";
	$X = new clientA();












	/**
	 *  场景二 建造战士 统一标准. 只要实现了building. director 就按照一定的规则(流程)创建统一的物品
	 *
	 */
	class zhanshi {
		//身高
		public $top;
		//强壮
		public $strong;
		//靴子
		public $foot;
		//衣服
		public $clothes;
		//裤子
		public $trousers;
		//武器
		public $weapon;
	}


	interface building{
		public function foot();
		public function clothes();
		public function trousers();
		public function weapon();
		public function result();
	}


	/**
	 * Class war 建造机器
	 */
	class war implements building{
		public $zhanshi;
		function __construct() {
			$this->zhanshi = new zhanshi();
			$this->zhanshi->top = rand(150,170);
			$this->zhanshi->strong = rand(200,500);
		}
		public function foot(){
			$this->zhanshi->foot = "黄金战靴";
		}
		public function clothes(){
			$this->zhanshi->clothes = "黄金衣服";
		}
		public function trousers(){
			$this->zhanshi->trousers = "黄金裤子";
		}
		public function weapon(){
			$this->zhanshi->weapon = "黄金武器";
		}

		public function result() {
			return $this->zhanshi;
		}
	}

	interface commend{
		public function build();
	}

	/**
	 * Class directorA 指挥产出机器的类
	 */
	class directorA implements commend{
		 public $fighter;
		function __construct(building $zhanshi) {
			$this->fighter = $zhanshi;
		}

		public function build() {
			$this->fighter->foot();
			$this->fighter->clothes();
			$this->fighter->trousers();
			$this->fighter->weapon();
			return $this->fighter->result();
		}
	}

	class clientB{
		/**
		 * @inheritDoc
		 */
		function __construct() {


			/**
			 *  创建两队战士拼搏
			 */
			for ($i = 0; $i < 5; $i++) {
				$war = new war();
				$directorA = new directorA($war);
				$productA[] = $directorA->build();
			}

			for ($i = 0; $i < 5; $i++) {
				$war = new war();
				$directorA = new directorA($war);
				$productB[] = $directorA->build();
			}

			$productC = $this->fighter($productA,$productB);



			for ($i = 0; $i < count($productA); $i++) {
				echo $productA[$i]->strong." ".$productB[$i]->strong." ".$productC[$i]."<br>";
			}

		}

		public function fighter($A ,$B){


			for ($i = 0; $i < count($A); $i++) {
				if($A[$i]->strong > $B[$i]->strong){
					$C[$i] = 'A';
				} else{
					$C[$i] = 'B';
				}
			}

			return $C;
		}

	}

	new clientB();











<?php
	/**
	 * Created by text.
	 * User: android
	 * Date: 2015/8/29
	 * Time: 17:06
	 */

	/**
	 *  建造者 辣条创建
	 */
	class material {
		//辣椒
		public $chili;
		//豆腐
		public $bean;
		//袋子
		public $bag;
		//辣味
		public $hot;
	}


	interface IF_make{
		//搅拌
		function F_stir();
		//打包
		function F_pack();
		//产品
		function F_product();
	}

	class personA  implements IF_make{

		public  $material;

		function __construct(material $material) {
			$this->material = $material;
		}

		function F_stir() {
			//放五个辣椒
			$this->material->chili = 5;
			//豆腐放3个
			$this->material->bean = 3;

			//辣味程度取决于辣椒个数
			$this->material->hot = $this->material->chili * 10;

			$this->F_pack();
		}

		function F_pack() {
			//搞定之后用袋子装上
			$this->material->bag = true;
		}

		function F_product() {
		   return $this->material;
		}

	}

	class personB  implements IF_make {
		public  $material;

		function __construct(material $material) {
			$this->material = $material;
		}

		function F_stir() {
			//一个辣椒
			$this->material->chili = 1;
			//豆腐放3个
			$this->material->bean = 3;

			//辣味程度取决于辣椒个数
			$this->material->hot = $this->material->chili * 10;

			$this->F_pack();
		}

		function F_pack() {
			//搞定之后用袋子装上
			$this->material->bag = true;
		}


		function F_product() {
			return $this->material;
		}
	}

	class buid{
		static function make(IF_make $IF_make){

			//搅拌
			$IF_make->F_stir();

			//打包
			$IF_make->F_pack();
			//返回一个产品
			return $IF_make->F_product();
		}
	}

	//原材料
	$material_A = new material();
	$material_B = new material();


	//不同的工人 做不一样的产品
	$person_A = new personA($material_A);
	$person_B = new personB($material_B);

	//但是流程不变....
	$perfect_A = buid::make($person_A);
	$perfect_B = buid::make($person_B);


	var_dump($person_A);
	var_dump($person_B);





















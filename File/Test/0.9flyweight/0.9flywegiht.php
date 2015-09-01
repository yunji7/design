<?php
	/**
	 * Created by flyweight.
	 * User: android
	 * Date: 2015/8/12
	 * Time: 15:29
	 */

	/**
	 *  享元模式 对象粒度粗细 主要是实现对象共享 杯子一样我喝完了.我还可以继续盛水,复用
	 *  比如数据库连接.不需要创建那么对象..
	 * 如果每一个人进来都创建一个对象.你内存开销爆棚
	 */


	class flyfactory{

		private $sum;
		function getcup($name){

			/**
			 * 核心代码
			 */
			if($name == "cup" ){
				if($this->sum == null){
					$this->sum['cup'] = new cup();
					return $this->sum['cup'];
				}else{
					return $this->sum['cup'];
				}
			}
		}
	}

	interface IF_cupuse{
		function usecup();
	}

	class cup implements IF_cupuse{


		private $id;
		function __construct() {
		    $this->id =  uniqid('',true);

		}


		function getId(){
			return $this->id;
		}

		function usecup() {
			echo "AAA";
		}


	}






	$factory = new flyfactory();

	$cup  =  $factory->getcup("cup");

	var_dump($cup);

	var_dump($cup->getId());


	$cupB = $factory->getcup("cup");

	var_dump($cupB);


	$cupB->usecup();



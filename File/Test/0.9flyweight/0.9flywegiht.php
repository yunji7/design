<?php
	/**
	 * Created by flyweight.
	 * User: android
	 * Date: 2015/8/12
	 * Time: 15:29
	 */

	/**
	 *  ��Ԫģʽ �������ȴ�ϸ ��Ҫ��ʵ�ֶ����� ����һ���Һ�����.�һ����Լ���ʢˮ,����
	 *  �������ݿ�����.����Ҫ������ô����..
	 * ���ÿһ���˽���������һ������.���ڴ濪������
	 */


	class flyfactory{

		private $sum;
		function getcup($name){

			/**
			 * ���Ĵ���
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



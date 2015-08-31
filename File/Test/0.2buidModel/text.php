<?php
	/**
	 * Created by text.
	 * User: android
	 * Date: 2015/8/29
	 * Time: 17:06
	 */

	/**
	 *  ������ ��������
	 */
	class material {
		//����
		public $chili;
		//����
		public $bean;
		//����
		public $bag;
		//��ζ
		public $hot;
	}


	interface IF_make{
		//����
		function F_stir();
		//���
		function F_pack();
		//��Ʒ
		function F_product();
	}

	class personA  implements IF_make{

		public  $material;

		function __construct(material $material) {
			$this->material = $material;
		}

		function F_stir() {
			//���������
			$this->material->chili = 5;
			//������3��
			$this->material->bean = 3;

			//��ζ�̶�ȡ������������
			$this->material->hot = $this->material->chili * 10;

			$this->F_pack();
		}

		function F_pack() {
			//�㶨֮���ô���װ��
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
			//һ������
			$this->material->chili = 1;
			//������3��
			$this->material->bean = 3;

			//��ζ�̶�ȡ������������
			$this->material->hot = $this->material->chili * 10;

			$this->F_pack();
		}

		function F_pack() {
			//�㶨֮���ô���װ��
			$this->material->bag = true;
		}


		function F_product() {
			return $this->material;
		}
	}

	class buid{
		static function make(IF_make $IF_make){

			//����
			$IF_make->F_stir();

			//���
			$IF_make->F_pack();
			//����һ����Ʒ
			return $IF_make->F_product();
		}
	}

	//ԭ����
	$material_A = new material();
	$material_B = new material();


	//��ͬ�Ĺ��� ����һ���Ĳ�Ʒ
	$person_A = new personA($material_A);
	$person_B = new personB($material_B);

	//�������̲���....
	$perfect_A = buid::make($person_A);
	$perfect_B = buid::make($person_B);


	var_dump($person_A);
	var_dump($person_B);





















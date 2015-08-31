<?php
	/**
	 * Created by my
	 * User: android
	 * Date: 2015/8/7
	 * Time: 15:44
	 */


	namespace buildModel;

	/***
	 *   ������ģʽ Ϊʲôһ��������һ���Ĳ��� ȴ�ǲ�һ���Ŀ�ζ (���̲�һ��)
	 *   Ϊʲô��ô����β¥? Ϊʲô�Ƚ��������ڽ���ͣ���� ���� ¥������..?  (�������̲�һ��)
	 */
	class zongzi {
		//��ɫ
		public $color;
		//��С
		public $size;
		//�������ʲô����
		public $kernel;
		//
	}

	interface getclass {
		public function getclass();
	}

	//����
	class factoryzongzi implements getClass {

		public function getclass() {
			return new zongzi();
		}


	}

	//������
	class factorybuild implements getClass {


		public function getclass() {
			return new buildZongzi();
		}
	}


	/**
	 * Class buildZongzi �����ӵ���.�����
	 */
	interface IFzongzi {

		/**
		 * ���ױ��Ŵ��
		 */
		public function nuom();

		/**
		 *   �����ڷŵ�������
		 */
		public function inside();

		/**
		 *  ��Ҷ�Ӱ�����
		 */
		public function rou();

		/**
		 * �����Ӱ���
		 */
		public function string();

		/**
		 *  ����һ�������Ĳ�Ʒ'
		 */
		public function result();
	}

	/**
	 * Class buildZongzi �����ӵ���
	 */
	class buildZongzi implements IFzongzi {
		//������
		public $zongzi;

		function __construct() {
			$factory = new factoryzongzi();
			$this->zongzi = $factory->getclass();
		}

		/**
		 * ���ױ��Ŵ��
		 */
		public function nuom() {
			echo "���ױ��Ŵ��";
		}

		/**
		 *   �����ڷŵ�������
		 */
		public function inside() {
			echo "�����ڷŵ�������";
			$this->zongzi->size = 50;
			$this->zongzi->kernel = "����";
		}

		/**
		 *  ��Ҷ�Ӱ�����
		 */
		public function rou() {
			echo "��Ҷ�Ӱ�����";
			//���þͱ�ɺ�ɫ;
			$this->zongzi->color = "black";
		}

		/**
		 * �����Ӱ���
		 */
		public function string() {
			echo "���";
		}

		/**
		 *  ����һ�������Ĳ�Ʒ'
		 */
		public function result() {
			return $this->zongzi;
		}
	}


	interface standard {
		public function standard();
	}

	/**
	 * Class director ָ����
	 */
	class director implements standard {
		private $build;

		/**
		 * @param IFzongzi $IFzongzi ָ���ߵ��������Ϊ�� ָ�ӽ�����.. (������?ũ��?)
		 */
		function __construct(IFzongzi $IFzongzi) {
			$this->build = $IFzongzi;
		}

		/**
		 * @return mixed  ����������
		 */
		public function standard() {
			echo "��һ��<br>";
			$this->build->nuom();
			echo "<br>�ڶ���<br>";
			$this->build->inside();
			echo "<br>������<br>";
			$this->build->rou();
			echo "<br>���Ĳ�<br>";
			$this->build->string();

			return $this->build->result();
		}
	}


	class clientA {

		function __construct() {
			$build = new buildZongzi();
			$director = new director($build);
			$zongzi = $director->standard();


			echo "�����Ĳ�Ʒ";
			var_dump($zongzi);
		}

	}

	echo "����A<br>";
	$X = new clientA();












	/**
	 *  ������ ����սʿ ͳһ��׼. ֻҪʵ����building. director �Ͱ���һ���Ĺ���(����)����ͳһ����Ʒ
	 *
	 */
	class zhanshi {
		//���
		public $top;
		//ǿ׳
		public $strong;
		//ѥ��
		public $foot;
		//�·�
		public $clothes;
		//����
		public $trousers;
		//����
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
	 * Class war �������
	 */
	class war implements building{
		public $zhanshi;
		function __construct() {
			$this->zhanshi = new zhanshi();
			$this->zhanshi->top = rand(150,170);
			$this->zhanshi->strong = rand(200,500);
		}
		public function foot(){
			$this->zhanshi->foot = "�ƽ�սѥ";
		}
		public function clothes(){
			$this->zhanshi->clothes = "�ƽ��·�";
		}
		public function trousers(){
			$this->zhanshi->trousers = "�ƽ����";
		}
		public function weapon(){
			$this->zhanshi->weapon = "�ƽ�����";
		}

		public function result() {
			return $this->zhanshi;
		}
	}

	interface commend{
		public function build();
	}

	/**
	 * Class directorA ָ�Ӳ�����������
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
			 *  ��������սʿƴ��
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











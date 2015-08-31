<?php
	/**
	 * Created by my.
	 * User: android
	 * Date: 2015/8/12
	 * Time: 10:48
	 */

	/**
	 * ���ģʽ //  //���д���.  ���������.������໥���ص�����,�޸�һ����,���ܻ�Ҫ�޸���������
	 * �����...�������Ŀ����Ҫ����� ��һԭ�� �߶�����
	 */
	class cpu {
		function start() {
			echo "CPU start <br>";
		}

		function stop() {
			echo "CPU stop <br>";
		}
	}

	class disk {
		function start() {
			echo "disk start <br>";
		}

		function stop() {
			echo "disk stop <br>";
		}
	}

	class memory {
		function start() {
			echo "memory start <br>";
		}

		function stop() {
			echo "memory stop <br>";
		}
	}

	class facade {
		public $cpu;
		public $disk;
		public $memory;

		function __construct() {
			$this->cpu = new cpu();
			$this->disk= new disk();
			$this->memory = new memory();
		}


		function start(){
			$this->cpu->start();
			$this->disk->start();
			$this->memory->start();
		}

		function stop(){
			$this->cpu->stop();
			$this->disk->stop();
			$this->memory->stop();
		}

	}

	$facade = new facade();
	$facade->start();
	$facade->stop();
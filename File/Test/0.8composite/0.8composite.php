<?php
	/**
	 * Created by 1.2Observer.
	 * User: android
	 * Date: 2015/8/12
	 * Time: 12:08
	 */

/**
 *  ���ģʽ.  ������Ե��ļ���.�ļ��а����ļ�.Ҳ�����ļ���
 */


	abstract class AbstractFiles{
		public $name;


		function __construct($name) {
			$this->name = $name;
		}

		abstract function addchild($child);
		abstract function showchild();
	}

	class Files extends AbstractFiles{
		public $child;

		function addchild($child) {
			 $this->child[] = $child;
		}

		function showchild() {
			var_dump($this->child);
		}
	}

	class File extends AbstractFiles{
		public $child;

		function addchild($child) {
			$this->child[] = $child;
		}

		function showchild() {
			var_dump($this->child);
		}
	}

	$file = new File("file");
	$files = new Files("files");

	$file->addchild($file);
	$file->addchild($file);
	$file->addchild($file);
	$file->showchild();

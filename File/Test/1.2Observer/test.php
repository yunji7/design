<?php
	/**
	 * Created by test.
	 * User: lee
	 * Date: 2015/9/9
	 * Time: 17:48
	 */

	/**
	 *   �ṩ���� ->   �۲���
	 */


	interface IF_Observer{
		//֪ͨ
		function update();
		//����һ��Ψһ��
		function unqiue();
	}

	 abstract class subject{
		 protected $Observer;
		 function add(IF_Observer $IF_Observer){
			 $this->Observer[$IF_Observer->unqiue()] = $IF_Observer;
		 }
		 function delect(IF_Observer $IF_Observer){
			 unset($this->Observer[$IF_Observer->unqiue()]);
		 }

		 function update(){
			 foreach ($this->Observer as  $key ) {
				 $key->update();
			 }
		 }

		 function notify(){
			 echo "xxx";
			 $this->update();
		 }
	 }
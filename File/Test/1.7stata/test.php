<?php
	/**
	 * Created by state.
	 * User: lee
	 * Date: 2015/9/12
	 * Time: 11:12
	 */


	/**
	 * ״̬ģʽ.  ..
	 */

new context();
	 class context{
		public $state;

		 function __construct()
		 {
		     $this->state = $this->get_off();
			 $this->state->F_no();
			 $this->state->F_off();


			//�з�
			 $this->state = $this->get_lost();
			 $this->state->F_no();
			 $this->state->F_off();

		 }


		 function get_on(){
			 return new on($this);
		 }

		 function get_off(){
			 return new off($this);
		 }


		 function get_lost(){
			 return new lost($this);
		 }

	 }


	abstract class ABS_tap {
		public $context;

		function __construct(context $context)
		{
			 $this->context = $context;
		}

		abstract function F_no();
		abstract function F_off();
	}

	class off extends ABS_tap{
		function F_no()
		{
			//�����㷨����һ��...���ڲ��滻...
			 echo "tap on<br>";
			$this->context->state = $this->context->get_on();
		}

		function F_off()
		{
			echo "�Ѿ�����.�������ڹ���";
		}

	}


	class on extends ABS_tap{

		function F_no()
		{
			//nothing
			echo "�Ѿ�����.�������ڿ���";
		}

		function F_off()
		{
			//
			echo "tap off<br>";
			$this->context->state = $this->context->get_off();
		}

	}



	/**
	 * ���Ҫ��չ..���Ӳз�ģʽ...
	 */

	class lost extends ABS_tap{
		function F_no()
		{
		   var_dump("������˼.���ܳ�ˮ�Ѿ��з�<br>");
		}

		function F_off()
		{
			var_dump("������˼.���ܳ�ˮ�Ѿ��з�<br>");
		}

	}














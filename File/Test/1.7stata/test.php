<?php
	/**
	 * Created by state.
	 * User: lee
	 * Date: 2015/9/12
	 * Time: 11:12
	 */


	/**
	 * 状态模式.  ..
	 */

new context();
	 class context{
		public $state;

		 function __construct()
		 {
		     $this->state = $this->get_off();
			 $this->state->F_no();
			 $this->state->F_off();


			//残废
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
			//核心算法就这一步...由内部替换...
			 echo "tap on<br>";
			$this->context->state = $this->context->get_on();
		}

		function F_off()
		{
			echo "已经关了.不可以在关了";
		}

	}


	class on extends ABS_tap{

		function F_no()
		{
			//nothing
			echo "已经开了.不可以在开了";
		}

		function F_off()
		{
			//
			echo "tap off<br>";
			$this->context->state = $this->context->get_off();
		}

	}



	/**
	 * 如果要扩展..增加残废模式...
	 */

	class lost extends ABS_tap{
		function F_no()
		{
		   var_dump("不好意思.不能出水已经残废<br>");
		}

		function F_off()
		{
			var_dump("不好意思.不能出水已经残废<br>");
		}

	}














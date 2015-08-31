<?php
/**
 * Created by iterator.
 * User: pc
 * Date: 2015/8/26
 * Time: 16:10
 */

  /**
   *  iterator
   */

	interface IF_Collection{

		function F_get($i);

		function F_size();
	}

	interface IF_Iterator{
		function F_next();
//		function F_
	}

	class CIterator implements IF_Iterator{

		private  $Collection;
		private $key = 0;
		private $is = true;
		function setcollection(IF_Collection $co){
			$this->Collection = $co;
		}

		function F_next() {

			$key = $this->Collection->F_get($this->key);
			$this->key++;

			 return $key;
		}

		function F_is_next(){
			if($this->key < $this->Collection->F_size() ){
				return true;
			}
			return false;
		}

		function F_first(){
				$this->key =  0;
		}

	}


	class C implements  IF_Collection{
		public  $A = array(1,2,3,4,5);


		function F_get($i) {
			return $this->A[$i];
		}

		function F_size() {
			return count($this->A);
		}

	}


	$iterator = new CIterator();
	$C = new C();
	$iterator->setcollection($C);


	while($iterator->F_is_next())
	{
		echo $iterator->F_next();
		echo "<br>";
	}



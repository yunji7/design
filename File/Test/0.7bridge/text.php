<?php
	/**
	 * Created by text.
	 * User: android
	 * Date: 2015/8/31
	 * Time: 18:55
	 */


   interface IF_baseSQL{
	   function add();
	   function delect();
	   function update();
	   function select();
   }


	class mysql implements IF_baseSQL{

		function add() {
			ECHO "<br> mysql add <br>";
		}

		function delect() {
			ECHO "<br> mysql delect <br>";
		}

		function update() {
			ECHO "<br> mysql update <br>";
		}

		function select() {
			ECHO "<br> mysql select <br>";
		}
	}

	class oracle implements IF_baseSQL{

		function add() {
			ECHO "<br> oracle add <br>";
		}

		function delect() {
			ECHO "<br> oracle delect <br>";
		}

		function update() {
			ECHO "<br> oracle update <br>";
		}

		function select() {
			ECHO "<br> oracle select <br>";
		}

	}

	class sqlite implements IF_baseSQL{

		function add() {
			ECHO "<br> sqlite add <br>";
		}

		function delect() {
			ECHO "<br> sqlite delect <br>";
		}

		function update() {
			ECHO "<br> sqlite update <br>";
		}

		function select() {
			ECHO "<br> sqlite select <br>";
		}

	}

	class sqlserver implements  IF_baseSQL{

		function add() {
			ECHO "<br> sqlite add <br>";
		}

		function delect() {
			ECHO "<br> sqlite delect <br>";
		}

		function update() {
			ECHO "<br> sqlite update <br>";
		}

		function select() {
			ECHO "<br> sqlite select <br>";
		}
	}


	abstract class ADUS{
		private $sql;

		function __construct(IF_baseSQL $baseSQL) {
			 $this->sql = $baseSQL;
		}

		function A(){
			$this->sql->add();
		}

		function D(){
			$this->sql->delect();
		}

		function U(){
			$this->sql->update();
		}

		function S(){
			$this->sql->select();
		}

		function setSql(IF_baseSQL $baseSQL){
			$this->sql = $baseSQL;
		}
	}

	class connect extends ADUS{

	}

	$mysql = new mysql();

	$connect = new connect($mysql);
	$connect->A();
	$connect->D();
	$connect->U();
	$connect->s();

	$sqlite = new sqlite();
	$connect->setSql($sqlite);
	$connect->A();
	$connect->D();
	$connect->U();
	$connect->s();






















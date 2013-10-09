<?php

require_once('Database.php');
$db= create_db();

function treat_line($line, $d=":"){
	$line= explode($d, $line);
	return trim($line[1]);
}

function print_array($a){
	print "<pre>";
	print_r($a);
	print "</pre>";
}


function create_db(){
	$file= "incl/db.txt";
	$fp = fopen($file, "r");
	$info= array();

	while($line = fgets($fp)){
		$info[]= $line;
		}

		$host= treat_line($info[1]);
		$database= treat_line($info[2]);
		$user= treat_line($info[3]);
		$pw= treat_line($info[4]);

		return new Database($database, $user, $pw, $host);
}
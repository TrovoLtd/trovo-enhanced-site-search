<?php

	require_once('interface.IResult.php');

	interface IResultPage {
	
		public function getResults();
		public function addResult(IResult $result);
	

	}
?>
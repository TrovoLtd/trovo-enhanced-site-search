<?php

	require_once("test.google-result.php");
	require_once("PHPUnit.php");
	
	$objSuite = new PHPUnit_TestSuite("GoogleResult_TestCase");
	$strResult = PHPUnit::run($objSuite);
	
	print $strResult->toString();

?>
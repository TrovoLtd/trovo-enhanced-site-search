<?php

	require_once("GoogleResultPageTest.php");
	require_once("PHPUnit.php");
	
	$objSuite = new PHPUnit_TestSuite("GoogleResultPage_TestCase");
	$strResult = PHPUnit::run($objSuite);
	
	print $strResult->toString();

?>
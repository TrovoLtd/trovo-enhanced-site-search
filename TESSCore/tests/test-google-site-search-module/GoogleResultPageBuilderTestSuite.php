<?php

	require_once("GoogleResultPageBuilderTest.php");
	require_once("PHPUnit.php");
	
	$objSuite = new PHPUnit_TestSuite("GoogleResultPageBuilder_TestCase");
	$strResult = PHPUnit::run($objSuite);
	
	print $strResult->toString();

?>
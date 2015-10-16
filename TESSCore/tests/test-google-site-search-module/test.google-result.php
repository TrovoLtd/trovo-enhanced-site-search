<?php

	require_once("../../src/google-site-search-module/class.google-result.php");
	require_once("PHPUnit.php");

	class GoogleResult_TestCase extends PHPUnit_TestCase {
		
		var $myGoogleResult;
		
		function __construct($name) {
			$this->PHPUnit_TestCase($name);
		}
		
		function setUp() {
			$this->myGoogleResult = new GoogleResult();
			
		}
		
		function tearDown() {
			unset($this->myGoogleResult);
		}
		
		function testRank() {
			$this->myGoogleResult->setRank(1);
			$this->assertEquals(1, $this->myGoogleResult->getRank());
		}
		
		
	}
	
?>
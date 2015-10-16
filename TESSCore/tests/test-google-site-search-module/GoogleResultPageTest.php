<?php

	require_once("../../src/google-site-search-module/class.GoogleResult.php");
	require_once("../../src/google-site-search-module/class.GoogleResultPage.php");
	require_once("PHPUnit.php");
	
	class GoogleResultPage_TestCase extends PHPUnit_TestCase {
		
		var $myGoogleResultPage;
		
		function __construct($name) {
			$this->PHPUnit_TestCase($name);
		}
		
			function setUp() {
			$this->myGoogleResultPage = new GoogleResultPage();
		}
		
		function tearDown() {
			unset($this->myGoogleResultPage);
		}
		
		function testGetResults() {
			
			$testResults = array();
			
			for($i=0; $i<10; $i++) {
				
				$testResult = new GoogleResult();
				$testResult->setTitle('Title '. $i);
				$this->myGoogleResultPage->addResult($testResult);
				
			}
			
			$actualResultArray = $this->myGoogleResultPage->getResults();
			
			$this->assertEquals("Title 2", $actualResultArray[2]->getTitle());
			
		}
		
		
	}

?>
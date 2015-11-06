<?php

	use Trovo\TESS\Core\GoogleSiteSearch\GoogleResult;
	use Trovo\TESS\Core\GoogleSiteSearch\GoogleResultPage;
	
	class GoogleResultPage_TestCase extends PHPUnit_Framework_TestCase {
	
		var $myGoogleResultPage;
	
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

<?php

	use Trovo\TESS\Core\GoogleSiteSearch\GoogleResult;

	class GoogleResult_TestCase extends PHPUnit_Framework_TestCase {
	
		var $myGoogleResult;
	
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
	
		function testTitle() {
			$this->myGoogleResult->setTitle("Test title");
			$this->assertEquals("Test title", $this->myGoogleResult->getTitle());
		}
	
		function testUrl() {
			$this->myGoogleResult->setUrl("Test URL");
			$this->assertEquals("Test URL", $this->myGoogleResult->getUrl());
		}
	
		function testSnippet() {
			$this->myGoogleResult->setSnippet("Test Snippet");
			$this->assertEquals("Test Snippet", $this->myGoogleResult->getSnippet());
		}
	
		function testFileType() {
			$this->myGoogleResult->setFileType("Test File Type");
			$this->assertEquals("Test File Type", $this->myGoogleResult->getFileType());
		}
	
	}

?>
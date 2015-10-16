<?php

	require_once("../../src/google-site-search-module/class.GoogleResult.php");
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
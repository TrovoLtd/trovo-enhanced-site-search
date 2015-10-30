<?php

	require_once("../../src/google-site-search-module/class.GoogleResultPageBuilder.php");
	require_once("../../src/google-site-search-module/class.GoogleResultPage.php");
	require_once("../../src/google-site-search-module/class.GoogleResult.php");
	require_once("PHPUnit.php");
	
	class GoogleResultPageBuilder_TestCase extends PHPUnit_TestCase {

		var $myGoogleResultPageBuilder;
		var $myXMLReader;
		
		function __construct($name) {
			$this->PHPUnit_TestCase($name);
		}
		
		function setUp() {
			$myXMLReader = new XMLReader();
			$myXMLReader->open('XML/GSS_Search_Computer.xml',
								'utf-8',
								LIBXML_NOBLANKS);
			$this->myGoogleResultPageBuilder = new GoogleResultPageBuilder($myXMLReader);
		}
		
		function tearDown() {
			unset($this->myGoogleResultPageBuilder);
			unset($this->myXMLReader);
		}
		
		
		function testResult1ReturnedWithUrl() {
			
			$resultPage = $this->myGoogleResultPageBuilder->getResultPage();
			
			$resultSet = $resultPage->getResults();
			
			$actual = $resultSet[0];
			
			$this->assertEquals("http://www.britishmuseum.org/research/collection_online/collection_object_details.aspx?assetId=1454065001&objectId=3028508&partId=1", $actual->getUrl());
			
		}
		
		function testResult1ReturnedWithTitle() {
				
			$resultPage = $this->myGoogleResultPageBuilder->getResultPage();
				
			$resultSet = $resultPage->getResults();
				
			$actual = $resultSet[0];
				
			$this->assertEquals("British Museum - model / funerary equipment / <b>computer</b>", $actual->getTitle());
				
			
			
		}
		
		function testResult1ReturnedWithSnippet() {
		
			$resultPage = $this->myGoogleResultPageBuilder->getResultPage();
		
			$resultSet = $resultPage->getResults();
		
			$actual = $resultSet[0];
		
			$this->assertEquals("Funerary equipment (one of five); made of cardboard; in the form of model <br> <b>computer</b> monitor; white cardboard box, rectangular at front, tapering to smaller&nbsp;...", $actual->getSnippet());
		
				
				
		}
		
		function testResult1ReturnedWithRank() {
		
			$resultPage = $this->myGoogleResultPageBuilder->getResultPage();
		
			$resultSet = $resultPage->getResults();
		
			$actual = $resultSet[0];
		
			$this->assertEquals(1, $actual->getRank());
		
		
		
		}
		
	}


?>
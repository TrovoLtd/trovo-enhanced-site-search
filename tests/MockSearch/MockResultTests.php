<?php

	use Trovo\TESS\MockSearch\MockResult;

	class MockResultTest extends \PHPUnit_Framework_TestCase {

		var $_mockResult;

		function setUp() {

			$this->_mockResult = new MockResult();

		}

		function tearDown() {
			unset($this->_mockResult);
		}

		function testRank() {
			$this->_mockResult->setRank(1);
			$this->assertEquals(1, $this->_mockResult->getRank());
		}

		function testTitle() {
			$this->_mockResult->setTitle('Test title');
			$this->assertEquals('Test title', $this->_mockResult->getTitle());
		}

		function testUrl() {
			$this->_mockResult->setUrl('http://www.url.com');
			$this->assertEquals('http://www.url.com', $this->_mockResult->getUrl());
		}

		function testSnippet() {
			$this->_mockResult->setSnippet('Test snippet');
			$this->assertEquals('Test snippet', $this->_mockResult->getSnippet());
		}

		function testFileType() {
			$this->_mockResult->setFileType('Test file type');
			$this->assertEquals('Test file type', $this->_mockResult->getFileType());
		}

	}

<?php

	use Trovo\TESS\MockSearch\MockResultPage;
	use Trovo\TESS\MockSearch\MockResult;

	class MockResultPageTest extends PHPUnit_Framework_TestCase {

		private $_mockResultPage;

		public function setUp() {
			$this->_mockResultPage = new MockResultPage();
		}

		public function tearDown() {

			unset($this->_mockResultPage);

		}


		public function testGetResults() {

			for($i=0; $i<10; $i++) {

				$testResult = new MockResult();
				$testResult->setTitle('Title '. $i);
				$this->_mockResultPage->addResult($testResult);

			}

			$actualResultArray = $this->_mockResultPage->getResults();

			$this->assertEquals("Title 2", $actualResultArray[2]->getTitle());

		}


	}

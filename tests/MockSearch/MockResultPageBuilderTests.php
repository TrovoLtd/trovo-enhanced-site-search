<?php

    use Trovo\TESS\MockSearch\MockResultPageBuilder;
    use Trovo\TESS\MockSearch\MockResultPage;
    use Trovo\TESS\MockSearch\MockResult;


    class MockResultPageBuilderTests extends PHPUnit_Framework_TestCase {

        var $myMockResultPageBuilder;
        var $myXMLReader;

        function setUp()
        {
            $myXMLReader = new XMLReader();

            $xmlFilePath = dirname(__FILE__) . '/mockSearchResults.xml';

            $myXMLReader->open($xmlFilePath,
                'utf-8',
                LIBXML_NOBLANKS);
            $this->myMockResultPageBuilder = new MockResultPageBuilder($myXMLReader);
        }

        function tearDown() {

            unset($this->myMockResultPageBuilder);
            unset($this->myXMLReader);
        }

        function testSearchForStrivingReturnsOneResult() {

            $this->myMockResultPageBuilder->search("striving");

            $resultPage = $this->myMockResultPageBuilder->getResultPage();

            $results = $resultPage->getResults();

            $this->assertEquals(1, count($results));
        }

        function testSearchForStrivingReturnsResultWithTitleSikesMeetsHisEndTrovo() {

            $this->myMockResultPageBuilder->search("striving");

            $resultPage = $this->myMockResultPageBuilder->getResultPage();

            $results = $resultPage->getResults();

            $this->assertEquals("Sikes Meets His End - Trovo", $results[0]->getTitle());

        }

        function testSearchForStrivingReturnsResultWithCorrectUrl() {

            $this->myMockResultPageBuilder->search("striving");

            $resultPage = $this->myMockResultPageBuilder->getResultPage();

            $results = $resultPage->getResults();

            $this->assertEquals("http://www.trovo.co.uk/DemoContent/Oliver_Twist/Sikes_Meets_His_End.aspx", $results[0]->getUrl());

        }

        function testSearchForStrivingReturnsResultWithCorrectSnippet() {

            $this->myMockResultPageBuilder->search("striving");

            $resultPage = $this->myMockResultPageBuilder->getResultPage();

            $results = $resultPage->getResults();

            $this->assertEquals("<b>...</b> man crushing and striving with his neighbor, and all panting with impatience to <br> get near the door, and look upon the <b>criminal</b> as the officers brought him out.", $results[0]->getSnippet());

        }

        function testSearchForStrivingReturnsResultWithCorrectRank() {

            $this->myMockResultPageBuilder->search("striving");

            $resultPage = $this->myMockResultPageBuilder->getResultPage();

            $results = $resultPage->getResults();

            $this->assertEquals(1, $results[0]->getRank());

        }

        function testSearchForCriminalReturnsThreeResults() {

            $this->myMockResultPageBuilder->search("criminal");

            $resultPage = $this->myMockResultPageBuilder->getResultPage();

            $results = $resultPage->getResults();

            $this->assertEquals(3, count($results));
        }

        function testSearchForCriminalReturnsSecondResultWithTitleAnEnemyToTheRepublic() {

            $this->myMockResultPageBuilder->search("criminal");

            $resultPage = $this->myMockResultPageBuilder->getResultPage();

            $results = $resultPage->getResults();

            $this->assertEquals("An Enemy To The Republic - Trovo", $results[1]->getTitle());

        }

    }
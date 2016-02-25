<?php

use \Trovo\TESS\GoogleSiteSearch\GoogleQuery;

class GoogleQueryTest extends PHPUnit_Framework_TestCase
{

    private $_testQueryArgs;

    public function setUp()
    {
        $this->_testQueryArgs = array(
            "queryTerm" => "camera",
            "googleAccountId" => "1234",
            "googleBaseUrl" => "http://www.google.com/cse?client=google-csbe&output=xml_no_dtd&cx="
        );

    }

    public function testQueryArgsSet() {



        $testQuery = new GoogleQuery($this->_testQueryArgs);

        $result = $testQuery->getQueryArgs();

        $this->assertEquals("1234", $result["googleAccountId"]);

    }

    public function testQueryTermSet() {

        $testQuery = new GoogleQuery($this->_testQueryArgs);

        $result = $testQuery->getQueryTerm();

        $this->assertEquals("camera", $result);

    }

    /**
     * @expectedException           InvalidArgumentException
     * @expectedExceptionMessage    The query term was not properly labelled in the query args array. The correct label is queryTerm.
     */

    public function testArgsArrayHasImproperlyLabelledQueryTerm() {

        $testArray = array(
            "queryTrem" => "camera",
            "googleAccountId" => "1234"
        );

        $testQuery = new GoogleQuery($testArray);

        $result = $testQuery->getQueryTerm();

        $this->assertEquals("camera", $result);


    }

    public function testGoogleAccountIdSet() {

        $testQuery = new GoogleQuery($this->_testQueryArgs);

        $result = $testQuery->getGoogleAccountId();

        $this->assertEquals("1234", $result);

    }

    /**
     * @expectedException           InvalidArgumentException
     * @expectedExceptionMessage    The Google Account Id was not properly labelled in the query args array. The correct label is googleAccountId.
     */

    public function testArgsArrayHasImproperlyLabelledGoogleAccountId() {

        $testArray = array(
            "queryTerm" => "camera",
            "googleAccountIdd" => "1234"
        );

        $testQuery = new GoogleQuery($testArray);

        $result = $testQuery->getQueryTerm();

        $this->assertEquals("camera", $result);

    }

    public function testGoogleBaseQueryUrlSet() {

        $testQuery = new GoogleQuery($this->_testQueryArgs);

        $result = $testQuery->getGoogleBaseUrl();

        $this->assertEquals("http://www.google.com/cse?client=google-csbe&output=xml_no_dtd&cx=", $result);
    }

    /**
     * @expectedException           InvalidArgumentException
     * @expectedExceptionMessage    The Google Base Url was not properly labelled in the query args array. The correct label is googleBaseUrl.
     */

    public function testArgsArrayHasImproperlyLabelledGoogleBaseUrl() {

        $testArray = array(
            "queryTerm" => "camera",
            "googleAccountId" => "1234",
            "googleBastedUrl" => "Doesn't need a URL as the bad label will cause an exception to be thrown"
        );

        $testQuery = new GoogleQuery($testArray);

        $result = $testQuery->getQueryTerm();

        $this->assertEquals("camera", $result);

    }


    public function testGetGoogleQueryUrl() {


        $testQuery = new GoogleQuery($this->_testQueryArgs);

        $expectedResult =  "http://www.google.com/cse?client=google-csbe&output=xml_no_dtd&cx=1234&q=camera&num=10&start=0";

        $result = $testQuery->getGoogleQueryURL();

        $this->assertEquals($expectedResult, $result);

    }

    public function testGoogleQueryUrlWithSpaceInQuery() {

        $testArray = array(
            "queryTerm" => "racing car",
            "googleAccountId" => "1234",
            "googleBaseUrl" => "http://www.google.com/cse?client=google-csbe&output=xml_no_dtd&cx="
        );

        $testQuery = new GoogleQuery($testArray);

        $result = $testQuery->getGoogleQueryURL();

        $this->assertEquals("http://www.google.com/cse?client=google-csbe&output=xml_no_dtd&cx=1234&q=racing+car&num=10&start=0", $result);

    }

}

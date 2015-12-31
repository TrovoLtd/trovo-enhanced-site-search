<?php

use \Trovo\TESS\GoogleSiteSearch\GoogleQuery;

class GoogleQueryTest extends PHPUnit_Framework_TestCase
{

    public function testQueryArgsSet() {

        $testArray = array(
          "queryTerm" => "camera",
            "googleAccountId" => "1234"
        );

        $testQuery = new GoogleQuery($testArray);

        $result = $testQuery->getQueryArgs();

        $this->assertEquals("1234", $result["googleAccountId"]);

    }

    public function testQueryTermSet() {

        $testArray = array(
            "queryTerm" => "camera",
            "googleAccountId" => "1234"
        );

        $testQuery = new GoogleQuery($testArray);

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

        $testArray = array(
            "queryTerm" => "camera",
            "googleAccountId" => "1234"
        );

        $testQuery = new GoogleQuery($testArray);

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

    public function testGetGoogleQueryUrl() {


        $testArray = array(
            "queryTerm" => "camera",
            "googleAccountId" => "1234"
        );

        $testQuery = new GoogleQuery($testArray);

        $expectedResult =  "http://www.google.com/cse?client=google-csbe&output=xml_no_dtd&cx=1234&q=camera&num=10&start=0";

        $result = $testQuery->getGoogleQueryURL();

        $this->assertEquals($expectedResult, $result);

    }

}

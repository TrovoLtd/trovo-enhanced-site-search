<?php

use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\Remote\WebDriverCapabilityType;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class SearchHappyPathTests extends PHPUnit_Framework_TestCase
{

    protected $webDriver;
    protected $url = 'http://wordpress.local.domain';

    public function setUp() {

        $capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);

    }

    public function tearDown() {

        $this->webDriver->quit();

    }

    /*
     *  Browse to Wordpress development home
     *  Put the keyword "camera" into the search box
     *  The first result is... "Gallery talk - Using a camera to make panoramas in Greece in 1805"
     *
     *  This was complicated by the fact that PHPUnit is a bit too quick for the Selenium driver,
     *  so you have to add the "wait -> until" function in the middle of the code to get it to pause
     *  for up to 10 seconds, until it gets the URL with the search keyword back.
     *
     *  See
     *  http://stackoverflow.com/questions/14466993/php-webdriver-wait-for-browser-response-after-submitting-form-using-click
     *  for further details
     */

    public function testSearchForCameraFirstResultTitleContainsGalleryTalk() {

        $driver = $this->webDriver;

        $driver->get($this -> url);

        $searchForm = $driver->findElement(WebDriverBy::name('s'));

        $searchForm->sendKeys('camera');
        $searchForm->sendKeys(WebDriverKeys::RETURN_KEY);

        $driver->wait(10,500)->until(
          function($driver) {
              return $driver->getCurrentUrl() === 'http://wordpress.local.domain/?s=camera';
        });

        $result = $this->webDriver->findElement(WebDriverBy::id('testPlaceholder'))->getText();

        $this->assertEquals("Dave's search!", $result);

    }

}

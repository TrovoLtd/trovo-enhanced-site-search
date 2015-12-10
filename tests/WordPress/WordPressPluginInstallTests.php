<?php

use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\Remote\WebDriverCapabilityType;

/**
 * Created by PhpStorm.
 * User: David
 * Date: 10/12/2015
 * Time: 11:12
 */
class WordPressPluginInstallTest extends PHPUnit_Framework_TestCase {

	protected $webDriver;
	protected $url = 'http://wordpress.local.domain';

	public function setUp() {

		$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
		$this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);

	}

	public function tearDown() {

		$this->webDriver->quit();

	}

	public function testWordpressAvailable() {

		$this->webDriver->get($this->url);
		$this->assertContains('WordPress', $this->webDriver->getTitle());
	}

	// test can login to wordpress with generic development password

	// test can browse to plugins folder

	// test can install plugin

}

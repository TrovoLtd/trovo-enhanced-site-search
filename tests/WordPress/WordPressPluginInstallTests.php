<?php

use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;
use \Facebook\WebDriver\Remote\WebDriverCapabilityType;

// User Acceptance Tests to login to the local instance of Wordpress and install the plugin

class WordPressPluginInstallTest extends PHPUnit_Framework_TestCase {

	protected $webDriver;
	protected $url = 'http://wordpress.local.domain/wp-admin';
	protected $adminAccount = "TestAdmin";
	protected $adminPassword = "TestAdminPassword";

	public function setUp() {

		$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
		$this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);

	}

	public function tearDown() {

		$this->webDriver->quit();

	}

	// Tests that the login page is available at the set URL

	public function testWordpressAdminAvailable() {

		$this->webDriver->get($this->url);
		$this->assertEquals('Irish Academic Press Development › Log In', $this->webDriver->getTitle());
	}

	// test can login to WordPress with generic development password

	public function testCanLoginToWordpress() {

		$this->webDriver->get($this->url);

		$loginNameField = $this->webDriver->findElement(WebDriverBy::id('user_login'));
		$loginNameField->click();
		$this->webDriver->getKeyboard()->sendKeys($this->adminAccount);

		$loginPasswordField = $this->webDriver->findElement(WebDriverBy::id('user_pass'));
		$loginPasswordField->click();
		$this->webDriver->getKeyboard()->sendKeys($this->adminPassword);

		$this->webDriver->getKeyboard()->sendKeys(WebDriverKeys::ENTER);

		$this->assertContains('Dashboard', $this->webDriver->getTitle());

	}

	// test can browse to plugins folder

	// test can install plugin

}
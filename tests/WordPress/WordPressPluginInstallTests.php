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
		$this->assertEquals('Wordpress Development Site › Log In', $this->webDriver->getTitle());
	}

	// test can login to WordPress with generic development password

	public function testCanLoginToWordpress() {

		$this->loginToWordPress();

		$this->assertContains('Dashboard', $this->webDriver->getTitle());

	}

	// test plugin is available on plugins page

	public function testTrovoSiteSearchPluginAvailable()
	{
		$this->loginToWordPress();

		$pluginLink = $this->webDriver->findElement(WebDriverBy::id('menu-plugins'));

		$pluginLink->click();

		$this->assertNotEquals(0, $this->webDriver->findElement(WebDriverBy::id('trovo-enhanced-site-search')));


	}


	// test can install plugin

	// helper functions that perform repeated tasks

	private function loginToWordPress()
	{
		$this->webDriver->get($this->url);

		$loginNameField = $this->webDriver->findElement(WebDriverBy::id('user_login'));
		$loginNameField->click();
		$this->webDriver->getKeyboard()->sendKeys($this->adminAccount);

		$loginPasswordField = $this->webDriver->findElement(WebDriverBy::id('user_pass'));
		$loginPasswordField->click();
		$this->webDriver->getKeyboard()->sendKeys($this->adminPassword);

		$this->webDriver->getKeyboard()->sendKeys(WebDriverKeys::ENTER);

	}

}

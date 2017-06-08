<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * There is a known issue when running dusk tests, where
     * you can run a single test without problems, but the
     * entire suite will show this error:
     *
     * Facebook\WebDriver\Exception\NoSuchDriverException: no such session
     *
     * We can prevent it by running sleep(1) before tests
     */
    public static function setupBeforeClass()
    {
        parent::setupBeforeClass();

        sleep(1);
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()
        );
    }
}

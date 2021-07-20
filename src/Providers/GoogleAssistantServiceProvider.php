<?php

namespace GoogleAssistantV2\Providers;

use Illuminate\Support\ServiceProvider;
use BotMan\BotMan\Drivers\DriverManager;
use GoogleAssistantV2\GoogleAssistantDriver;
use BotMan\Studio\Providers\StudioServiceProvider;

class GoogleAssistantServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->isRunningInBotManStudio()) {
            $this->loadDrivers();
        }
    }

    /**
     * Load BotMan drivers.
     */
    protected function loadDrivers()
    {
        DriverManager::loadDriver(GoogleAssistantDriver::class);
    }

    /**
     * @return bool
     */
    protected function isRunningInBotManStudio()
    {
        return class_exists(StudioServiceProvider::class);
    }
}

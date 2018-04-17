<?php

namespace EFrame\PropertyBag\Settings;

use ReflectionClass;
use EFrame\PropertyBag\Exceptions\ResourceNotFound;

trait HasSettings
{
    /**
     * Instance of Settings.
     *
     * @var EFrame\PropertyBag\Settings\Settings
     */
    protected $settings = null;

    /**
<<<<<<< HEAD
=======
     * Registered settings for the subject.
     *
     * @var array
     */
    protected $registeredSettings = [];

    /**
>>>>>>> c6f95d155da927aee1f054004d1da4c7d22819d5
     * A resource has many settings in a property bag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function propertyBag()
    {
        return $this->morphMany(PropertyBag::class, 'resource');
    }

    /**
     * If passed is string, get settings class for the resource or return value
     * for given key. If passed is array, set the key value pair.
     *
     * @param string|array $passed
     *
     * @return EFrame\PropertyBag\Settings\Settings|mixed
     */
    public function settings($passed = null)
    {
        if (is_array($passed)) {
            return $this->setSettings($passed);
        } elseif (!is_null($passed)) {
            $settings = $this->getSettingsInstance();

            return $settings->get($passed);
        }

        return $this->getSettingsInstance();
    }

    /**
     * Get settings off this or create new instance.
     *
     * @return EFrame\PropertyBag\Settings\Settings
     */
    protected function getSettingsInstance()
    {
        if (isset($this->settings)) {
            return $this->settings;
        }

        $settingsConfig = $this->getSettingsConfig();

        return $this->settings = new Settings($settingsConfig, $this);
    }

    /**
     * @return ResourceConfig
     */
    protected function getSettingsConfig()
    {
        return new ResourceConfig($this, $this->getRegisteredSettings());
    }

    /**
     * @return array
     */
    protected function getRegisteredSettings()
    {
        return isset($this->registeredSettings) ? $this->registeredSettings : [];
    }

    /**
     * Get the short name of the model.
     *
     * @return string
     */
    protected function getShortClassName()
    {
        $reflection = new ReflectionClass($this);

        return $reflection->getShortName();
    }

    /**
     * Set settings.
     *
     * @param array $attributes
     *
     * @return EFrame\PropertyBag\Settings\Settings
     */
    public function setSettings(array $attributes)
    {
        return $this->settings()->set($attributes);
    }

    /**
     * Set all allowed settings by Request.
     *
     * @return EFrame\PropertyBag\Settings\Settings
     */
    public function setSettingsByRequest()
    {
        $allAllowedSettings = array_keys($this->allSettings()->toArray());

        return $this->settings()->set(request()->only($allAllowedSettings));
    }

    /**
     * Get all settings.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allSettings()
    {
        return $this->settings()->all();
    }

    /**
     * Get all default settings or default setting for single key if given.
     *
     * @param string $key
     *
     * @return \Illuminate\Support\Collection|mixed
     */
    public function defaultSetting($key = null)
    {
        if (!is_null($key)) {
            return $this->settings()->getDefault($key);
        }

        return $this->settings()->allDefaults();
    }

    /**
     * Get all allowed settings or allowed settings for single ke if given.
     *
     * @param string $key
     *
     * @return \Illuminate\Support\Collection
     */
    public function allowedSetting($key = null)
    {
        if (!is_null($key)) {
            return $this->settings()->getAllowed($key);
        }

        return $this->settings()->allAllowed();
    }
}

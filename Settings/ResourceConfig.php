<?php

namespace EFrame\PropertyBag\Settings;

use Illuminate\Database\Eloquent\Model;

class ResourceConfig
{
    /**
     * Resource that has settings.
     *
     * @var Model
     */
    private $resource;

    /**
     * Registered settings for model.
     *
     * @var array
     */
    protected $registeredSettings = [];

    /**
     * Construct.
     *
     * @param Model $resource
     */
    public function __construct(Model $resource, array $registeredSettings = [])
    {
        $this->resource           = $resource;
        $this->registeredSettings = $registeredSettings;
    }

    /**
     * Returns resource.
     *
     * @return Model
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Return a collection of registered settings.
     *
     * @return \Illuminate\Support\Collection
     */
    public function registeredSettings()
    {
        return collect($this->registeredSettings);
    }
}

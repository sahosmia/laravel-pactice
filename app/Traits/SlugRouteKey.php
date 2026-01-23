<?php
namespace App\Traits;

trait SlugRouteKey
{
    public function getRouteKeyName()
    {
        return property_exists($this, 'routeSlugColumn') ? $this->routeSlugColumn : 'slug';

    }
}

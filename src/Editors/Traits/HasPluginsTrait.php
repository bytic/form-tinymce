<?php

namespace ByTIC\Form\HtmlEditors\Editors\Traits;

/**
 * Trait HasPluginsTrait
 * @package ByTIC\Form\HtmlEditors\Editors\Traits
 */
trait HasPluginsTrait
{
    protected $plugins = null;

    /**
     * @return array
     */
    public function getPlugins(): ?array
    {
        return $this->plugins;
    }

    /**
     * @param array|null $plugins
     */
    public function setPlugins(?array $plugins): void
    {
        $this->plugins = $plugins;
    }
}

<?php

namespace ByTIC\Form\HtmlEditors\Editors;

use HTMLPurifier;
use HTMLPurifier_Config;

/**
 * Class AbstractEditor
 * @package ByTIC\Form\HtmlEditors\Editors
 */
abstract class AbstractEditor
{
    public const EDITOR_FULL = 'full';
    public const EDITOR_SIMPLE = 'simple';
    public const EDITOR_MINI = 'mini';

    protected $plugins = [];

    protected $filter;

    protected $allowedTags = [];
    protected $allowedAttributes = [];

    /**
     * @return array
     */
    public function getPlugins(): array
    {
        return $this->plugins;
    }

    /**
     * @param array $plugins
     */
    public function setPlugins(array $plugins): void
    {
        $this->plugins = $plugins;
    }

    /**
     * @param $name
     * @param array $options
     */
    public function addPlugin($name, $options = [])
    {
        $this->plugins[$name] = $options;
    }

    /**
     * @return HTMLPurifier
     */
    protected function getFilter(): HTMLPurifier
    {
        if (!$this->filter) {
            $config = HTMLPurifier_Config::createDefault();
            $config->set('HTML.AllowedElements', $this->allowedTags);
            $config->set('HTML.AllowedAttributes', $this->allowedAttributes);
            $purifier = new HTMLPurifier($config);
            $this->filter = $purifier;
        }

        return $this->filter;
    }

    /**
     * @param mixed $filter
     */
    public function setFilter($filter): void
    {
        if (is_string($filter)) {
            $filter = form_html_filter($filter);
        }
        $this->filter = $filter;
    }

    /**
     * @param array $config
     */
    public function fill(array $config = [])
    {
        foreach ($config as $name => $value) {
            $method = 'set' . ucfirst($name);
            if (method_exists($this, $name)) {
                $this->{$method}($value);
            } else {
                $this->{$name} = $value;
            }
        }
    }
}

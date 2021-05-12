<?php

namespace ByTIC\Form\HtmlEditors\Editors;

use ByTIC\Form\HtmlEditors\Frameworks\AbstractFramework\AbstractFramework;

/**
 * Class AbstractEditor
 * @package ByTIC\Form\HtmlEditors\Editors
 */
abstract class AbstractEditor
{
    public const EDITOR_FULL = 'full';
    public const EDITOR_SIMPLE = 'simple';
    public const EDITOR_MINI = 'mini';

    public $name = '';

    protected $selector = null;

    protected $plugins = null;

    /**
     * @var mixed
     */
    protected $filter = null;

    protected $extra = [];

    /**
     * @var AbstractFramework
     */
    protected $framework;

    /**
     * @param array $config
     */
    public function fill(array $config = [])
    {
        foreach ($config as $name => $value) {
            $method = 'set' . ucfirst($name);
            if (method_exists($this, $name)) {
                $this->{$method}($value);
            } elseif (property_exists($this, $name)) {
                $this->{$name} = $value;
            } else {
                $this->extra[$name] = $value;
            }
        }
    }

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

    protected function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param mixed $filter
     */
    public function setFilter($filter): void
    {
        $this->filter = $filter;
    }

    /**
     * @param $dirty
     * @return string|string[]
     */
    public function clean($dirty)
    {
        return \ByTIC\Purifier\Utility\Purifier::clean($dirty, $this->getFilter());
    }

    /**
     * @return null
     */
    public function getSelector()
    {
        return $this->selector;
    }

    /**
     * @return AbstractFramework
     */
    public function getFramework()
    {
        if (!is_object($this->framework)) {
            $this->framework = form_html_framework();
        }
        return $this->framework;
    }

    /**
     * @param mixed $framework
     */
    public function setFramework($framework): void
    {
        if (is_string($framework)) {
            $framework = form_html_framework($framework);
        }
        $this->framework = $framework;
    }

    /**
     * @return mixed
     */
    public function configuration()
    {
        $framework = $this->getFramework();
        $return = new \stdClass();
        $return->framework = $framework->getName();
        $return->config = $this->getFramework()->configurationEditor($this);
        return $return;
    }
}

<?php

namespace ByTIC\Form\HtmlEditors\Editors;

use ByTIC\Form\HtmlEditors\Frameworks\AbstractFramework\AbstractFramework;

/**
 * Class AbstractEditor
 * @package ByTIC\Form\HtmlEditors\Editors
 */
abstract class AbstractEditor
{
    use Traits\HasConfigurationTrait;
    use Traits\HasPluginsTrait;
    use Traits\HasFilterTrait;

    public const EDITOR_FULL = 'full';
    public const EDITOR_SIMPLE = 'simple';
    public const EDITOR_MINI = 'mini';

    public $name = '';

    protected $selector = null;


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
}

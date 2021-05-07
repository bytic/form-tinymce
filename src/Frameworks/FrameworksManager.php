<?php

namespace ByTIC\Form\HtmlEditors\Frameworks;

use ByTIC\Form\HtmlEditors\Frameworks\AbstractFramework\AbstractFramework;
use ByTIC\Form\HtmlEditors\Frameworks\TinyMCE\TinyMCE;
use HTMLPurifier;

/**
 * Class FrameworksManager
 * @package ByTIC\Form\HtmlEditors\Filters
 */
class FrameworksManager
{
    protected $frameworks = [];

    /**
     * @param null|string $name
     * @return HTMLPurifier
     */
    public function framework($name = null)
    {
        $name = $this->parseName($name);

        if (!isset($this->frameworks[$name])) {
            $item = $this->make($name);
            $this->set($item, $name);
        }

        return $this->frameworks[$name];
    }

    /**
     * @param $name
     * @return string|null
     */
    protected function parseName($name): ?string
    {
        return $name ?: TinyMCE::class;
    }

    /**
     * @param AbstractFramework $filter
     * @param string $name
     */
    public function set($filter, string $name)
    {
        $this->frameworks[$name] = $filter;
    }

    protected function make(string $name): AbstractFramework
    {
        $class = $this->class($name);

        return new $class();
    }

    protected function class(string $name): ?string
    {
        if (class_exists($name)) {
            return $name;
        }
        switch ($name) {
            case TinyMCE::NAME:
                return TinyMCE::class;
        }
        return null;
    }

    /**
     * @return string
     */
    protected static function getPackageConfigName(): string
    {
        return 'form-html-editors.filters';
    }
}
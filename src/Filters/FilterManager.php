<?php

namespace ByTIC\Form\HtmlEditors\Filters;

use ByTIC\Form\HtmlEditors\Filters\Config\ConfigFactory;
use HTMLPurifier;
use HTMLPurifier_Config;
use Nip\Config\Utils\PackageHasConfigTrait;

/**
 * Class FilterManager
 * @package ByTIC\Form\HtmlEditors\Filters
 */
class FilterManager
{
    use PackageHasConfigTrait;

    protected $filters = [];

    /**
     * @param null|string $name
     * @return HTMLPurifier
     */
    public function filter($name = null)
    {
        $name = $this->parseName($name);

        if (!isset($this->filters[$name])) {
            $filter = $this->make($name);
            $this->set($filter, $name);
        }

        return $this->filters[$name];
    }

    /**
     * @param $name
     * @return string|null
     */
    protected function parseName($name): ?string
    {
        return $name ?: 'base';
    }

    /**
     * @param HTMLPurifier $filter
     * @param string $name
     */
    public function set($filter, string $name)
    {
        $this->filters[$name] = $filter;
    }

    protected function make(string $name): HTMLPurifier
    {
        $config = $this->configuration($name);

        return new HTMLPurifier($config);
    }

    protected function configuration(string $name): HTMLPurifier_Config
    {
        $config = ConfigFactory::make($name, $this->getPackageConfig($name, []));

        $filter_config = HTMLPurifier_Config::createDefault();
        $filter_config->set('HTML.AllowedElements', $config->allowedTags);
        $filter_config->set('HTML.AllowedAttributes', $config->allowedAttributes);
        return $filter_config;
    }

    /**
     * @return string
     */
    protected static function getPackageConfigName(): string
    {
        return 'form-html-editors.filters';
    }
}
<?php

namespace ByTIC\Form\HtmlEditors\Filters\Config;

/**
 * Class AbstractConfig
 * @package ByTIC\Form\HtmlEditors\Filters\Config
 */
abstract class AbstractConfig
{
    public $allowedTags = [];
    public $allowedAttributes = [];

    /**
     * AbstractConfig constructor.
     */
    public function __construct(array $config = [])
    {
        $config['allowedTags'] = $config['allowedTags'] ??
            (defined(static::class . '::ALLOWED_TAGS') ? static::ALLOWED_TAGS : []);

        $config['allowedAttributes'] = $config['allowedAttributes'] ??
            (defined(static::class . '::ALLOWED_ATTRIBUTES') ? static::ALLOWED_ATTRIBUTES : []);
    }

    /**
     * @param array $config
     */
    public function fill(array $config = [])
    {
        foreach ($config as $name => $value) {
            $this->{$name} = $value;
        }
    }
}
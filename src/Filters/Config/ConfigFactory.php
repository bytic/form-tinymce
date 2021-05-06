<?php

namespace ByTIC\Form\HtmlEditors\Filters\Config;

/**
 * Class ConfigFactory
 * @package ByTIC\Form\HtmlEditors\Filters\Config
 */
class ConfigFactory
{
    /**
     * @param $name
     * @param $config
     * @return AbstractConfig
     */
    public static function make($name, $config): AbstractConfig
    {
        $class = static::class($name);
        return new $class($config);
    }

    protected static function class($name): string
    {
        switch ($name) {
            case 'full' :
                return FullEditorConfig::class;
            case 'mini' :
                return MiniEditorConfig::class;
            case 'simple' :
                return SimpleEditorConfig::class;
        }
        return EditorConfig::class;
    }
}
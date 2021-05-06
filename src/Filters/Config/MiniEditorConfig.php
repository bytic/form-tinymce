<?php

namespace ByTIC\Form\HtmlEditors\Filters\Config;

/**
 * Class MiniEditorConfig
 * @package ByTIC\Form\HtmlEditors\Filters\Config
 */
class MiniEditorConfig extends AbstractConfig
{
    public const NAME = 'mini';

    public const ALLOWED_TAGS = ["a", "b", "br", "p", "span", "strong"];
    public const ALLOWED_ATTRIBUTES = ["align", "src", "href", "target"];
}
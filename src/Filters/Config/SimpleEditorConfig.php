<?php

namespace ByTIC\Form\HtmlEditors\Filters\Config;

/**
 * Class SimpleEditorConfig
 * @package ByTIC\Form\HtmlEditors\Filters\Config
 */
class SimpleEditorConfig extends AbstractConfig
{
    public const NAME = 'simple';

    public const  ALLOWED_TAGS = ["a", "b", "br", "p", "img", "small", "span", "strong", "ul", "li"];
    public const  ALLOWED_ATTRIBUTES = ["align", "src", "href", "target"];
}
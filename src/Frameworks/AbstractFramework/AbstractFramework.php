<?php

namespace ByTIC\Form\HtmlEditors\Frameworks\AbstractFramework;

use ByTIC\Form\HtmlEditors\Editors\AbstractEditor;

/**
 * Class AbstractFramework
 * @package ByTIC\Form\HtmlEditors\Frameworks\AbstractFramework
 */
abstract class AbstractFramework
{
    public function getName(): string
    {
        if (defined(static::class . '::NAME')) {
            return static::NAME;
        }
        return static::class;
    }

    /**
     * @param AbstractEditor $editor
     * @return mixed
     */
    abstract public function configurationEditor(AbstractEditor $editor);
}

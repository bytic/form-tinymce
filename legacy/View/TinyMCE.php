<?php

namespace Nip\Helpers\View;

use ByTIC\Form\HtmlEditors\Utility\AssetsEditorsInit;

/**
 * Class TinyMCE
 * @package Nip\Helpers\View
 */
class TinyMCE extends AbstractHelper
{
    /**
     * @var bool
     */
    protected $enabled = false;

    /**
     * @var string
     */
    protected $base = 'tinymce';

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled = true)
    {
        $this->enabled = $enabled;
    }

    public function init()
    {
        if ($this->enabled) {
            AssetsEditorsInit::init(null, $this->getBase());
        }
    }

    /**
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param $base
     */
    public function setBase($base)
    {
        $this->base = $base;
    }
}

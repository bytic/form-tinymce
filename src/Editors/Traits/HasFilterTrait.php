<?php

namespace ByTIC\Form\HtmlEditors\Editors\Traits;

/**
 * Trait HasFilterTrait
 * @package ByTIC\Form\HtmlEditors\Editors\Traits
 */
trait HasFilterTrait
{

    /**
     * @var mixed
     */
    protected $filter = null;

    public function getFilter()
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
}
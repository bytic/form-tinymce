<?php

namespace ByTIC\Form\HtmlEditors\Editors\Traits;

/**
 * Trait HasConfigurationTrait
 * @package ByTIC\Form\HtmlEditors\Editors\Traits
 */
trait HasConfigurationTrait
{
    protected $editorConfig = [];

    /**
     * @return array
     */
    public function getEditorConfig(): array
    {
        return $this->editorConfig;
    }

    /**
     * @param array $editorConfig
     */
    public function setEditorConfig(array $editorConfig): void
    {
        $this->editorConfig = $editorConfig;
    }

    /**
     * @return mixed
     */
    public function configuration()
    {
        $framework = $this->getFramework();
        $return = new \stdClass();
        $return->framework = $framework->getName();
        $return->config = $this->getFramework()->configurationEditor($this);
        return $return;
    }
}

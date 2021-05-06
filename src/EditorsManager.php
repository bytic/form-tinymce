<?php

namespace ByTIC\Form\HtmlEditors;

use ByTIC\Form\HtmlEditors\Editors\AbstractEditor;
use ByTIC\Form\HtmlEditors\Editors\BaseEditor;
use Nip\Config\Utils\PackageHasConfigTrait;
use Nip\Utility\Arr;

/**
 * Class EditorsManager
 * @package ByTIC\Form\HtmlEditors
 */
class EditorsManager
{
    public const DEFAULT_EDITORS = [
        AbstractEditor::EDITOR_SIMPLE,
        AbstractEditor::EDITOR_MINI,
        AbstractEditor::EDITOR_FULL
    ];

    use PackageHasConfigTrait;

    /**
     * @var AbstractEditor[]
     */
    protected $editors = [];

    /**
     * @return AbstractEditor[]
     */
    public function editors()
    {
        $configuredEditors = $this->getPackageConfig('editors')->toArray();

        foreach ($configuredEditors as $name => $data) {
            $name = is_int($name) ? $data : $name;
            $this->editor($name);
        }
        return $this->editors;
    }

    /**
     * @param null $name
     * @return AbstractEditor
     */
    public function editor($name = null)
    {
        $name = $this->parseEditorName($name);

        if (!isset($this->editors[$name])) {
            $config = $this->configuration($name);
            $editor = $this->make($name, $config);
            $this->setEditor($editor, $name);
        }

        return $this->editors[$name];
    }

    /**
     * @param AbstractEditor $editor
     * @param string $name
     */
    public function setEditor($editor, $name)
    {
        $this->editors[$name] = $editor;
    }

    /**
     * @param $name
     * @return mixed|\Nip\Config\Config|string|null
     */
    protected function parseEditorName($name)
    {
        $name = $name ?: $this->getDefaultEditor();

        return $name;
    }

    /**
     * @return string
     */
    protected function getDefaultEditor()
    {
        return (string)$this->getPackageConfig('editor_default', 'simple');
    }

    /**
     * @param $name
     * @param $config
     * @return BaseEditor
     */
    protected function make($name, $config): BaseEditor
    {
        $editor = new BaseEditor();
        $editor->fill($config);
        return $editor;
    }

    /**
     * Get the configuration for an editor
     *
     * @param string $name
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    protected function configuration($name): array
    {
        $configuration = $this->getPackageConfig('editors');
        $configuration = Arr::get($configuration, $name, []);
        $configuration = is_object($configuration) ? $configuration->toArray() : $configuration;
        if (!isset($configuration['filter']) && in_array($name, self::DEFAULT_EDITORS)) {
            $configuration['filter'] = $name;
        }
        return $configuration;
    }

    protected static function getPackageConfigName(): string
    {
        return 'form-html-editors';
    }
}
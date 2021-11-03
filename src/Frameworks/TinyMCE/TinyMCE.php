<?php

namespace ByTIC\Form\HtmlEditors\Frameworks\TinyMCE;

use ByTIC\Form\HtmlEditors\Editors\AbstractEditor;
use ByTIC\Form\HtmlEditors\Frameworks\AbstractFramework\AbstractFramework;

/**
 * Class TinyMCE
 * @package ByTIC\Form\HtmlEditors\Frameworks
 */
class TinyMCE extends AbstractFramework
{
    public const NAME = 'TinyMCE';

    /**
     * @param AbstractEditor $editor
     */
    public function configurationEditor(AbstractEditor $editor): \stdClass
    {
        $config = $editor->getEditorConfig();
        $plugins = $editor->getPlugins();
        if ($plugins) {
            $config['plugins'] = $plugins;
        }

        $selector = $editor->getSelector();
        if ($selector) {
            $config['selector'] = $selector;
        }

        $config = array_merge(static::configurationEditorStandard($editor->name), $config);

        $config['plugins'] = implode(' ', $config['plugins']);

        return (object)$config;
    }

    public static function configurationEditorStandard(string $name): array
    {
        $return = [
            'branding' => false,
            'menubar' => false,
            'toolbar_sticky' => true,
            'media_live_embeds' => true,
            'height' => 400,
            'theme_advanced_resizing_min_height' => 300,
            'plugins' => []
        ];
        switch ($name) {
            case AbstractEditor::EDITOR_FULL:
                $return['plugins'] = [
                    "advlist autolink autosave autoresize link image lists charmap preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table  directionality emoticons template  paste fullpage"
                ];
                $return['toolbar1'] = "code fullscreen preview | undo redo | cut copy paste |  bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | removeformat ";
                $return['toolbar2'] = "styleselect fontsizeselect | searchreplace | bullist numlist | outdent indent blockquote |  link unlink anchor image media  | inserttime  | forecolor backcolor";
                $return['toolbar3'] = "table | hr  | subscript superscript | charmap emoticons | ltr rtl  | visualchars visualblocks nonbreaking template pagebreak restoredraft";
                $return['min_height'] = 400;
//                $return['theme_advanced_resizing_min_height'] = 1000;
                break;

            case AbstractEditor::EDITOR_SIMPLE:
                $return['plugins'] = [
                    "advlist autolink lists link image charmap anchor searchreplace visualblocks code fullscreen insertdatetime media table  paste"
                ];
                $return['toolbar1'] = "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify ";
                $return['toolbar2'] = "bullist numlist outdent indent | link image media | forecolor backcolor emoticons";
                break;

            case AbstractEditor::EDITOR_MINI:
                $return['plugins'] = [
                    "advlist autolink link anchor searchreplace visualblocks code fullscreen table  paste "
                ];
                $return['toolbar1'] = "undo redo | bold italic underline strikethrough | link";
                break;
        }

        return $return;
    }
}

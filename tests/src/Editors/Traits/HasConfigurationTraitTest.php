<?php

namespace ByTIC\Form\HtmlEditors\Tests\Editors\Traits;

use ByTIC\Form\HtmlEditors\Editors\BaseEditor;
use ByTIC\Form\HtmlEditors\Tests\AbstractTest;

/**
 * Class HasConfigurationTraitTest
 * @package ByTIC\Form\HtmlEditors\Tests\Editors\Traits
 */
class HasConfigurationTraitTest extends AbstractTest
{
    public function test_editorConfig()
    {
        $editor = new BaseEditor();
        $editor->fill(['editorConfig' => ['relative_urls' => false]]);
        $configuration = json_decode(json_encode($editor->configuration()), true);
        self::assertSame(
            [
                'framework' => 'TinyMCE',
                'config' => [
                    'branding' => false,
                    'menubar' => false,
                    'toolbar_sticky' => true,
                    'media_live_embeds' => true,
                    'height' => 400,
                    'theme_advanced_resizing_min_height' => 300,
                    'plugins' => '',
                    'relative_urls' => false
                ]
            ],
            $configuration
        );
    }
}
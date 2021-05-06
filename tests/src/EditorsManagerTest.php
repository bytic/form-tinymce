<?php

namespace ByTIC\Form\HtmlEditors\Tests;

use ByTIC\Form\HtmlEditors\Editors\BaseEditor;
use ByTIC\Form\HtmlEditors\EditorsManager;

/**
 * Class EditorsManagerTest
 * @package ByTIC\Form\HtmlEditors\Tests
 */
class EditorsManagerTest extends AbstractTest
{
    public function test_editor()
    {
        $manager = new EditorsManager();
        $filter = $manager->editor('full');

        self::assertInstanceOf(BaseEditor::class, $filter);
    }

    public function test_editor_from_config()
    {
        EditorsManager::setConfig(['form-html-editors' => require TEST_FIXTURE_PATH . '/config/form-html-editors.php']);
        $manager = new EditorsManager();

        $editor = $manager->editor(\ByTIC\Form\HtmlEditors\Editors\AbstractEditor::EDITOR_MINI);
        self::assertInstanceOf(BaseEditor::class, $editor);
        self::assertSame(['test1', 'test2'], $editor->getPlugins());

        $editors = $manager->editors();
        self::assertCount(3, $editors);
    }

    public function test_editor_make_once()
    {
        $manager = \Mockery::mock(EditorsManager::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $manager->shouldReceive('make')->once();

        $manager->editor('full');
        $manager->editor('full');
        $manager->editor('full');
    }
}